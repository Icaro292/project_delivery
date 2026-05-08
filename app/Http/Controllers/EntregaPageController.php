<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntregaPageController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        // Comeca a consulta sempre carregando comercio e motoqueiro, pra view nao ficar fazendo query toda hora.
        $query = Entrega::with(['comercio', 'motoqueiro'])->latest();

        // Motoqueiro so ve corrida disponivel na tela inicial.
        if ($user->isMotoqueiro()) {
            $query->where('status', 'disponivel');
        } elseif ($user->isComercio()) {
            // Comercio ve as corridas dele e tambem corridas antigas sem dono.
            // Essas sem dono apareceram quando a rota antiga/API criou sem comercio_id.
            $query->where(function ($query) use ($user) {
                $query->where('comercio_id', $user->id)
                    ->orWhereNull('comercio_id');
            });
        }

        return view('home.home', [
            'entregas' => $query->get(),
            'titulo' => $user->isComercio() ? 'Minhas corridas' : 'Entregas disponíveis',
        ]);
    }

    public function criar()
    {
        // Motoqueiro nao pode criar corrida. Se tentar entrar pela URL, bloqueia aqui.
        abort_unless(Auth::user()->isComercio() || Auth::user()->isAdmin(), 403, 'Motoqueiro não cria corrida.');

        return view('entregas.cadastrar_encomendas');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Garante no backend tambem, pq esconder botao no front nao segura nada sozinho.
        abort_unless($user->isComercio() || $user->isAdmin(), 403, 'Motoqueiro não cria corrida.');

        $dados = $request->validate([
            'origem' => ['required', 'string', 'max:50'],
            'destino' => ['required', 'string', 'max:50'],
            'valor' => ['nullable', 'numeric', 'min:0'],
            'observacoes' => ['nullable', 'string', 'max:1000'],
        ]);

        // Toda corrida criada pela tela fica ligada ao comercio logado.
        $dados['comercio_id'] = $user->id;
        $dados['status'] = 'disponivel';
        $dados['valor'] = $dados['valor'] ?? 0;

        Entrega::create($dados);

        return redirect()->route('entregas.historico')->with('success', 'Corrida criada com sucesso.');
    }

    public function detalhes(Entrega $entrega)
    {
        // Antes de mostrar detalhes, confere se esse usuario pode ver esta corrida.
        $this->autorizarVisualizacao($entrega);

        return view('entregas.detalhes', compact('entrega'));
    }

    public function aceitar(Entrega $entrega)
    {
        $user = Auth::user();

        // Primeiro aceite é do motoqueiro. Ele se candidata/aceita pegar a corrida.
        abort_unless($user->isMotoqueiro() || $user->isAdmin(), 403, 'Comércio não faz o aceite do motoqueiro.');
        abort_unless($entrega->status === 'disponivel', 422, 'Esta corrida não está disponível.');

        $entrega->update([
            'motoqueiro_id' => $user->id,
            'status' => 'aguardando_comercio',
            'aceita_em' => now(),
            'motoqueiro_aceitou_em' => now(),
        ]);

        return redirect()->route('entregas.detalhes', $entrega)->with('success', 'Pedido enviado. Agora o comércio precisa aceitar.');
    }

    public function aceitarComercio(Entrega $entrega)
    {
        $user = Auth::user();

        // Segundo aceite é do comercio dono da corrida. Dai a corrida fica realmente aceita.
        abort_unless($user->isAdmin() || ($user->isComercio() && ($entrega->comercio_id === $user->id || $entrega->comercio_id === null)), 403);
        abort_unless($entrega->status === 'aguardando_comercio' && $entrega->motoqueiro_id !== null, 422, 'Esta corrida ainda não tem aceite do motoqueiro.');

        $entrega->update([
            'comercio_id' => $entrega->comercio_id ?? $user->id,
            'status' => 'aceita',
            'comercio_aceitou_em' => now(),
        ]);

        return redirect()->route('entregas.detalhes', $entrega)->with('success', 'Motoqueiro aceito pelo comércio.');
    }

    public function concluir(Entrega $entrega)
    {
        $user = Auth::user();

        // So o motoqueiro da corrida ou admin pode concluir.
        abort_unless($user->isAdmin() || $entrega->motoqueiro_id === $user->id, 403);
        abort_unless(in_array($entrega->status, ['aceita', 'em_andamento'], true), 422, 'A corrida precisa ser aceita pelo comércio antes de concluir.');

        $entrega->update([
            'status' => 'concluida',
            'concluida_em' => now(),
        ]);

        return redirect()->route('entregas.historico')->with('success', 'Corrida concluída.');
    }

    public function excluirOuCancelar(Entrega $entrega)
    {
        $user = Auth::user();

        // Comercio so mexe no que é dele. Admin pode mexer em tudo.
        abort_unless($user->isAdmin() || ($user->isComercio() && ($entrega->comercio_id === $user->id || $entrega->comercio_id === null)), 403);
        abort_if($entrega->status === 'concluida', 422, 'Corrida concluída não pode ser cancelada.');

        // Se ninguem aceitou ainda, pode excluir de verdade.
        if ($entrega->status === 'disponivel' && $entrega->motoqueiro_id === null) {
            $entrega->delete();

            return redirect()->route('entregas.historico')->with('success', 'Corrida excluída.');
        }

        // Se ja teve aceite, nao apaga. Marca cancelada pra aparecer pros dois lados.
        $entrega->update([
            'comercio_id' => $entrega->comercio_id ?? $user->id,
            'status' => 'cancelada',
        ]);

        return redirect()->route('entregas.historico')->with('success', 'Corrida cancelada para comércio e motoqueiro.');
    }

    public function historico()
    {
        $user = Auth::user();
        $query = Entrega::with(['comercio', 'motoqueiro'])->latest();

        // Cada perfil ve seu proprio historico. Admin nao filtra, entao ve tudo.
        if ($user->isComercio()) {
            $query->where(function ($query) use ($user) {
                $query->where('comercio_id', $user->id)
                    ->orWhereNull('comercio_id');
            });
        } elseif ($user->isMotoqueiro()) {
            $query->where('motoqueiro_id', $user->id);
        }

        $entregas = $query->get();

        return view('entregas.historico', [
            'entregas' => $entregas,
            // Faturamento so conta corrida concluida. Cancelada nao entra na soma.
            'faturamento' => $entregas->where('status', 'concluida')->sum('valor'),
        ]);
    }

    private function autorizarVisualizacao(Entrega $entrega): void
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return;
        }

        if ($user->isComercio() && ($entrega->comercio_id === $user->id || $entrega->comercio_id === null)) {
            return;
        }

        if ($user->isMotoqueiro() && ($entrega->status === 'disponivel' || $entrega->motoqueiro_id === $user->id)) {
            return;
        }

        // Se chegou aqui, o usuario tentou ver algo que nao é dele.
        abort(403);
    }
}
