<?php 

$menu = ["Criar Produto", "Lista de Produtos", "Produto", "Editar Produto", "Cadastrar Usuário", "Login"];

$nome = $_POST['nomeProduto'];
$descricao = $_POST['descricaoProduto'];
$preco = $_POST['precoProduto'];
$foto = $_POST['fotoProduto'];

if($_POST == false){
    $nome = " ";
    $descricao = " ";
    $preco = " ";
    $foto = " ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Adicionar Novo Produto | E-commerce</title>
</head>
<body>
    <header>
        <img src="img/e-commerce.png" alt="E-commerce Logo">
        <nav>
            <ul>
                <?php foreach($menu as $value): ?>
                <li><a href="#"><?= $value ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>

    <main>
    <h3>Adicionar Novo Produto</h3>
        <div id="form">
            <form action="createProduto.php" method="POST">

                <div id="nome">
                <label for="nomeProduto">Nome do Produto</label><br>
                    <input type="text" name="nomeProduto" id="nomeProduto" value="<?= $nome ?>" placeholder="Camiseta Arco-Íris" required><br>
                </div>

                <div id="descricao">
                <label for="descricaoProduto">Descrição do Produto</label><br>
                    <textarea name="descricaoProduto" id="descricaoProduto" cols="30" rows="10" value="<?= $descricao ?>" placeholder="Camiseta com estampa localizada por silk screen de um arco-íris."><?= $descricao ?></textarea><br>
                </div>

                <div id="preco">
                <label for="precoProduto">Preço do Produto</label><br>
                    <input type="number" step=0.01 name="precoProduto" id="precoProduto" value="<?= $preco ?>" placeholder="35,99" required><br>
                </div>

                <div id="foto">
                <label for="fotoProduto">Imagem do Produto</label><br>
                    <input type="file" name="fotoProduto" id="fotoProduto" value="<?= $foto ?>" required><br>
                </div>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>