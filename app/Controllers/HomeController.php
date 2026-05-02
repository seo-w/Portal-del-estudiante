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

        $action = $_GET['action'] ?? '';

        if ($action === 'logout') {
            $this->logout();
            header('Location: /');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'login') {
            return $this->login();
        }

        $user = $this->currentUser();
        if ($user === null) {
            return [
                'view' => 'login',
                'error' => null,
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
        $email = trim($_POST['email'] ?? '');
        $password = (string) ($_POST['password'] ?? '');
        $user = $this->repo->findUserByEmail($email);

        if ($user === null || !password_verify($password, (string) $user['password_hash'])) {
            return [
                'view' => 'login',
                'error' => 'Credenciales invalidas. Verifica correo y contrasena.',
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

    private function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();
    }

    private function currentUser(): ?array
    {
        $user = $_SESSION['user'] ?? null;
        return is_array($user) ? $user : null;
    }
}
