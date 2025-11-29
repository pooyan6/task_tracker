<h1>Nieuwe werkregistratie</h1>

<form method="post">
    Datum:<br>
    <input type="date" name="work_date" value="<?= date('Y-m-d') ?>"><br><br>

    Medewerker:<br>
    <select name="user_id">
        <?php foreach ($users as $u): ?>
            <option value="<?= $u['id'] ?>">
                <?= htmlspecialchars($u['name']) ?> (<?= htmlspecialchars($u['role']) ?>)
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Klant:<br>
    <select name="client_id">
        <?php foreach ($clients as $c): ?>
            <option value="<?= $c['id'] ?>">
                <?= htmlspecialchars($c['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Aantal uren:<br>
    <input type="text" name="hours" value="0"><br><br>

    Reiskosten (€):<br>
    <input type="text" name="travel_cost" value="0"><br><br>

    Parkeerkosten (€):<br>
    <input type="text" name="parking_cost" value="0"><br><br>

    Omschrijving:<br>
    <textarea name="description" rows="3"></textarea><br><br>

    Status:<br>
    <select name="status">
        <option value="planned">Gepland</option>
        <option value="confirmed" selected>Bevestigd</option>
        <option value="approved">Goedgekeurd</option>
    </select><br><br>

    <button type="submit">Opslaan</button>
</form>
