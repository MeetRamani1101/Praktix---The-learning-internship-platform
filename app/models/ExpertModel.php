<?php
require_once __DIR__ . '/../core/Model.php';

class ExpertModel extends Model {

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM experts ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function getFeatured(int $limit = 3): array {
        $stmt = $this->db->prepare("SELECT * FROM experts LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }

    public function getById(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM experts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function register(array $data): void {
        $stmt = $this->db->prepare("
            INSERT INTO experts (phone, country, bio, expertise, years_experience, cv_file)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['phone'],
            $data['country'],
            $data['bio'],
            $data['expertise'],
            $data['experience'],
            $data['cv_file']
        ]);
    }
}
