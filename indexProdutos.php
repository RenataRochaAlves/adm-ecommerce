<?php 

session_start();

if(!$_SESSION){
    header('location: acessoNegado.php');
}

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

            <table>
                <div>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Link</th>
                </tr>
                </div>
                <?php foreach($produtos as $value): ?>
                    <div>
                    <tr class="produto">
                        <td><?= $value["id"] ?></td>
                        <td><?= $value["nome"] ?></td>
                        <td><?= $value["descricao"] ?></td>
                        <td>R$<?= $value["valor"] ?></td>
                        <td><a href="produto.php?id=<?= $value["id"] ?>">Ver produto</a></td>
                    </tr>
                    </div>
                <?php endforeach; ?>
            </table>

            

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