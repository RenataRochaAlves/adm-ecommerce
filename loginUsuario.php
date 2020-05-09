<?php 

include('includes/functions.php');


$email = "";
$senha = "";

$emailOk = true;
$senhaOk = true;

// criando a persistência de dados
if($_POST){
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];

    $usuarios = carregaUsuarios();

    foreach($usuarios as $usuario){
        if($usuario['email'] == $email){
            if(password_verify($senha, $usuario['senha'])){
                // inicia a session
                session_start();

                // salvando os dados do usuario na session
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['email'] = $usuario['email'];

                header('location: createUsuario.php');

            } else {
                $senhaOk = false;
            }
        } else {
            $emailOk = false;
        }
    }
}



// addProduto($nome, $descricao, $preco, $imagem);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginUsuario.css">
    <title>Login | PetShop</title>
</head>
<body>
<header>
        <div>
            <img src="img/031-paw.png" alt="E-commerce Logo">
            <h2>PetShop</h2>
        </div>
       
    </header>

    <main>
        <div id="conteudo">

            <h3>Login</h3>

            <form action="loginUsuario.php" method="POST">

                <div id="email">
                <label for="emailUsuario">E-mail</label><br>
                <input type="email" name="emailUsuario" id="emailUsuario" value="<?= $email ?>" placeholder="maria@email.com" required><br>
                <?= ($emailOk? '': '<span class="erro">E-mail não cadastrado') ?>
                </div>

                <div id="senha">
                <label for="senhaUsuario">Senha</label><br>
                    <input type="password" name="senhaUsuario" id="senhaUsuario" value="<?= $senha ?>" required><br>
                    <?= ($senhaOk? '': '<span class="erro">A senha está incorreta') ?>
                </div>

                <button type="submit">Enviar</button>
                </form>
                
                <div class="imagem-fundo">
                    <img src="img/049-assistant.png" alt="assistente">
                </div>

        </div>
    </main>

    <footer>
        <p>Copyright © Renata Rocha</p>
    </footer>
</body>
</html>