<h1>Werkregistratie bewerken</h1>

<form method="post">
    Datum:<br>
    <input type="date" name="work_date" value="<?= htmlspecialchars($ws['work_date']) ?>"><br><br>

    Medewerker:<br>
    <select name="user_id">
        <?php foreach ($users as $u): ?>
            <option value="<?= $u['id'] ?>" <?= $ws['user_id'] == $u['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($u['name']) ?> (<?= htmlspecialchars($u['role']) ?>)
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Klant:<br>
    <select name="client_id">
        <?php foreach ($clients as $c): ?>
            <option value="<?= $c['id'] ?>" <?= $ws['client_id'] == $c['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    Aantal uren:<br>
    <input type="text" name="hours" value="<?= htmlspecialchars($ws['hours']) ?>"><br><br>

    Reiskosten (€):<br>
    <input type="text" name="travel_cost" value="<?= htmlspecialchars($ws['travel_cost']) ?>"><br><br>

    Parkeerkosten (€):<br>
    <input type="text" name="parking_cost" value="<?= htmlspecialchars($ws['parking_cost']) ?>"><br><br>

    Omschrijving:<br>
    <textarea name="description" rows="3"><?= htmlspecialchars($ws['description']) ?></textarea><br><br>

    Status:<br>
    <select name="status">
        <option value="planned"   <?= $ws['status'] === 'planned'   ? 'selected' : '' ?>>Gepland</option>
        <option value="confirmed" <?= $ws['status'] === 'confirmed' ? 'selected' : '' ?>>Bevestigd</option>
        <option value="approved"  <?= $ws['status'] === 'approved'  ? 'selected' : '' ?>>Goedgekeurd</option>
    </select><br><br>

    <button type="submit">Opslaan</button>
</form>
