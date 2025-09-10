<?php
// index.php

require_once 'db.php';

// A query agora ordena por comprado, depois por prioridade (Alta, Média, Baixa) e por fim por data
$query = "
    SELECT id, descricao, comprado, prioridade 
    FROM desejos 
    ORDER BY 
        comprado ASC, 
        FIELD(prioridade, 'Alta', 'Média', 'Baixa'), 
        data_criacao DESC
";
$stmt = $pdo->query($query);
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
            <select name="prioridade">
                <option value="Baixa">Baixa</option>
                <option value="Média" selected>Média</option>
                <option value="Alta">Alta</option>
            </select>
            <button type="submit">Adicionar</button>
        </form>

        <ul class="lista-desejos">
            <?php if (count($desejos) > 0): ?>
                <?php foreach ($desejos as $desejo): ?>
                    <li class="item-desejo <?= $desejo['comprado'] ? 'comprado' : '' ?>">
                        <div class="info-desejo">
                            <span><?= htmlspecialchars($desejo['descricao']) ?></span>
                            <span class="prioridade prioridade-<?= strtolower($desejo['prioridade']) ?>">
                                <?= htmlspecialchars($desejo['prioridade']) ?>
                            </span>
                        </div>
                        <div class="acoes">
                            <form action="marcar_comprado.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $desejo['id'] ?>">
                                <button type="submit" class="btn-comprar">
                                    <?= $desejo['comprado'] ? 'Desmarcar' : 'Comprado' ?>
                                </button>
                            </form>
                            
                            <?php if (!$desejo['comprado']): ?>
                                <a href="editar.php?id=<?= $desejo['id'] ?>" class="btn-editar">Editar</a>
                            <?php endif; ?>
                            
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