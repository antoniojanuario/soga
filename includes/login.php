<?php
session_start(); // Inicia a sessão
include 'conexao.php'; // Inclui a conexão com o banco de dados

$email = "";
$password = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
}

// Define um cookie para o usuário
setcookie('usuario', $email);

// Verifica se é o administrador
if ($email == 'admin' && $password == 'admin') {
    $_SESSION['logado'] = true;
    header('Location: index.php');
    exit; // Garante que o script pare de executar
}

// Prepara a consulta para verificar o usuário no banco de dados
$dados = $connection->prepare("SELECT password, email FROM users WHERE email = :email;");
$dados->bindValue(':email', $email);
$dados->execute();

if ($dados->rowCount() > 0) {
    $senha_bd = $dados->fetchAll(PDO::FETCH_OBJ);

    foreach ($senha_bd as $user) {
        if (password_verify($password, $user->password)) {
            echo "Tudo certo!";
            setcookie('nome', $user->nome);
            $_SESSION['logado'] = true;
            header('Location: index.php');
            exit; // Garante que o script pare de executar
        } else {
            aviso_usuario_senha_incorretos();
        }
    }
} else {
    aviso_usuario_senha_incorretos();
}

function aviso_usuario_senha_incorretos() {
    // Função para tratar erros de login
    echo "Usuário ou senha incorretos.";
}
?>
