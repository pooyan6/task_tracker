<?php

class Client
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        $sql = "SELECT id, name, contact_person, phone, email, billing_rate, address, is_active, created_at
                FROM clients
                ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $sql = "SELECT id, name, contact_person, phone, email, billing_rate, address, is_active, created_at
                FROM clients
                WHERE id = :id
                LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO clients
                (name, contact_person, phone, email, billing_rate, address, is_active)
                VALUES
                (:name, :contact_person, :phone, :email, :billing_rate, :address, 1)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name'           => $data['name'],
            ':contact_person' => $data['contact_person'],
            ':phone'          => $data['phone'],
            ':email'          => $data['email'],
            ':billing_rate'   => $data['billing_rate'],
            ':address'        => $data['address'],
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE clients
                SET name           = :name,
                    contact_person = :contact_person,
                    phone          = :phone,
                    email          = :email,
                    billing_rate   = :billing_rate,
                    address        = :address
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name'           => $data['name'],
            ':contact_person' => $data['contact_person'],
            ':phone'          => $data['phone'],
            ':email'          => $data['email'],
            ':billing_rate'   => $data['billing_rate'],
            ':address'        => $data['address'],
            ':id'             => $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM clients WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
