<header class="bg-slate-50 shadow-sm border-b border-slate-200 fixed top-0 left-0 w-full z-50">
    <div class="flex justify-between items-center w-full px-5 py-3 h-16">
        <div class="flex items-center gap-3">
            <button class="active:scale-95 transition-transform duration-150">
                <span class="material-symbols-outlined text-blue-900">menu</span>
            </button>

            <h1 class="text-lg font-bold tracking-tight text-blue-900 uppercase">
                Logística PGM
            </h1>
        </div>

        <div class="flex items-center gap-3">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-500 capitalize">{{ auth()->user()->nivel_acesso }}</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded-lg border border-slate-300 px-3 py-2 text-xs font-bold text-slate-700">Sair</button>
            </form>
        </div>
    </div>
</header>
