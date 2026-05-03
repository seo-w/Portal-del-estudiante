<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portal del Estudiante - Dashboard</title>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Space+Grotesk:wght@500&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#fcf8ff",
                        "primary-container": "#4f46e5",
                        "tertiary": "#7e3000",
                        "text-primary": "#0F172A",
                        "surface-container-low": "#f5f2ff",
                        "surface-bright": "#fcf8ff",
                        "on-error": "#ffffff",
                        "on-primary": "#ffffff",
                        "accent-success": "#10B981",
                        "secondary": "#006591",
                        "surface-tint": "#4d44e3",
                        "inverse-on-surface": "#f3effc",
                        "on-surface-variant": "#464555",
                        "surface-container-highest": "#e4e1ee",
                        "primary": "#3525cd"
                    },
                    backgroundImage: {
                        "gradient-cta": "linear-gradient(135deg, #5B21B6, #4F46E5, #0EA5E9)",
                        "gradient-text": "linear-gradient(135deg, #5B21B6 0%, #4F46E5 50%, #0EA5E9 100%)",
                    },
                    borderRadius: {
                        "text-muted": "#94A3B8",
                        "on-error-container": "#93000a",
                        "accent-warning": "#F59E0B",
                        "on-secondary-container": "#004666",
                        "on-primary-fixed-variant": "#3323cc",
                        "text-secondary": "#475569",
                        "surface-variant": "#e4e1ee",
                        "primary-fixed-dim": "#c3c0ff",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed-dim": "#89ceff",
                        "secondary-container": "#39b8fd",
                        "surface-container-high": "#eae6f4",
                        "primary-fixed": "#e2dfff",
                        "surface-dim": "#dcd8e5",
                        "on-surface": "#1b1b24",
                        "on-primary-fixed": "#0f0069",
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                        "on-primary-container": "#dad7ff",
                        "surface-container": "#f0ecf9",
                        "inverse-primary": "#c3c0ff",
                        "outline-variant": "#c7c4d8",
                        "outline": "#777587",
                        "secondary-fixed": "#c9e6ff",
                        "on-secondary-fixed-variant": "#004c6e",
                        "surface": "#fcf8ff",
                        "accent-danger": "#EF4444",
                        "on-secondary-fixed": "#001e2f",
                        "on-background": "#1b1b24",
                        "on-tertiary": "#ffffff",
                        "bg-subtle": "#F1F3F7",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "tertiary-fixed-dim": "#ffb695",
                        "tertiary-container": "#a44100",
                        "accent-violet": "#7C3AED",
                        "bg-surface": "#F8F9FB",
                        "inverse-surface": "#302f39",
                        "on-tertiary-fixed": "#351000",
                        "on-tertiary-container": "#ffd2be",
                        "surface-container-highest": "#e4e1ee",
                        "primary": "#3525cd"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "header-height": "64px",
                        "sidebar-width": "260px",
                        "grid-gap-lg": "24px",
                        "gutter-mobile": "16px",
                        "gutter-desktop": "24px",
                        "container-max": "1440px",
                        "grid-gap-md": "20px"
                    },
                    fontFamily: {
                        "h3-card": ["Plus Jakarta Sans"],
                        "data-mono": ["Space Grotesk"],
                        "h2-section": ["Plus Jakarta Sans"],
                        "h1-page": ["Plus Jakarta Sans"],
                        "body-lead": ["Manrope"],
                        "h1-hero": ["Plus Jakarta Sans"],
                        "body-base": ["Manrope"],
                        "ui-label": ["Manrope"]
                    },
                    fontSize: {
                        "h3-card": ["20px", { lineHeight: "1.4", letterSpacing: "-0.01em", fontWeight: "600" }],
                        "data-mono": ["14px", { letterSpacing: "0.01em", fontWeight: "500" }],
                        "h2-section": ["32px", { lineHeight: "1.3", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "h1-page": ["42px", { lineHeight: "1.2", letterSpacing: "-0.03em", fontWeight: "800" }],
                        "body-lead": ["18px", { lineHeight: "1.7", fontWeight: "400" }],
                        "h1-hero": ["60px", { lineHeight: "1.2", letterSpacing: "-0.04em", fontWeight: "800" }],
                        "body-base": ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                        "ui-label": ["13px", { lineHeight: "1", letterSpacing: "0.06em", fontWeight: "500" }]
                    }
                }
            }
        };
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }

        .material-symbols-outlined.fill {
            font-variation-settings: "FILL" 1, "wght" 400, "GRAD" 0, "opsz" 24;
        }
        @keyframes jump {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }
        .dot-jump { animation: jump 0.6s infinite; }
    </style>
</head>

