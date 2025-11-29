<h1>Urenregistratie</h1>

<div class="page-actions">
    <a href="<?= BASE_URL ?>?route=work_sessions_create">+ Nieuwe registratie</a>
</div>

<table>
    <tr>
        <th>Datum</th>
        <th>Medewerker</th>
        <th>Klant</th>
        <th>Uren</th>
        <th>Reiskosten</th>
        <th>Parkeerkosten</th>
        <th>Status</th>
        <th>Acties</th>
    </tr>

    <?php foreach ($sessions as $s): ?>
        <tr>
            <td><?= htmlspecialchars($s['work_date']) ?></td>
            <td><?= htmlspecialchars($s['user_name']) ?></td>
            <td><?= htmlspecialchars($s['client_name']) ?></td>
            <td><?= htmlspecialchars($s['hours']) ?></td>
            <td><?= htmlspecialchars($s['travel_cost']) ?></td>
            <td><?= htmlspecialchars($s['parking_cost']) ?></td>
            <td><?= htmlspecialchars($s['status']) ?></td>
            <td>
                <a href="<?= BASE_URL ?>?route=work_sessions_edit&id=<?= $s['id'] ?>">Bewerken</a> |
                <a href="<?= BASE_URL ?>?route=work_sessions_delete&id=<?= $s['id'] ?>"
                   onclick="return confirm('Weet je zeker dat je deze registratie wilt verwijderen?')">Verwijderen</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
