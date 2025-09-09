<?php
// index.php

// Inclui a conexão com o banco
require_once 'db.php';

// Busca todos os desejos no banco de dados, do mais novo para o mais antigo
$stmt = $pdo->query('SELECT id, descricao FROM desejos ORDER BY data_criacao DESC');
$desejos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Lista de Desejos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Minha Lista de Desejos</h1>

        <form action="adicionar.php" method="POST" class="form-desejo">
            <input type="text" name="descricao" placeholder="O que você deseja?" required>
            <button type="submit">Adicionar</button>
        </form>

        <ul class="lista-desejos">
            <?php if (count($desejos) > 0): ?>
                <?php foreach ($desejos as $desejo): ?>
                    <li><?= htmlspecialchars($desejo['descricao']) ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Sua lista de desejos está vazia. Adicione algo!</p>
            <?php endif; ?>
        </ul>
    </div>

</body>
</html>