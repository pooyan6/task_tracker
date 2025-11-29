<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Clients</title></head>
<body>

<h1>Clients</h1>

<p><a href="<?= BASE_URL ?>?route=client_create">Add New Client</a></p>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact Person</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($clients as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['id']) ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['contact_person']) ?></td>
            <td><?= htmlspecialchars($c['phone']) ?></td>
            <td><?= htmlspecialchars($c['email']) ?></td>
            <td>
                <a href="<?= BASE_URL ?>?route=client_edit&id=<?= $c['id'] ?>">Edit</a> |
                <a href="<?= BASE_URL ?>?route=client_delete&id=<?= $c['id'] ?>"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
