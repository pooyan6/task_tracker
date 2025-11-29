<h1>Medewerker bewerken</h1>

<form method="post">
    Naam:<br>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br><br>

    Email:<br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

    Rol:<br>
    <select name="role">
        <option value="employee" <?= $user['role'] === 'employee' ? 'selected' : '' ?>>Medewerker</option>
        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
    </select><br><br>

    Uurtarief:<br>
    <input type="text" name="hourly_rate" value="<?= htmlspecialchars($user['hourly_rate']) ?>"><br><br>

    Nieuw wachtwoord (leeg laten = niet wijzigen):<br>
    <input type="password" name="password"><br><br>

    <button type="submit">Opslaan</button>
</form>
