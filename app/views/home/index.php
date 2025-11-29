<h1>Dashboard</h1>

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

    <!-- Medewerkers -->
    <div class="card">
        <h2>Medewerkers</h2>
        <p>Overzicht van alle medewerkers, uurtarieven en rollen.</p>
        <div class="nav-links">
            <a href="<?= htmlspecialchars(BASE_URL) ?>?route=users">→ Naar medewerkers</a>
        </div>
    </div>

    <!-- Uren & rapportage (فعلاً توضیح) -->
	<div class="card">
		<h2>Uren &amp; Rapportage</h2>
		<p>Registreer gewerkte uren, reiskosten en parkeerkosten en bekijk de rapporten per klant.</p>
		<div class="nav-links">
			<a href="<?= htmlspecialchars(BASE_URL) ?>?route=work_sessions">→ Naar urenregistratie</a><br>
			<a href="<?= htmlspecialchars(BASE_URL) ?>?route=reports">→ Rapportage per klant</a>
		</div>
	</div>

</div>
**\\ Small test change on home page