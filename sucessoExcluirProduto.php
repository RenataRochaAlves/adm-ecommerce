<?php 

require('includes/functions.php');

$menu = [["nome" => "Criar Produto", 
        "link" => "createProduto.php"],
        ["nome" => "Lista de Produtos",
        "link" => "indexProdutos.php"],
        ["nome" => "Criar Usuários",
        "link" => "createUsuario.php"]];

if($_GET['id']){
    $id = $_GET['id'];

    deletaProduto($id);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mensagemSucesso.css">
    <title>Sucesso! | PetShop</title>
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
                <li><a href="logoutUsuario.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="conteudo">
            
            <div class="mensagem">
            <img src="img/022-poop.png" alt="peixe">
            <h3>Produto excluído com sucesso!</h3>
            </div>
            <a href="indexProdutos.php"><button>Voltar para lista de produtos</button></a>
            
        </div>
    </main>

    <footer>
        <p>Copyright © Renata Rocha</p>
    </footer>
</body>
</html>