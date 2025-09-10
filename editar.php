<?php
// editar.php
require_once 'db.php';

// Pega o ID da URL
$id = $_GET['id'];

// Busca o desejo específico no banco
$stmt = $pdo->prepare('SELECT * FROM desejos WHERE id = ?');
$stmt->execute([$id]);
$desejo = $stmt->fetch();

// Se o formulário de edição for enviado...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_descricao = $_POST['descricao'];

    $updateStmt = $pdo->prepare('UPDATE desejos SET descricao = ? WHERE id = ?');
    $updateStmt->execute([$nova_descricao, $id]);

    // Redireciona para a página inicial após salvar
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Desejo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Desejo</h1>
        <form method="POST" class="form-desejo">
            <input type="text" name="descricao" value="<?= htmlspecialchars($desejo['descricao']) ?>" required>
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>