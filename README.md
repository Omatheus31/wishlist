# Projeto Lista de Desejos (Wishlist) 📝

![PHP](https://img.shields.io/badge/PHP-8.2%2B-%23777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-%234479A1?style=for-the-badge&logo=mysql)
![License](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)

Uma aplicação web simples, porém completa, para gerenciar uma lista de desejos pessoal. Este projeto foi desenvolvido como parte da disciplina de Programação para Web, demonstrando funcionalidades de um CRUD (Create, Read, Update, Delete) completo com PHP e MySQL.

---

## ✨ Funcionalidades

O sistema permite ao usuário gerenciar seus desejos com as seguintes ações:

* **Criar:** Adicionar novos desejos à lista.
* **Ler:** Visualizar a lista completa de desejos.
* **Atualizar:** Editar a descrição e a prioridade de um desejo existente.
* **Excluir:** Remover um desejo da lista (com diálogo de confirmação).
* **Marcar como Comprado:** Alterar o status de um desejo para "comprado", aplicando um estilo visual diferente e movendo-o para o final da lista.
* **Prioridades:** Classificar desejos com prioridades (Alta, Média, Baixa), que alteram a ordem de exibição.

---

## 🛠️ Tecnologias Utilizadas

* **Back-end:**
    * PHP 8+
    * PDO para conexão segura com o banco de dados
* **Front-end:**
    * HTML5 semântico
    * CSS3 moderno com Flexbox
    * JavaScript puro (vanilla) para interatividade
* **Banco de Dados:**
    * MySQL
* **Ambiente de Desenvolvimento:**
    * XAMPP (Apache + MySQL)

---

## 🚀 Como Executar o Projeto Localmente

Siga os passos abaixo para rodar a aplicação na sua máquina.

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/Omatheus31/wishlist.git](https://github.com/Omatheus31/wishlist.git)
    ```

2.  **Mova para a pasta do servidor:**
    * Mova a pasta `wishlist` clonada para dentro do diretório `htdocs` da sua instalação do XAMPP.
    * (Geralmente em `C:/xampp/htdocs/`)

3.  **Inicie o XAMPP:**
    * Abra o Painel de Controle do XAMPP e inicie os módulos **Apache** e **MySQL**.

4.  **Crie e importe o Banco de Dados:**
    * Abra seu navegador e acesse o phpMyAdmin em `http://localhost/phpmyadmin`.
    * Crie um novo banco de dados com o nome `wishlist`.
    * Selecione o banco `wishlist` recém-criado, clique na aba **Importar**.
    * Clique em "Escolher arquivo" e selecione o arquivo `database.sql` que está na raiz do projeto.
    * Clique em "Executar" no final da página. As tabelas e o usuário admin padrão serão criados.

5.  **Acesse a aplicação:**
    * Pronto! Agora você pode acessar o projeto no seu navegador através do link:
    * `http://localhost/wishlist/`

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

Feito por **Matheus Farias Sousa**.