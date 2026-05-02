<?php

declare(strict_types=1);

/**
 * Repositorio de persistencia para estudios cualitativos.
 * Centraliza SQL para mantener limpio el controlador/página.
 */
final class StudyRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    /**
     * Crea la tabla base si aún no existe.
     * Nota: se mantiene un SQL compatible con SQLite para el MVP.
     */
    public function migrate(): void
    {
        $this->pdo->exec(
            'CREATE TABLE IF NOT EXISTS tenants (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(120) NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $this->pdo->exec(
            'CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                tenant_id INTEGER NOT NULL,
                name VARCHAR(120) NOT NULL,
                email VARCHAR(180) NOT NULL UNIQUE,
                password_hash VARCHAR(255) NOT NULL,
                role VARCHAR(20) NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $this->pdo->exec(
            'CREATE TABLE IF NOT EXISTS qualitative_studies (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                tenant_id INTEGER NOT NULL DEFAULT 1,
                user_id INTEGER NOT NULL DEFAULT 1,
                product_name VARCHAR(150) NOT NULL,
                checklist_score INTEGER NOT NULL,
                cmv NUMERIC NOT NULL,
                total_unit_cost NUMERIC NOT NULL,
                estimated_price NUMERIC NOT NULL,
                net_profit NUMERIC NOT NULL,
                net_margin NUMERIC NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $this->pdo->exec(
            'CREATE TABLE IF NOT EXISTS login_testimonials (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                author_name VARCHAR(120) NOT NULL,
                author_role VARCHAR(120) NOT NULL,
                quote TEXT NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $this->ensureColumn('qualitative_studies', 'tenant_id', 'INTEGER NOT NULL DEFAULT 1');
        $this->ensureColumn('qualitative_studies', 'user_id', 'INTEGER NOT NULL DEFAULT 1');
        $this->seedDefaults();
    }

    /**
     * @param array<string, mixed> $study
     */
    public function create(array $study): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO qualitative_studies (
                tenant_id, user_id, product_name, checklist_score, cmv, total_unit_cost,
                estimated_price, net_profit, net_margin
            ) VALUES (
                :tenant_id, :user_id, :product_name, :checklist_score, :cmv, :total_unit_cost,
                :estimated_price, :net_profit, :net_margin
            )'
        );

        $stmt->execute([
            ':tenant_id' => $study['tenant_id'],
            ':user_id' => $study['user_id'],
            ':product_name' => $study['product_name'],
            ':checklist_score' => $study['checklist_score'],
            ':cmv' => $study['cmv'],
            ':total_unit_cost' => $study['total_unit_cost'],
            ':estimated_price' => $study['estimated_price'],
            ':net_profit' => $study['net_profit'],
            ':net_margin' => $study['net_margin'],
        ]);
    }

    /**
     * Retorna los últimos estudios guardados para la vista principal.
     *
     * @return array<int, array<string, mixed>>
     */
    public function latestForUser(array $user, int $limit = 10): array
    {
        if (($user['role'] ?? '') === 'admin') {
            $stmt = $this->pdo->prepare(
                'SELECT qs.*, u.name AS owner_name
                 FROM qualitative_studies qs
                 LEFT JOIN users u ON u.id = qs.user_id
                 WHERE qs.tenant_id = :tenant_id
                 ORDER BY qs.id DESC
                 LIMIT :limit'
            );
            $stmt->bindValue(':tenant_id', (int) $user['tenant_id'], PDO::PARAM_INT);
        } else {
            $stmt = $this->pdo->prepare(
                'SELECT qs.*, u.name AS owner_name
                 FROM qualitative_studies qs
                 LEFT JOIN users u ON u.id = qs.user_id
                 WHERE qs.tenant_id = :tenant_id AND qs.user_id = :user_id
                 ORDER BY qs.id DESC
                 LIMIT :limit'
            );
            $stmt->bindValue(':tenant_id', (int) $user['tenant_id'], PDO::PARAM_INT);
            $stmt->bindValue(':user_id', (int) $user['id'], PDO::PARAM_INT);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findUserByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare(
            'SELECT u.*, t.name AS tenant_name
             FROM users u
             LEFT JOIN tenants t ON t.id = u.tenant_id
             WHERE u.email = :email
             LIMIT 1'
        );
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();
        return $user === false ? null : $user;
    }

    public function randomLoginTestimonial(): ?array
    {
        $rows = $this->pdo
            ->query('SELECT id, author_name, author_role, quote FROM login_testimonials ORDER BY id ASC')
            ->fetchAll();

        if ($rows === []) {
            return null;
        }

        $index = random_int(0, count($rows) - 1);
        return $rows[$index];
    }

    private function seedDefaults(): void
    {
        $tenantCount = (int) $this->pdo->query('SELECT COUNT(*) FROM tenants')->fetchColumn();
        if ($tenantCount === 0) {
            $this->pdo->exec("INSERT INTO tenants (name) VALUES ('Portal del Estudiante - Demo')");
        }

        $userCount = (int) $this->pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
        if ($userCount === 0) {
            $tenantId = (int) $this->pdo->query('SELECT id FROM tenants ORDER BY id ASC LIMIT 1')->fetchColumn();

            $stmt = $this->pdo->prepare(
                'INSERT INTO users (tenant_id, name, email, password_hash, role)
                 VALUES (:tenant_id, :name, :email, :password_hash, :role)'
            );

            $stmt->execute([
                ':tenant_id' => $tenantId,
                ':name' => 'Administrador Demo',
                ':email' => 'admin@demo.local',
                ':password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
                ':role' => 'admin',
            ]);

            $stmt->execute([
                ':tenant_id' => $tenantId,
                ':name' => 'Estudiante Demo',
                ':email' => 'estudiante@demo.local',
                ':password_hash' => password_hash('estudiante123', PASSWORD_DEFAULT),
                ':role' => 'estudiante',
            ]);
        }

        $testimonialCount = (int) $this->pdo->query('SELECT COUNT(*) FROM login_testimonials')->fetchColumn();
        if ($testimonialCount > 0) {
            return;
        }

        $testimonialStmt = $this->pdo->prepare(
            'INSERT INTO login_testimonials (author_name, author_role, quote)
             VALUES (:author_name, :author_role, :quote)'
        );

        $defaults = [
            [
                'author_name' => 'Carlos M.',
                'author_role' => 'Escalo a 10k USD/mes',
                'quote' => 'La estructura y las herramientas de analisis cambiaron mis decisiones por completo.',
            ],
            [
                'author_name' => 'Andrea P.',
                'author_role' => 'Mentora de ecommerce',
                'quote' => 'Ahora evaluamos cada producto con datos antes de invertir, y el margen mejoro mucho.',
            ],
            [
                'author_name' => 'Juan S.',
                'author_role' => 'Estudiante avanzado',
                'quote' => 'La calculadora y el checklist me ahorran horas y reducen errores en cada lanzamiento.',
            ],
            [
                'author_name' => 'Valentina R.',
                'author_role' => 'Operaciones digitales',
                'quote' => 'El portal nos dio un proceso claro para aprobar productos con criterio financiero.',
            ],
        ];

        foreach ($defaults as $row) {
            $testimonialStmt->execute([
                ':author_name' => $row['author_name'],
                ':author_role' => $row['author_role'],
                ':quote' => $row['quote'],
            ]);
        }
    }

    private function ensureColumn(string $table, string $column, string $columnDefinition): void
    {
        $driver = $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        if ($driver !== 'sqlite') {
            return;
        }

        $columns = $this->pdo->query("PRAGMA table_info($table)")->fetchAll();
        foreach ($columns as $existingColumn) {
            if (($existingColumn['name'] ?? '') === $column) {
                return;
            }
        }

        $this->pdo->exec("ALTER TABLE $table ADD COLUMN $column $columnDefinition");
    }
}
