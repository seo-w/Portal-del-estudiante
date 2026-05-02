<?php

declare(strict_types=1);

/**
 * Encapsula la conexión PDO para mantener el resto del proyecto
 * desacoplado del motor de base de datos.
 */
final class Database
{
    private PDO $pdo;

    /**
     * @param array<string, string> $config
     */
    public function __construct(array $config)
    {
        $driver = $config['driver'] ?? 'sqlite';

        if ($driver === 'sqlite') {
            $this->pdo = new PDO('sqlite:' . $config['database']);
        } else {
            $dsn = sprintf(
                '%s:host=%s;port=%s;dbname=%s;charset=utf8mb4',
                $driver,
                $config['host'],
                $config['port'],
                $config['database']
            );
            $this->pdo = new PDO($dsn, $config['username'], $config['password']);
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Expone la instancia PDO ya configurada.
     */
    public function pdo(): PDO
    {
        return $this->pdo;
    }
}
