<?php

class Controller {

    protected function view(string $view, array $data = []): void {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            echo "View not found: $view";
        }
    }

    protected function redirect(string $url): void {
        header("Location: /$url");
        exit;
    }

    protected function requireLogin(): void {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('login');
        }
    }

    protected function isLoggedIn(): bool {
        return isset($_SESSION['user_id']);
    }
}
