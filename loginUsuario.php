<?php 

include('includes/functions.php');

$menu = ["Criar Produto", "Lista de Produtos", "Produto", "Editar Produto"];


// criando a persistência de dados
if($_POST){
    $nome = $_POST['nomeUsuario'];
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];
    $confirmacao = $_POST['confirmacaoUsuario'];
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
        <nav class="menu">
            <ul>
                <?php foreach($menu as $value): ?>
                <li><a href="#"><?= $value ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
        <nav class="login">
            <ul>
                <li><a href="">Cadastre-se</a></li>
                <li><a href="">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="conteudo">

            <h3>Login</h3>

            <form action="loginUsuario.php" method="POST">

                <div id="email">
                <label for="emailUsuario">E-mail</label><br>
                <input type="email" name="emailUsuario" id="emailUsuario" value="<?= $email ?>" placeholder="maria@email.com" required><br>
                </div>

                <div id="senha">
                <label for="senhaUsuario">Senha</label><br>
                    <input type="password" name="senhaUsuario" id="senhaUsuario" value="<?= $senha ?>" required><br>
                </div>

                <button type="submit">Enviar</button>
                </div>
            </form>

    </main>

    <footer>
        <nav class="menu-footer">
                <ul>
                    <?php foreach($menu as $value): ?>
                    <li><a href="#"><?= $value ?></a></li>
                    <?php endforeach ?>
                </ul>
            </nav>
    </footer>
</body>
</html>