<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/ProgramModel.php';
require_once __DIR__ . '/../models/InternshipModel.php';

class DashboardController extends Controller {

    public function index(): void {
        $this->requireLogin();

        $userId          = $_SESSION['user_id'];
        $programModel    = new ProgramModel();
        $internshipModel = new InternshipModel();

        $enrollments  = $programModel->getEnrollmentsByUser($userId);
        $applications = $internshipModel->getApplicationsByUser($userId);
        $msg          = $_GET['applied'] ?? '';

        $this->view('layouts/header', ['title' => 'Dashboard — Praktix']);
        $this->view('dashboard/index', compact('enrollments', 'applications', 'msg'));
        $this->view('layouts/footer');
    }
}
