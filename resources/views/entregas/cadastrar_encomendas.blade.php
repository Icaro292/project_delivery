@extends('layouts.app')

@section('content')
<main class="pt-20 max-w-xl mx-auto px-5">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Nova corrida</h2>
        <p class="text-sm text-slate-500">Preencha origem, destino e valor para publicar a corrida.</p>
    </div>

    <form method="POST" action="{{ route('entregas.store') }}" class="bg-white border border-slate-200 rounded-lg shadow-sm p-5 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1">Local de retirada</label>
            <input name="origem" value="{{ old('origem') }}" required maxlength="50" class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800" placeholder="Endereço de retirada">
            @error('origem') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1">Local de entrega</label>
            <input name="destino" value="{{ old('destino') }}" required maxlength="50" class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800" placeholder="Endereço de destino">
            @error('destino') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1">Valor</label>
            <input name="valor" value="{{ old('valor') }}" type="number" step="0.01" min="0" class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800" placeholder="0,00">
            @error('valor') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1">Observações</label>
            <textarea name="observacoes" rows="4" class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800" placeholder="Instruções para o motoqueiro">{{ old('observacoes') }}</textarea>
            @error('observacoes') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <button class="w-full h-12 rounded-lg bg-blue-900 text-white font-bold">Publicar corrida</button>
    </form>
</main>
@endsection
