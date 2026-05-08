<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntregaController extends Controller
{
    public function listarEntregas()
    {
        try {
            // Endpoint de API: lista as entregas em JSON.
            // Mantive separado das telas web, pq as telas usam EntregaPageController.
            $entregas = Entrega::with('entregadores')->get();

            return response()->json($entregas, 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao listar as entregas',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function criarEntregas(Request $request)
    {
        // Valida os dados que podem chegar via API ou formulario antigo.
        $dados = $request->validate([
            'origem' => 'required|string|max:50',
            'destino' => 'required|string|max:50',
            'valor' => 'nullable|numeric|min:0',
            'observacoes' => 'nullable|string|max:1000',
            'status' => 'nullable|in:disponivel,aguardando_comercio,aceita,em_andamento,concluida,cancelada',
        ]);

        try {
            // Se nao mandar status/valor, a corrida nasce disponivel e com valor zero.
            $dados['status'] = $dados['status'] ?? 'disponivel';
            $dados['valor'] = $dados['valor'] ?? 0;

            // Se alguem usar essa rota estando logado como comercio, tenta salvar o dono da corrida.
            if (Auth::check() && (Auth::user()->isComercio() || Auth::user()->isAdmin())) {
                $dados['comercio_id'] = Auth::id();
            }

            $entrega = Entrega::create($dados);

            // Se a chamada veio do navegador normal, manda pra tela em vez de cuspir JSON na cara do usuario.
            if (!$request->expectsJson()) {
                return redirect()->route('entregas.historico')->with('success', 'Corrida criada com sucesso.');
            }

            return response()->json($entrega, 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao cadastrar a entrega',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function atualizarEntregas(Request $request, $id)
    {
        // API antiga usa id manual em vez de Route Model Binding.
        $entrega = Entrega::find($id);

        if (!$entrega) {
            return response()->json([
                'message' => 'Entrega não encontrada',
            ], 404);
        }

        $dados = $request->validate([
            'origem' => 'required|string|max:50',
            'destino' => 'required|string|max:50',
            'valor' => 'nullable|numeric|min:0',
            'observacoes' => 'nullable|string|max:1000',
            'status' => 'required|in:disponivel,aguardando_comercio,aceita,em_andamento,concluida,cancelada',
        ]);

        try {
            $entrega->update($dados);

            return response()->json([
                'message' => 'Entrega atualizada com sucesso',
                'data' => $entrega,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar a entrega',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function deletarEntregas($id)
    {
        $entrega = Entrega::find($id);

        if (!$entrega) {
            return response()->json([
                'message' => 'Entrega não encontrada',
            ], 404);
        }

        try {
            // Esse delete é da API. Na tela web existe regra mais esperta: excluir ou cancelar.
            $entrega->delete();

            return response()->json([
                'message' => 'Entrega deletada com sucesso',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar a entrega',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
