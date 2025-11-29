<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Task & Time Tracker' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f5f7;
            margin: 0;
            padding: 0;
        }

        .topbar {
            background: #1f2933;
            color: #ffffff;
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar .left {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .topbar .title {
            font-size: 18px;
            font-weight: bold;
        }

        .topbar .nav a {
            color: #e5e7eb;
            margin-right: 12px;
            text-decoration: none;
            font-size: 14px;
        }

        .topbar .nav a:hover {
            text-decoration: underline;
        }

        .topbar .user {
            font-size: 14px;
        }

        .topbar .user a {
            color: #e5e7eb;
            margin-left: 12px;
            text-decoration: none;
        }

        .topbar .user a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1100px;
            margin: 32px auto;
            padding: 0 16px 40px 16px;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 16px;
            color: #111827;
        }

        /* برای داشبورد و کارت‌ها */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-top: 8px;
        }

        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 16px 18px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .card h2 {
            margin-top: 0;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .card p {
            margin: 4px 0;
            font-size: 14px;
            color: #4b5563;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #111827;
        }

        .nav-links a {
            display: inline-block;
            margin-top: 8px;
            font-size: 14px;
            text-decoration: none;
            color: #2563eb;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .tag {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 999px;
            background: #e5f2ff;
            color: #1d4ed8;
            font-size: 11px;
            margin-top: 4px;
        }

        /* جدول‌ها (Clients / Users / ...) */
        table {
            border-collapse: collapse;
            width: 100%;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 8px 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        th {
            background: #f3f4f6;
            text-align: left;
        }

        tr:last-child td {
            border-bottom: none;
        }

        a {
            color: #2563eb;
        }

        a:hover {
            text-decoration: underline;
        }

        .page-actions {
            margin-bottom: 12px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<?php
    // اسم کاربر برای نوار بالا
    if (!isset($currentUserName)) {
        $currentUserName = $_SESSION['user_name'] ?? 'Onbekend';
    }
?>

<div class="topbar">
    <div class="left">
        <div class="title">
            Task &amp; Time Tracker
        </div>
        <div class="nav">
            <a href="<?= htmlspecialchars(BASE_URL) ?>?route=home">Dashboard</a>
            <a href="<?= htmlspecialchars(BASE_URL) ?>?route=clients">Klanten</a>
            <a href="<?= htmlspecialchars(BASE_URL) ?>?route=users">Medewerkers</a>
			<a href="<?= htmlspecialchars(BASE_URL) ?>?route=work_sessions">Uren</a>
			<a href="<?= htmlspecialchars(BASE_URL) ?>?route=reports">Rapporten</a>
            <!-- بعداً: uren, rapportage -->
        </div>
    </div>
    <div class="user">
        Ingelogd als: <strong><?= htmlspecialchars($currentUserName) ?></strong>
        <a href="<?= htmlspecialchars(BASE_URL) ?>?route=logout">Uitloggen</a>
    </div>
</div>

<div class="container">
    <?php
        // اینجا محتوای مخصوص هر صفحه لود می‌شه
        require __DIR__ . '/' . $contentView . '.php';
    ?>
</div>

</body>
</html>
