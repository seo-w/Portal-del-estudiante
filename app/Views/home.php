<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portal del Estudiante - Dashboard</title>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
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
                        "bg-page": "#FFFFFF",
                        "gradient-cta": "linear-gradient(135deg, #5B21B6, #4F46E5, #0EA5E9)",
                        "border": "#E2E8F0",
                        "border-subtle": "#F1F5F9",
                        "tertiary-fixed": "#ffdbcc",
                        "gradient-text": "linear-gradient(135deg, #5B21B6 0%, #4F46E5 50%, #0EA5E9 100%)",
                        "on-secondary": "#ffffff",
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
                        "container-max": "1280px",
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
        .material-symbols-outlined { font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24; }
        .material-symbols-outlined.fill { font-variation-settings: "FILL" 1, "wght" 400, "GRAD" 0, "opsz" 24; }
    </style>
</head>
<body class="bg-bg-page text-text-primary antialiased font-body-base text-body-base min-h-screen flex" x-data="calculator()">
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
<nav class="fixed left-0 top-0 h-screen w-[260px] border-r border-border bg-bg-surface flex flex-col py-8 z-40 hidden md:flex">
    <!-- Header -->
    <div class="px-6 mb-8 flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-white mb-4">
            <span class="material-symbols-outlined">rocket_launch</span>
        </div>
        <div>
            <h2 class="text-lg font-h2-section text-text-primary leading-tight tracking-tight">Portal Estudiante</h2>
            <p class="text-xs font-medium text-text-muted uppercase tracking-widest mt-1"><?= htmlspecialchars((string) $user['tenant_name']) ?></p>
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 flex flex-col gap-1 px-3">
        <!-- Active Tab: Dashboard -->
        <a class="flex items-center gap-3 px-6 py-4 transition-all rounded-xl mx-2" 
           href="#" 
           x-on:click.prevent="currentView = 'dashboard'; activeTool = null"
           :class="currentView === 'dashboard' ? 'bg-white text-primary-container font-semibold shadow-[0_4px_12px_rgba(0,0,0,0.05)] bg-surface-container-low shadow-[inset_0_2px_5px_rgba(0,0,0,0.07)]' : 'border-l-[3px] border-transparent text-text-secondary hover:text-text-primary hover:bg-white/50'">
            <span class="material-symbols-outlined" :class="currentView === 'dashboard' ? 'text-primary-container' : ''">grid_view</span>
            <span class="text-sm">Dashboard</span>
        </a>

        <!-- Tab: Herramientas -->
        <a class="flex items-center gap-3 px-6 py-4 transition-all rounded-xl mx-2" 
           href="#" 
           x-on:click.prevent="currentView = 'herramientas'"
           :class="currentView === 'herramientas' ? 'bg-white text-primary-container font-semibold shadow-[0_4px_12px_rgba(0,0,0,0.05)] bg-surface-container-low shadow-[inset_0_2px_5px_rgba(0,0,0,0.07)]' : 'border-l-[3px] border-transparent text-text-secondary hover:text-text-primary hover:bg-white/50'">
            <span class="material-symbols-outlined" :class="currentView === 'herramientas' ? 'text-primary-container' : ''">precision_manufacturing</span>
            <span class="text-sm font-medium">Herramientas</span>
        </a>

        <?php if (($user['role'] ?? '') === 'admin'): ?>
            <!-- Tab: Panel de Usuario -->
            <a class="flex items-center gap-3 px-6 py-4 transition-all rounded-xl mx-2" 
               href="#" 
               x-on:click.prevent="currentView = 'panel-usuario'; activeTool = null"
               :class="currentView === 'panel-usuario' ? 'bg-white text-primary-container font-semibold shadow-[0_4px_12px_rgba(0,0,0,0.05)] bg-surface-container-low shadow-[inset_0_2px_5px_rgba(0,0,0,0.07)]' : 'border-l-[3px] border-transparent text-text-secondary hover:text-text-primary hover:bg-white/50'">
                <span class="material-symbols-outlined" :class="currentView === 'panel-usuario' ? 'text-primary-container' : ''">manage_accounts</span>
                <span class="text-sm font-medium">Panel de Usuario</span>
            </a>
        <?php endif; ?>
    </div>

    <!-- Footer / Logout -->
    <div class="px-6 pt-4 border-t border-slate-100 mt-4">
        <a class="flex items-center gap-3 px-2 py-3 text-text-muted hover:text-text-primary transition-colors" href="/?action=logout">
            <span class="material-symbols-outlined text-[20px]">logout</span>
            <span class="text-xs font-semibold uppercase tracking-wider">Cerrar Sesión</span>
        </a>
    </div>
