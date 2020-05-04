<?php 

include('includes/functions.php');

$menu = [["nome" => "Criar Produto", 
        "link" => "createProduto.php"],
        ["nome" => "Lista de Produtos",
        "link" => "indexProdutos.php"],
        ["nome" => "Produto",
        "link" => "#"],
        ["nome" => "Editar Produto",
        "link" => "#"]];

$produtos = carregaProdutos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/indexProdutos.css">
    <title>Produtos | PetShop</title>
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

            <h3>Produtos</h3>

            <ul class="cabecalho">
                <li>ID</li>
                <li>Nome</li>
                <li>Descrição</li>
                <li>Preço</li>
                <li>Link</li>
            </ul>

            <?php foreach($produtos as $value): ?>
                    <div class="produto">
                        <ul>
                        <li><?= $value["id"] ?></li>
                        <li><?= $value["nome"] ?></li>
                        <li><?= $value["descricao"] ?></li>
                        <li><?= $value["valor"] ?></li>
                        <li><a href="produto.php?id=<?= $value["id"] ?>">Ver produto</a></li>
                        </ul>
                    </div>
            <?php endforeach; ?>

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