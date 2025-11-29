<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen – Task & Time Tracker</title>
</head>
<body>
    <h1>Inloggen</h1>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>


<form method="post" action="<?= htmlspecialchars(BASE_URL) ?>?route=login">
    <div>
        <label for="email">E-mailadres:</label><br>
        <input type="email" id="email" name="email" required>
    </div>

    <div style="margin-top:8px;">
        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password" required>
    </div>

    <div style="margin-top:12px;">
        <button type="submit">Inloggen</button>
    </div>
</form>

</body>
</html>
