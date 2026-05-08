@extends('layouts.app')

@section('content')
<main class="pt-20 max-w-3xl mx-auto px-5">
    <div class="flex items-start justify-between gap-4 mb-5">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">{{ $titulo }}</h2>
            <p class="text-sm text-slate-500">
                {{ auth()->user()->nivel_acesso === 'motoqueiro' ? 'Escolha uma corrida disponível para aceitar.' : 'Acompanhe suas corridas criadas, aceitas, canceladas e concluídas.' }}
            </p>
        </div>

        @if (auth()->user()->isComercio() || auth()->user()->isAdmin())
            <a href="{{ route('entregas.cadastrar') }}" class="shrink-0 rounded-lg bg-blue-900 px-4 py-2 text-sm font-bold text-white">
                Criar
            </a>
        @endif
    </div>

    <div class="space-y-4">
        @forelse ($entregas as $entrega)
            <article class="bg-white rounded-lg shadow-sm border border-slate-200 p-4">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="font-bold text-blue-900">Corrida #{{ $entrega->id }}</h3>
                        <p class="text-xs text-slate-500">Criada por {{ $entrega->comercio->name ?? 'Comércio removido' }}</p>
                    </div>

                    <span class="rounded-full px-3 py-1 text-xs font-bold uppercase {{ $entrega->status === 'cancelada' ? 'bg-red-100 text-red-700' : ($entrega->status === 'concluida' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-800') }}">
                        {{ str_replace('_', ' ', $entrega->status) }}
                    </span>
                </div>

                <div class="mt-4 grid gap-3 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase">Retirada</p>
                        <p class="text-sm font-semibold text-slate-800">{{ $entrega->origem }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase">Entrega</p>
                        <p class="text-sm font-semibold text-slate-800">{{ $entrega->destino }}</p>
                    </div>
                </div>

                <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
                    <p class="text-lg font-bold text-green-700">R$ {{ number_format((float) $entrega->valor, 2, ',', '.') }}</p>
                    <div class="flex items-center gap-3">
                        @if ((auth()->user()->isComercio() || auth()->user()->isAdmin()) && !in_array($entrega->status, ['concluida', 'cancelada'], true))
                            <form method="POST" action="{{ route('entregas.excluir-ou-cancelar', $entrega) }}">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-lg border border-red-700 px-4 py-2 text-sm font-bold text-red-700">
                                    {{ $entrega->status === 'disponivel' && !$entrega->motoqueiro_id ? 'Excluir' : 'Cancelar' }}
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('entregas.detalhes', $entrega) }}" class="rounded-lg border border-blue-900 px-4 py-2 text-sm font-bold text-blue-900">
                            Detalhes
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-dashed border-slate-300 bg-white p-8 text-center">
                <p class="font-semibold text-slate-700">Nenhuma corrida encontrada.</p>
                <p class="text-sm text-slate-500 mt-1">Quando houver corridas no seu perfil, elas aparecerão aqui.</p>
            </div>
        @endforelse
    </div>
</main>
@endsection
