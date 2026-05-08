<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Logística')</title>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

<script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                fontFamily: {
                    inter: ["Inter", "sans-serif"],
                }
            }
        }
    }
</script>

<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    .bg-map-overlay {
        background: linear-gradient(
            180deg,
            rgba(248, 249, 255, 0.9) 0%,
            rgba(248, 249, 255, 0) 40%,
            rgba(248, 249, 255, 0) 60%,
            rgba(248, 249, 255, 0.95) 90%
        );
    }
</style>
