<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserModel.php';

class AuthController extends Controller {

    public function loginPage(): void {
        $error = $_GET['error'] ?? '';
        $this->view('layouts/header', ['title' => 'Login — Praktix']);
        $this->view('auth/login', compact('error'));
        $this->view('layouts/footer');
    }

    public function loginSubmit(): void {
        $userModel = new UserModel();
        $email     = trim($_POST['email'] ?? '');
        $password  = $_POST['password'] ?? '';

        $user = $userModel->findByEmail($email);

        if (!$user) {
            $this->redirect('login?error=user');
        }

        if (!password_verify($password, $user['password_hash'])) {
            $this->redirect('login?error=password');
        }

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $this->redirect('');
    }

    public function registerPage(): void {
        $error = $_GET['error'] ?? '';
        $this->view('layouts/header', ['title' => 'Register — Praktix']);
        $this->view('auth/register', compact('error'));
        $this->view('layouts/footer');
    }

    public function registerSubmit(): void {
        $userModel = new UserModel();
        $name      = trim($_POST['name'] ?? '');
        $email     = trim($_POST['email'] ?? '');
        $password  = $_POST['password'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->redirect('register?error=invalid_email');
        }
        if (strlen($password) < 6) {
            $this->redirect('register?error=password_short');
        }
        if ($userModel->emailExists($email)) {
            $this->redirect('register?error=email_exists');
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $userModel->create($name, $email, $hash);
        $this->redirect('login?registered=1');
    }

    public function logout(): void {
        session_destroy();
        $this->redirect('');
    }

    public function googleLogin(): void {
        $userModel = new UserModel();
        $token     = $_POST['credential'] ?? '';

        $google = json_decode(
            file_get_contents("https://oauth2.googleapis.com/tokeninfo?id_token=" . $token),
            true
        );

        if (empty($google['email'])) {
            $this->redirect('login?error=google');
        }

        $email = $google['email'];
        $name  = $google['name'];

        $user = $userModel->findByEmail($email);
        if (!$user) {
            $userId = $userModel->createOAuth($name, $email);
        } else {
            $userId = $user['id'];
        }

        $_SESSION['user_id']   = $userId;
        $_SESSION['user_name'] = $name;
        $this->redirect('');
    }
}
