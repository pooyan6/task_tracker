<?php

class AuthController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login(): void
    {
        // اگر متد GET است → فقط فرم لاگین را نشان بده
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('login', ['error' => null]);
            return;
        }

        // اگر POST است → پردازش فرم
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($email === '' || $password === '') {
            $this->view('login', ['error' => 'Vul alstublieft alle velden in.']);
            return;
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            // ایمیل یا پسورد اشتباه
            $this->view('login', ['error' => 'Onjuiste e-mail of wachtwoord.']);
            return;
        }

        // موفق: ذخیره در سشن
        $_SESSION['user_id']   = (int)$user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        // هدایت به داشبورد
        header('Location: ' . BASE_URL . '?route=home');
        exit;
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();

        header('Location: ' . BASE_URL . '?route=login');
        exit;
    }
}