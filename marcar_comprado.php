<?php
// marcar_comprado.php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        try {
            // Alterna o status: se for 0 vira 1, se for 1 vira 0
            $stmt = $pdo->prepare('UPDATE desejos SET comprado = NOT comprado WHERE id = ?');
            $stmt->execute([$id]);
        } catch (\PDOException $e) {
            die("Erro ao atualizar o status: " . $e->getMessage());
        }
    }
}

header('Location: index.php');
exit;
?>