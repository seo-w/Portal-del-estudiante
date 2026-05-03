<!doctype html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portal del Estudiante - Iniciar Sesion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700;800&family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        background: "#fcf8ff",
                        "primary-container": "#4f46e5",
                        tertiary: "#7e3000",
                        "text-primary": "#0F172A",
                        "surface-container-low": "#f5f2ff",
                        "surface-bright": "#fcf8ff",
                        "on-error": "#ffffff",
                        "on-primary": "#ffffff",
                        "accent-success": "#10B981",
                        secondary: "#006591",
                        "surface-tint": "#4d44e3",
                        "inverse-on-surface": "#f3effc",
                        "on-surface-variant": "#464555",
                        "bg-page": "#FFFFFF",
                        border: "#E2E8F0",
                        "border-subtle": "#F1F5F9",
                        "text-muted": "#94A3B8",
                        "text-secondary": "#475569",
                        "primary-fixed-dim": "#c3c0ff",
                        "surface-container-lowest": "#ffffff",
                        primary: "#3525cd"
                    },
                    fontFamily: {
                        "h3-card": ["Plus Jakarta Sans"],
                        "data-mono": ["Space Grotesk"],
                        "h2-section": ["Plus Jakarta Sans"],
                        "h1-page": ["Plus Jakarta Sans"],
                        "body-lead": ["Manrope"],
                        "body-base": ["Manrope"],
                        "ui-label": ["Manrope"]
                    },
                    fontSize: {
                        "xs": ["16px", { lineHeight: "1.5" }],
                        "sm": ["16px", { lineHeight: "1.5" }],
                        "base": ["16px", { lineHeight: "1.6" }],
                        "h3-card": ["20px", { lineHeight: "1.4", letterSpacing: "-0.01em", fontWeight: "600" }],
                        "data-mono": ["16px", { letterSpacing: "0.01em", fontWeight: "500" }],
                        "h2-section": ["32px", { lineHeight: "1.3", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "h1-page": ["42px", { lineHeight: "1.2", letterSpacing: "-0.03em", fontWeight: "800" }],
                        "body-lead": ["18px", { lineHeight: "1.7", fontWeight: "400" }],
                        "h1-hero": ["60px", { lineHeight: "1.2", letterSpacing: "-0.04em", fontWeight: "800" }],
                        "body-base": ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                        "ui-label": ["16px", { lineHeight: "1.4", letterSpacing: "0.06em", fontWeight: "600" }]
                    }
                }
            }
        };
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }
        .float-input:focus ~ .float-label,
        .float-input:not(:placeholder-shown) ~ .float-label {
            transform: translateY(-0.75rem) scale(0.75);
            top: 0.875rem;
            color: #4f46e5;
        }
        [x-cloak] { display: none !important; }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-bg-page text-text-primary font-body-base text-body-base antialiased selection:bg-primary-container selection:text-white" x-data="{ showPass: false }">
<?php
$authorName = 'Carlos M.';
$authorRole = 'Escalo a 10k USD/mes';
$authorQuote = 'La estructura y las herramientas de analisis cambiaron mis decisiones por completo.';

