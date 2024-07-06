<?php 
    include "./includes/functions.php";
?>
<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tela de Cadastro SOGA</title>
   <link rel="stylesheet" href="./issets/css/cadastrar.css">
</head>
<body>
    <?php 
        require './includes/modulos.php';
        session_start();
        if ($_SESSION['logado']):
    ?>
   <div class="container">
       <div class="left">
         <!-- Conteúdo opcional para a parte esquerda da tela -->
       </div>
       <div class="right">
           <div class="login-form">
               <img src="./issets/images/SOGA.png" alt="Logo">
               <h2>Cadastro</h2>
               <form action="" method="POST" id="cadastroForm">
                   <div class="form-group">
                       <label for="nome">Nome do Usuário</label>
                       <input type="text" name="nome" placeholder="Nome Completo" required>
                   </div>
                   <div class="form-group">
                       <label for="email">Email</label>
                       <input type="email" name="email" placeholder="email@example.com" required>
                   </div>
                   <div class="form-group">
                       <label for="senha">Senha</label>
                       <input type="password" name="password" placeholder="Insira uma senha" required>
                   </div>
                   <div class="form-group">
                       <label for="foto">Adicionar Foto</label>
                       <input type="file" name="img" accept="image/*">
                   </div>
                   <div class="buttons">
                       <button type="submit" value="cadastrar">Avançar</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <?php 
        else:
            login_necessario();
        endif
    ?>
</body>
</html>
<?php 

    $cadastrado = false;
    $usuario_existente = false;
    require './includes/conexao.php';

    if (isset($_POST['cadastrar'])) {

        if (existe_usuario($_POST['email'])) {
            aviso_usuario_existente();
        } else {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $img = $_POST['img'];
            $cadastro = $connection->prepare(
                "INSERT INTO alunos (name, email, password, img) VALUES (:nome, :email, :password, :img);"
            );
            $cadastro->bindValue(":nome", $nome);
            $cadastro->bindValue(":email", $email);
            $cadastro->bindValue(":password", $password);
            $cadastro->bindValue(":img", $img);
            $cadastro->execute();
            $cadastrado = true;
        }

    }

    if ($cadastrado):
?>

<script>
header('login.php');
</script>

<?php 
    endif
?>
