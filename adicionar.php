<?php
// adicionar.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require_once 'db.php';

    $descricao = trim($_POST['descricao']);
    $prioridade = $_POST['prioridade'];

    // Validação simples
    $prioridadesValidas = ['Baixa', 'Média', 'Alta'];
    if (!empty($descricao) && in_array($prioridade, $prioridadesValidas)) {
        try {
            $stmt = $pdo->prepare('INSERT INTO desejos (descricao, prioridade) VALUES (?, ?)');
            $stmt->execute([$descricao, $prioridade]);
        } catch (\PDOException $e) {
            die("Erro ao salvar o desejo: " . $e->getMessage());
        }
    }
}

header('Location: index.php');
exit;
?>