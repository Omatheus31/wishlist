<?php
// index.php

require_once 'db.php';

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
                    <li class="item-desejo">
                        <span><?= htmlspecialchars($desejo['descricao']) ?></span>
                        <div class="acoes">
                            <a href="editar.php?id=<?= $desejo['id'] ?>" class="btn-editar">Editar</a>
                            <form action="excluir.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $desejo['id'] ?>">
                                <button type="submit" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este desejo?');">Excluir</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Sua lista de desejos está vazia. Adicione algo!</p>
            <?php endif; ?>
        </ul>
    </div>

</body>
</html>