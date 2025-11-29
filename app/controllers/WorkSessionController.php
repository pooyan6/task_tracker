<?php

class WorkSessionController extends Controller
{
    private WorkSession $wsModel;
    private User $userModel;
    private Client $clientModel;

    public function __construct()
    {
        $this->wsModel     = new WorkSession();
        $this->userModel   = new User();
        $this->clientModel = new Client();
    }

    public function index(): void
    {
        $sessions = $this->wsModel->getAll();

        $this->view('work_sessions/index', [
            'sessions'        => $sessions,
            'pageTitle'       => 'Urenregistratie',
            'currentUserName' => $_SESSION['user_name'] ?? 'Onbekend',
        ]);
    }

    public function create(): void
    {
        $users   = $this->userModel->getAll();
        $clients = $this->clientModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('work_sessions/create', [
                'users'          => $users,
                'clients'        => $clients,
                'pageTitle'      => 'Nieuwe werkregistratie',
                'currentUserName'=> $_SESSION['user_name'] ?? 'Onbekend',
            ]);
            return;
        }

        $data = [
            'user_id'      => (int)($_POST['user_id'] ?? 0),
            'client_id'    => (int)($_POST['client_id'] ?? 0),
            'work_date'    => $_POST['work_date'] ?? date('Y-m-d'),
            'hours'        => $_POST['hours'] ?? '0',
            'travel_cost'  => $_POST['travel_cost'] ?? '0',
            'parking_cost' => $_POST['parking_cost'] ?? '0',
            'description'  => $_POST['description'] ?? '',
            'status'       => $_POST['status'] ?? 'confirmed',
        ];

        $this->wsModel->create($data);

        header('Location: ' . BASE_URL . '?route=work_sessions');
        exit;
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $ws = $this->wsModel->find($id);

        if (!$ws) {
            echo "Werkregistratie niet gevonden.";
            return;
        }

        $users   = $this->userModel->getAll();
        $clients = $this->clientModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('work_sessions/edit', [
                'ws'             => $ws,
                'users'          => $users,
                'clients'        => $clients,
                'pageTitle'      => 'Werkregistratie bewerken',
                'currentUserName'=> $_SESSION['user_name'] ?? 'Onbekend',
            ]);
            return;
        }

        $data = [
            'user_id'      => (int)($_POST['user_id'] ?? 0),
            'client_id'    => (int)($_POST['client_id'] ?? 0),
            'work_date'    => $_POST['work_date'] ?? date('Y-m-d'),
            'hours'        => $_POST['hours'] ?? '0',
            'travel_cost'  => $_POST['travel_cost'] ?? '0',
            'parking_cost' => $_POST['parking_cost'] ?? '0',
            'description'  => $_POST['description'] ?? '',
            'status'       => $_POST['status'] ?? 'confirmed',
        ];

        $this->wsModel->update($id, $data);

        header('Location: ' . BASE_URL . '?route=work_sessions');
        exit;
    }

    public function delete(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $this->wsModel->delete($id);

        header('Location: ' . BASE_URL . '?route=work_sessions');
        exit;
    }
}
