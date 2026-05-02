---
name: Academia Ecommerce 24/7
colors:
  surface: '#fcf8ff'
  surface-dim: '#dcd8e5'
  surface-bright: '#fcf8ff'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f5f2ff'
  surface-container: '#f0ecf9'
  surface-container-high: '#eae6f4'
  surface-container-highest: '#e4e1ee'
  on-surface: '#1b1b24'
  on-surface-variant: '#464555'
  inverse-surface: '#302f39'
  inverse-on-surface: '#f3effc'
  outline: '#777587'
  outline-variant: '#c7c4d8'
  surface-tint: '#4d44e3'
  primary: '#3525cd'
  on-primary: '#ffffff'
  primary-container: '#4f46e5'
  on-primary-container: '#dad7ff'
  inverse-primary: '#c3c0ff'
  secondary: '#006591'
  on-secondary: '#ffffff'
  secondary-container: '#39b8fd'
  on-secondary-container: '#004666'
  tertiary: '#7e3000'
  on-tertiary: '#ffffff'
  tertiary-container: '#a44100'
  on-tertiary-container: '#ffd2be'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#e2dfff'
  primary-fixed-dim: '#c3c0ff'
  on-primary-fixed: '#0f0069'
  on-primary-fixed-variant: '#3323cc'
  secondary-fixed: '#c9e6ff'
  secondary-fixed-dim: '#89ceff'
  on-secondary-fixed: '#001e2f'
  on-secondary-fixed-variant: '#004c6e'
  tertiary-fixed: '#ffdbcc'
  tertiary-fixed-dim: '#ffb695'
  on-tertiary-fixed: '#351000'
  on-tertiary-fixed-variant: '#7b2f00'
  background: '#fcf8ff'
  on-background: '#1b1b24'
  surface-variant: '#e4e1ee'
  bg-page: '#FFFFFF'
  bg-surface: '#F8F9FB'
  bg-subtle: '#F1F3F7'
  border: '#E2E8F0'
  border-subtle: '#F1F5F9'
  text-primary: '#0F172A'
  text-secondary: '#475569'
  text-muted: '#94A3B8'
  accent-violet: '#7C3AED'
  accent-success: '#10B981'
  accent-warning: '#F59E0B'
  accent-danger: '#EF4444'
  gradient-text: 'linear-gradient(135deg, #5B21B6 0%, #4F46E5 50%, #0EA5E9 100%)'
  gradient-cta: 'linear-gradient(135deg, #5B21B6, #4F46E5, #0EA5E9)'
typography:
  h1-hero:
    fontFamily: Plus Jakarta Sans
    fontSize: 60px
    fontWeight: '800'
    lineHeight: '1.2'
    letterSpacing: -0.04em
  h1-page:
    fontFamily: Plus Jakarta Sans
    fontSize: 42px
    fontWeight: '800'
    lineHeight: '1.2'
    letterSpacing: -0.03em
  h2-section:
    fontFamily: Plus Jakarta Sans
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.3'
    letterSpacing: -0.02em
  h3-card:
    fontFamily: Plus Jakarta Sans
    fontSize: 20px
    fontWeight: '600'
    lineHeight: '1.4'
    letterSpacing: -0.01em
  body-lead:
    fontFamily: Manrope
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.7'
  body-base:
    fontFamily: Manrope
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  ui-label:
    fontFamily: Manrope
    fontSize: 13px
    fontWeight: '500'
    lineHeight: '1'
    letterSpacing: 0.06em
  data-mono:
    fontFamily: Space Grotesk
    fontSize: 14px
    fontWeight: '500'
    letterSpacing: 0.01em
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  container-max: 1280px
  gutter-desktop: 24px
  gutter-mobile: 16px
  grid-gap-lg: 24px
  grid-gap-md: 20px
  sidebar-width: 260px
  header-height: 64px
---

# 🎓 Design System — Academia Ecommerce 24/7
### *"El hijo de Udacity y Stripe"* — Plataforma educativa para importaciones y dropshipping

---

## 🧬 ADN Visual Real de la Plataforma

Ambas plataformas son **light mode**. Ese es el punto de partida fundamental.

- **Udacity** aporta: fondos blancos y gris muy claro, navy profundo para headings, azul-teal como color de acción, estructura de dashboard educativo, cards de cursos con thumbnails y progress bars, sidebar de navegación limpia
- **Stripe** aporta: blanco puro como base, los famosos **mesh gradients** (morado/rosa/azul/cyan) usados como decoración y atmosfera — nunca como fondo completo, tipografía con espaciado quirúrgico, sombras extremadamente sutiles, formularios perfectamente proporcionados

