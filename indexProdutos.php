<?php 

include('includes/functions.php');

$menu = ["Criar Produto", "Lista de Produtos", "Produto", "Editar Produto"];

$produtos = [["id" => 1,
            "nome" => "Arranhador para gatos",
            "descricao" => "Arranhador para gatos em formato de casa com penas e bolinha",
            "preco" => "59,90",
            "link" => "createProduto.php"],
            ["id" => 2,
            "nome" => "Arranhador para gatos",
            "descricao" => "Arranhador para gatos em formato de casa com penas e bolinha",
            "preco" => "59,90",
            "link" => "createProduto.php"],
            ["id" => 3,
            "nome" => "Arranhador para gatos",
            "descricao" => "Arranhador para gatos em formato de casa com penas e bolinha",
            "preco" => "59,90",
            "link" => "createProduto.php"],
            ["id" => 4,
            "nome" => "Arranhador para gatos",
            "descricao" => "Arranhador para gatos em formato de casa com penas e bolinha",
            "preco" => "59,90",
            "link" => "createProduto.php"],
            ["id" => 5,
            "nome" => "Arranhador para gatos",
            "descricao" => "Arranhador para gatos em formato de casa com penas e bolinha",
            "preco" => "59,90",
            "link" => "createProduto.php"],

];


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

            <h3>Produtos</h3>

            <ul class="cabecalho">
                <li>ID</li>
                <li>Nome</li>
                <li>Descrição</li>
                <li>Preço</li>
                <li><a href="">Link</a></li>
            </ul>

            <?php foreach($produtos as $value): ?>
                    <div class="produto">
                        <ul>
                        <li><?= $value["id"] ?></li>
                        <li><?= $value["nome"] ?></li>
                        <li><?= $value["descricao"] ?></li>
                        <li><?= $value["preco"] ?></li>
                        <li><a href="<?= $value["link"] ?>">Ver produto</a></li>
                        </ul>
                    </div>
            <?php endforeach; ?>

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