
<main class="pt-16">

    <div class="relative h-48 w-full overflow-hidden bg-slate-200">
        <div class="absolute inset-0 bg-map-overlay z-10"></div>

        <img 
            src="{{ asset('images/mapa.jpg') }}" 
            alt="Mapa"
            class="w-full h-full object-cover"
            onerror="this.src='https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1200&q=80'">
    </div>

    <div class="px-5 -mt-6 relative z-20 space-y-4">
        <div class="flex items-center justify-between mt-4">
            <h2 class="text-2xl font-bold text-slate-900">
                Entregas Disponíveis
            </h2>

            <span class="text-xs font-medium text-slate-500">
                3 encontrados
            </span>
        </div>
    </div>
</main>