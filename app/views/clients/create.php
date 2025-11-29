<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>New Client</title></head>
	<body>

	<h1>Add New Client</h1>

		<form method="post">
			Naam:<br>
			<input type="text" name="name" required><br><br>

			Contactpersoon:<br>
			<input type="text" name="contact_person"><br><br>

			Telefoon:<br>
			<input type="text" name="phone"><br><br>

			Email:<br>
			<input type="email" name="email"><br><br>

			Uurtarief richting klant (€):<br>
			<input type="text" name="billing_rate" value="0.00"><br><br>

			Adres:<br>
			<textarea name="address" rows="3"></textarea><br><br>

			<button type="submit">Opslaan</button>
		</form>

	</body>
</html>
