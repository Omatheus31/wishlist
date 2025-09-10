<?php
// excluir.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db.php';

    $id = $_POST['id'];

    // Garante que o ID é um número para segurança
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        try {
            $stmt = $pdo->prepare('DELETE FROM desejos WHERE id = ?');
            $stmt->execute([$id]);
        } catch (\PDOException $e) {
            die("Erro ao excluir o desejo: " . $e->getMessage());
        }
    }
}

// Redireciona de volta para a página inicial
header('Location: index.php');
exit;
?>