**El resultado:** Una academia que se lee clara y profesional como Udacity, pero que en los momentos hero y de destaque tiene la magia atmosférica de Stripe. Nunca oscura. Siempre legible. Con momentos de color controlados y precisos.

---

## 🎨 Paleta de Color

### Fondos Base (Light — Herencia real de ambas)
```
--bg-page:       #FFFFFF   /* Fondo de página — blanco puro (Stripe) */
--bg-surface:    #F8F9FB   /* Cards, panels, zonas secundarias (Udacity) */
--bg-subtle:     #F1F3F7   /* Hover en tablas, inputs inactivos */
--border:        #E2E8F0   /* Divisores, bordes de cards */
--border-subtle: #F1F5F9   /* Separadores muy suaves */
```

### Gradientes Mesh (Herencia Stripe — Solo decorativos)
```
/* Hero principal — va DETRÁS del contenido, como atmosfera */
--gradient-hero-bg:
  radial-gradient(ellipse at 20% 50%, rgba(124,58,237,0.10) 0%, transparent 55%),
  radial-gradient(ellipse at 80% 20%, rgba(6,182,212,0.12) 0%, transparent 50%),
  radial-gradient(ellipse at 60% 90%, rgba(236,72,153,0.07) 0%, transparent 50%),
  #FFFFFF;

/* Secciones de destacado / features */
--gradient-section:
  radial-gradient(ellipse at 90% 10%, rgba(99,102,241,0.08) 0%, transparent 60%),
  #F8F9FB;

/* Botón primario */
--gradient-cta: linear-gradient(135deg, #5B21B6, #4F46E5, #0EA5E9);

/* Texto hero con gradiente (solo para H1 destacado) */
--gradient-text: linear-gradient(135deg, #5B21B6 0%, #4F46E5 50%, #0EA5E9 100%);
```

### Colores de Acento
```
--accent-primary:   #4F46E5   /* Indigo — acción principal (hereda azul Udacity elevado) */
--accent-secondary: #0EA5E9   /* Cyan — highlights, íconos de herramientas */
--accent-violet:    #7C3AED   /* Violeta — decoración Stripe-style */
--accent-success:   #10B981   /* Emerald — completado, ganancias, validación */
--accent-warning:   #F59E0B   /* Amber — en progreso, alertas */
--accent-danger:    #EF4444   /* Red — errores */
```

### Texto (sobre fondos claros)
```
--text-primary:   #0F172A   /* Headings — navy profundo, herencia Udacity */
--text-secondary: #475569   /* Cuerpo, subtítulos */
--text-muted:     #94A3B8   /* Metadata, labels secundarios */
--text-accent:    #4F46E5   /* Links, CTAs inline */
```

> **Regla de uso del color:** Los gradientes mesh van en zonas hero y de features, siempre con opacidad muy baja (7-12%). El 80% de la interfaz es blanco + navy + gris claro. El color es un invitado especial, no el anfitrión.

---

## 🔤 Tipografía

### Stack Tipográfico
```css
/* Display — H1, H2 heroicos */
font-family: 'Plus Jakarta Sans', sans-serif;
/* https://fonts.google.com/specimen/Plus+Jakarta+Sans */

/* Body — Texto corrido, UI, formularios */
font-family: 'DM Sans', sans-serif;
/* https://fonts.google.com/specimen/DM+Sans */

/* Mono — Datos, precios, estadísticas, código */
font-family: 'JetBrains Mono', monospace;
```

### Escala y Pesos
```
H1 Hero:      60px / 800 / letter-spacing: -0.04em / color: --text-primary (o gradiente)
H1 Página:    42px / 800 / letter-spacing: -0.03em / color: --text-primary
H2 Sección:   32px / 700 / letter-spacing: -0.02em / color: --text-primary
H3 Card:      20px / 600 / letter-spacing: -0.01em
Body Lead:    18px / 400 / line-height: 1.7     / color: --text-secondary
Body Base:    16px / 400 / line-height: 1.6     / color: --text-secondary
Label/UI:     13px / 500 / letter-spacing: 0.06em uppercase / color: --text-muted
Mono/Datos:   14px / 500 / letter-spacing: 0.01em
```

