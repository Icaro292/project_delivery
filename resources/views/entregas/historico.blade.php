<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "outline-variant": "#c5c5d3",
                        "on-tertiary": "#ffffff",
                        "on-primary-container": "#90a8ff",
                        "error-container": "#ffdad6",
                        "tertiary-fixed": "#ffdbcb",
                        "primary-fixed-dim": "#b6c4ff",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-container": "#e5eeff",
                        "outline": "#757682",
                        "surface-variant": "#d3e4fe",
                        "on-background": "#0b1c30",
                        "surface-container-high": "#dce9ff",
                        "on-primary-fixed": "#00164e",
                        "surface-container-low": "#eff4ff",
                        "on-secondary-container": "#007432",
                        "surface-container-highest": "#d3e4fe",
                        "on-primary": "#ffffff",
                        "on-primary-fixed-variant": "#264191",
                        "secondary-fixed-dim": "#4ae176",
                        "error": "#ba1a1a",
                        "secondary": "#006e2f",
                        "surface": "#f8f9ff",
                        "inverse-primary": "#b6c4ff",
                        "surface-dim": "#cbdbf5",
                        "primary": "#00236f",
                        "secondary-fixed": "#6bff8f",
                        "background": "#f8f9ff",
                        "surface-bright": "#f8f9ff",
                        "tertiary-container": "#6e2c00",
                        "on-error-container": "#93000a",
                        "on-secondary-fixed-variant": "#005321",
                        "tertiary": "#4b1c00",
                        "on-tertiary-fixed-variant": "#773205",
                        "secondary-container": "#6bff8f",
                        "surface-tint": "#4059aa",
                        "surface-container-lowest": "#ffffff",
                        "on-surface": "#0b1c30",
                        "on-error": "#ffffff",
                        "on-tertiary-container": "#f39461",
                        "primary-fixed": "#dce1ff",
                        "primary-container": "#1e3a8a",
                        "inverse-surface": "#213145",
                        "on-secondary-fixed": "#002109",
                        "on-tertiary-fixed": "#341100",
                        "tertiary-fixed-dim": "#ffb691",
                        "on-secondary": "#ffffff",
                        "on-surface-variant": "#444651"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "sm": "8px",
                        "xl": "32px",
                        "unit": "4px",
                        "md": "16px",
                        "gutter": "12px",
                        "xs": "4px",
                        "margin-mobile": "20px",
                        "lg": "24px"
                    },
                    "fontFamily": {
                        "h1": ["Inter"], "h3": ["Inter"], "body-lg": ["Inter"], "caption": ["Inter"], "body-md": ["Inter"], "h2": ["Inter"], "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "h1": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "h3": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "caption": ["12px", { "lineHeight": "16px", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "h2": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "label-md": ["14px", { "lineHeight": "20px", "fontWeight": "600" }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            background-color: #f8f9ff;
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="font-body-md text-on-surface">
    <!-- TopAppBar -->
    <header
        class="bg-slate-50 dark:bg-slate-950 docked full-width top-0 border-b border-slate-200 dark:border-slate-800 shadow-sm flex justify-between items-center w-full px-5 py-3 h-16 sticky z-40">
        <div class="flex items-center gap-3">
            <button class="active:scale-95 transition-transform duration-150 text-blue-900 dark:text-blue-400">
                <span class="material-symbols-outlined" data-icon="menu">menu</span>
            </button>
            <h1
                class="text-lg font-bold tracking-tighter text-blue-900 dark:text-blue-100 uppercase font-inter antialiased tracking-tight">
                Logística</h1>
        </div>
        <div class="h-8 w-8 rounded-full bg-surface-container-highest overflow-hidden border border-outline-variant">
            <img alt="Avatar" class="w-full h-full object-cover"
                data-alt="Professional headshot of a delivery driver with a friendly expression in clear daylight, studio lighting style"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9_pCiYcZIt8_MQ1z3HkTZC9IwS3nTzBOSOSNHtKw-hpk0tlA8s-faNE42a3ueKCcpOXbOGndNqJaDrGiKaCMF3470baFoOkqw6pq7xu8tsrDihfH9Q9R6vuABMEVFFjvWf-oqNUOTS4SglD6SVyuP0ZOob-BEMFS6WngCHovgpmRIx4F5MQUIE3QiIgRdKrOofIn1oqverchwADddumn6wpXdMsf8PRd7coC5QUZ7xjcL9CK7gI90zDXgLq1lDQnVIX8AydWZ1Bg" />
        </div>
    </header>
    <main class="max-w-md mx-auto px-margin-mobile py-lg pb-32">
        <!-- Header Section -->
        <div class="mb-xl">
            <h2 class="font-h2 text-h2 text-on-background">Histórico de entregas</h2>
            <p class="font-body-md text-on-surface-variant mt-xs">Resumo das suas atividades concluídas</p>
        </div>
        <!-- Stats Overview (Asymmetric Layout) -->
        <div class="grid grid-cols-2 gap-md mb-xl">
            <div
                class="bg-primary p-md rounded-xl shadow-sm col-span-2 flex justify-between items-center overflow-hidden relative">
                <div class="z-10">
                    <p class="text-on-primary/80 font-caption text-caption mb-xs">Ganhos Totais (Mês)</p>
                    <p class="text-on-primary font-h1 text-h1">R$ 4.850,20</p>
                </div>
                <span
                    class="material-symbols-outlined text-[80px] absolute -right-4 -bottom-4 opacity-10 text-on-primary"
                    data-icon="payments">payments</span>
            </div>
            <div class="bg-white p-md rounded-xl shadow-sm border border-surface-container-low">
                <p class="text-on-surface-variant font-caption text-caption mb-xs">Entregas</p>
                <p class="text-on-surface font-h3 text-h3">142</p>
            </div>
            <div class="bg-white p-md rounded-xl shadow-sm border border-surface-container-low">
                <p class="text-on-surface-variant font-caption text-caption mb-xs">Entregas da última semana</p>
                <p class="text-on-surface font-h3 text-h3">503</p>
            </div>
        </div>
        <!-- Filter/Search -->
        <div class="flex items-center gap-sm mb-lg">
            <div class="relative flex-1">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]"
                    data-icon="search">search</span>
                <input
                    class="w-full pl-10 pr-4 py-2 bg-white border border-outline-variant rounded-lg text-sm focus:ring-primary focus:border-primary"
                    placeholder="Buscar entrega..." type="text" />
            </div>
            <button class="p-2 bg-white border border-outline-variant rounded-lg text-on-surface-variant">
                <span class="material-symbols-outlined text-[20px]" data-icon="filter_list">filter_list</span>
            </button>
        </div>
        <!-- Delivery List -->
        <div class="space-y-md">
            <!-- Item 1 -->
            <div
                class="bg-white p-md rounded-xl shadow-sm border border-surface-container-low active:scale-[0.98] transition-all duration-200">
                <div class="flex justify-between items-start mb-sm">
                    <div>
                        <p class="font-label-md text-label-md text-on-surface">Pedido #88291</p>
                        <p class="font-caption text-caption text-on-surface-variant">Hoje, 14:20</p>
                    </div>
                    <div
                        class="flex items-center gap-1 bg-secondary-container/30 px-3 py-1 rounded-full text-on-secondary-container">
                        <span class="material-symbols-outlined text-[14px]" data-icon="check_circle" data-weight="fill"
                            style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span class="text-[11px] font-bold uppercase tracking-wider">Concluído</span>
                    </div>
                </div>
                <div class="flex items-center gap-md pt-sm border-t border-surface-container">
                    <div class="flex-1">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Destino</p>
                        <p class="text-sm text-on-surface truncate">Av. Paulista, 1578 - SP</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Valor</p>
                        <p class="font-label-md text-label-md text-secondary">R$ 42,90</p>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div
                class="bg-white p-md rounded-xl shadow-sm border border-surface-container-low active:scale-[0.98] transition-all duration-200">
                <div class="flex justify-between items-start mb-sm">
                    <div>
                        <p class="font-label-md text-label-md text-on-surface">Pedido #88285</p>
                        <p class="font-caption text-caption text-on-surface-variant">Hoje, 11:45</p>
                    </div>
                    <div
                        class="flex items-center gap-1 bg-secondary-container/30 px-3 py-1 rounded-full text-on-secondary-container">
                        <span class="material-symbols-outlined text-[14px]" data-icon="check_circle" data-weight="fill"
                            style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span class="text-[11px] font-bold uppercase tracking-wider">Concluído</span>
                    </div>
                </div>
                <div class="flex items-center gap-md pt-sm border-t border-surface-container">
                    <div class="flex-1">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Destino</p>
                        <p class="text-sm text-on-surface truncate">Rua Oscar Freire, 92 - SP</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Valor</p>
                        <p class="font-label-md text-label-md text-secondary">R$ 28,50</p>
                    </div>
                </div>
            </div>
            <!-- Date Divider -->
            <div class="py-sm">
                <span class="text-[11px] font-bold text-outline uppercase tracking-[0.1em]">Ontem, 24 de Outubro</span>
            </div>
            <!-- Item 3 -->
            <div
                class="bg-white p-md rounded-xl shadow-sm border border-surface-container-low active:scale-[0.98] transition-all duration-200">
                <div class="flex justify-between items-start mb-sm">
                    <div>
                        <p class="font-label-md text-label-md text-on-surface">Pedido #88142</p>
                        <p class="font-caption text-caption text-on-surface-variant">Ontem, 18:10</p>
                    </div>
                    <div
                        class="flex items-center gap-1 bg-secondary-container/30 px-3 py-1 rounded-full text-on-secondary-container">
                        <span class="material-symbols-outlined text-[14px]" data-icon="check_circle" data-weight="fill"
                            style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span class="text-[11px] font-bold uppercase tracking-wider">Concluído</span>
                    </div>
                </div>
                <div class="flex items-center gap-md pt-sm border-t border-surface-container">
                    <div class="flex-1">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Destino</p>
                        <p class="text-sm text-on-surface truncate">Alameda Santos, 455 - SP</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Valor</p>
                        <p class="font-label-md text-label-md text-secondary">R$ 55,00</p>
                    </div>
                </div>
            </div>
            <!-- Item 4 -->
            <div
                class="bg-white p-md rounded-xl shadow-sm border border-surface-container-low active:scale-[0.98] transition-all duration-200">
                <div class="flex justify-between items-start mb-sm">
                    <div>
                        <p class="font-label-md text-label-md text-on-surface">Pedido #88130</p>
                        <p class="font-caption text-caption text-on-surface-variant">Ontem, 16:30</p>
                    </div>
                    <div
                        class="flex items-center gap-1 bg-secondary-container/30 px-3 py-1 rounded-full text-on-secondary-container">
                        <span class="material-symbols-outlined text-[14px]" data-icon="check_circle" data-weight="fill"
                            style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span class="text-[11px] font-bold uppercase tracking-wider">Concluído</span>
                    </div>
                </div>
                <div class="flex items-center gap-md pt-sm border-t border-surface-container">
                    <div class="flex-1">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Destino</p>
                        <p class="text-sm text-on-surface truncate">Vila Madalena, 203 - SP</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-outline uppercase tracking-tight">Valor</p>
                        <p class="font-label-md text-label-md text-secondary">R$ 31,20</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('home.footerjs')
</body>
</html>