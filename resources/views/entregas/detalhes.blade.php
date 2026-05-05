<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0, viewport-fit=cover" name="viewport" />
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
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="bg-background text-on-surface min-h-screen pb-24">
    <!-- TopAppBar -->
    <header
        class="bg-slate-50 dark:bg-slate-950 flex justify-between items-center w-full px-5 py-3 h-16 fixed top-0 z-50 shadow-sm border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <button onclick="window.location.href='home.home'" class="active:scale-95 transition-transform duration-150 text-blue-900 dark:text-blue-400">
                <span class="material-symbols-outlined" data-icon="arrow_back">arrow_back</span>
            </button>
            <h1
                class="font-inter antialiased text-sm font-semibold tracking-tight text-blue-900 dark:text-blue-400 uppercase">
                Detalhes da Entrega</h1>
        </div>
        <div
            class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center overflow-hidden border border-outline-variant">
            <img alt="Foto de perfil do motorista" class="w-full h-full object-cover"
                data-alt="Close-up portrait of a professional driver smiling, wearing a clean uniform, soft daylight background"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA93yp_NlQTqP3lm6tCRLyq2K8mFuiGR8OMEPO-g_vsQyw-_h0MmvQ-XjhTb7gO7Wk5gKTsANGMu9XMK4MmGYygIG4lbgOaqlByClYCHKH6Qqaeh7FMqqDlUjeFeRmrDM7an62Hrzn9nsHc-G-BaoAAY50QrFogxpE0gS-JU5hiF-2ul4aquDgc5g_alB2C2KYyI93hxL82Pz2xztjATJHvDHVbx96UQCYdXT16Xxzr1qCSVxxntce0-UYXmcqJ_aodkoq39Fv2E6f" />
        </div>
    </header>
    <main class="pt-20 px-margin-mobile max-w-md mx-auto">
        <!-- Company & Price Header -->
        <section class="bg-surface-container-lowest rounded-xl p-md shadow-sm mb-md border border-surface-container">
            <div class="flex justify-between items-start mb-sm">
                <div>
                    <p class="text-caption text-on-surface-variant uppercase tracking-wider mb-1">Empresa</p>
                    <h2 class="font-h2 text-h2 text-primary">TechLog Soluções LTDA</h2>
                </div>
                <div class="text-right">
                    <p class="text-caption text-on-surface-variant uppercase tracking-wider mb-1">Valor</p>
                    <p class="font-h2 text-h2 text-secondary">R$ 28,50</p>
                </div>
            </div>
            <div class="flex gap-2">
                <span
                    class="bg-surface-variant text-on-surface-variant text-[10px] font-bold px-2 py-0.5 rounded uppercase">Frágil</span>
            </div>
        </section>
        <!-- Address Journey (Bento Style) -->
        <section class="grid grid-cols-1 gap-md mb-md">
            <div class="bg-white rounded-xl p-md border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
                <div class="flex items-start gap-md">
                    <div class="flex flex-col items-center gap-1">
                        <span class="material-symbols-outlined text-primary" data-icon="location_on">location_on</span>
                        <div class="w-0.5 h-12 border-l-2 border-dashed border-slate-200"></div>
                        <span class="material-symbols-outlined text-secondary"
                            data-icon="local_shipping">local_shipping</span>
                    </div>
                    <div class="flex flex-col gap-xl">
                        <!-- Retirada -->
                        <div>
                            <p class="text-caption font-bold text-primary uppercase mb-1">Retirada</p>
                            <p class="font-label-md text-on-surface">Av. Paulista, 1000 - Bela Vista</p>
                            <p class="text-caption text-on-surface-variant">São Paulo - SP, 01310-100</p>
                        </div>
                        <!-- Entrega -->
                        <div>
                            <p class="text-caption font-bold text-secondary uppercase mb-1">Entrega</p>
                            <p class="font-label-md text-on-surface">Rua Oscar Freire, 450 - Jardins</p>
                            <p class="text-caption text-on-surface-variant">São Paulo - SP, 01426-001</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Observations -->
        <section class="bg-tertiary-fixed rounded-xl p-md border border-tertiary-fixed-dim/20 mb-xl">
            <div class="flex items-center gap-2 mb-2">
                <span class="material-symbols-outlined text-tertiary" data-icon="notes">notes</span>
                <p class="text-label-md text-tertiary uppercase tracking-tight">Observações</p>
            </div>
            <p class="font-body-md text-on-tertiary-fixed italic leading-relaxed">
                "Levar troco para R$ 100,00. O cliente solicitou entrega no 4º andar, interfone 42."
            </p>
        </section>
        <!-- Action Button -->
        <div
            class="fixed bottom-0 left-0 w-full p-margin-mobile bg-white/80 backdrop-blur-lg border-t border-slate-100 z-40">
            <button
                class="w-full h-14 bg-primary text-white rounded-xl font-bold text-body-lg flex items-center justify-center gap-3 shadow-lg active:scale-[0.98] transition-all">
                <span class="material-symbols-outlined" data-icon="check_circle" data-weight="fill"
                    style="font-variation-settings: 'FILL' 1;">check_circle</span>
                ACEITAR ENTREGA
            </button>
        </div>
    </main>
</body>

</html>