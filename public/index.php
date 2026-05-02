<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/Controllers/HomeController.php';

$controller = new HomeController();
$data = $controller->handleRequest();
$view = $data['view'] ?? 'home';

if ($view === 'login') {
    $error = $data['error'] ?? null;
    require_once __DIR__ . '/../app/Views/login.php';
    exit;
}

$user = $data['user'];
$studies = $data['studies'];
require_once __DIR__ . '/../app/Views/home.php';
