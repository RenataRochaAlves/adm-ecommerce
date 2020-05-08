<?php 

session_start();

unset($_SESSION['nome']);
unset($_SESSION['email']);

require('includes/functions.php');


$menu = [["nome" => "Criar Produto", 
        "link" => "createProduto.php"],
        ["nome" => "Lista de Produtos",
        "link" => "indexProdutos.php"],
        ["nome" => "Produto",
        "link" => "#"],
        ["nome" => "Editar Produto",
        "link" => "#"]];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mensagemSucesso.css">
    <title>Logout efetuado com sucesso | PetShop</title>
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
                <li><a href="<?= $value['link'] ?>"><?= $value['nome'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
        <nav class="login">
            <ul>
                <li><a href="createUsuario.php">Cadastre-se</a></li>
                <li><a href="loginUsuario.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="conteudo">
            
            <div class="mensagem">
                <img src="img/029-cage.png" alt="gaiola">
                <h3>Logout efetuado com sucesso!</h3>
            </div>
            <div>
                <a href="loginUsuario.php"><button>Fazer login</button></a>
                <a href="home.php" id="home"><button>Ir para a home</button></a>
            </div>
            </div>
    </main>

    <footer>
        <nav class="menu-footer">
            <ul>
                <?php foreach($menu as $value): ?>
                <li><a href="<?= $value['link'] ?>"><?= $value['nome'] ?></a></li>
                <?php endforeach ?>
            </ul>
            </nav>
    </footer>
</body>
</html>