function calculator() {
    const roundTo = (value, decimals) => {
        const factor = 10 ** decimals;
        return Math.round((Number(value) + Number.EPSILON) * factor) / factor;
    };

    return {
        currentView: 'dashboard',
        activeTool: null,
        product_name: '',
        checklist_score: 0,
        costo_mercancia_vendida: 60000,
        shipping: 16500,
        platform_cost: 0,
        ads_cost: 0,
        total_unit_cost: 0,
        estimated_price: 0,
        net_profit: 0,
        net_margin: 0,
        formatCurrency(value) {
            return new Intl.NumberFormat('es-CO', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(Number(value || 0));
        },
        formatPercent(value) {
            return new Intl.NumberFormat('es-CO', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(Number(value || 0) * 100) + '%';
        },
        checklistItems: [
            { question: 'El producto resuelve un beneficio emocional masivo', options: ['Poco', 'Normal', 'Mucho'], score: 0 },
            { question: 'El producto tiene una propuesta unica de ventas', options: ['Poco', 'Normal', 'Mucho'], score: 0 },
            { question: 'El producto es electrico o usa baterias', options: ['Si', 'No aplica', 'No'], score: 0 },
            { question: 'Lo venden reconocidas marcas nacionales', options: ['Si', 'No aplica', 'No'], score: 0 },
            { question: 'Posibilidades de vender en combinacion con otros productos', options: ['No', 'No aplica', 'Si'], score: 0 },
            { question: 'Es fragil', options: ['Mucho', 'Normal', 'No'], score: 0 },
            { question: 'Contiene liquidos', options: ['Si', 'Poco', 'No'], score: 0 },
            { question: 'Calificacion en Mercado Libre o Amazon', options: ['3.0 a 4.0', '4.0 a 4.5', '4.5 o mas'], score: 0 },
            { question: 'Requiere aprobacion de registro sanitario', options: ['Si', 'No aplica', 'No'], score: 0 },
            { question: 'Se vende en Mercado Libre hace mas de dos anos', options: ['2 a 3 anos', '3 a 4 anos', 'Mas de 4 anos'], score: 0 },
            { question: 'Se presta para crear marca y comunidad', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { question: 'Se presta para hacer video creativo', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { question: 'Otras marcas muestran anuncios robustos en Facebook', options: ['3 o mas', '1 o 2', 'No'], score: 0 },
            { question: 'Tiene alta oportunidad de recompra', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { question: 'Buena oportunidad de venta cruzada', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { question: 'Se presta para potenciales demandas', options: ['Mucho', 'Normal', 'No'], score: 0 },
            { question: 'Esta en categorias restringidas por plataformas', options: ['Si', 'No aplica', 'No'], score: 0 },
            { question: 'Requiere tallas o diferentes tipos para vender', options: ['Si', 'No aplica', 'No'], score: 0 }
        ],
        recalcChecklist() {
            this.checklist_score = this.checklistItems.reduce((sum, item) => sum + Number(item.score || 0), 0);
        },
        recalc() {
            // Replica el modelo del Excel:
            // costo_total = base + anuncios, anuncios = 15% del precio, precio = costo_total / 53%
            // Resolviendo:
            // precio = base / (0.53 - 0.15), donde base = costo de mercancia + envio + plataforma.
            const baseCost = this.costo_mercancia_vendida + this.shipping + this.platform_cost;
            const priceDenominator = 0.53 - 0.15;
            const estimatedPriceRaw = priceDenominator <= 0 ? 0 : baseCost / priceDenominator;
            const adsCostRaw = estimatedPriceRaw * 0.15;
            const totalUnitCostRaw = baseCost + adsCostRaw;
            const netProfitRaw = estimatedPriceRaw - totalUnitCostRaw;
            const netMarginRaw = estimatedPriceRaw === 0 ? 0 : netProfitRaw / estimatedPriceRaw;

            // Redondeo de campos calculados para mejorar legibilidad.
            this.estimated_price = roundTo(estimatedPriceRaw, 2);
            this.ads_cost = roundTo(adsCostRaw, 2);
            this.total_unit_cost = roundTo(totalUnitCostRaw, 2);
            this.net_profit = roundTo(netProfitRaw, 2);
            this.net_margin = roundTo(netMarginRaw, 4);
        },
        init() {
            this.recalcChecklist();
            this.recalc();
        }
    };
}
