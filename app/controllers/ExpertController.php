<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/ExpertModel.php';

class ExpertController extends Controller {

    public function index(): void {
        $model   = new ExpertModel();
        $experts = $model->getAll();

        $this->view('layouts/header', ['title' => 'Experts — Praktix']);
        $this->view('experts/index', compact('experts'));
        $this->view('layouts/footer');
    }

    public function show(): void {
        $model  = new ExpertModel();
        $id     = (int) ($_GET['id'] ?? 0);
        $expert = $model->getById($id);

        if (!$expert) {
            echo "<div class='container mt-5'><h3>Expert not found</h3></div>";
            $this->view('layouts/footer');
            return;
        }

        $this->view('layouts/header', ['title' => htmlspecialchars($expert['name']) . ' — Praktix']);
        $this->view('experts/show', compact('expert'));
        $this->view('layouts/footer');
    }

    public function registerPage(): void {
        $success = $_GET['success'] ?? '';
        $this->view('layouts/header', ['title' => 'Become an Expert — Praktix']);
        $this->view('experts/register', compact('success'));
        $this->view('layouts/footer');
    }

    public function registerSubmit(): void {
        $model  = new ExpertModel();
        $cvFile = '';

        if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
            $filename = time() . '_' . basename($_FILES['cv']['name']);
            move_uploaded_file($_FILES['cv']['tmp_name'], __DIR__ . '/../../public/uploads/' . $filename);
            $cvFile = $filename;
        }

        $model->register([
            'phone'      => $_POST['phone']      ?? '',
            'country'    => $_POST['country']    ?? '',
            'bio'        => $_POST['bio']        ?? '',
            'expertise'  => $_POST['expertise']  ?? '',
            'experience' => $_POST['experience'] ?? '',
            'cv_file'    => $cvFile,
        ]);

        $this->redirect('expert-register?success=1');
    }
}
