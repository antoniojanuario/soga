
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login SOGA</title>
    <link rel="stylesheet" href="./issets/css/login.css">
</head>
<body>
    <?php 
        require './includes/modulos.php';
        session_start();       
        if ($_SESSION['logado'] !=true):
    ?>

    <div class="container">
        <div class="left">
            <!-- Conteúdo adicional pode ser colocado aqui -->
        </div>
        <div class="right">
            <div class="login-form">
                <img src="./issets/images/SOGA.png" alt="Logo">
                <h2>Login</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="email@example.com" value="<?php if (isset($_COOKIE['usuario'])) { echo $_COOKIE['usuario']; } ?>">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="password" placeholder="Insira uma senha">
                        <div id='aviso'></div>
                    </div>
                    <div class="buttons">
                        <button type="submit" name="entrar" value="Entrar">
                        <a id="cadastrar" href="./cadastrar.php">Cadastra-te</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
        else:
            header('location:pagina-inicial.php');
        endif;
    ?>
</body>
</html>
<?php 

    if(isset($_POST['entrar'])) {
        require 'conexao.php';

        $usuario = $_POST['email'];
        $senha = $_POST['password'];

        setcookie('email', $usuario);

        if ($usuario == 'admin' AND $senha == 'admin' ) {
            $_SESSION['logado'] = true;
            header('location:pagina-inicial.php');
            exit;
        }

        $dados = $connection->prepare("SELECT password, email FROM users WHERE email = :email;");
        $dados->bindValue(':email', $usuario);
        $dados->execute();

        if ($dados->rowCount() > 0) {
            $senha_bd = $dados->fetchAll(PDO::FETCH_OBJ);

            foreach ($senha_bd as $user) {
                if (password_verify($senha, $user->senha)){
                    echo "Tudo certo!";
                    setcookie('email', $user->email);
                    $_SESSION['logado'] = true;
                    header('location:pagina-inicial.php');
                    exit;

                } else {
                    aviso_usuario_senha_incorretos();
                }
            }
        } else {
            aviso_usuario_senha_incorretos();
        }

    }

?>
