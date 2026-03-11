<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/ProgramModel.php';

class ProgramController extends Controller {

    public function index(): void {
        $model   = new ProgramModel();
        $filters = [
            'search'   => $_GET['search']   ?? '',
            'category' => $_GET['category'] ?? '',
            'level'    => $_GET['level']    ?? '',
            'mode'     => $_GET['mode']     ?? '',
        ];
        $programs = $model->getAllActive($filters);

        $this->view('layouts/header', ['title' => 'Programs — Praktix']);
        $this->view('programs/index', compact('programs', 'filters'));
        $this->view('layouts/footer');
    }

    public function show(): void {
        $model   = new ProgramModel();
        $slug    = $_GET['slug'] ?? '';
        $program = $model->getBySlug($slug);
        $msg     = $_GET['msg'] ?? '';

        if (!$program) {
            echo "<div class='container mt-5'><h3>Program not found</h3></div>";
            $this->view('layouts/footer');
            return;
        }

        $this->view('layouts/header', ['title' => htmlspecialchars($program['title']) . ' — Praktix']);
        $this->view('programs/show', compact('program', 'msg'));
        $this->view('layouts/footer');
    }

    public function enroll(): void {
        $this->requireLogin();
        $model     = new ProgramModel();
        $programId = (int) ($_GET['program_id'] ?? 0);
        $userId    = $_SESSION['user_id'];

        if (!$programId) {
            $this->redirect('programs');
        }

        if ($model->isEnrolled($userId, $programId)) {
            $this->redirect('dashboard?applied=already');
        }

        $model->enroll($userId, $programId);
        $this->redirect('dashboard?applied=1');
    }

    public function search(): void {
        $model    = new ProgramModel();
        $query    = $_GET['q'] ?? '';
        $programs = $model->getAllActive(['search' => $query]);

        foreach ($programs as $p): ?>
            <div class="col-md-4 mb-4">
                <div class="card program-card h-100">
                    <img src="/public/assets/course.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($p['title']) ?></h5>
                        <p><?= substr(htmlspecialchars($p['short_description']), 0, 100) ?>...</p>
                        <a href="/program?slug=<?= urlencode($p['slug']) ?>" class="btn btn-primary btn-sm">View Program</a>
                    </div>
                </div>
            </div>
        <?php endforeach;
    }
}
