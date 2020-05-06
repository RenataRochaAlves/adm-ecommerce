<?php 

require('includes/functions.php');


$menu = [["nome" => "Criar Produto", 
        "link" => "createProduto.php"],
        ["nome" => "Lista de Produtos",
        "link" => "indexProdutos.php"],
        ["nome" => "Produto",
        "link" => "#"],
        ["nome" => "Editar Produto",
        "link" => "#"]];

// carregando os dados do produto
if($_GET['id']){
    $produto = produtoId($_GET['id']);

    $nome = $produto['nome'];
    $descricao = $produto['descricao'];
    $preco = $produto['valor'];
    $imagem = $produto['imagem'];
}


// criando a persistência de dados
if($_POST){
    $nome = $_POST['nomeProduto'];
    $descricao = $_POST['descricaoProduto'];
    $preco = $_POST['precoProduto'];

// verifica se foi enviado algum arquivo
    if($_FILES) {
        // Separando informações uteis do $_FILES
        $tmpName = $_FILES['fotoProduto']['tmp_name'];
        $fileName = uniqid() . '-' . $_FILES['fotoProduto']['name'];
        $error = $_FILES['fotoProduto']['error'];

        // Salvar o arquivo numa pasta do meu sistema
        if($error == 0){
            move_uploaded_file($tmpName,'img/produtos/'.$fileName);

        // Salvar o nome do arquivo em $imagem
        $imagem ='img/produtos/'.$fileName;

        } else {
            $imagem = $produto['imagem']; 
        }
    }
    editaProduto($_GET['id'], $nome, $descricao, $preco, $imagem);

    header('location: sucessoEdicaoProduto.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/createProduto.css">
    <title>Editar Produto | PetShop</title>
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

            <h3>Editar Produto</h3>

            <form  method="POST" enctype="multipart/form-data">

                <div id="nome">
                <label for="nomeProduto">Nome do Produto</label><br>
                    <input type="text" name="nomeProduto" id="nomeProduto" value="<?= $nome ?>" placeholder="Arranhador para gatos" required><br>
                    <?php ($nomeOk? '' : '<span class="erro">O nome é muito curto')?>
                </div>

                <div id="descricao">
                <label for="descricaoProduto">Descrição do Produto</label><br>
                    <textarea name="descricaoProduto" id="descricaoProduto" cols="30" rows="10" value="<?= $descricao ?>" placeholder="Brinquedo arranhador para gatos filhotes"><?= $descricao ?></textarea><br>
                </div>

                <div id="preco">
                <label for="precoProduto">Preço do Produto</label><br>
                    <input type="number" step=0.01 name="precoProduto" id="precoProduto" value="<?= $preco ?>" placeholder="35,99" required><br>
                    <?php ($precoOk? '' : '<span class="erro">O preço não é numérico')?>
                </div>

                <div class="fotoProduto">
                    <label for="foto">Selecione a imagem do produto</label><br>
                    <label class="imagem">
                        <!-- estando dentro da mesma label tudo se torna clicável e funcional -->
                        <input type="file" name="fotoProduto" id="foto" accept=".jpg,.jpeg,.png,.gif" require><br>

                        <img src="<?= $imagem ?>" id="foto-carregada"><br>
                    </label>
                </div>

                <div>
                <button type="submit">Enviar</button>
                <a href="produto.php?id=<?= $produto['id'] ?>"><button id="voltar" type="button">Voltar para página do produto</button></a>
                </div>
            </form>

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

    <script>
        document.getElementById("foto").onchange = (evt) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("foto-carregada").src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };
    </script>
</body>
</html>