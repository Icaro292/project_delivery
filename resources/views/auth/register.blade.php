@extends('layouts.app')

@section('content')
<main class="min-h-screen flex items-center justify-center px-5 py-10">
    <section class="w-full max-w-md bg-white border border-slate-200 rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-bold text-blue-900">Cadastro</h1>
        <p class="text-sm text-slate-500 mt-1">Escolha seu tipo de acesso para usar as funções corretas.</p>

        <form method="POST" action="{{ route('register.store') }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nome</label>
                <input name="name" value="{{ old('name') }}" required class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">E-mail</label>
                <input name="email" value="{{ old('email') }}" type="email" required class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nível de acesso</label>
                <select name="nivel_acesso" required class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800">
                    <option value="motoqueiro" @selected(old('nivel_acesso') === 'motoqueiro')>Motoqueiro</option>
                    <option value="comercio" @selected(old('nivel_acesso') === 'comercio')>Comércio</option>
                </select>
                @error('nivel_acesso') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Senha</label>
                <input name="password" type="password" required class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800">
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Confirmar senha</label>
                <input name="password_confirmation" type="password" required class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800">
            </div>

            <button class="w-full h-12 rounded-lg bg-blue-900 text-white font-bold">Criar conta</button>
        </form>

        <p class="text-sm text-slate-600 mt-5 text-center">
            Já tem conta?
            <a href="{{ route('login') }}" class="font-bold text-blue-900">Entrar</a>
        </p>
    </section>
</main>
@endsection
