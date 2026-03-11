<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/InternshipModel.php';

class InternshipController extends Controller {

    public function index(): void {
        $model       = new InternshipModel();
        $internships = $model->getAllActive();

        $this->view('layouts/header', ['title' => 'Internships — Praktix']);
        $this->view('internships/index', compact('internships'));
        $this->view('layouts/footer');
    }

    public function show(): void {
        $model      = new InternshipModel();
        $slug       = $_GET['slug'] ?? '';
        $internship = $model->getBySlug($slug);

        if (!$internship) {
            echo "<div class='container mt-5'><h3>Internship not found</h3></div>";
            $this->view('layouts/footer');
            return;
        }

        $this->view('layouts/header', ['title' => htmlspecialchars($internship['title']) . ' — Praktix']);
        $this->view('internships/show', compact('internship'));
        $this->view('layouts/footer');
    }

    public function apply(): void {
        $this->requireLogin();
        $model   = new InternshipModel();
        $userId  = $_SESSION['user_id'];
        $itemId  = (int) ($_POST['item_id'] ?? 0);
        $message = $_POST['message'] ?? '';

        $model->apply($userId, $itemId, $message);
        $this->redirect('dashboard?applied=1');
    }

    public function search(): void {
        $model       = new InternshipModel();
        $query       = $_GET['q'] ?? '';
        $internships = $model->search($query);

        foreach ($internships as $i): ?>
            <div class="col-md-4 mb-4">
                <div class="card program-card h-100">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($i['title']) ?></h5>
                        <p><?= substr(htmlspecialchars($i['full_description']), 0, 100) ?>...</p>
                        <p><strong><?= $i['duration_weeks'] ?> weeks</strong></p>
                        <p><?= htmlspecialchars($i['location_type']) ?></p>
                        <a href="/internship?slug=<?= $i['slug'] ?>" class="btn btn-primary btn-sm">View Internship</a>
                    </div>
                </div>
            </div>
        <?php endforeach;
    }
}
