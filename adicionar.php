<?php
// adicionar.php

// Verifica se o formulário foi enviado (se a requisição é do tipo POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Inclui a conexão com o banco
    require_once 'db.php';

    // Pega a descrição do formulário e remove espaços em branco extras
    $descricao = trim($_POST['descricao']);

    // Validação: verifica se a descrição não está vazia
    if (!empty($descricao)) {
        try {
            // Prepara a instrução SQL para evitar injeção de SQL
            $stmt = $pdo->prepare('INSERT INTO desejos (descricao) VALUES (?)');

            // Executa a instrução, passando a descrição
            $stmt->execute([$descricao]);
        } catch (\PDOException $e) {
            // Em caso de erro, exibe a mensagem (em um app real, você logaria o erro)
            die("Erro ao salvar o desejo: " . $e->getMessage());
        }
    }
}

// Após salvar (ou se a requisição não for POST), redireciona de volta para a página inicial
header('Location: index.php');
exit; // Garante que nenhum código a mais seja executado após o redirecionamento
?>