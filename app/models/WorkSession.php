<?php

class WorkSession
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        $sql = "SELECT ws.*,
                       u.name AS user_name,
                       c.name AS client_name
                FROM work_sessions ws
                JOIN users   u ON ws.user_id = u.id
                JOIN clients c ON ws.client_id = c.id
                ORDER BY ws.work_date DESC, ws.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $sql = "SELECT * FROM work_sessions WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO work_sessions
                (user_id, client_id, work_date, hours, travel_cost, parking_cost, description, status)
                VALUES
                (:user_id, :client_id, :work_date, :hours, :travel_cost, :parking_cost, :description, :status)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':user_id'      => $data['user_id'],
            ':client_id'    => $data['client_id'],
            ':work_date'    => $data['work_date'],
            ':hours'        => $data['hours'],
            ':travel_cost'  => $data['travel_cost'],
            ':parking_cost' => $data['parking_cost'],
            ':description'  => $data['description'],
            ':status'       => $data['status'],
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE work_sessions
                SET user_id      = :user_id,
                    client_id    = :client_id,
                    work_date    = :work_date,
                    hours        = :hours,
                    travel_cost  = :travel_cost,
                    parking_cost = :parking_cost,
                    description  = :description,
                    status       = :status
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':user_id'      => $data['user_id'],
            ':client_id'    => $data['client_id'],
            ':work_date'    => $data['work_date'],
            ':hours'        => $data['hours'],
            ':travel_cost'  => $data['travel_cost'],
            ':parking_cost' => $data['parking_cost'],
            ':description'  => $data['description'],
            ':status'       => $data['status'],
            ':id'           => $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM work_sessions WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
