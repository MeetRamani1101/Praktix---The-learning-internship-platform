<?php
require_once __DIR__ . '/../core/Model.php';

class ProgramModel extends Model {

    public function getAllActive(array $filters = []): array {
        $query  = "SELECT * FROM programs WHERE status='active'";
        $params = [];

        if (!empty($filters['search'])) {
            $query   .= " AND title LIKE ?";
            $params[] = "%{$filters['search']}%";
        }
        if (!empty($filters['category'])) {
            $query   .= " AND category = ?";
            $params[] = $filters['category'];
        }
        if (!empty($filters['level'])) {
            $query   .= " AND level = ?";
            $params[] = $filters['level'];
        }
        if (!empty($filters['mode'])) {
            $query   .= " AND delivery_mode = ?";
            $params[] = $filters['mode'];
        }

        $query .= " ORDER BY created_at DESC";
        $stmt   = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function getFeatured(int $limit = 6): array {
        $stmt = $this->db->prepare("SELECT * FROM programs LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }

    public function getBySlug(string $slug): array|false {
        $stmt = $this->db->prepare("SELECT * FROM programs WHERE slug = ? LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }

    public function isEnrolled(int $userId, int $programId): bool {
        $stmt = $this->db->prepare("SELECT id FROM enrollments WHERE learner_id = ? AND program_id = ?");
        $stmt->execute([$userId, $programId]);
        return (bool) $stmt->fetch();
    }

    public function enroll(int $userId, int $programId): void {
        $stmt = $this->db->prepare("INSERT INTO enrollments (learner_id, program_id, enrolled_at) VALUES (?, ?, NOW())");
        $stmt->execute([$userId, $programId]);
    }

    public function getEnrollmentsByUser(int $userId): array {
        $stmt = $this->db->prepare("
            SELECT e.*, p.title, p.duration_weeks, p.total_hours, p.price, p.currency, p.slug
            FROM enrollments e
            JOIN programs p ON e.program_id = p.id
            WHERE e.learner_id = ?
            ORDER BY e.enrolled_at DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