if (is_array($testimonial)) {
    $authorName = trim((string) ($testimonial['author_name'] ?? $authorName));
    $authorRole = trim((string) ($testimonial['author_role'] ?? $authorRole));
    $authorQuote = trim((string) ($testimonial['quote'] ?? $authorQuote));
}
?>
<main class="min-h-screen w-full flex flex-col lg:flex-row">
    <section class="hidden lg:flex w-1/2 relative flex-col items-center justify-between p-12 overflow-hidden bg-primary">
        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOzIgsy-dVZ88kv6m6uCMgQ7VxSyyqJWgYv6uLdG3awbAVAVt2_o8Q5IE2GIrv89GBxYBJVbLAGIeflhMKskWuWYtPAlnaGJKugaybNpEikrCXBsq0qg0au98FkcODn2zpVzizkWi13k1tl6d2DcT9FH6t4WLNHFl4LiCrcB--doypYdhIUX_FbtzrpQAOwLtJWP1O9GYi40TENYugzuGQM6hXihDuJHqJ-BWyyp1LEWCNS8_tKz_aOyGNifLQDMc00ieLHjNM93ky" 
             alt="Ambiente Académico" 
             class="absolute inset-0 z-0 w-full h-full object-cover mix-blend-screen opacity-90"
             loading="lazy">
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-primary/40 to-primary/80 backdrop-blur-[2px]"></div>
        <div class="absolute inset-0 z-0 bg-[radial-gradient(circle_at_20%_15%,rgba(255,255,255,0.22),transparent_45%),radial-gradient(circle_at_80%_80%,rgba(14,165,233,0.25),transparent_50%)]"></div>

        <div class="w-full z-10 flex justify-start"></div>

        <div class="z-10 flex flex-col items-center justify-center transform -translate-y-8">
            <div class="w-20 h-20 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center shadow-[0_8px_32px_rgba(0,0,0,0.12)] border border-white/20 mb-6">
                <span class="material-symbols-outlined text-white text-5xl" style="font-variation-settings: 'FILL' 1;">
                    school
                </span>
            </div>
            <h1 class="font-h1-page text-h1-page text-white text-center tracking-tight">
                Portal del Estudiante
            </h1>
            <p class="font-body-lead text-body-lead text-primary-fixed-dim mt-4 text-center max-w-sm">
                La academia de alto rendimiento para tu futuro digital.
            </p>
        </div>

        <div class="z-10 w-full max-w-md bg-white/10 backdrop-blur-md border border-white/10 p-6 rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.1)]">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-white/15 border-2 border-white/25 flex items-center justify-center overflow-hidden">
                    <span class="material-symbols-outlined text-white">person</span>
                </div>
                <div>
                    <p class="font-ui-label text-ui-label text-white m-0 leading-none"><?= htmlspecialchars($authorName) ?></p>
                    <p class="font-data-mono text-data-mono text-primary-fixed-dim text-sm m-0 mt-1"><?= htmlspecialchars($authorRole) ?></p>
                </div>
            </div>
            <p class="font-body-base text-body-base text-white/90 italic m-0">
                "<?= htmlspecialchars($authorQuote) ?>"
            </p>
        </div>
    </section>

    <section class="w-full lg:w-1/2 min-h-screen flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-bg-page relative z-10">
        <div class="w-full max-w-md space-y-10">
            <div class="flex lg:hidden items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-xl" style="font-variation-settings: 'FILL' 1;">
                        school
                    </span>
                </div>
                <span class="font-h3-card text-h3-card text-text-primary">Portal del Estudiante</span>
            </div>

            <div class="space-y-2 text-center lg:text-left">
                <h2 class="font-h2-section text-h2-section text-text-primary">Bienvenido de vuelta</h2>
                <p class="font-body-base text-body-base text-text-secondary">Ingresa tus credenciales para acceder al portal.</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="rounded-xl border border-red-200 bg-red-50 text-red-700 px-4 py-4 text-sm flex items-center gap-3 shadow-sm">
                    <span class="material-symbols-outlined text-red-500">error</span>
                    <?= htmlspecialchars((string) $error) ?>
                </div>
            <?php endif; ?>

            <form action="/?action=login" class="space-y-6" method="POST">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                
                <!-- Honeypot -->
                <div class="hidden">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="relative group">
                    <input class="float-input block rounded-xl px-4 pb-3 pt-6 w-full font-body-base text-body-base text-text-primary bg-surface-container-lowest border border-border appearance-none focus:outline-none focus:ring-0 focus:border-primary-container focus:shadow-[0_0_0_3px_rgba(79,70,229,0.12)] transition-all bg-transparent z-10 relative peer" id="email" name="email" placeholder=" " required type="email" aria-label="Correo Electrónico">
                    <label class="float-label absolute font-ui-label text-ui-label text-text-muted duration-300 transform top-4 z-0 origin-[0] start-4 peer-focus:text-primary-container pointer-events-none" for="email">
                        Correo Electrónico
                    </label>
                </div>

                <div class="relative group">
                    <input class="float-input block rounded-xl px-4 pb-3 pt-6 w-full font-body-base text-body-base text-text-primary bg-surface-container-lowest border border-border appearance-none focus:outline-none focus:ring-0 focus:border-primary-container focus:shadow-[0_0_0_3px_rgba(79,70,229,0.12)] transition-all bg-transparent z-10 relative peer pr-12" id="password" name="password" placeholder=" " required :type="showPass ? 'text' : 'password'" aria-label="Contraseña">
                    <label class="float-label absolute font-ui-label text-ui-label text-text-muted duration-300 transform top-4 z-0 origin-[0] start-4 peer-focus:text-primary-container pointer-events-none" for="password">
                        Contraseña
                    </label>
                    <button type="button" @click="showPass = !showPass" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 text-text-muted hover:text-primary transition-colors focus:outline-none">
                        <span class="material-symbols-outlined text-xl" x-text="showPass ? 'visibility_off' : 'visibility'"></span>
                    </button>
                </div>

                <div class="flex items-center justify-end w-full">
                    <a class="font-ui-label text-sm text-primary-container hover:text-primary transition-colors font-bold" href="#">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <button class="w-full flex justify-center py-4 px-7 rounded-xl text-white font-ui-label font-bold shadow-lg shadow-primary/20 hover:opacity-90 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200" style="background: linear-gradient(135deg, #3525cd, #4f46e5, #6366f1);" type="submit">
                    Ingresar al Portal
                </button>
            </form>

            <div class="rounded-2xl border border-border bg-slate-50 p-6 shadow-sm border-dashed">
                <div class="flex items-center gap-3 mb-3 text-slate-600">
                    <span class="material-symbols-outlined text-xl">key</span>
                    <p class="font-bold text-sm m-0 uppercase tracking-widest">Credenciales de prueba</p>
                </div>
                <div class="space-y-2 text-sm text-text-secondary">
                    <div class="flex justify-between items-center p-2 rounded-lg bg-white border border-border">
                        <span class="font-medium">Admin:</span>
                        <code class="text-primary font-bold">admin@demo.local / admin123</code>
                    </div>
                    <div class="flex justify-between items-center p-2 rounded-lg bg-white border border-border">
                        <span class="font-medium">Estudiante:</span>
                        <code class="text-primary font-bold">estudiante@demo.local / estudiante123</code>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