---

## 📐 Layout y Espaciado

### Grid
```
Contenedor máximo:  1280px (padding 24px lateral en desktop, 16px en mobile)
Grid de features:   3 columnas en desktop | 2 en tablet | 1 en mobile | gap: 24px
Grid de cursos:     3 columnas en desktop | 2 en tablet | 1 en mobile | gap: 20px
Sidebar portal:     260px fijo + main fluido
```

### Bordes y Sombras (estilo Stripe — muy sutiles)
```css
/* Sombra base de cards */
box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);

/* Sombra hover / elevación media */
box-shadow: 0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.04);

/* Sombra especial para hero screenshot / mockup flotante */
box-shadow: 0 30px 80px rgba(15,23,42,0.12), 0 0 0 1px rgba(15,23,42,0.04);

/* Borde standard de cards */
border: 1px solid --border (#E2E8F0)

/* Borde con acento sutil */
border: 1px solid rgba(79,70,229,0.2)
```

---

## 🧩 Componentes Clave

### 1. Navigation (Header — Herencia Udacity)
```
Fondo:         #FFFFFF con border-bottom: 1px solid --border
Sticky:        sí, con backdrop-filter: blur(8px) al hacer scroll
Altura:        64px

Estructura:
[Logo]  [Cursos ▾]  [Herramientas ▾]  [Comunidad]  →  [Iniciar sesión]  [Entrar →]

- Logo: Plus Jakarta Sans 700, navy + símbolo
- Links nav: 15px, DM Sans 500, --text-secondary → hover: --text-primary
- CTA primario: botón con gradiente (morado→indigo→cyan), border-radius 8px
- CTA secundario: solo texto con flecha →
```

### 2. Sidebar del Portal (post-login — Herencia Udacity fuerte)
```
Fondo:         --bg-surface (#F8F9FB)
Borde derecho: 1px solid --border
Ancho:         260px

Secciones:
├── Logo + nombre del estudiante (avatar 32px)
├── "Aprendizaje"
│   ├── Dashboard
│   ├── Mis Cursos
│   └── Mi Progreso
├── "Herramientas"
│   ├── 🔬 Estudio Cualitativo
│   ├── 💰 Estudio Financiero
│   └── 🎨 Creador de Creativos
└── Perfil / Cerrar sesión

Nav item activo:
  - Fondo: #FFFFFF con sombra: 0 1px 3px rgba(0,0,0,0.08)
  - Borde izquierdo: 3px solid --accent-primary
  - Texto: --text-primary, font-weight 600
  - Ícono: --accent-secondary
```

### 3. Hero Section (Landing — ADN Stripe dominante)
```
Fondo: --gradient-hero-bg (blanco con mesh muy sutil)
Layout: centrado o 2 columnas

Elementos:
- Badge pill superior:
  → fondo: rgba(79,70,229,0.08) | borde: rgba(79,70,229,0.2)
  → texto: indigo | "✦ Academia #1 en Importaciones CO/MX"

- H1 (60px, 800, Plus Jakarta Sans):
  → Primera línea en navy puro: "Importa. Vende."
  → Segunda línea con gradiente de texto (--gradient-text): "Escala."
  → O bien H1 completo alternando: "Tu academia de" [navy] + "ecommerce real" [gradiente]

- Subtítulo (18px, DM Sans, --text-secondary):
  Máximo 2 líneas. Concreto, sin jerga.

- CTAs:
  → Primario: gradiente morado→indigo→cyan, texto blanco, padding 14px 28px, radius 8px
  → Secundario: borde 1px --border, texto --text-secondary, fondo blanco, hover: fondo --bg-surface

- Stats row (3 métricas en JetBrains Mono):
  "2,400+" estudiantes | "97%" completaron su 1ra importación | "4.9★" rating
  Divisores verticales en --border

- Visual / Screenshot del dashboard:
  → Flotando con la sombra grande: 0 30px 80px rgba(15,23,42,0.12)
  → Borde: 1px solid --border
  → Border-radius: 12px
  → Ligera rotación: perspective(1000px) rotateY(-8deg)
```

