<?php

class HomeController extends Controller
{
    public function index(): void
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT COUNT(*) FROM users WHERE is_active = 1");
        $userCount = (int)$stmt->fetchColumn();

        $currentUserName = $_SESSION['user_name'] ?? 'Onbekend';

        $this->view('home/index', [
            'userCount'       => $userCount,
            'currentUserName' => $currentUserName,
            'pageTitle'       => 'Dashboard',
        ]);
    }
}
