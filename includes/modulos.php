<?php 
require 'conexao.php';

function existe_usuario($user_post, $excecao = null)
{
    global $connection; // Acesso à conexão definida em conexao.php
    $dados = $connection->prepare("SELECT email FROM users WHERE email = :email");
    $dados->bindParam(':email', $user_post);
    $dados->execute();
    $user = $dados->fetch(PDO::FETCH_OBJ);
    
    if ($user && $user_post != $excecao) {
        return true;
    } 
    
    return false;
}
function aviso_usuario_existente()
{
    echo '
        <script>
        var aviso = document.getElementById("aviso-usuario");
        if (aviso) {
            aviso.textContent = "Usuário já existente!";
        }
        </script>
    ';
}

function aviso_usuario_senha_incorretos()
{
    echo "
        <script>
        var aviso = document.getElementById('aviso');
        if (aviso) {
            aviso.textContent = 'Ops, usuário ou senha incorretos!';
        }
        </script>
    ";
}

function login_necessario() 
{
    header('Location: login.php');
    exit;
}
?>