### 4. Cards de Curso (Herencia Udacity directa)
```
Fondo:        #FFFFFF
Borde:        1px solid --border
Border-radius: 10px
Sombra base:  sutil (0 1px 3px rgba...)
Hover:        translateY(-2px) + sombra mayor + borde rgba(79,70,229,0.2)

Anatomía:
├── Thumbnail: 180px alto, border-radius 8px 8px 0 0
│   └── Badge categoría (top-left): pill blanco con texto navy
├── Cuerpo (padding 20px)
│   ├── Instructor: avatar 20px + nombre 13px --text-muted
│   ├── Título: 18px, 600, --text-primary
│   ├── Descripción: 14px, --text-secondary, 2 líneas max
│   ├── Progress bar (si matriculado):
│   │   → Track: --bg-subtle | Fill: gradiente indigo→cyan
│   │   → "67% completado" en mono 12px --text-muted
│   └── Footer: duración | lecciones | nivel
│       → Separados por "·" | 13px --text-muted
```

### 5. KPI Cards del Dashboard (Herencia Stripe)
```
Fondo:        #FFFFFF
Borde:        1px solid --border
Sombra:       sutil
Border-radius: 10px
Padding:      24px

Anatomía:
├── Ícono (top-right): 36x36px
│   → Fondo: rgba del acento al 10%
│   → Ícono: color acento, 20px
├── Número (36px, Plus Jakarta Sans 700):
│   → Color según tipo: success=emerald | neutral=navy | negativo=red
├── Label (12px, uppercase, letter-spacing 0.08em, --text-muted)
└── Delta "+12.4% este mes" (13px)
    → ↑ verde | ↓ rojo | → gris
    → Fondo pill muy sutil del mismo color
```

### 6. Cards de Herramientas
```
Estas son más grandes y prominentes que las cards de curso.

Fondo:        #FFFFFF
Borde:        1px solid --border
Border-radius: 16px
Padding:      32px

Diferenciación por herramienta:
  → Estudio Cualitativo:  acento indigo, ícono 🔬
  → Estudio Financiero:   acento emerald, ícono 💰
  → Creador de Creativos: acento cyan, ícono 🎨

Anatomía:
├── Ícono grande: 56x56px, fondo rgba(acento, 0.1), radius 14px
├── Badge "Incluido en tu plan": pill pequeño top-right, fondo surface, texto success
├── Título (20px, 700, --text-primary)
├── Descripción (15px, --text-secondary, 3 líneas)
├── Lista de 3 features con checkmark en acento propio
└── CTA "Abrir herramienta →":
    → Texto en color acento propio + font-weight 600
    → En hover: background surface del acento, sin borde externo

Efecto hover de la card completa:
  → sombra mayor
  → un hilo de color del acento aparece como top-border: 3px solid (acento)
  → translateY(-2px)
```

### 7. Login / Auth (Herencia Stripe dominante)
```
Layout: 50/50 en desktop | solo derecha (form) en mobile

Lado izquierdo (decorativo):
├── Fondo: --gradient-hero-bg (el mismo mesh del hero)
├── Logo centrado arriba
├── Cita de estudiante real con avatar + nombre + resultado
├── 3 logos de plataformas aliadas (Alibaba, Shopify, Meta) en row
└── Stat grande: "Tu próxima importación empieza aquí"
    → Número en gradiente de texto + descripción en --text-secondary

Lado derecho (funcional):
├── Fondo: #FFFFFF
├── Logo pequeño centrado
├── H2 (24px): "Continúa aprendiendo"
├── Subtítulo (15px, --text-secondary): "Accede a tu portal"
├── Inputs (Float label pattern — estilo Stripe):
│   → Fondo: --bg-surface | Borde: --border
│   → Focus: borde --accent-primary + box-shadow: 0 0 0 3px rgba(79,70,229,0.1)
│   → Label se mueve arriba al enfocar (transición suave)
├── Botón submit: full-width, gradiente, 48px alto, radius 8px
├── "¿Olvidaste tu contraseña?" — link 14px --text-accent
├── Divisor "——— o ———" en --text-muted
└── Google SSO: botón blanco, borde --border, ícono Google + texto 15px navy
```

---

## ✨ Motion y Micro-interacciones

### Principios (ADN Stripe)
```
Duración corta:  150-200ms — hover, focus, toggles
Duración media:  300-400ms — modales, dropdowns, transiciones
Duración larga:  500-700ms — entrada de secciones en scroll
Easing suave:    cubic-bezier(0.16, 1, 0.3, 1)
```

### Efectos Específicos

**Focus ring (Stripe-style, no el default del browser):**
```css
box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
border-color: #4F46E5;
```

