<?php

declare(strict_types=1);

/**
 * Carga variables desde un archivo .env ubicado en la raíz del proyecto.
 * No sobrescribe variables ya definidas en el entorno del sistema.
 */
function loadEnvFile(string $envPath): void
{
    if (!is_file($envPath)) {
        return;
    }

    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === '' || str_starts_with($trimmed, '#')) {
            continue;
        }

        $parts = explode('=', $trimmed, 2);
        if (count($parts) !== 2) {
            continue;
        }

        $key = trim($parts[0]);
        $value = trim($parts[1]);

        if ($key === '' || getenv($key) !== false) {
            continue;
        }

        putenv($key . '=' . $value);
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

/**
 * Obtiene una variable de entorno con fallback.
 */
function envValue(string $key, ?string $default = null): ?string
{
    $value = getenv($key);
    if ($value === false || $value === '') {
        return $default;
    }

    return $value;
}

/**
 * Retorna configuración de base de datos normalizada.
 * Permite intercambiar motor (sqlite/mysql/pgsql) sin tocar la lógica de negocio.
 */
function dbConfig(): array
{
    $driver = envValue('DB_DRIVER', 'sqlite');

    if ($driver === 'sqlite') {
        return [
            'driver' => 'sqlite',
            'database' => __DIR__ . '/../' . envValue('DB_DATABASE', 'storage/database/portal.sqlite'),
        ];
    }

    return [
        'driver' => $driver,
        'host' => envValue('DB_HOST', '127.0.0.1'),
        'port' => envValue('DB_PORT', '3306'),
        'database' => envValue('DB_NAME', 'portal_estudiante'),
        'username' => envValue('DB_USER', 'root'),
        'password' => envValue('DB_PASSWORD', ''),
    ];
}

loadEnvFile(__DIR__ . '/../.env');
