<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ingreso - Portal del Estudiante</title>
    <link rel="stylesheet" href="/assets/app.css">
</head>
<body>
    <div class="login-card">
        <h1>Portal del Estudiante</h1>
        <p>Inicia sesion para acceder a tu organizacion.</p>

        <?php if (!empty($error)): ?>
            <p class="risk"><?= htmlspecialchars((string) $error) ?></p>
        <?php endif; ?>

        <form method="post" action="/?action=login">
            <label>Correo electronico</label>
            <input type="email" name="email" required>

            <label>Contrasena</label>
            <input type="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>

        <div class="help-box">
            <p><strong>Credenciales de prueba:</strong></p>
            <p>Administrador: admin@demo.local / admin123</p>
            <p>Estudiante: estudiante@demo.local / estudiante123</p>
        </div>
    </div>
</body>
</html>
