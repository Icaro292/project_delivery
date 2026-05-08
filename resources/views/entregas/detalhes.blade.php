@extends('layouts.app')

@section('content')
<main class="pt-20 max-w-2xl mx-auto px-5">
    <a href="{{ route('home') }}" class="inline-flex items-center gap-1 text-sm font-bold text-blue-900 mb-4">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Voltar
    </a>

    <section class="bg-white border border-slate-200 rounded-lg shadow-sm p-5">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase">Corrida</p>
                <h1 class="text-2xl font-bold text-blue-900">#{{ $entrega->id }}</h1>
            </div>
            <span class="rounded-full px-3 py-1 text-xs font-bold uppercase {{ $entrega->status === 'cancelada' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-800' }}">
                {{ str_replace('_', ' ', $entrega->status) }}
            </span>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 mt-6">
            <div class="rounded-lg bg-slate-50 p-4">
                <p class="text-xs font-bold text-slate-400 uppercase">Retirada</p>
                <p class="font-semibold text-slate-800">{{ $entrega->origem }}</p>
            </div>
            <div class="rounded-lg bg-slate-50 p-4">
                <p class="text-xs font-bold text-slate-400 uppercase">Entrega</p>
                <p class="font-semibold text-slate-800">{{ $entrega->destino }}</p>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-3 mt-4">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase">Valor</p>
                <p class="text-lg font-bold text-green-700">R$ {{ number_format((float) $entrega->valor, 2, ',', '.') }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase">Comércio</p>
                <p class="font-semibold text-slate-800">{{ $entrega->comercio->name ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase">Motoqueiro</p>
                <p class="font-semibold text-slate-800">{{ $entrega->motoqueiro->name ?? '-' }}</p>
            </div>
        </div>

        @if ($entrega->observacoes)
            <div class="mt-5 rounded-lg bg-yellow-50 border border-yellow-100 p-4">
                <p class="text-xs font-bold text-yellow-700 uppercase">Observações</p>
                <p class="text-sm text-yellow-900 mt-1">{{ $entrega->observacoes }}</p>
            </div>
        @endif

        <div class="mt-5 rounded-lg border border-slate-200 p-4">
            <p class="text-xs font-bold text-slate-400 uppercase mb-2">Aceites necessários</p>
            <div class="grid gap-2 sm:grid-cols-2">
                <div class="rounded-lg {{ $entrega->motoqueiro_aceitou_em ? 'bg-green-50 text-green-800' : 'bg-slate-50 text-slate-600' }} p-3 text-sm font-semibold">
                    Motoqueiro: {{ $entrega->motoqueiro_aceitou_em ? 'aceitou' : 'pendente' }}
                </div>
                <div class="rounded-lg {{ $entrega->comercio_aceitou_em ? 'bg-green-50 text-green-800' : 'bg-slate-50 text-slate-600' }} p-3 text-sm font-semibold">
                    Comércio: {{ $entrega->comercio_aceitou_em ? 'aceitou' : 'pendente' }}
                </div>
            </div>
        </div>

        <div class="mt-6 flex flex-wrap gap-3">
            @if ((auth()->user()->isMotoqueiro() || auth()->user()->isAdmin()) && $entrega->status === 'disponivel')
                <form method="POST" action="{{ route('entregas.aceitar', $entrega) }}">
                    @csrf
                    <button class="rounded-lg bg-blue-900 px-5 py-3 text-sm font-bold text-white">Aceitar como motoqueiro</button>
                </form>
            @endif

            @if ((auth()->user()->isComercio() || auth()->user()->isAdmin()) && $entrega->status === 'aguardando_comercio')
                <form method="POST" action="{{ route('entregas.aceitar-comercio', $entrega) }}">
                    @csrf
                    <button class="rounded-lg bg-blue-900 px-5 py-3 text-sm font-bold text-white">Aceitar motoqueiro</button>
                </form>
            @endif

            @if ((auth()->user()->isAdmin() || $entrega->motoqueiro_id === auth()->id()) && in_array($entrega->status, ['aceita', 'em_andamento'], true))
                <form method="POST" action="{{ route('entregas.concluir', $entrega) }}">
                    @csrf
                    <button class="rounded-lg bg-green-700 px-5 py-3 text-sm font-bold text-white">Concluir corrida</button>
                </form>
            @endif

            @if ((auth()->user()->isComercio() || auth()->user()->isAdmin()) && !in_array($entrega->status, ['concluida', 'cancelada'], true))
                <form method="POST" action="{{ route('entregas.excluir-ou-cancelar', $entrega) }}">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-lg bg-red-700 px-5 py-3 text-sm font-bold text-white">
                        {{ $entrega->status === 'disponivel' && !$entrega->motoqueiro_id ? 'Excluir corrida' : 'Cancelar corrida' }}
                    </button>
                </form>
            @endif
        </div>
    </section>
</main>
@endsection
