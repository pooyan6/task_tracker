<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Task & Time Tracker – Dashboard</title>
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

        .topbar .title {
            font-size: 18px;
            font-weight: bold;
        }

        .topbar .user {
            font-size: 14px;
        }

        .topbar a {
            color: #e5e7eb;
            text-decoration: none;
            margin-left: 16px;
        }

        .topbar a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1000px;
            margin: 32px auto;
            padding: 0 16px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-top: 16px;
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
    </style>
</head>
<body>

<div class="topbar">
    <div class="title">
        Task &amp; Time Tracker – Dashboard
    </div>
    <div class="user">
        Ingelogd als: <strong><?= htmlspecialchars($currentUserName) ?></strong>
        <a href="<?= htmlspecialchars(BASE_URL) ?>?route=logout">Uitloggen</a>
    </div>
</div>

<div class="container">

    <div class="cards">
        <!-- Statistieken -->
        <div class="card">
            <h2>Systeemstatus</h2>
            <p>Totaal aantal gebruikers:</p>
            <p class="stat-number"><?= htmlspecialchars($userCount) ?></p>
            <span class="tag">Demo data</span>
        </div>

        <!-- Klantenbeheer -->
        <div class="card">
            <h2>Klanten</h2>
            <p>Beheer alle opdrachtgevers waar je medewerkers voor werken.</p>
            <div class="nav-links">
                <a href="<?= htmlspecialchars(BASE_URL) ?>?route=clients">→ Naar klantenoverzicht</a>
            </div>
        </div>

        <!-- Medewerkers (placeholder) -->
        <div class="card">
            <h2>Medewerkers</h2>
            <p>Overzicht van alle medewerkers, uurtarieven en rollen.</p>
				<div class="nav-links">
					<a href="<?= htmlspecialchars(BASE_URL) ?>?route=users">→ Naar medewerkers</a>
				</div>
        </div>

        <!-- Uren & rapportage (placeholder) -->
        <div class="card">
            <h2>Uren &amp; Rapportage</h2>
            <p>Registreer gewerkte uren, reiskosten en genereer rapporten per klant.</p>
            <div class="nav-links">
                <span class="tag">Binnenkort</span>
                <!-- Later: <a href="<?= htmlspecialchars(BASE_URL) ?>?route=work_sessions">→ Urenregistratie</a> -->
            </div>
        </div>
    </div>

</div>

</body>
</html>
