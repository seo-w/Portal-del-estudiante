function calculator() {
    const roundTo = (value, decimals) => {
        const factor = 10 ** decimals;
        return Math.round((Number(value) + Number.EPSILON) * factor) / factor;
    };

    return {
        currentView: 'dashboard',
        activeTool: null,
        currentStep: 1,
        isMobileMenuOpen: false,
        isUserModalOpen: false,
        isChatOpen: false,
        isTyping: false,
        chatMessages: [
            { role: 'assistant', content: '¡Hola! Soy tu asistente IA. ¿En qué puedo ayudarte con tu estudio cualitativo o financiero hoy?' }
        ],
        userMessage: '',
        newUser: {
            name: '',
            email: '',
            password: '',
            role: 'estudiante'
        },
        product_name: '',
        checklist_score: 0,
        costo_mercancia_vendida: 0,
        shipping: 0,
        platform_cost: 0,
        ads_cost: 0,
        total_unit_cost: 0,
        estimated_price: 0,
        net_profit: 0,
        net_margin: 0,
        formatCurrency(value) {
            return new Intl.NumberFormat('es-CO', {
                style: 'currency',
                currency: 'COP',
                minimumFractionDigits: 0
            }).format(Number(value || 0));
        },
        formatPercent(value) {
            return new Intl.NumberFormat('es-CO', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(Number(value || 0) * 100) + '%';
        },
        renderMarkdown(text) {
            if (!text) return '';
            // Basic Markdown to HTML
            let html = text
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>') // Bold
                .replace(/\*(.*?)\*/g, '<em>$1</em>') // Italics
                .replace(/^\* (.*?)$/gm, '<li>$1</li>') // List items
                .replace(/\n/g, '<br>'); // Line breaks
            
            if (html.includes('<li>')) {
                html = html.replace(/(<li>.*?<\/li>)/gs, '<ul class="list-disc pl-4 my-2">$1</ul>');
            }
            return html;
        },
        checklistItems: [
            { id: 1, category: 'Producto', question: 'El producto resuelve un beneficio emocional masivo', options: ['Poco', 'Normal', 'Mucho'], score: 0 },
            { id: 2, category: 'Producto', question: 'El producto tiene una propuesta unica de ventas', options: ['Poco', 'Normal', 'Mucho'], score: 0 },
            { id: 3, category: 'Riesgos', question: 'El producto es electrico o usa baterias', options: ['Si', 'No aplica', 'No'], score: 0 },
            { id: 4, category: 'Mercado', question: 'Lo venden reconocidas marcas nacionales', options: ['Si', 'No aplica', 'No'], score: 0 },
            { id: 5, category: 'Producto', question: 'Posibilidades de vender en combinacion con otros productos', options: ['No', 'No aplica', 'Si'], score: 0 },
            { id: 6, category: 'Riesgos', question: 'Es fragil', options: ['Mucho', 'Normal', 'No'], score: 0 },
            { id: 7, category: 'Riesgos', question: 'Contiene liquidos', options: ['Si', 'Poco', 'No'], score: 0 },
            { id: 8, category: 'Mercado', question: 'Calificacion en Mercado Libre o Amazon', options: ['3.0 a 4.0', '4.0 a 4.5', '4.5 o mas'], score: 0 },
            { id: 9, category: 'Riesgos', question: 'Requiere aprobacion de registro sanitario', options: ['Si', 'No aplica', 'No'], score: 0 },
            { id: 10, category: 'Mercado', question: 'Se vende en Mercado Libre hace mas de dos anos', options: ['2 a 3 anos', '3 a 4 anos', 'Mas de 4 anos'], score: 0 },
            { id: 11, category: 'Estrategia', question: 'Se presta para crear marca y comunidad', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { id: 12, category: 'Estrategia', question: 'Se presta para hacer video creativo', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { id: 13, category: 'Mercado', question: 'Otras marcas muestran anuncios robustos en Facebook', options: ['3 o mas', '1 o 2', 'No'], score: 0 },
            { id: 14, category: 'Estrategia', question: 'Tiene alta oportunidad de recompra', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { id: 15, category: 'Estrategia', question: 'Buena oportunidad de venta cruzada', options: ['No', 'Normal', 'Mucho'], score: 0 },
            { id: 16, category: 'Riesgos', question: 'Se presta para potenciales demandas', options: ['Mucho', 'Normal', 'No'], score: 0 },
            { id: 17, category: 'Riesgos', question: 'Esta en categorias restringidas por plataformas', options: ['Si', 'No aplica', 'No'], score: 0 },
            { id: 18, category: 'Riesgos', question: 'Requiere tallas o diferentes tipos para vender', options: ['Si', 'No aplica', 'No'], score: 0 }
        ],
        categories: ['Producto', 'Mercado', 'Riesgos', 'Estrategia'],
        get itemsByStep() {
            const category = this.categories[this.currentStep - 1];
            return this.checklistItems.filter(i => i.category === category);
        },
        studies: [],
        recalcChecklist() {
            this.checklist_score = this.checklistItems.reduce((sum, item) => sum + Number(item.score || 0), 0);
        },
        recalc() {
            // Formula corregida según Excel: Precio = CMV / 0.53
            const cmv = Number(this.costo_mercancia_vendida || 0);
            const shipping = Number(this.shipping || 0);
            const platform = Number(this.platform_cost || 0);
            
            const estimatedPriceRaw = 0.53 <= 0 ? 0 : cmv / 0.53;
            const adsCostRaw = estimatedPriceRaw * 0.15;
            const totalUnitCostRaw = cmv + adsCostRaw + shipping + platform;
            const netProfitRaw = estimatedPriceRaw - totalUnitCostRaw;
            const netMarginRaw = estimatedPriceRaw === 0 ? 0 : netProfitRaw / estimatedPriceRaw;

            this.estimated_price = roundTo(estimatedPriceRaw, 2);
            this.ads_cost = roundTo(adsCostRaw, 2);
            this.total_unit_cost = roundTo(totalUnitCostRaw, 2);
            this.net_profit = roundTo(netProfitRaw, 2);
            this.net_margin = roundTo(netMarginRaw, 4);
        },
        async saveStudy() {
            if (!this.product_name) {
                alert('Por favor ingresa el nombre del producto');
                return;
            }

            const formData = new FormData();
            formData.append('product_name', this.product_name);
            formData.append('checklist_score', this.checklist_score);
            formData.append('cmv', this.costo_mercancia_vendida);
            formData.append('shipping', this.shipping);
            formData.append('platform_cost', this.platform_cost);
            formData.append('total_unit_cost', this.total_unit_cost);
            formData.append('estimated_price', this.estimated_price);
            formData.append('net_profit', this.net_profit);
            formData.append('net_margin', this.net_margin);

            try {
                const response = await fetch('/?action=save_ajax', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();

                if (result.success) {
                    alert('¡Evaluación guardada con éxito!');
                    this.fetchStudies();
                } else {
                    alert('Error al guardar: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Hubo un error al conectar con el servidor');
            }
        },
        async fetchStudies() {
            try {
                const response = await fetch('/?action=get_studies');
                const result = await response.json();
                if (result.success) {
                    this.studies = result.data;
                }
            } catch (error) {
                console.error('Error fetching studies:', error);
            }
        },

        async registerUser() {
            try {
                const formData = new FormData();
                formData.append('name', this.newUser.name);
                formData.append('email', this.newUser.email);
                formData.append('password', this.newUser.password);
                formData.append('role', this.newUser.role);

                const response = await fetch('/?action=register_user', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();

                if (result.success) {
                    alert('Usuario registrado con éxito');
                    this.isUserModalOpen = false;
                    this.newUser = { name: '', email: '', password: '', role: 'estudiante' };
                    window.location.reload(); 
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Error registering user:', error);
            }
        },

        async toggleUserStatus(userId, currentStatus) {
            const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
            try {
                const response = await fetch(`/?action=update_user_status&id=${userId}&status=${newStatus}`);
                const result = await response.json();
                if (result.success) {
                    window.location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Error toggling status:', error);
            }
        },

        async deleteUser(userId) {
            if (!confirm('¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer.')) return;
            try {
                const response = await fetch(`/?action=delete_user&id=${userId}`);
                const result = await response.json();
                if (result.success) {
                    window.location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Error deleting user:', error);
            }
        },

        async sendMessage() {
            if (this.userMessage.trim() === '') return;
            
            const msg = this.userMessage;
            this.chatMessages.push({ role: 'user', content: msg });
            this.userMessage = '';
            this.isTyping = true;

            this.$nextTick(() => {
                const chatBox = document.getElementById('chat-container');
                if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
            });

            try {
                // Get context from current state
                const context = `Datos actuales: Producto: ${this.product_name}, Checklist: ${this.checklist_score}/54. CMV: ${this.costo_mercancia_vendida}. Precio Sugerido: ${this.estimated_price}. Margen: ${this.net_margin}.`;
                
                const response = await fetch('/?action=chat_proxy', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        messages: this.chatMessages.slice(-6), // last 6 messages
                        context: context,
                        view: 'qualitative_study'
                    })
                });
                
                const result = await response.json();
                this.isTyping = false;

                if (result.success) {
                    this.chatMessages.push({ role: 'assistant', content: result.content });
                } else {
                    this.chatMessages.push({ role: 'assistant', content: 'Error: ' + result.message });
                }

                this.$nextTick(() => {
                    const chatBox = document.getElementById('chat-container');
                    if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
                });
            } catch (error) {
                this.isTyping = false;
                console.error('Chat error:', error);
                this.chatMessages.push({ role: 'assistant', content: 'Error de conexión con el servidor.' });
            }
        },

        async saveSettings(event) {
            try {
                const formData = new FormData(event.target);
                const response = await fetch('/?action=save_settings', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if (result.success) {
                    alert('Configuración guardada correctamente');
                    window.location.reload();
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Error saving settings:', error);
            }
        },
        init() {
            this.recalcChecklist();
            this.recalc();
            this.fetchStudies();
        }
    };
}
