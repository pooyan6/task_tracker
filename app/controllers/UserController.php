<?php

class UserController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index(): void
    {
        $users = $this->userModel->getAll();
        $currentUserName = $_SESSION['user_name'] ?? 'Onbekend';

        $this->view('users/index', [
            'users'          => $users,
            'currentUserName'=> $currentUserName,
            'pageTitle'      => 'Medewerkers',
        ]);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('users/create', [
                'pageTitle' => 'Nieuwe medewerker',
            ]);
            return;
        }

        $data = [
            'name'        => $_POST['name'] ?? '',
            'email'       => $_POST['email'] ?? '',
            'password'    => $_POST['password'] ?? '',
            'role'        => $_POST['role'] ?? 'employee',
            'hourly_rate' => $_POST['hourly_rate'] ?? '0.00',
        ];

        $this->userModel->create($data);

        header('Location: ' . BASE_URL . '?route=users');
        exit;
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $user = $this->userModel->findById($id);

        if (!$user) {
            echo "Gebruiker niet gevonden.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('users/edit', [
                'user'      => $user,
                'pageTitle' => 'Medewerker bewerken',
            ]);
            return;
        }

        $data = [
            'name'        => $_POST['name'] ?? '',
            'email'       => $_POST['email'] ?? '',
            'password'    => $_POST['password'] ?? '',
            'role'        => $_POST['role'] ?? $user['role'],
            'hourly_rate' => $_POST['hourly_rate'] ?? $user['hourly_rate'],
        ];

        $this->userModel->update($id, $data);

        header('Location: ' . BASE_URL . '?route=users');
        exit;
    }

    public function deactivate(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $this->userModel->deactivate($id);

        header('Location: ' . BASE_URL . '?route=users');
        exit;
    }
}
