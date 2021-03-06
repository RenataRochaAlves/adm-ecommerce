<?php 

session_start();

if(!$_SESSION){
    header('location: acessoNegado.php');
}

require('includes/functions.php');


$menu = [["nome" => "Criar Produto", 
        "link" => "createProduto.php"],
        ["nome" => "Lista de Produtos",
        "link" => "indexProdutos.php"],
        ["nome" => "Criar Usuários",
        "link" => "createUsuario.php"]];

if($_GET){
    $id = $_GET['id'];

    $produto = produtoId($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produto.css">
    <title><?= $produto['nome'] ?> | PetShop</title>
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
            
            <div class ="produto">
                <div class="imagem">
                    <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                </div>
                <div class="info">
                    <h3><?= $produto['nome'] ?></h3>
                    <h5>Descrição</h5>
                    <p><?= $produto['descricao'] ?></p>
                    <h5>Valor</h5>
                    <h4>R$ <?= $produto['valor'] ?></h4>
                </div>
                    <a href="editProduto.php?id=<?= $id ?>"><button class="edit">Editar produto</button></a>
                    <a href="sucessoExcluirProduto.php?id=<?= $id ?>"><button class="remove">Excluir produto</button></a>
                </div>
                    <a href="indexProdutos.php"><button>Voltar para lista de produtos</button></a>

    </main>

    <footer>
        <p>Copyright © Renata Rocha</p>
    </footer>
</body>
</html>