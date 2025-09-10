<?php
// editar.php
require_once 'db.php';

// Validação inicial do ID
if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    header('Location: index.php');
    exit;
}
$id = $_GET['id'];

// Se o formulário de edição for enviado...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_descricao = trim($_POST['descricao']);
    $nova_prioridade = $_POST['prioridade'];
    
    // Validação
    $prioridadesValidas = ['Baixa', 'Média', 'Alta'];
    if (!empty($nova_descricao) && in_array($nova_prioridade, $prioridadesValidas)) {
        $updateStmt = $pdo->prepare('UPDATE desejos SET descricao = ?, prioridade = ? WHERE id = ?');
        $updateStmt->execute([$nova_descricao, $nova_prioridade, $id]);
        
        header('Location: index.php');
        exit;
    }
}

// Busca o desejo específico no banco para preencher o formulário
$stmt = $pdo->prepare('SELECT * FROM desejos WHERE id = ?');
$stmt->execute([$id]);
$desejo = $stmt->fetch();

// Se não encontrou o desejo, volta para a home
if (!$desejo) {
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
            
            <select name="prioridade">
                <option value="Baixa" <?= ($desejo['prioridade'] == 'Baixa') ? 'selected' : '' ?>>Baixa</option>
                <option value="Média" <?= ($desejo['prioridade'] == 'Média') ? 'selected' : '' ?>>Média</option>
                <option value="Alta"  <?= ($desejo['prioridade'] == 'Alta') ? 'selected' : '' ?>>Alta</option>
            </select>
            
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>