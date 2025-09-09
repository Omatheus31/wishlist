<?php
// db.php

$host = 'localhost';
$dbname = 'wishlist';
$user = 'root';
$pass = ''; // Senha padrão do XAMPP é vazia
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Em um projeto real, você logaria o erro. Por agora, vamos apenas mostrar.
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>