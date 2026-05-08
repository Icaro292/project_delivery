@extends('layouts.app')

@section('content')
<main class="pt-20 max-w-3xl mx-auto px-5">
    <div class="mb-5">
        <h2 class="text-2xl font-bold text-slate-900">Histórico de corridas</h2>
        <p class="text-sm text-slate-500">
            @if (auth()->user()->isAdmin())
                Todas as corridas do sistema.
            @elseif (auth()->user()->isComercio())
                Corridas criadas pelo seu comércio.
            @else
                Corridas aceitas ou concluídas por você.
            @endif
        </p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-5">
        <div class="bg-white rounded-lg border border-slate-200 p-4">
            <p class="text-xs text-slate-500 font-bold uppercase">Total</p>
            <p class="text-2xl font-bold text-slate-900">{{ $entregas->count() }}</p>
        </div>
        <div class="bg-white rounded-lg border border-slate-200 p-4">
            <p class="text-xs text-slate-500 font-bold uppercase">Concluídas</p>
            <p class="text-2xl font-bold text-green-700">{{ $entregas->where('status', 'concluida')->count() }}</p>
        </div>
        <div class="bg-white rounded-lg border border-slate-200 p-4">
            <p class="text-xs text-slate-500 font-bold uppercase">Abertas</p>
            <p class="text-2xl font-bold text-blue-900">{{ $entregas->whereIn('status', ['disponivel', 'aguardando_comercio', 'aceita', 'em_andamento'])->count() }}</p>
        </div>
        <div class="bg-white rounded-lg border border-slate-200 p-4">
            <p class="text-xs text-slate-500 font-bold uppercase">{{ auth()->user()->isMotoqueiro() ? 'Faturamento' : 'Valor concluído' }}</p>
            <p class="text-2xl font-bold text-green-700">R$ {{ number_format((float) $faturamento, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="space-y-4">
        @forelse ($entregas as $entrega)
            <article class="bg-white rounded-lg shadow-sm border border-slate-200 p-4">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <h3 class="font-bold text-blue-900">Corrida #{{ $entrega->id }}</h3>
                        <p class="text-xs text-slate-500">{{ $entrega->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <span class="rounded-full px-3 py-1 text-xs font-bold uppercase {{ $entrega->status === 'cancelada' ? 'bg-red-100 text-red-700' : 'bg-slate-100 text-slate-700' }}">
                        {{ str_replace('_', ' ', $entrega->status) }}
                    </span>
                </div>

                <div class="mt-3">
                    <p class="text-sm text-slate-700"><strong>Retirada:</strong> {{ $entrega->origem }}</p>
                    <p class="text-sm text-slate-700"><strong>Entrega:</strong> {{ $entrega->destino }}</p>
                    <p class="text-sm text-slate-700"><strong>Comércio:</strong> {{ $entrega->comercio->name ?? '-' }}</p>
                    <p class="text-sm text-slate-700"><strong>Motoqueiro:</strong> {{ $entrega->motoqueiro->name ?? '-' }}</p>
                </div>

                <div class="mt-3 flex flex-wrap items-center justify-between gap-3">
                    <p class="font-bold text-green-700">R$ {{ number_format((float) $entrega->valor, 2, ',', '.') }}</p>
                    <div class="flex items-center gap-3">
                        @if ((auth()->user()->isComercio() || auth()->user()->isAdmin()) && !in_array($entrega->status, ['concluida', 'cancelada'], true))
                            <form method="POST" action="{{ route('entregas.excluir-ou-cancelar', $entrega) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm font-bold text-red-700">
                                    {{ $entrega->status === 'disponivel' && !$entrega->motoqueiro_id ? 'Excluir' : 'Cancelar' }}
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('entregas.detalhes', $entrega) }}" class="text-sm font-bold text-blue-900">Ver detalhes</a>
                    </div>
                </div>
            </article>
        @empty
            <div class="rounded-lg border border-dashed border-slate-300 bg-white p-8 text-center">
                <p class="font-semibold text-slate-700">Nenhum histórico encontrado.</p>
            </div>
        @endforelse
    </div>
</main>
@endsection
