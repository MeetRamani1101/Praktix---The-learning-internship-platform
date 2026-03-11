<?php
require_once __DIR__ . '/../core/Model.php';

class InternshipModel extends Model {

    public function getAllActive(): array {
        $stmt = $this->db->query("SELECT * FROM internships WHERE status='active'");
        return $stmt->fetchAll();
    }

    public function getFeatured(int $limit = 3): array {
        $stmt = $this->db->prepare("SELECT * FROM internships LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }

    public function getBySlug(string $slug): array|false {
        $stmt = $this->db->prepare("SELECT * FROM internships WHERE slug = ? LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }

    public function search(string $query): array {
        $stmt = $this->db->prepare("SELECT * FROM internships WHERE status='active' AND title LIKE ?");
        $stmt->execute(["%$query%"]);
        return $stmt->fetchAll();
    }

    public function apply(int $userId, int $itemId, string $message): void {
        $stmt = $this->db->prepare("
            INSERT INTO applications (user_id, type, item_id, message)
            VALUES (?, 'internship', ?, ?)
        ");
        $stmt->execute([$userId, $itemId, $message]);
    }

    public function getApplicationsByUser(int $userId): array {
        $stmt = $this->db->prepare("
            SELECT a.*, i.title, i.duration_weeks, i.location_type, i.slug
            FROM applications a
            JOIN internships i ON a.item_id = i.id
            WHERE a.user_id = ? AND a.type = 'internship'
            ORDER BY a.created_at DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
