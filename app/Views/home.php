<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Portal del Estudiante - MVP</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="/assets/app.css">
</head>
<body x-data="calculator()">
    <h1>MVP - Estudio Cualitativo</h1>
    <p>Base actual: SQLite (lista para migrar a MySQL/PostgreSQL).</p>
    <div class="session-bar">
        <span>Organizacion: <strong><?= htmlspecialchars((string) $user['tenant_name']) ?></strong></span>
        <span>Usuario: <strong><?= htmlspecialchars((string) $user['name']) ?></strong> (<?= htmlspecialchars((string) $user['role']) ?>)</span>
        <a href="/?action=logout">Cerrar sesion</a>
    </div>

    <form method="post">
        <h2>1) Guia de evaluacion cualitativa</h2>
        <p>Selecciona una opcion por criterio. El puntaje total se calcula automaticamente.</p>
        <input type="hidden" name="checklist_score" :value="checklist_score">
        <div class="checklist">
            <template x-for="(item, index) in checklistItems" :key="index">
                <div class="checklist-item">
                    <label x-text="(index + 1) + '. ' + item.question"></label>
                    <select x-model.number="item.score" @change="recalcChecklist()">
                        <option :value="0">Seleccionar respuesta</option>
                        <option :value="1" x-text="'1 punto - ' + item.options[0]"></option>
                        <option :value="2" x-text="'2 puntos - ' + item.options[1]"></option>
                        <option :value="3" x-text="'3 puntos - ' + item.options[2]"></option>
                    </select>
                </div>
            </template>
        </div>
        <p>
            <strong>Puntaje total del checklist:</strong>
            <span x-text="checklist_score"></span> / 54
            <span :class="checklist_score >= 40 ? 'ok' : 'risk'">
                (<span x-text="checklist_score >= 40 ? 'Pasa minimo recomendado (40 o mas)' : 'No alcanza minimo recomendado (menos de 40)'"></span>)
            </span>
        </p>

        <h2>2) Datos que debes diligenciar</h2>
        <div class="grid">
            <div>
                <label>Producto</label>
                <input type="text" name="product_name" x-model="product_name" required>
            </div>
            <div>
                <label>Costo de mercancia vendida</label>
                <input type="number" step="0.01" name="cmv" x-model.number="costo_mercancia_vendida" @input="recalc()" required>
            </div>
            <div>
                <label>Costo de envio</label>
                <input type="number" step="0.01" x-model.number="shipping" @input="recalc()">
            </div>
            <div>
                <label>Costo por comision de plataforma de venta</label>
                <small>Ejemplo: comision de Mercado Libre, tienda en linea o pasarela de pago.</small>
                <input type="number" step="0.01" name="platform_cost" x-model.number="platform_cost" @input="recalc()">
            </div>
        </div>

        <h2>3) Valores que se calculan automaticamente</h2>
        <div class="grid">
            <div>
                <label>Costo de publicidad (15% del precio de venta)</label>
                <input type="text" :value="formatCurrency(ads_cost)" readonly>
            </div>
            <div>
                <label>Costo total por unidad</label>
                <input type="text" :value="formatCurrency(total_unit_cost)" readonly>
                <input type="hidden" name="total_unit_cost" :value="total_unit_cost">
            </div>
            <div>
                <label>Precio estimado (costo / 53%)</label>
                <input type="text" :value="formatCurrency(estimated_price)" readonly>
                <input type="hidden" name="estimated_price" :value="estimated_price">
            </div>
            <div>
                <label>Ganancia neta por unidad</label>
                <input type="text" :value="formatCurrency(net_profit)" readonly>
                <input type="hidden" name="net_profit" :value="net_profit">
            </div>
            <div>
                <label>Margen neto (%)</label>
                <input type="text" :value="formatPercent(net_margin)" readonly>
                <input type="hidden" name="net_margin" :value="net_margin">
            </div>
        </div>
        <button type="submit">Guardar evaluación</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Responsable</th>
                <th>Puntaje checklist</th>
                <th>Costo total</th>
                <th>Precio estimado</th>
                <th>Ganancia neta</th>
                <th>Margen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studies as $study): ?>
                <tr>
                    <td><?= htmlspecialchars((string) $study['id']) ?></td>
                    <td><?= htmlspecialchars($study['product_name']) ?></td>
                    <td><?= htmlspecialchars((string) ($study['owner_name'] ?? 'Sin dato')) ?></td>
                    <td><?= htmlspecialchars((string) $study['checklist_score']) ?></td>
                    <td><?= number_format((float) $study['total_unit_cost'], 2) ?></td>
                    <td><?= number_format((float) $study['estimated_price'], 2) ?></td>
                    <td><?= number_format((float) $study['net_profit'], 2) ?></td>
                    <td><?= number_format(((float) $study['net_margin']) * 100, 2) ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="/assets/app.js"></script>
</body>
</html>
