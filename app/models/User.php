<?php

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    // برای Auth
    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM users WHERE email = :email AND is_active = 1 LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function findById(int $id): ?array
    {
        $sql = "SELECT * FROM users WHERE id = :id AND is_active = 1 LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    // ====== CRUD مدیریتی ======

    public function getAll(): array
    {
        $sql = "SELECT id, name, email, role, hourly_rate, is_active, created_at
                FROM users
                ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO users (name, email, password_hash, role, hourly_rate, is_active)
                VALUES (:name, :email, :password_hash, :role, :hourly_rate, 1)";

        $stmt = $this->db->prepare($sql);

        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

        return $stmt->execute([
            ':name'          => $data['name'],
            ':email'         => $data['email'],
            ':password_hash' => $passwordHash,
            ':role'          => $data['role'],
            ':hourly_rate'   => $data['hourly_rate'],
        ]);
    }

    public function update(int $id, array $data): bool
    {
        // اگر پسورد جدید وارد شده بود
        if (!empty($data['password'])) {

            $sql = "UPDATE users
                    SET name = :name,
                        email = :email,
                        role = :role,
                        hourly_rate = :hourly_rate,
                        password_hash = :password_hash
                    WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

            return $stmt->execute([
                ':name'          => $data['name'],
                ':email'         => $data['email'],
                ':role'          => $data['role'],
                ':hourly_rate'   => $data['hourly_rate'],
                ':password_hash' => $passwordHash,
                ':id'            => $id,
            ]);
        }

        // اگر پسورد جدید وارد نشده بود
        $sql = "UPDATE users
                SET name = :name,
                    email = :email,
                    role = :role,
                    hourly_rate = :hourly_rate
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name'        => $data['name'],
            ':email'       => $data['email'],
            ':role'        => $data['role'],
            ':hourly_rate' => $data['hourly_rate'],
            ':id'          => $id,
        ]);
    }

    public function deactivate(int $id): bool
    {
        $sql = "UPDATE users SET is_active = 0 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
