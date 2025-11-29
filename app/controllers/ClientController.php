<?php

class ClientController extends Controller
{
    private Client $clientModel;

    public function __construct()
    {
        $this->clientModel = new Client();
    }

    public function index(): void
    {
        $clients = $this->clientModel->getAll();

        $this->view('clients/index', [
            'clients'        => $clients,
            'pageTitle'      => 'Klanten',
            'currentUserName'=> $_SESSION['user_name'] ?? 'Onbekend',
        ]);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('clients/create', [
                'pageTitle'      => 'Nieuwe klant',
                'currentUserName'=> $_SESSION['user_name'] ?? 'Onbekend',
            ]);
            return;
        }

        $data = [
            'name'           => $_POST['name'] ?? '',
            'contact_person' => $_POST['contact_person'] ?? '',
            'phone'          => $_POST['phone'] ?? '',
            'email'          => $_POST['email'] ?? '',
            'billing_rate'   => $_POST['billing_rate'] ?? '0.00',
            'address'        => $_POST['address'] ?? '',
        ];

        $this->clientModel->create($data);

        header('Location: ' . BASE_URL . '?route=clients');
        exit;
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $client = $this->clientModel->find($id);

        if (!$client) {
            echo "Klant niet gevonden.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('clients/edit', [
                'client'         => $client,
                'pageTitle'      => 'Klant bewerken',
                'currentUserName'=> $_SESSION['user_name'] ?? 'Onbekend',
            ]);
            return;
        }

        $data = [
            'name'           => $_POST['name'] ?? '',
            'contact_person' => $_POST['contact_person'] ?? '',
            'phone'          => $_POST['phone'] ?? '',
            'email'          => $_POST['email'] ?? '',
            'billing_rate'   => $_POST['billing_rate'] ?? $client['billing_rate'],
            'address'        => $_POST['address'] ?? '',
        ];

        $this->clientModel->update($id, $data);

        header('Location: ' . BASE_URL . '?route=clients');
        exit;
    }

    public function delete(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $this->clientModel->delete($id);

        header('Location: ' . BASE_URL . '?route=clients');
        exit;
    }
}
