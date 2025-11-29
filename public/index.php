<?php
// نمایش خطاها در محیط توسعه
error_reporting(E_ALL);
ini_set('display_errors', 1);

// شروع سشن
session_start(); // خیلی مهم: باید قبل از هر چیز باشد

// تنظیمات
require_once __DIR__ . '/../app/config/config.php';

// هسته‌ها
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Controller.php';

// مدل‌ها
require_once __DIR__ . '/../app/models/User.php';
require_once __DIR__ . '/../app/models/Client.php';
require_once __DIR__ . '/../app/models/WorkSession.php';

// کنترل‌کننده‌ها
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/ClientController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/WorkSessionController.php';
require_once __DIR__ . '/../app/controllers/ReportController.php';



// خواندن مسیر
$route = $_GET['route'] ?? 'home';

// مسیرهایی که بدون لاگین هم در دسترس هستند
$publicRoutes = ['login'];

// اگر هنوز لاگین نکرده و می‌خواهد صفحه‌ای غیر از login ببیند → بفرستیم login
if (!in_array($route, $publicRoutes, true) && empty($_SESSION['user_id'])) {
    $route = 'login';
}

// مسیریابی ساده
switch ($route) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

	case 'clients':
		$controller = new ClientController();
		$controller->index();
		break;

	case 'client_create':
		$controller = new ClientController();
		$controller->create();
		break;

	case 'client_edit':
		$controller = new ClientController();
		$controller->edit();
		break;

	case 'client_delete':
		$controller = new ClientController();
		$controller->delete();
    break;

    case 'users':
        $controller = new UserController();
        $controller->index();
        break;

    case 'users_create':
        $controller = new UserController();
        $controller->create();
        break;

    case 'users_edit':
        $controller = new UserController();
        $controller->edit();
        break;

    case 'users_deactivate':
        $controller = new UserController();
        $controller->deactivate();
        break;

	case 'users':
		$controller = new UserController();
		$controller->index();
		break;

	case 'users_create':
		$controller = new UserController();
		$controller->create();
		break;

	case 'users_edit':
		$controller = new UserController();
		$controller->edit();
		break;

	case 'users_deactivate':
		$controller = new UserController();
		$controller->deactivate();
    break;
	    case 'work_sessions':
        $controller = new WorkSessionController();
        $controller->index();
        break;

    case 'work_sessions_create':
        $controller = new WorkSessionController();
        $controller->create();
        break;

    case 'work_sessions_edit':
        $controller = new WorkSessionController();
        $controller->edit();
        break;

    case 'work_sessions_delete':
        $controller = new WorkSessionController();
        $controller->delete();
        break;

    case 'reports':
        $controller = new ReportController();
        $controller->index();
        break;


    default:
        http_response_code(404);
        echo "404 - Pagina niet gevonden";
}
