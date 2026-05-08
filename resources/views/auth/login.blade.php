@extends('layouts.app')

@section('content')
<main class="min-h-screen flex items-center justify-center px-5 py-10">
    <section class="w-full max-w-md bg-white border border-slate-200 rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-bold text-blue-900">Entrar</h1>
        <p class="text-sm text-slate-500 mt-1">Acesse sua conta para gerenciar corridas.</p>

        <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">E-mail</label>
                <input name="email" value="{{ old('email') }}" type="email" required class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Senha</label>
                <input name="password" type="password" required class="w-full rounded-lg border-slate-300 focus:border-blue-800 focus:ring-blue-800">
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input name="remember" type="checkbox" class="rounded border-slate-300 text-blue-900 focus:ring-blue-800">
                Lembrar acesso
            </label>

            <button class="w-full h-12 rounded-lg bg-blue-900 text-white font-bold">Entrar</button>
        </form>

        <p class="text-sm text-slate-600 mt-5 text-center">
            Não tem conta?
            <a href="{{ route('register') }}" class="font-bold text-blue-900">Criar cadastro</a>
        </p>
    </section>
</main>
@endsection
