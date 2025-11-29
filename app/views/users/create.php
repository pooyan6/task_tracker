<h1>Nieuwe medewerker toevoegen</h1>

<form method="post">
    Naam:<br>
    <input type="text" name="name" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    Wachtwoord:<br>
    <input type="password" name="password" required><br><br>

    Rol:<br>
    <select name="role">
        <option value="employee">Medewerker</option>
        <option value="admin">Admin</option>
    </select><br><br>

    Uurtarief (bijv. 25.00):<br>
    <input type="text" name="hourly_rate" value="0.00"><br><br>

    <button type="submit">Opslaan</button>
</form>
