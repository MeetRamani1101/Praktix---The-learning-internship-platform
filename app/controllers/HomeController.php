<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/ProgramModel.php';
require_once __DIR__ . '/../models/InternshipModel.php';
require_once __DIR__ . '/../models/ExpertModel.php';

class HomeController extends Controller {

    public function index(): void {
        $programModel    = new ProgramModel();
        $internshipModel = new InternshipModel();
        $expertModel     = new ExpertModel();

        $featuredPrograms    = $programModel->getFeatured(6);
        $featuredInternships = $internshipModel->getFeatured(3);
        $featuredExperts     = $expertModel->getFeatured(3);

        $this->view('layouts/header', ['title' => 'Praktix — Learn Industry Skills']);
        $this->view('pages/home', compact('featuredPrograms', 'featuredInternships', 'featuredExperts'));
        $this->view('layouts/footer');
    }
}
