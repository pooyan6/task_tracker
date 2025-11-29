<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/core/Database.php';

$db = Database::getInstance()->getConnection();

// این‌ها رو می‌تونی بعداً عوض کنی
$name  = 'Admin';
$email = 'admin@example.com';
$passwordPlain = 'Admin123!';   // پسورد ساده برای شروع

$passwordHash = password_hash($passwordPlain, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password_hash, role, hourly_rate)
        VALUES (:name, :email, :password_hash, 'admin', 0.00)";

$stmt = $db->prepare($sql);
$stmt->execute([
    ':name'          => $name,
    ':email'         => $email,
    ':password_hash' => $passwordHash
]);

echo "Admin user created.<br>";
echo "Email: " . htmlspecialchars($email) . "<br>";
echo "Password: " . htmlspecialchars($passwordPlain) . "<br>";