**Entrada de secciones en scroll:**
```css
/* Elementos entran desde abajo con fade */
opacity: 0;
transform: translateY(20px);
transition: opacity 0.5s ease, transform 0.5s ease;
/* Al ser visible: opacity: 1, transform: translateY(0) */
```

**Badge / pill animado (como Stripe en su hero):**
```css
/* El badge del hero tiene un shimmer sutil */
background: linear-gradient(90deg,
  rgba(79,70,229,0.06) 25%,
  rgba(79,70,229,0.12) 50%,
  rgba(79,70,229,0.06) 75%);
```

---

## 🗂️ Mapa de Pantallas

| Pantalla | Descripción | ADN Dominante |
|----------|-------------|---------------|
| **Home / Landing** | Hero con mesh gradient + features + testimonios + CTA | Stripe 60% + Udacity 40% |
| **Login** | 50/50: decorativo con mesh izquierda + form derecha | Stripe 80% |
| **Dashboard** | Sidebar + KPIs + cursos en progreso | Udacity 70% + Stripe 30% |
| **Mis Cursos** | Grid de course cards + filtros top | Udacity 90% |
| **Módulo de Curso** | Video + sidebar de lecciones + progreso | Udacity 95% |
| **Estudio Cualitativo** | Formulario + resultados + tabla | Stripe 70% |
| **Estudio Financiero** | KPI cards + calculadora + gráficas | Stripe 80% |
| **Creador de Creativos IA** | Editor canvas + galería + controles | Híbrido propio |
| **Perfil del Estudiante** | Logros + certificados + historial | Udacity 65% |

---

## 🎯 Prompt Corregido para Stitch

```
Diseña el portal del estudiante para "Club Ecommerce 24/7",
una academia de importaciones y dropshipping como marca personal.

MODO: Light mode exclusivamente — fondos blancos y gris muy claro.

REFERENCIAS VISUALES EXACTAS:
- Estructura y UI educativa: udacity.com (sidebar, course cards, progress bars, 
  tipografía navy bold sobre blanco)
- Acabado y atmósfera: stripe.com/es (mesh gradients en morado/cyan como decoración 
  en secciones hero, sombras ultra-sutiles, formularios perfectamente proporcionados, 
  tipografía con tracking preciso)

PALETA:
- Fondos: #FFFFFF (páginas) / #F8F9FB (cards y panels)
- Headings: #0F172A (navy profundo)
- Acento primario: #4F46E5 (indigo)
- Acento secundario: #0EA5E9 (cyan)
- Success: #10B981 (emerald)
- Gradiente de texto para H1 hero: de #7C3AED a #0EA5E9

TIPOGRAFÍA: Plus Jakarta Sans (headings) + DM Sans (body)

PANTALLAS A DISEÑAR:
1. Home/Landing — Hero con mesh gradient muy sutil sobre blanco, badge pill animado, 
   H1 con gradiente de texto, screenshot del dashboard flotando con sombra dramática
2. Login — Pantalla dividida: izquierda con mesh gradient + testimonial, 
   derecha form limpio con float labels + Google SSO
3. Dashboard del estudiante — Sidebar 260px sobre fondo #F8F9FB + 
   KPI cards blancas + grid de cursos en progreso con progress bars
4. Pantalla de Herramientas — 3 cards grandes para Estudio Cualitativo, 
   Estudio Financiero, Creador de Creativos con IA
5. Vista de módulo de curso — Video player + sidebar de lecciones con checkmarks

El diseño debe verse como si Udacity y Stripe co-diseñaran una academia 
latinoamericana de ecommerce. Limpio, premium, legible.
```

---

## 💡 Recomendaciones Finales

1. **Adjunta screenshots reales** de udacity.com y stripe.com/es en Stitch — el modelo visual supera al texto
2. **Diseña pantalla por pantalla** comenzando con el Dashboard — es el ancla del sistema
3. **El mesh gradient solo en 2 lugares:** hero de la landing y lado decorativo del login
4. **Para diferenciarte:** considera un tercer color de firma personal, ya sea coral `#FF6B6B` o lime `#84CC16` — diferente al preset Stripe
5. **El Creador de Creativos** es tu killer feature — dale su propio color (cyan dominante) y trátalo casi como un producto aparte dentro de la plataforma

---

*Sistema de diseño v2.0 — Academia Ecommerce 24/7 — Mayo 2026*