</nav>

<main class="flex-1 md:ml-[260px] p-6 md:p-10 lg:p-12 max-w-container-max mx-auto w-full relative">
    <div class="absolute top-0 left-0 w-full h-[400px] bg-gradient-to-br from-primary-fixed/40 via-secondary-fixed/30 to-transparent -z-10 pointer-events-none rounded-b-3xl"></div>

    <header class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4" id="dashboard">
        <div>
            <h1 class="font-h1-page text-h1-page text-text-primary">Hola, <?= htmlspecialchars((string) $user['name']) ?></h1>
            <p class="font-body-lead text-body-lead text-text-secondary mt-2 max-w-2xl">Bienvenido de vuelta. Administra tu progreso y ejecuta herramientas desde un panel centralizado.</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-primary-container/10 border border-primary-container/20 flex items-center justify-center text-primary-container font-bold overflow-hidden shadow-sm">
                <span class="material-symbols-outlined">person</span>
            </div>
        </div>
    </header>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-grid-gap-lg mb-16" x-show="currentView === 'dashboard'" x-transition>
        <article class="bg-bg-surface rounded-xl p-6 border border-border-subtle shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-ui-label text-ui-label text-text-secondary uppercase">Evaluaciones</h3>
                <span class="material-symbols-outlined text-primary-container">science</span>
            </div>
            <div class="flex items-baseline gap-3">
                <span class="text-[40px] font-h1-page text-text-primary leading-none"><?= $studyCount ?></span>
            </div>
        </article>
        <article class="bg-bg-surface rounded-xl p-6 border border-border-subtle shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-ui-label text-ui-label text-text-secondary uppercase">Margen Promedio</h3>
                <span class="material-symbols-outlined text-accent-success">trending_up</span>
            </div>
            <div class="flex items-baseline gap-3">
                <span class="text-[40px] font-h1-page text-text-primary leading-none"><?= number_format($avgMargin, 2) ?>%</span>
            </div>
        </article>
        <article class="bg-bg-surface rounded-xl p-6 border border-border-subtle shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-ui-label text-ui-label text-text-secondary uppercase">Ultimo Producto</h3>
                <span class="material-symbols-outlined text-accent-violet">inventory_2</span>
            </div>
            <p class="text-xl font-h3-card text-text-primary"><?= htmlspecialchars((string) ($lastStudy['product_name'] ?? 'Sin datos')) ?></p>
        </article>
    </section>

    <section x-show="currentView === 'herramientas'" x-transition>
        <div class="mb-10" x-show="!activeTool">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-border-subtle mb-4">
                <span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
                <span class="font-ui-label text-ui-label text-text-secondary">Suite de Herramientas</span>
            </div>
            <h2 class="font-h1-page text-h1-page text-text-primary mb-3 tracking-tight">Herramientas Especializadas</h2>
            <p class="font-body-lead text-body-lead text-text-secondary max-w-2xl">Selecciona una herramienta para comenzar tu análisis.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-grid-gap-lg mb-12" x-show="!activeTool">
            <article class="group relative bg-bg-page rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] hover:shadow-[0_12px_24px_rgba(0,0,0,0.08)] transition-all duration-300 border border-border overflow-hidden flex flex-col">
                <div class="absolute top-0 left-0 w-full h-[3px] bg-transparent group-hover:bg-primary-container transition-colors duration-300"></div>
                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-lg bg-[#4f46e5]/10 text-primary-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-[28px]">science</span>
                        </div>
                        <h3 class="font-h3-card text-h3-card text-text-primary">Estudio Cualitativo</h3>
                    </div>
                    <p class="font-body-base text-body-base text-text-secondary mb-8">Analiza oportunidades de producto con checklist, costos, precio sugerido y margen neto.</p>
                    <ul class="space-y-3 mb-8 flex-1">
                        <li class="flex items-start gap-3"><span class="material-symbols-outlined text-[20px] text-primary-container mt-0.5">check_circle</span><span class="text-text-secondary">Checklist ponderado</span></li>
                        <li class="flex items-start gap-3"><span class="material-symbols-outlined text-[20px] text-primary-container mt-0.5">check_circle</span><span class="text-text-secondary">Calculo automatico de rentabilidad</span></li>
                        <li class="flex items-start gap-3"><span class="material-symbols-outlined text-[20px] text-primary-container mt-0.5">check_circle</span><span class="text-text-secondary">Guardado de resultados por usuario</span></li>
                    </ul>
                    <button class="w-full text-center bg-bg-page border border-border hover:bg-bg-surface text-text-primary rounded-lg py-3 px-6 font-ui-label text-ui-label transition-colors duration-200" x-on:click="activeTool = 'estudio-cualitativo'">Abrir herramienta</button>
                </div>
            </article>

            <article class="group relative bg-bg-page rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] border border-border overflow-hidden flex flex-col opacity-90">
                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-lg bg-[#10B981]/10 text-accent-success flex items-center justify-center">
                            <span class="material-symbols-outlined text-[28px]">payments</span>
                        </div>
                        <h3 class="font-h3-card text-h3-card text-text-primary">Estudio Financiero</h3>
                    </div>
                    <p class="font-body-base text-body-base text-text-secondary mb-8">Disponible en una siguiente iteracion.</p>
                </div>
            </article>

            <article class="group relative bg-bg-page rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] border border-border overflow-hidden flex flex-col opacity-90">
                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-lg bg-[#39b8fd]/10 text-secondary-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-[28px]">palette</span>
                        </div>
                        <h3 class="font-h3-card text-h3-card text-text-primary">Creador de Creativos IA</h3>
                    </div>
                    <p class="font-body-base text-body-base text-text-secondary mb-8">Disponible en una siguiente iteracion.</p>
                </div>
            </article>
        </div>

        <div x-show="activeTool === 'estudio-cualitativo'" x-transition>
            <div class="mb-8 flex items-center justify-between">
                <button class="flex items-center gap-2 text-text-secondary hover:text-text-primary transition-colors font-medium" x-on:click="activeTool = null">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Volver a Herramientas
                </button>
                <div class="px-4 py-1.5 rounded-full bg-primary-container/10 text-primary-container text-sm font-semibold">
                    🔬 Estudio Cualitativo Activo
                </div>
            </div>

            <section class="bg-white border border-border rounded-xl p-6 md:p-8 shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
                <h2 class="font-h2-section text-h2-section text-text-primary mb-2">Estudio Cualitativo</h2>
                <p class="text-text-secondary mb-8">Completa la evaluacion y guarda resultados en tu historial.</p>
                <!-- Rest of the form content remains the same... -->

            <form method="post">
                <input type="hidden" name="checklist_score" :value="checklist_score">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                    <template x-for="(item, index) in checklistItems" :key="index">
                        <div class="border border-border rounded-lg p-4 bg-slate-50/70">
                            <label class="block text-sm font-semibold text-text-secondary mb-2" x-text="(index + 1) + '. ' + item.question"></label>
                            <select class="w-full rounded-lg border-border" x-model.number="item.score" @change="recalcChecklist()">
                                <option :value="0">Seleccionar respuesta</option>
                                <option :value="1" x-text="'1 punto - ' + item.options[0]"></option>
                                <option :value="2" x-text="'2 puntos - ' + item.options[1]"></option>
                                <option :value="3" x-text="'3 puntos - ' + item.options[2]"></option>
                            </select>
                        </div>
                    </template>
                </div>

                <div class="rounded-lg border border-border p-4 mb-8 bg-slate-50">
                    <strong>Puntaje total del checklist:</strong>
                    <span x-text="checklist_score"></span> / 54
                    <span class="font-semibold" :class="checklist_score >= 40 ? 'text-emerald-700' : 'text-red-700'">
                        (<span x-text="checklist_score >= 40 ? 'Pasa minimo recomendado' : 'No alcanza minimo recomendado'"></span>)
                    </span>
                </div>

                <h3 class="font-h3-card text-h3-card text-text-primary mb-4">Datos de entrada</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div>
                        <label class="block text-sm text-text-secondary mb-2">Producto</label>
                        <input class="w-full rounded-lg border-border" type="text" name="product_name" x-model="product_name" required>
                    </div>
                    <div>
                        <label class="block text-sm text-text-secondary mb-2">Costo de mercancia vendida</label>
                        <input class="w-full rounded-lg border-border" type="number" step="0.01" name="cmv" x-model.number="costo_mercancia_vendida" @input="recalc()" required>
                    </div>
                    <div>
                        <label class="block text-sm text-text-secondary mb-2">Costo de envio</label>
                        <input class="w-full rounded-lg border-border" type="number" step="0.01" x-model.number="shipping" @input="recalc()">
                    </div>
                    <div>
                        <label class="block text-sm text-text-secondary mb-2">Comision de plataforma</label>
                        <input class="w-full rounded-lg border-border" type="number" step="0.01" name="platform_cost" x-model.number="platform_cost" @input="recalc()">
                    </div>
                </div>

                <h3 class="font-h3-card text-h3-card text-text-primary mb-4">Resultados automaticos</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div><label class="block text-sm text-text-secondary mb-2">Costo de publicidad</label><input class="w-full rounded-lg border-border bg-slate-100" type="text" :value="formatCurrency(ads_cost)" readonly></div>
                    <div><label class="block text-sm text-text-secondary mb-2">Costo total por unidad</label><input class="w-full rounded-lg border-border bg-slate-100" type="text" :value="formatCurrency(total_unit_cost)" readonly><input type="hidden" name="total_unit_cost" :value="total_unit_cost"></div>
                    <div><label class="block text-sm text-text-secondary mb-2">Precio estimado</label><input class="w-full rounded-lg border-border bg-slate-100" type="text" :value="formatCurrency(estimated_price)" readonly><input type="hidden" name="estimated_price" :value="estimated_price"></div>
                    <div><label class="block text-sm text-text-secondary mb-2">Ganancia neta</label><input class="w-full rounded-lg border-border bg-slate-100" type="text" :value="formatCurrency(net_profit)" readonly><input type="hidden" name="net_profit" :value="net_profit"></div>
                    <div><label class="block text-sm text-text-secondary mb-2">Margen neto</label><input class="w-full rounded-lg border-border bg-slate-100" type="text" :value="formatPercent(net_margin)" readonly><input type="hidden" name="net_margin" :value="net_margin"></div>
                </div>

                <button class="inline-flex items-center justify-center rounded-lg px-6 py-3 text-white font-semibold bg-gradient-to-r from-violet-600 via-indigo-600 to-sky-500 hover:opacity-95" type="submit">Guardar evaluacion</button>
            </form>
        </section>

            </section>

            <section class="bg-white border border-border rounded-xl p-6 md:p-8 mt-10 shadow-[0_2px_8px_rgba(0,0,0,0.04)]">
                <h2 class="font-h3-card text-h3-card text-text-primary mb-4">Historial reciente</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                        <tr class="border-b border-border">
                            <th class="text-left py-3 pr-4">ID</th>
                            <th class="text-left py-3 pr-4">Producto</th>
                            <th class="text-left py-3 pr-4">Responsable</th>
                            <th class="text-left py-3 pr-4">Checklist</th>
                            <th class="text-left py-3 pr-4">Costo total</th>
                            <th class="text-left py-3 pr-4">Precio estimado</th>
                            <th class="text-left py-3 pr-4">Ganancia neta</th>
                            <th class="text-left py-3 pr-4">Margen</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($studies as $study): ?>
                            <tr class="border-b border-border-subtle">
                                <td class="py-3 pr-4"><?= htmlspecialchars((string) $study['id']) ?></td>
                                <td class="py-3 pr-4"><?= htmlspecialchars($study['product_name']) ?></td>
                                <td class="py-3 pr-4"><?= htmlspecialchars((string) ($study['owner_name'] ?? 'Sin dato')) ?></td>
                                <td class="py-3 pr-4"><?= htmlspecialchars((string) $study['checklist_score']) ?></td>
                                <td class="py-3 pr-4"><?= number_format((float) $study['total_unit_cost'], 2) ?></td>
                                <td class="py-3 pr-4"><?= number_format((float) $study['estimated_price'], 2) ?></td>
                                <td class="py-3 pr-4"><?= number_format((float) $study['net_profit'], 2) ?></td>
                                <td class="py-3 pr-4"><?= number_format(((float) $study['net_margin']) * 100, 2) ?>%</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>

    <section x-show="currentView === 'panel-usuario'" x-transition>
        <?php if (($user['role'] ?? '') === 'admin'): ?>
            <section class="bg-white border border-border rounded-xl p-6 md:p-8 shadow-[0_2px_8px_rgba(0,0,0,0.04)]" id="panel-usuario">
                <h2 class="font-h2-section text-h2-section text-text-primary mb-4">Panel de Usuario</h2>
                <div class="p-12 border-2 border-dashed border-border rounded-xl flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-4xl text-text-muted mb-4">manage_accounts</span>
                    <p class="text-text-secondary">Espacio para administrar usuarios (activación, desactivación y borrado).</p>
                    <p class="text-sm text-text-muted mt-2">Próximamente disponible.</p>
                </div>
            </section>
        <?php endif; ?>
    </section>
</main>

<script src="/assets/app.js"></script>
</body>
</html>
