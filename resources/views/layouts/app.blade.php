<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('home.head')
</head>
<body class="bg-slate-50 text-slate-900 antialiased min-h-screen pb-24">
    @auth
        @include('home.header')
    @endauth

    @if (session('success'))
        <div class="max-w-3xl mx-auto px-5 pt-20">
            <div class="rounded-lg bg-green-100 text-green-800 px-4 py-3 text-sm font-semibold">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @yield('content')

    @auth
        @include('home.footerjs')
    @endauth
</body>
</html>
