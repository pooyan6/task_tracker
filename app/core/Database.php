<?php

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // در محیط واقعی بهتره این پیام در لاگ ذخیره بشه
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    // الگوی singleton: فقط یک اتصال در کل برنامه
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
