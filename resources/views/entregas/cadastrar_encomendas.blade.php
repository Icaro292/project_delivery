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
                        "h1": ["Inter"],
                        "h3": ["Inter"],
                        "body-lg": ["Inter"],
                        "caption": ["Inter"],
                        "body-md": ["Inter"],
                        "h2": ["Inter"],
                        "label-md": ["Inter"]
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
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
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

<body class="bg-background text-on-surface font-body-md min-h-screen pb-24">
    <!-- TopAppBar -->
    <header
        class="bg-slate-50 dark:bg-slate-950 flex justify-between items-center w-full px-5 py-3 h-16 docked full-width top-0 border-b border-slate-200 dark:border-slate-800 shadow-sm z-40 sticky">
        <div class="flex items-center gap-3">
            <button class="active:scale-95 transition-transform duration-150 text-slate-500 dark:text-slate-400">
                <span class="material-symbols-outlined" data-icon="menu">menu</span>
            </button>
            <h1
                class="text-lg font-bold tracking-tighter text-blue-900 dark:text-blue-100 uppercase font-inter antialiased">
                Logística</h1>
        </div>
        <div class="h-10 w-10 rounded-full bg-surface-container-high border-2 border-primary-container overflow-hidden">
            <img alt="Foto de perfil do motorista"
                data-alt="Close-up portrait of a professional male manager in a clean corporate environment with soft office lighting"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMgJE4-LqHItPqTGD4cku7i-6ztDrg9Ef9ojjn3SOnjICffmbjFU9TOELso8LQeMsKTg1bd4yb5q5OYHank02ArNXjNShKL33i_ngQtu_1-iPS8SjFSqSJ6DYAcBJrNGN76hEhcij5vtyJK5G819CvV7Fm-TS0ph6pZtvLopz8picHS8y-JlgB3mjpezUkYx5-uXlfOPXlQ2Gr_9VvcLWjpq8xie3CT5iEtb2LYhXhOxpFmIPQLj2VI4sABtEhGO7YYI4Z6Goh_os" />
        </div>
    </header>
    <main class="max-w-xl mx-auto px-margin-mobile pt-lg">
        <div class="mb-xl">
            <h2 class="font-h2 text-h2 text-on-surface mb-xs">Nova Entrega</h2>
            <p class="font-body-md text-on-surface-variant">Preencha os detalhes para publicar uma nova solicitação de
                transporte.</p>
        </div>
        <section class="space-y-lg">
            <!-- Form -->
            <form class="space-y-md">
                <!-- Retirada -->
                <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm border border-outline-variant/20">
                    <label
                        class="block font-label-md text-label-md text-on-surface-variant mb-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-[20px]"
                            data-icon="location_on">location_on</span>
                        Local de Retirada
                    </label>
                    <input
                        class="w-full bg-surface-container-low border-none rounded-lg p-md text-body-md focus:ring-2 focus:ring-primary transition-all placeholder:text-outline"
                        placeholder="Endereço, número, bairro..." type="text" />
                </div>
                <!-- Entrega -->
                <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm border border-outline-variant/20">
                    <label
                        class="block font-label-md text-label-md text-on-surface-variant mb-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary text-[20px]" data-icon="flag">flag</span>
                        Local de Entrega
                    </label>
                    <input
                        class="w-full bg-surface-container-low border-none rounded-lg p-md text-body-md focus:ring-2 focus:ring-primary transition-all placeholder:text-outline"
                        placeholder="Endereço de destino..." type="text" />
                </div>
                <div class="grid grid-cols-2 gap-md">
                    <!-- Valor -->
                    <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm border border-outline-variant/20">
                        <label
                            class="block font-label-md text-label-md text-on-surface-variant mb-sm flex items-center gap-2">
                            <span class="material-symbols-outlined text-on-secondary-container text-[20px]"
                                data-icon="payments">payments</span>
                            Valor
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant font-medium">R$</span>
                            <input
                                class="w-full bg-surface-container-low border-none rounded-lg p-md pl-10 text-body-md focus:ring-2 focus:ring-primary transition-all placeholder:text-outline"
                                placeholder="0,00" type="number" />
                        </div>
                    </div>
                    <!-- Prazo/Estimativa Decorativa -->
                    <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm border border-outline-variant/20">
                        <label
                            class="block font-label-md text-label-md text-on-surface-variant mb-sm flex items-center gap-2">
                            <span class="material-symbols-outlined text-tertiary text-[20px]"
                                data-icon="orders">orders</span>
                            Encomenda
                        </label>
                        <select
                            class="w-full bg-surface-container-low border-none rounded-lg p-md text-body-md focus:ring-2 focus:ring-primary transition-all appearance-none">
                            <option>Normal</option>
                            <option>Frágio</option>
                        </select>
                    </div>
                </div>
                <!-- Observações -->
                <div class="bg-surface-container-lowest p-md rounded-xl shadow-sm border border-outline-variant/20">
                    <label
                        class="block font-label-md text-label-md text-on-surface-variant mb-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-outline text-[20px]" data-icon="notes">notes</span>
                        Observações
                    </label>
                    <textarea
                        class="w-full bg-surface-container-low border-none rounded-lg p-md text-body-md focus:ring-2 focus:ring-primary transition-all placeholder:text-outline resize-none"
                        placeholder="Instruções para o entregador, fragilidade, etc." rows="3"></textarea>
                </div>
                <!-- Call to Action -->
                <div class="pt-md">
                    <button
                        class="w-full bg-primary text-on-primary h-[56px] rounded-2xl font-h3 text-h3 flex items-center justify-center gap-2 shadow-lg hover:bg-primary-container active:scale-95 transition-all duration-200"
                        type="submit">
                        <span class="material-symbols-outlined" data-icon="rocket_launch">rocket_launch</span>
                        PUBLICAR ENTREGA
                    </button>
                    <p class="text-center font-caption text-caption text-outline mt-md">Ao publicar, a entrega ficará
                        visível para motoristas próximos.</p>
                </div>
            </form>
        </section>
    </main>
      @include('home.footerjs')
</body>

</html>