<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/ContactModel.php';

class PageController extends Controller {

    public function about(): void {
        $this->view('layouts/header', ['title' => 'About — Praktix']);
        $this->view('pages/about');
        $this->view('layouts/footer');
    }

    public function contact(): void {
        $success = $_GET['success'] ?? '';
        $this->view('layouts/header', ['title' => 'Contact — Praktix']);
        $this->view('pages/contact', compact('success'));
        $this->view('layouts/footer');
    }

    public function contactSubmit(): void {
        $model = new ContactModel();
        $model->saveMessage([
            'name'    => $_POST['name']    ?? '',
            'email'   => $_POST['email']   ?? '',
            'type'    => $_POST['type']    ?? '',
            'subject' => $_POST['subject'] ?? '',
            'message' => $_POST['message'] ?? '',
        ]);
        $this->redirect('contact?success=1');
    }

    public function partner(): void {
        $success = $_GET['success'] ?? '';
        $this->view('layouts/header', ['title' => 'Partner — Praktix']);
        $this->view('pages/partner', compact('success'));
        $this->view('layouts/footer');
    }

    public function partnerSubmit(): void {
        $model = new ContactModel();
        $model->savePartner([
            'organization'    => $_POST['organization']    ?? '',
            'name'            => $_POST['name']            ?? '',
            'email'           => $_POST['email']           ?? '',
            'phone'           => $_POST['phone']           ?? '',
            'partnership_type'=> $_POST['partnership_type']?? '',
            'message'         => $_POST['message']         ?? '',
        ]);
        $this->redirect('partner?success=1');
    }
}
