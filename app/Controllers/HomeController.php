<?php

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../StudyRepository.php';

/**
 * Controlador principal del MVP.
 * Maneja lectura de formulario, persistencia y carga de datos para la vista.
 */
final class HomeController
{
    private StudyRepository $repo;

    public function __construct()
    {
        $db = new Database(dbConfig());
        $this->repo = new StudyRepository($db->pdo());
        $this->repo->migrate();
    }

    public function handleRequest(): array
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $action = $_GET['action'] ?? '';

        if ($action === 'logout') {
            $this->logout();
            header('Location: /');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'login') {
            return $this->login();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'save_ajax') {
            $this->saveAjax();
            exit;
        }

        if ($action === 'get_studies') {
            $this->getStudiesJson();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'register_user') {
            $this->registerUser();
            exit;
        }

        if ($action === 'update_user_status') {
            $this->updateUserStatus();
            exit;
        }

        if ($action === 'delete_user') {
            $this->deleteUser();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'save_settings') {
            $this->saveSettings();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'chat_proxy') {
            $this->chatProxy();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'test_db_connection') {
            $this->testDbConnection();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'migrate_db') {
            $this->migrateDb();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'reset_db') {
            $this->resetDb();
            exit;
        }

        $user = $this->currentUser();
        if ($user === null) {
            return [
                'view' => 'login',
                'error' => null,
                'testimonial' => $this->repo->randomLoginTestimonial(),
            ];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->storeStudy();
            header('Location: /');
            exit;
        }

