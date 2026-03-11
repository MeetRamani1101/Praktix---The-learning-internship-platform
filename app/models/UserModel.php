<?php
require_once __DIR__ . '/../core/Model.php';

class UserModel extends Model {

    public function findByEmail(string $email): array|false {
        $stmt = $this->db->prepare("SELECT * FROM learners WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function findById(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM learners WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(string $name, string $email, string $passwordHash): int {
        $stmt = $this->db->prepare("INSERT INTO learners (name, email, password_hash) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $passwordHash]);
        return (int) $this->db->lastInsertId();
    }

    public function createOAuth(string $name, string $email): int {
        $stmt = $this->db->prepare("INSERT INTO learners (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        return (int) $this->db->lastInsertId();
    }

    public function emailExists(string $email): bool {
        $stmt = $this->db->prepare("SELECT id FROM learners WHERE email = ?");
        $stmt->execute([$email]);
        return (bool) $stmt->fetch();
    }
}
