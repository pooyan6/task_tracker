<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Edit Client</title></head>
	<body>

	<h1>Klant bewerken</h1>

		<form method="post">
			Naam:<br>
			<input type="text" name="name" value="<?= htmlspecialchars($client['name']) ?>" required><br><br>

			Contactpersoon:<br>
			<input type="text" name="contact_person" value="<?= htmlspecialchars($client['contact_person']) ?>"><br><br>

			Telefoon:<br>
			<input type="text" name="phone" value="<?= htmlspecialchars($client['phone']) ?>"><br><br>

			Email:<br>
			<input type="email" name="email" value="<?= htmlspecialchars($client['email']) ?>"><br><br>

			Uurtarief richting klant (€):<br>
			<input type="text" name="billing_rate" value="<?= htmlspecialchars($client['billing_rate']) ?>"><br><br>

			Adres:<br>
			<textarea name="address" rows="3"><?= htmlspecialchars($client['address']) ?></textarea><br><br>

			<button type="submit">Opslaan</button>
		</form>


	</body>
</html>