        return [
            'view' => 'home',
            'user' => $user,
            'studies' => $this->repo->latestForUser($user),
            'users' => $this->repo->allUsersByTenant((int) $user['tenant_id']),
            'settings' => $this->repo->getSettings((int) $user['tenant_id']),
            'db_config' => dbConfig(),
        ];
    }

    private function storeStudy(): void
    {
        $user = $this->currentUser();
        if ($user === null) {
            return;
        }

        $productName = trim($_POST['product_name'] ?? '');
        if ($productName === '') {
            $productName = 'Sin nombre';
        }

        $this->repo->create([
            'tenant_id' => (int) $user['tenant_id'],
            'user_id' => (int) $user['id'],
            'product_name' => $productName,
            'checklist_score' => (int) ($_POST['checklist_score'] ?? 0),
            'cmv' => (float) ($_POST['cmv'] ?? 0),
            'total_unit_cost' => (float) ($_POST['total_unit_cost'] ?? 0),
            'estimated_price' => (float) ($_POST['estimated_price'] ?? 0),
            'net_profit' => (float) ($_POST['net_profit'] ?? 0),
            'net_margin' => (float) ($_POST['net_margin'] ?? 0),
        ]);
    }

    private function login(): array
    {
        $csrfToken = $_POST['csrf_token'] ?? '';
        if ($csrfToken === '' || $csrfToken !== ($_SESSION['csrf_token'] ?? '')) {
            return [
                'view' => 'login',
                'error' => 'Error de seguridad (CSRF). Por favor intenta de nuevo.',
                'testimonial' => $this->repo->randomLoginTestimonial(),
            ];
        }

        $email = trim($_POST['email'] ?? '');
        $password = (string) ($_POST['password'] ?? '');
        $user = $this->repo->findUserByEmail($email);

        if ($user === null || !password_verify($password, (string) $user['password_hash'])) {
            return [
                'view' => 'login',
                'error' => 'Credenciales invalidas. Verifica correo y contrasena.',
                'testimonial' => $this->repo->randomLoginTestimonial(),
            ];
        }

        $_SESSION['user'] = [
            'id' => (int) $user['id'],
            'tenant_id' => (int) $user['tenant_id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'tenant_name' => $user['tenant_name'] ?? 'Sin organizacion',
        ];

        header('Location: /');
        exit;
    }

    private function saveAjax(): void
    {
        header('Content-Type: application/json');
        try {
            $this->storeStudy();
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function getStudiesJson(): void
    {
        header('Content-Type: application/json');
        $user = $this->currentUser();
        if ($user === null) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }
        $studies = $this->repo->latestForUser($user);
        echo json_encode(['success' => true, 'data' => $studies]);
    }

    private function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();
    }

    private function registerUser(): void
    {
        header('Content-Type: application/json');
        $user = $this->currentUser();
        if ($user === null || ($user['role'] ?? '') !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'estudiante';

        if ($email === '' || $name === '' || $password === '') {
            echo json_encode(['success' => false, 'message' => 'Faltan datos']);
            return;
        }

        try {
            $this->repo->createUser([
                'tenant_id' => (int) $user['tenant_id'],
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
                'status' => 'active'
            ]);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error al registrar: ' . $e->getMessage()]);
        }
    }

    private function updateUserStatus(): void
    {
        header('Content-Type: application/json');
        $user = $this->currentUser();
        if ($user === null || ($user['role'] ?? '') !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        $targetId = (int) ($_GET['id'] ?? 0);
        $status = $_GET['status'] ?? 'active';

        try {
            $this->repo->updateUserStatus($targetId, (int) $user['tenant_id'], $status);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function deleteUser(): void
    {
        header('Content-Type: application/json');
        $user = $this->currentUser();
        if ($user === null || ($user['role'] ?? '') !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        $targetId = (int) ($_GET['id'] ?? 0);
        if ($targetId === (int) $user['id']) {
            echo json_encode(['success' => false, 'message' => 'No puedes borrarte a ti mismo']);
            return;
        }

        try {
            $this->repo->deleteUser($targetId, (int) $user['tenant_id']);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function saveSettings(): void
    {
        header('Content-Type: application/json');
        $user = $this->currentUser();
        if ($user === null || ($user['role'] ?? '') !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        foreach ($_POST as $key => $value) {
            $this->repo->saveSetting((int) $user['tenant_id'], $key, $value);
        }

        echo json_encode(['success' => true]);
    }

    private function chatProxy(): void
    {
        header('Content-Type: application/json');
        $user = $this->currentUser();
        if ($user === null) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        $settings = $this->repo->getSettings((int) $user['tenant_id']);
        $groqKey = $settings['groq_api_key'] ?? '';

        if ($groqKey === '') {
            echo json_encode(['success' => false, 'message' => 'Configuración de IA no encontrada']);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $messages = $input['messages'] ?? [];
        $context = $input['context'] ?? '';
        $view = $input['view'] ?? 'qualitative_study';

        // Get view-specific system prompt or fallback
        $systemPromptKey = $view . '_system_prompt';
        $systemMsg = $settings[$systemPromptKey] ?? 'Eres un experto en ecommerce y finanzas. Ayuda al estudiante.';
        
        $systemMsg .= "\n\nDatos actuales del producto:\n" . $context;
        
        array_unshift($messages, ['role' => 'system', 'content' => $systemMsg]);

        $url = 'https://api.groq.com/openai/v1/chat/completions';
        $data = [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => $messages,
            'temperature' => 0.7,
            'max_tokens' => 1024
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $groqKey,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo json_encode(['success' => false, 'message' => curl_error($ch)]);
            return;
        }
        curl_close($ch);

        $result = json_decode($response, true);
        if (isset($result['choices'][0]['message']['content'])) {
            echo json_encode(['success' => true, 'content' => $result['choices'][0]['message']['content']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error de Groq: ' . ($result['error']['message'] ?? 'Unknown error')]);
        }
    }

    private function testDbConnection(): void
    {
        $input = json_decode(file_get_contents('php://input'), true);
        try {
            new Database($input);
            echo json_encode(['success' => true, 'message' => 'Conexión exitosa.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $e->getMessage()]);
        }
    }

    private function migrateDb(): void
    {
        $input = json_decode(file_get_contents('php://input'), true);
        try {
            // 1. Exportar datos de SQLite (conexión actual)
            $oldData = $this->repo->exportAllData();

            // 2. Probar y conectar a la nueva DB
            $newDb = new Database($input);
            $newRepo = new StudyRepository($newDb->pdo());

            // 3. Crear tablas en la nueva DB
            $newRepo->resetTables();

            // 4. Importar datos
            $newRepo->importAllData($oldData);

            // 5. Guardar nueva config en .env
            $this->saveToEnv($input);

            echo json_encode(['success' => true, 'message' => 'Migración completada con éxito. El sistema ahora usa la nueva base de datos.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error durante la migración: ' . $e->getMessage()]);
        }
    }

    private function resetDb(): void
    {
        try {
            $this->repo->resetTables();
            echo json_encode(['success' => true, 'message' => 'Base de datos inicializada correctamente.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error al resetear: ' . $e->getMessage()]);
        }
    }

    private function saveToEnv(array $config): void
    {
        $envPath = __DIR__ . '/../../.env';
        $content = "DB_DRIVER=" . ($config['driver'] ?? 'mysql') . "\n";
        $content .= "DB_HOST=" . ($config['host'] ?? '127.0.0.1') . "\n";
        $content .= "DB_PORT=" . ($config['port'] ?? '3306') . "\n";
        $content .= "DB_NAME=" . ($config['database'] ?? '') . "\n";
        $content .= "DB_USER=" . ($config['username'] ?? '') . "\n";
        $content .= "DB_PASSWORD=" . ($config['password'] ?? '') . "\n";
        
        file_put_contents($envPath, $content);
    }

    private function currentUser(): ?array
    {
        $user = $_SESSION['user'] ?? null;
        return is_array($user) ? $user : null;
    }
}
