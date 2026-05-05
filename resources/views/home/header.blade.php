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

        <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-blue-900 shadow-sm">
            <img 
                src="{{ asset('images/motorista.jpg') }}" 
                alt="Foto do motorista"
                class="w-full h-full object-cover"
                onerror="this.src='https://ui-avatars.com/api/?name=Motorista&background=1e3a8a&color=fff'"
            >
        </div>
    </div>
</header>