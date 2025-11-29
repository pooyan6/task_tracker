<h1>Medewerkers</h1>

<div class="page-actions">
    <a href="<?= BASE_URL ?>?route=users_create">+ Nieuwe medewerker toevoegen</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Uurtarief</th>
        <th>Actief</th>
        <th>Acties</th>
    </tr>

    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['name']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['role']) ?></td>
            <td><?= htmlspecialchars($u['hourly_rate']) ?></td>
            <td><?= $u['is_active'] ? 'Ja' : 'Nee' ?></td>
            <td>
                <a href="<?= BASE_URL ?>?route=users_edit&id=<?= $u['id'] ?>">Bewerken</a>
                <?php if ($u['is_active']): ?>
                    | <a href="<?= BASE_URL ?>?route=users_deactivate&id=<?= $u['id'] ?>"
                         onclick="return confirm('Gebruiker deactiveren?')">Deactiveren</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