<body class="bg-bg-page text-text-primary antialiased font-body-base text-body-base min-h-screen flex"
    x-data="calculator()">
    <?php
    $studyCount = count($studies);
    $lastStudy = $studyCount > 0 ? $studies[0] : null;
    $avgMargin = 0.0;
    if ($studyCount > 0) {
        $sumMargin = 0.0;
        foreach ($studies as $row) {
            $sumMargin += (float) ($row['net_margin'] ?? 0);
        }
        $avgMargin = ($sumMargin / $studyCount) * 100;
    }
    ?>
    <!-- Header para Mobile -->
    <header
        class="fixed top-0 left-0 w-full bg-white border-b border-border z-[60] flex items-center justify-between px-4 h-[64px] md:hidden shadow-sm">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-primary-container flex items-center justify-center text-white">
                <span class="material-symbols-outlined text-sm">school</span>
            </div>
            <span class="font-h3-card text-sm">Portal Estudiante</span>
        </div>
        <button @click="isMobileMenuOpen = !isMobileMenuOpen"
            class="w-10 h-10 flex items-center justify-center text-text-primary hover:bg-bg-surface rounded-xl transition-all">
            <span class="material-symbols-outlined" x-text="isMobileMenuOpen ? 'close' : 'menu'"></span>
        </button>
    </header>

    <!-- Overlay Backdrop for Mobile Sidebar -->
    <div x-show="isMobileMenuOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="isMobileMenuOpen = false"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[70] md:hidden"></div>

    <nav class="fixed top-0 left-0 h-screen w-[260px] bg-white border-r border-border flex flex-col z-[80] transition-transform duration-300 md:translate-x-0 pt-10"
        :class="isMobileMenuOpen ? 'translate-x-0 shadow-2xl' : '-translate-x-full md:translate-x-0'">
        <!-- Header -->
        <div class="px-6 mb-8 flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-white mb-4">
                <span class="material-symbols-outlined">rocket_launch</span>
            </div>
            <div>
                <h2 class="text-lg font-h2-section text-text-primary leading-tight tracking-tight">Portal Estudiante
                </h2>
                <p class="text-xs font-medium text-text-muted uppercase tracking-widest mt-1">
                    <?= htmlspecialchars((string) $user['tenant_name']) ?></p>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 flex flex-col gap-1 px-3">
            <!-- Active Tab: Dashboard -->
            <a class="flex items-center gap-3 px-6 py-4 transition-all rounded-xl mx-2" href="#"
                x-on:click.prevent="currentView = 'dashboard'; activeTool = null"
                :class="currentView === 'dashboard' ? 'bg-white text-primary-container font-semibold shadow-[0_4px_12px_rgba(0,0,0,0.05)] bg-surface-container-low shadow-[inset_0_2px_5px_rgba(0,0,0,0.07)]' : 'border-l-[3px] border-transparent text-text-secondary hover:text-text-primary hover:bg-white/50'">
                <span class="material-symbols-outlined"
                    :class="currentView === 'dashboard' ? 'text-primary-container' : ''">grid_view</span>
                <span class="text-sm">Dashboard</span>
            </a>

            <!-- Tab: Herramientas -->
            <div class="flex flex-col gap-1">
                <a class="flex items-center gap-3 px-6 py-4 transition-all rounded-xl mx-2" href="#"
                    x-on:click.prevent="currentView = 'herramientas'; activeTool = null"
                    :class="currentView === 'herramientas' ? 'bg-white text-primary-container font-bold shadow-[0_4px_12px_rgba(0,0,0,0.05)] bg-surface-container-low shadow-[inset_0_2px_5px_rgba(0,0,0,0.07)]' : 'border-l-[3px] border-transparent text-text-secondary hover:text-text-primary hover:bg-white/50'">
                    <span class="material-symbols-outlined"
                        :class="currentView === 'herramientas' ? 'text-primary-container' : ''">precision_manufacturing</span>
                    <span class="text-sm">Herramientas</span>
                </a>

                <!-- Sub-menu: Estudio Cualitativo -->
                <div x-show="currentView === 'herramientas'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0" class="pl-12 pr-4 space-y-1">
                    <a href="#"
                        x-on:click.prevent="activeTool = 'estudio-cualitativo'; $nextTick(() => window.scrollTo({top: 0, behavior: 'smooth'}))"
                        class="flex items-center gap-2 py-2 px-3 rounded-lg text-xs transition-all"
                        :class="activeTool === 'estudio-cualitativo' ? 'bg-primary/5 text-primary font-bold border-l-2 border-primary shadow-sm' : 'text-text-muted hover:text-primary hover:bg-bg-surface'">
                        <span class="w-1.5 h-1.5 rounded-full"
                            :class="activeTool === 'estudio-cualitativo' ? 'bg-primary' : 'bg-text-muted/30'"></span>
                        Estudio Cualitativo
                    </a>
                </div>
            </div>

            <?php if (($user['role'] ?? '') === 'admin'): ?>
                <a href="#panel-usuario" @click.prevent="currentView = 'panel-usuario'; isMobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200"
                    :class="currentView === 'panel-usuario' ? 'bg-primary/10 text-primary font-bold' : 'text-text-secondary hover:bg-bg-subtle'">
                    <span class="material-symbols-outlined text-[22px]">group</span>
                    <span>Usuarios</span>
                </a>
                <a href="#configuracion" @click.prevent="currentView = 'configuracion'; isMobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200"
                    :class="currentView === 'configuracion' ? 'bg-primary/10 text-primary font-bold' : 'text-text-secondary hover:bg-bg-subtle'">
                    <span class="material-symbols-outlined text-[22px]">settings</span>
                    <span>Configuración</span>
                </a>
            <?php endif; ?>
        </div>

        <!-- Footer / Logout -->
        <div class="px-6 py-4 border-t border-slate-100">
            <a class="flex items-center gap-3 px-2 py-3 text-text-muted hover:text-text-primary transition-colors"
                href="/?action=logout">
                <span class="material-symbols-outlined text-[20px]">logout</span>
                <span class="text-xs font-semibold uppercase tracking-wider">Cerrar Sesión</span>
            </a>
        </div>
    </nav>

    <main
        class="flex-1 md:ml-[260px] p-4 md:p-10 lg:p-12 bg-background/30 min-h-screen pt-[84px] md:pt-10 overflow-x-hidden">
        <section class="max-w-container-max mx-auto w-full relative">
            <div
                class="absolute top-0 left-0 w-full h-[400px] bg-gradient-to-br from-primary-fixed/40 via-secondary-fixed/30 to-transparent -z-10 pointer-events-none rounded-b-3xl">
            </div>

            <header class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4" id="dashboard">
                <div>
                    <h1 class="font-h1-page text-h1-page text-text-primary">Hola,
                        <?= htmlspecialchars((string) $user['name']) ?></h1>
                    <p class="font-body-lead text-body-lead text-text-secondary mt-2 max-w-2xl">Bienvenido de vuelta.
                        Administra tu progreso y ejecuta herramientas desde un panel centralizado.</p>
                </div>
                <div class="flex items-center gap-4">
                    <div
                        class="w-10 h-10 rounded-full bg-primary-container/10 border border-primary-container/20 flex items-center justify-center text-primary-container font-bold overflow-hidden shadow-sm">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                </div>
            </header>

            <section class="grid grid-cols-1 md:grid-cols-3 gap-grid-gap-lg mb-12" x-show="currentView === 'dashboard'"
                x-transition>
                <article
                    class="bg-bg-surface rounded-xl p-6 border border-border-subtle shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-ui-label text-ui-label text-text-secondary uppercase">Evaluaciones</h3>
                        <span class="material-symbols-outlined text-primary-container">science</span>
                    </div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[40px] font-h1-page text-text-primary leading-none"><?= $studyCount ?></span>
                    </div>
                </article>
                <article
                    class="bg-bg-surface rounded-xl p-6 border border-border-subtle shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-ui-label text-ui-label text-text-secondary uppercase">Margen Promedio</h3>
                        <span class="material-symbols-outlined text-accent-success">trending_up</span>
                    </div>
                    <div class="flex items-baseline gap-3">
                        <span
                            class="text-[40px] font-h1-page text-text-primary leading-none"><?= number_format($avgMargin, 2) ?>%</span>
                    </div>
                </article>
                <article
                    class="bg-bg-surface rounded-xl p-6 border border-border-subtle shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-ui-label text-ui-label text-text-secondary uppercase">Ultimo Producto</h3>
                        <span class="material-symbols-outlined text-accent-violet">inventory_2</span>
                    </div>
                    <p class="text-xl font-h3-card text-text-primary">
                        <?= htmlspecialchars((string) ($lastStudy['product_name'] ?? 'Sin datos')) ?></p>
                </article>
            </section>

            <!-- Historial en Dashboard -->
            <section x-show="currentView === 'dashboard'" x-transition class="mt-8">
                <div class="bg-white border border-border rounded-xl p-6 md:p-8 shadow-sm">
                    <h2 class="font-h3-card text-h3-card text-text-primary mb-4">Historial Reciente</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr
                                    class="border-b border-border text-text-muted uppercase text-[10px] tracking-widest font-bold">
                                    <th class="text-left py-4 px-2">Fecha</th>
                                    <th class="text-left py-4 px-2">Producto</th>
                                    <th class="text-left py-4 px-2">Checklist</th>
                                    <th class="text-left py-4 px-2">Costo unitario</th>
                                    <th class="text-left py-4 px-2">Precio estimado</th>
                                    <th class="text-left py-4 px-2">Ganancia neta</th>
                                    <th class="text-left py-4 px-2">Margen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="study in studies" :key="study.id">
                                    <tr class="border-b border-border-subtle hover:bg-bg-surface/50 transition-colors">
                                        <td class="py-4 px-2 text-text-muted"
                                            x-text="new Date(study.created_at).toLocaleDateString()"></td>
                                        <td class="py-4 px-2 font-semibold text-text-primary"
                                            x-text="study.product_name"></td>
                                        <td class="py-4 px-2">
                                            <span class="px-2 py-0.5 rounded text-xs font-bold"
                                                :class="study.checklist_score >= 40 ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'"
                                                x-text="study.checklist_score + ' pts'"></span>
                                        </td>
                                        <td class="py-4 px-2 font-mono text-text-secondary"
                                            x-text="formatCurrency(study.total_unit_cost)"></td>
                                        <td class="py-4 px-2 font-mono font-bold text-primary"
                                            x-text="formatCurrency(study.estimated_price)"></td>
                                        <td class="py-4 px-2 font-mono text-sky-600"
                                            x-text="formatCurrency(study.net_profit)"></td>
                                        <td class="py-4 px-2">
                                            <span class="font-bold"
                                                :class="study.net_margin >= 0.3 ? 'text-emerald-500' : 'text-amber-500'"
                                                x-text="formatPercent(study.net_margin)"></span>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div x-show="studies.length === 0" class="py-12 text-center text-text-muted">
                            No hay evaluaciones guardadas recientemente.
                        </div>
                    </div>
                </div>
            </section>

            <section x-show="currentView === 'herramientas'" x-transition>
                <div class="mb-10" x-show="!activeTool">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-border-subtle mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
                        <span class="font-ui-label text-ui-label text-text-secondary">Suite de Herramientas</span>
                    </div>
                    <h2 class="font-h1-page text-h1-page text-text-primary mb-3 tracking-tight">Herramientas
                        Especializadas</h2>
                    <p class="font-body-lead text-body-lead text-text-secondary max-w-2xl">Selecciona una herramienta
                        para comenzar tu análisis.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-grid-gap-lg mb-12" x-show="!activeTool">
                    <article
                        class="group relative bg-bg-page rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] hover:shadow-[0_12px_24px_rgba(0,0,0,0.08)] transition-all duration-300 border border-border overflow-hidden flex flex-col">
                        <div
                            class="absolute top-0 left-0 w-full h-[3px] bg-transparent group-hover:bg-primary-container transition-colors duration-300">
                        </div>
                        <div class="p-8 flex-1 flex flex-col">
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-12 h-12 rounded-lg bg-[#4f46e5]/10 text-primary-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[28px]">science</span>
                                </div>
                                <h3 class="font-h3-card text-h3-card text-text-primary">Estudio Cualitativo</h3>
                            </div>
                            <p class="font-body-base text-body-base text-text-secondary mb-8">Analiza oportunidades de
                                producto con checklist, costos, precio sugerido y margen neto.</p>
                            <ul class="space-y-3 mb-8 flex-1">
                                <li class="flex items-start gap-3"><span
                                        class="material-symbols-outlined text-[20px] text-primary-container mt-0.5">check_circle</span><span
                                        class="text-text-secondary">Checklist ponderado</span></li>
                                <li class="flex items-start gap-3"><span
                                        class="material-symbols-outlined text-[20px] text-primary-container mt-0.5">check_circle</span><span
                                        class="text-text-secondary">Calculo automatico de rentabilidad</span></li>
                                <li class="flex items-start gap-3"><span
                                        class="material-symbols-outlined text-[20px] text-primary-container mt-0.5">check_circle</span><span
                                        class="text-text-secondary">Guardado de resultados por usuario</span></li>
                            </ul>
                            <button
                                class="w-full text-center bg-bg-page border border-border hover:bg-bg-surface text-text-primary rounded-lg py-3 px-6 font-ui-label text-ui-label transition-colors duration-200"
                                x-on:click="activeTool = 'estudio-cualitativo'">Abrir herramienta</button>
                        </div>
                    </article>

                    <article
                        class="group relative bg-bg-page rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] border border-border overflow-hidden flex flex-col opacity-90">
                        <div class="p-8 flex-1 flex flex-col">
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-12 h-12 rounded-lg bg-[#10B981]/10 text-accent-success flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[28px]">payments</span>
                                </div>
                                <h3 class="font-h3-card text-h3-card text-text-primary">Estudio Financiero</h3>
                            </div>
                            <p class="font-body-base text-body-base text-text-secondary mb-8">Disponible en una
                                siguiente iteracion.</p>
                        </div>
                    </article>

                    <article
                        class="group relative bg-bg-page rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] border border-border overflow-hidden flex flex-col opacity-90">
                        <div class="p-8 flex-1 flex flex-col">
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-12 h-12 rounded-lg bg-[#39b8fd]/10 text-secondary-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[28px]">palette</span>
                                </div>
                                <h3 class="font-h3-card text-h3-card text-text-primary">Creador de Creativos IA</h3>
                            </div>
                            <p class="font-body-base text-body-base text-text-secondary mb-8">Disponible en una
                                siguiente iteracion.</p>
                        </div>
                    </article>
                </div>
                <div x-show="activeTool === 'estudio-cualitativo'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <!-- Header de Herramienta -->
                    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <button
                                class="w-10 h-10 rounded-full bg-white border border-border flex items-center justify-center text-text-secondary hover:text-primary transition-all shadow-sm"
                                x-on:click="activeTool = null">
                                <span class="material-symbols-outlined">arrow_back</span>
                            </button>
                            <div>
                                <h2 class="text-2xl font-h2-section text-text-primary leading-tight">Estudio Cualitativo
                                </h2>
                                <p class="text-sm text-text-secondary">Evaluación profunda de viabilidad y rentabilidad.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 bg-white p-1 rounded-full border border-border shadow-sm">
                            <template x-for="(cat, index) in categories" :key="index">
                                <div class="flex items-center">
                                    <button type="button" x-on:click="currentStep = (index + 1)"
                                        class="px-2 md:px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest transition-all flex items-center gap-2"
                                        :class="currentStep === (index + 1) ? 'bg-primary text-white shadow-md' : 'text-text-muted hover:bg-bg-surface'">
                                        <span
                                            class="w-5 h-5 rounded-full flex items-center justify-center text-[9px] border"
                                            :class="currentStep === (index + 1) ? 'border-white/30 bg-white/20' : 'border-border bg-bg-surface'"
                                            x-text="index + 1"></span>
                                        <span class="hidden sm:inline" x-text="cat"></span>
                                    </button>
                                    <!-- Separador -->
                                    <div x-show="index < categories.length - 1" class="w-4 h-[1px] bg-border mx-1">
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                        <!-- Columna Izquierda: Wizard e Inputs -->
                        <div class="lg:col-span-8 space-y-6">
                            <!-- Paso del Checklist -->
                            <div class="bg-white border border-border rounded-2xl p-6 md:p-8 shadow-sm">
                                <div class="flex items-center justify-between mb-8">
                                    <h3 class="font-h3-card text-lg text-text-primary flex items-center gap-2">
                                        <span
                                            class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold text-sm"
                                            x-text="currentStep"></span>
                                        <span x-text="'Evaluación de ' + categories[currentStep-1]"></span>
                                    </h3>
                                    <span class="text-sm font-medium text-text-muted"
                                        x-text="'Paso ' + currentStep + ' de 4'"></span>
                                </div>

                                <div class="space-y-8">
                                    <template x-for="item in itemsByStep" :key="item.id">
                                        <div class="space-y-4">
                                            <p class="font-medium text-text-primary" x-text="item.question"></p>
                                            <div class="grid grid-cols-3 gap-2">
                                                <template x-for="(opt, optIdx) in item.options" :key="optIdx">
                                                    <button type="button"
                                                        x-on:click="item.score = (optIdx + 1); recalcChecklist()"
                                                        class="px-3 py-2 rounded-lg border transition-all text-xs font-bold flex items-center justify-center gap-2"
                                                        :class="item.score === (optIdx + 1) 
                                                    ? (optIdx === 0 ? 'bg-red-50 border-red-500 text-red-700' : (optIdx === 1 ? 'bg-amber-50 border-amber-500 text-amber-700' : 'bg-emerald-50 border-emerald-500 text-emerald-700'))
                                                    : 'bg-bg-surface border-border hover:border-primary-container/30 text-text-secondary'">
                                                        <span class="opacity-50" x-text="(optIdx + 1)"></span>
                                                        <span x-text="opt"></span>
                                                    </button>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <div class="mt-12 pt-8 border-t border-border flex justify-between">
                                    <button
                                        class="px-6 py-2.5 rounded-xl border border-border font-bold text-text-secondary hover:bg-bg-subtle transition-all disabled:opacity-30"
                                        x-on:click="currentStep--" :disabled="currentStep === 1">Anterior</button>

                                    <button x-show="currentStep < 4"
                                        class="px-8 py-2.5 rounded-xl bg-primary text-white font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-all"
                                        x-on:click="currentStep++">Siguiente</button>

                                    <button x-show="currentStep === 4"
                                        class="px-8 py-2.5 rounded-xl bg-accent-success text-white font-bold shadow-lg shadow-emerald/20 hover:scale-105 transition-all"
                                        x-on:click="currentView = 'herramientas'; activeTool = 'estudio-cualitativo'; $nextTick(() => document.getElementById('financial-inputs').scrollIntoView({behavior: 'smooth'}))">Finalizar
                                        Checklist</button>
                                </div>
                            </div>

                            <!-- Datos Financieros -->
                            <div class="bg-white border border-border rounded-2xl p-6 md:p-8 shadow-sm"
                                id="financial-inputs">
                                <h3 class="font-h3-card text-lg text-text-primary mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">payments</span>
                                    Datos Financieros
                                </h3>

                                <form x-on:submit.prevent="saveStudy()" id="study-form">
                                    <input type="hidden" name="checklist_score" :value="checklist_score">
                                    <input type="hidden" name="total_unit_cost" :value="total_unit_cost">
                                    <input type="hidden" name="estimated_price" :value="estimated_price">
                                    <input type="hidden" name="net_profit" :value="net_profit">
                                    <input type="hidden" name="net_margin" :value="net_margin">

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="col-span-full">
                                            <label class="font-ui-label text-text-muted mb-2 uppercase">Nombre del
                                                Producto</label>
                                            <input
                                                class="w-full rounded-xl border-border bg-bg-surface p-4 focus:ring-4 focus:ring-primary/10 transition-all font-semibold"
                                                type="text" name="product_name" x-model="product_name"
                                                placeholder="Ej. Lámpara Inteligente Pro" required>
                                        </div>
                                        <div>
                                            <label class="font-ui-label text-text-muted mb-2 uppercase">Costo Mercancía
                                                (CMV)</label>
                                            <div class="relative">
                                                <span class="absolute left-4 top-4 text-text-muted font-bold">$</span>
                                                <input
                                                    class="w-full rounded-xl border-border bg-bg-surface p-4 pl-8 focus:ring-4 focus:ring-primary/10 transition-all font-mono"
                                                    type="number" step="0.01" name="cmv"
                                                    x-model.number="costo_mercancia_vendida" @input="recalc()" required>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="font-ui-label text-text-muted mb-2 uppercase">Costo
                                                Envío</label>
                                            <div class="relative">
                                                <span class="absolute left-4 top-4 text-text-muted font-bold">$</span>
                                                <input
                                                    class="w-full rounded-xl border-border bg-bg-surface p-4 pl-8 focus:ring-4 focus:ring-primary/10 transition-all font-mono"
                                                    type="number" step="0.01" x-model.number="shipping"
                                                    @input="recalc()">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="font-ui-label text-text-muted mb-2 uppercase">Comisión
                                                Plataforma</label>
                                            <div class="relative">
                                                <span class="absolute left-4 top-4 text-text-muted font-bold">$</span>
                                                <input
                                                    class="w-full rounded-xl border-border bg-bg-surface p-4 pl-8 focus:ring-4 focus:ring-primary/10 transition-all font-mono"
                                                    type="number" step="0.01" name="platform_cost"
                                                    x-model.platform_cost="platform_cost" @input="recalc()">
                                            </div>
                                        </div>
                                        <div class="flex items-end">
                                            <button
                                                class="w-full h-14 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/20 hover:bg-primary/90 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2"
                                                type="submit">
                                                <span class="material-symbols-outlined text-[20px]">save</span>
                                                Guardar Evaluación
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Columna Derecha: Dashboard Financiero (Sticky) -->
                        <div class="lg:col-span-4 space-y-6 sticky top-8">
                            <!-- Calidad de Producto -->
                            <div
                                class="bg-white border border-border rounded-2xl p-6 shadow-sm overflow-hidden relative">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16">
                                </div>
                                <h4 class="font-ui-label text-text-muted mb-4 uppercase">Calidad de Producto</h4>
                                <div class="flex items-center gap-4">
                                    <div class="relative w-20 h-20 flex items-center justify-center">
                                        <svg class="w-full h-full transform -rotate-90">
                                            <circle cx="40" cy="40" r="34" stroke="currentColor" stroke-width="8"
                                                fill="transparent" class="text-bg-subtle"></circle>
                                            <circle cx="40" cy="40" r="34" stroke="currentColor" stroke-width="8"
                                                fill="transparent" class="transition-all duration-1000 ease-out"
                                                :class="checklist_score >= 40 ? 'text-emerald-500' : 'text-amber-500'"
                                                :stroke-dasharray="213.6"
                                                :stroke-dashoffset="213.6 - (213.6 * (checklist_score / 54))"></circle>
                                        </svg>
                                        <span class="absolute font-h1-page text-xl text-text-primary"
                                            x-text="checklist_score"></span>
                                    </div>
                                    <div>
                                        <p class="font-bold text-lg"
                                            :class="checklist_score >= 40 ? 'text-emerald-600' : 'text-amber-600'"
                                            x-text="checklist_score >= 40 ? 'Viable' : 'Riesgoso'"></p>
                                        <p class="text-xs text-text-muted">Basado en <span
                                                x-text="checklistItems.filter(i => i.score > 0).length"></span>
                                            respuestas</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Resultados Financieros -->
                            <div
                                class="bg-[#0F172A] text-white rounded-3xl p-8 shadow-2xl relative overflow-hidden border border-white/10">
                                <!-- Decorative mesh gradient overlay -->
                                <div
                                    class="absolute top-0 right-0 w-full h-full bg-[radial-gradient(circle_at_top_right,_#4f46e5_0%,_transparent_60%)] opacity-20">
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 w-full h-full bg-[radial-gradient(circle_at_bottom_left,_#0ea5e9_0%,_transparent_60%)] opacity-10">
                                </div>

                                <div class="relative z-10 space-y-8">
                                    <div class="flex items-center justify-between">
                                        <h4
                                            class="font-ui-label text-white/40 uppercase text-[10px] tracking-[0.2em] font-bold">
                                            Resumen de Rentabilidad</h4>
                                        <span
                                            class="material-symbols-outlined text-white/20 text-sm">monetization_on</span>
                                    </div>

                                    <div class="space-y-2">
                                        <label
                                            class="text-[13px] font-bold text-white/60 block uppercase tracking-wider">Precio
                                            de Venta Sugerido</label>
                                        <p class="text-5xl font-h1-page text-white tracking-tighter"
                                            x-text="formatCurrency(estimated_price)"></p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-8 py-8 border-y border-white/10">
                                        <div class="space-y-2">
                                            <label
                                                class="text-[11px] font-bold text-white/40 uppercase tracking-[0.1em]">Margen
                                                Neto</label>
                                            <p class="text-3xl font-h1-page"
                                                :class="net_margin >= 0.3 ? 'text-emerald-400' : 'text-amber-400'"
                                                x-text="formatPercent(net_margin)"></p>
                                        </div>
                                        <div class="space-y-2">
                                            <label
                                                class="text-[11px] font-bold text-white/40 uppercase tracking-[0.1em]">Ganancia
                                                Neta</label>
                                            <p class="text-3xl font-h1-page text-sky-400"
                                                x-text="formatCurrency(net_profit)"></p>
                                        </div>
                                    </div>

                                    <div class="space-y-4">
                                        <div class="flex justify-between items-end">
                                            <div class="space-y-1">
                                                <label
                                                    class="text-[11px] font-bold text-white/40 uppercase tracking-wider">Eficiencia
                                                    Operativa</label>
                                                <p class="text-sm text-white/80 font-medium"
                                                    x-text="net_margin >= 0.3 ? 'Producto Altamente Rentable' : 'Margen Ajustado'">
                                                </p>
                                            </div>
                                            <span class="text-base font-mono font-black text-white"
                                                x-text="formatPercent(1 - net_margin)"></span>
                                        </div>
                                        <div
                                            class="w-full h-3 bg-white/10 rounded-full overflow-hidden p-[1px] shadow-inner">
                                            <div class="h-full bg-gradient-to-r from-primary via-sky-400 to-emerald-400 rounded-full transition-all duration-1000 ease-out shadow-[0_0_15px_rgba(53,37,205,0.5)]"
                                                :style="'width: ' + (100 - (net_margin * 100)) + '%'"></div>
                                        </div>
                                    </div>

                                    <div class="bg-white/5 rounded-2xl p-4 border border-white/5">
                                        <div class="flex gap-3">
                                            <span class="material-symbols-outlined text-primary text-lg">info</span>
                                            <p class="text-[10px] text-white/50 leading-relaxed">
                                                Cálculo basado en <span class="text-white/80 font-bold">15% Ads</span> y
                                                factor operativo de <span class="text-white/80 font-bold">53%</span>.
                                                Los valores son proyecciones estimadas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Historial dentro de la herramienta -->
                    <section class="bg-white border border-border rounded-xl p-6 md:p-8 mt-10 shadow-sm">
                        <h2 class="font-h3-card text-h3-card text-text-primary mb-4">Historial de Evaluaciones</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead>
                                    <tr
                                        class="border-b border-border text-text-muted uppercase text-[10px] tracking-widest font-bold">
                                        <th class="text-left py-4 px-2">Fecha</th>
                                        <th class="text-left py-4 px-2">Producto</th>
                                        <th class="text-left py-4 px-2">Checklist</th>
                                        <th class="text-left py-4 px-2">Costo unitario</th>
                                        <th class="text-left py-4 px-2">Precio estimado</th>
                                        <th class="text-left py-4 px-2">Ganancia neta</th>
                                        <th class="text-left py-4 px-2">Margen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="study in studies" :key="study.id">
                                        <tr
                                            class="border-b border-border-subtle hover:bg-bg-surface/50 transition-colors">
                                            <td class="py-4 px-2 text-text-muted"
                                                x-text="new Date(study.created_at).toLocaleDateString()"></td>
                                            <td class="py-4 px-2 font-semibold text-text-primary"
                                                x-text="study.product_name"></td>
                                            <td class="py-4 px-2">
                                                <span class="px-2 py-0.5 rounded text-xs font-bold"
                                                    :class="study.checklist_score >= 40 ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'"
                                                    x-text="study.checklist_score + ' pts'"></span>
                                            </td>
                                            <td class="py-4 px-2 font-mono text-text-secondary"
                                                x-text="formatCurrency(study.total_unit_cost)"></td>
                                            <td class="py-4 px-2 font-mono font-bold text-primary"
                                                x-text="formatCurrency(study.estimated_price)"></td>
                                            <td class="py-4 px-2 font-mono text-sky-600"
                                                x-text="formatCurrency(study.net_profit)"></td>
                                            <td class="py-4 px-2">
                                                <span class="font-bold"
                                                    :class="study.net_margin >= 0.3 ? 'text-emerald-500' : 'text-amber-500'"
                                                    x-text="formatPercent(study.net_margin)"></span>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                            <div x-show="studies.length === 0" class="py-12 text-center text-text-muted">
                                No hay evaluaciones guardadas recientemente.
                            </div>
                        </div>
                    </section>
                </div>
                </div>
            </section>
        </section>

        <section x-show="currentView === 'panel-usuario'" x-transition>
            <?php if (($user['role'] ?? '') === 'admin'): ?>
                <section class="bg-white border border-border rounded-xl p-6 md:p-8 shadow-sm" id="panel-usuario">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-h2-section text-text-primary">Administración de Usuarios</h2>
                            <p class="text-sm text-text-secondary">Gestiona el acceso de tu equipo.</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <button @click="isUserModalOpen = true"
                                class="px-5 py-2.5 bg-primary text-white rounded-xl font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-all flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">person_add</span>
                                Registrar Usuario
                            </button>
                            <div
                                class="px-4 py-1.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold uppercase tracking-widest">
                                Organización: <?= htmlspecialchars($user['tenant_name']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr
                                    class="border-b border-border text-text-muted font-bold uppercase text-[10px] tracking-widest">
                                    <th class="text-left py-4 px-2">Nombre</th>
                                    <th class="text-left py-4 px-2">Email</th>
                                    <th class="text-left py-4 px-2">Rol</th>
                                    <th class="text-left py-4 px-2">Estado</th>
                                    <th class="text-left py-4 px-2">Unido el</th>
                                    <th class="text-right py-4 px-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($users) && count($users) > 0): ?>
                                    <?php foreach ($users as $u): ?>
                                        <tr class="border-b border-border-subtle hover:bg-bg-surface/50 transition-colors">
                                            <td class="py-4 px-2 font-semibold text-text-primary">
                                                <?= htmlspecialchars($u['name']) ?></td>
                                            <td class="py-4 px-2 text-text-secondary"><?= htmlspecialchars($u['email']) ?></td>
                                            <td class="py-4 px-2">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider"
                                                    :class="'<?= $u['role'] ?>' === 'admin' ? 'bg-primary/10 text-primary' : 'bg-slate-100 text-slate-600'">
                                                    <?= htmlspecialchars($u['role']) ?>
                                                </span>
                                            </td>
                                            <td class="py-4 px-2">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider"
                                                    :class="'<?= $u['status'] ?? 'active' ?>' === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700'">
                                                    <?= htmlspecialchars($u['status'] ?? 'active') ?>
                                                </span>
                                            </td>
                                            <td class="py-4 px-2 text-text-muted text-xs">
                                                <?= date('d/m/Y', strtotime($u['created_at'])) ?></td>
                                            <td class="py-4 px-2 text-right">
                                                <div class="flex items-center justify-end gap-2">
                                                    <button
                                                        @click="toggleUserStatus(<?= $u['id'] ?>, '<?= $u['status'] ?? 'active' ?>')"
                                                        class="p-2 hover:bg-bg-surface rounded-lg transition-all text-text-muted"
                                                        title="<?= ($u['status'] ?? 'active') === 'active' ? 'Desactivar' : 'Activar' ?>">
                                                        <span
                                                            class="material-symbols-outlined text-sm"><?= ($u['status'] ?? 'active') === 'active' ? 'person_off' : 'person_check' ?></span>
                                                    </button>
                                                    <button @click="deleteUser(<?= $u['id'] ?>)"
                                                        class="p-2 hover:bg-red-50 hover:text-red-600 rounded-lg transition-all text-text-muted"
                                                        title="Eliminar">
                                                        <span class="material-symbols-outlined text-sm">delete</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="py-12 text-center text-text-muted italic">No se encontraron
                                            usuarios en esta cuenta.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            <?php endif; ?>
        </section>

        <!-- Modal para Registrar Usuario -->
        <div x-show="isUserModalOpen"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100">

            <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden"
                @click.away="isUserModalOpen = false">
                <div class="p-6 border-b border-border flex items-center justify-between bg-bg-surface">
                    <h3 class="text-xl font-bold text-text-primary">Registrar Nuevo Usuario</h3>
                    <button @click="isUserModalOpen = false" class="text-text-muted hover:text-text-primary">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <form @submit.prevent="registerUser()" class="p-6 space-y-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase text-text-muted tracking-widest">Nombre
                            Completo</label>
                        <input type="text" x-model="newUser.name"
                            class="w-full p-3 rounded-xl border-border bg-bg-surface focus:ring-4 focus:ring-primary/10"
                            placeholder="Ej. Juan Perez" required>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase text-text-muted tracking-widest">Correo
                            Electrónico</label>
                        <input type="email" x-model="newUser.email"
                            class="w-full p-3 rounded-xl border-border bg-bg-surface focus:ring-4 focus:ring-primary/10"
                            placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase text-text-muted tracking-widest">Contraseña
                            Temporal</label>
                        <input type="password" x-model="newUser.password"
                            class="w-full p-3 rounded-xl border-border bg-bg-surface focus:ring-4 focus:ring-primary/10"
                            placeholder="••••••••" required>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase text-text-muted tracking-widest">Rol del
                            Usuario</label>
                        <select x-model="newUser.role"
                            class="w-full p-3 rounded-xl border-border bg-bg-surface focus:ring-4 focus:ring-primary/10">
                            <option value="estudiante">Estudiante</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full py-4 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all">
                            Crear Cuenta
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <!-- AI Chat Assistant -->
        <div class="fixed bottom-6 right-6 z-[100] flex flex-col items-end"
            x-show="activeTool === 'estudio-cualitativo'" x-transition>
            <!-- Chat Window -->
            <div x-show="isChatOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                class="mb-4 w-[350px] md:w-[400px] h-[500px] bg-white rounded-3xl shadow-2xl border border-border flex flex-col overflow-hidden">

                <!-- Chat Header -->
                <div
                    class="p-6 bg-gradient-to-r from-primary to-sky-600 text-white flex items-center justify-between shadow-lg">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center shadow-inner">
                            <span class="material-symbols-outlined text-white text-xl">auto_awesome</span>
                        </div>
                        <div>
                            <p class="font-bold leading-none">Asistente Inteligente</p>
                            <p class="text-[10px] text-white/70 mt-1 uppercase tracking-widest font-bold">En línea</p>
                        </div>
                    </div>
                    <button @click="isChatOpen = false" class="hover:bg-white/10 rounded-full p-1 transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <!-- Messages Area -->
                <div id="chat-container" class="flex-1 overflow-y-auto p-6 space-y-4 bg-slate-50/50">
                    <template x-for="(msg, index) in chatMessages" :key="index">
                        <div :class="msg.role === 'assistant' ? 'flex justify-start' : 'flex justify-end'">
                            <div :class="msg.role === 'assistant' ? 'bg-white text-text-primary rounded-2xl rounded-tl-none border border-border-subtle shadow-sm' : 'bg-primary text-white rounded-2xl rounded-tr-none shadow-md shadow-primary/10'"
                                class="max-w-[85%] p-4 text-sm leading-relaxed"
                                x-html="renderMarkdown(msg.content)">
                            </div>
                        </div>
                    </template>
                    
                    <!-- Typing Indicator -->
                    <div x-show="isTyping" class="flex justify-start">
                        <div class="bg-white text-text-primary rounded-2xl rounded-tl-none border border-border-subtle shadow-sm p-4 flex gap-1 items-center">
                            <div class="w-1.5 h-1.5 bg-text-muted rounded-full dot-jump" style="animation-delay: 0s"></div>
                            <div class="w-1.5 h-1.5 bg-text-muted rounded-full dot-jump" style="animation-delay: 0.1s"></div>
                            <div class="w-1.5 h-1.5 bg-text-muted rounded-full dot-jump" style="animation-delay: 0.2s"></div>
                        </div>
                    </div>
                </div>

                <!-- Chat Input -->
                <div class="p-4 bg-white border-t border-border">
                    <form @submit.prevent="sendMessage()" class="relative">
                        <input type="text" x-model="userMessage" placeholder="Pregunta algo sobre tu estudio..."
                            class="w-full pl-4 pr-12 py-3 rounded-2xl border-border bg-bg-surface focus:ring-4 focus:ring-primary/10 text-sm transition-all">
                        <button type="submit"
                            class="absolute right-2 top-2 p-1.5 bg-primary text-white rounded-xl hover:bg-primary/90 transition-all flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm">send</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Floating Button -->
            <button @click="isChatOpen = !isChatOpen"
                class="w-14 h-14 rounded-full bg-primary text-white shadow-xl shadow-primary/30 flex items-center justify-center hover:scale-110 active:scale-95 transition-all group overflow-hidden relative">
                <div
                    class="absolute inset-0 bg-gradient-to-tr from-indigo-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <span class="material-symbols-outlined text-2xl relative z-10" x-show="!isChatOpen">auto_awesome</span>
                <span class="material-symbols-outlined text-2xl relative z-10" x-show="isChatOpen">close</span>
            </button>
        </div>
        <section x-show="currentView === 'configuracion'" x-transition>
            <?php if (($user['role'] ?? '') === 'admin'): ?>
                <section class="bg-white border border-border rounded-xl p-6 md:p-8 shadow-sm" id="config-panel">
                    <div class="mb-8">
                        <h2 class="text-2xl font-h2-section text-text-primary">Configuración del Sistema</h2>
                        <p class="text-sm text-text-secondary">Administra los proveedores de IA y llaves de acceso.</p>
                    </div>

                    <form @submit.prevent="saveSettings($event)" class="max-w-2xl space-y-8">
                        <div class="space-y-6">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center">
                                    <span class="material-symbols-outlined">bolt</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-text-primary">Groq Cloud</h3>
                                    <p class="text-xs text-text-muted">Inferencia de alta velocidad.</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold uppercase text-text-muted tracking-widest">Groq API
                                    Key</label>
                                <input type="password" name="groq_api_key"
                                    value="<?= htmlspecialchars($settings['groq_api_key'] ?? '') ?>"
                                    class="w-full p-4 rounded-xl border-border bg-bg-surface focus:ring-4 focus:ring-primary/10 font-mono"
                                    placeholder="gsk_...">
                                <p class="text-[10px] text-text-muted">Consigue tu llave en <a
                                        href="https://console.groq.com/" target="_blank"
                                        class="text-primary hover:underline">Groq Console</a>.</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                    <span class="material-symbols-outlined">psychology</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-text-primary">Personalidad del Asistente</h3>
                                    <p class="text-xs text-text-muted">Configura cómo debe responder la IA en cada sección.
                                    </p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold uppercase text-text-muted tracking-widest">System Prompt
                                    (Estudio Cualitativo)</label>
                                <textarea name="qualitative_study_system_prompt" rows="5"
                                    class="w-full p-4 rounded-xl border-border bg-bg-surface focus:ring-4 focus:ring-primary/10 text-sm"
                                    placeholder="Eres un experto en ecommerce..."><?= htmlspecialchars($settings['qualitative_study_system_prompt'] ?? 'Eres un experto en ecommerce y finanzas. Ayuda al estudiante a analizar la viabilidad de su producto basándote en los datos proporcionados.') ?></textarea>
                                <p class="text-[10px] text-text-muted">Define las instrucciones maestras para la IA en esta
                                    herramienta.</p>
                            </div>
                        </div>

                        <hr class="border-border-subtle">

                        <div class="opacity-50 pointer-events-none">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                                    <span class="material-symbols-outlined">auto_awesome</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-text-primary">Google Gemini (Próximamente)</h3>
                                    <p class="text-xs text-text-muted">Integración con 1.5 Pro y Flash.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="px-8 py-4 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/20 hover:scale-105 transition-all">
                                Guardar Configuración
                            </button>
                        </div>
                    </form>
                </section>
            <?php endif; ?>
        </section>
    </main>

    <script src="/assets/app.js"></script>
</body>

</html>