<?php
require_once __DIR__ . '/../core/Model.php';

class ContactModel extends Model {

    public function saveMessage(array $data): void {
        $stmt = $this->db->prepare("
            INSERT INTO contact_messages (name, email, type, subject, message)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['name'],
            $data['email'],
            $data['type'],
            $data['subject'],
            $data['message']
        ]);
    }

    public function savePartner(array $data): void {
        $stmt = $this->db->prepare("
            INSERT INTO partner_inquiries (organization, name, email, phone, partnership_type, message)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['organization'],
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['partnership_type'],
            $data['message']
        ]);
    }
}
