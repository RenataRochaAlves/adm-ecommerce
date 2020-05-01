<?php 

$menu = ["Criar Produto", "Lista de Produtos", "Produto", "Editar Produto"];

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
    <title>Adicionar Novo Produto | PetShop</title>
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

            <h3>Adicionar Novo Produto</h3>

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

                <div>
                    <label for="foto">Selecione a imagem do produto</label><br>
                    <label class="imagem">
                        <!-- estando dentro da mesma label tudo se torna clicável e funcional -->
                        <img src="img/imagem.png" id="foto-carregada"><br>
                        <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png,.gif"><br>
                    </label>
                </div>

                <div>
                <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
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