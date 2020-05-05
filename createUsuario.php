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

$usuarios = carregaUsuarios();

$nome = "";
$email = "";
$senha = "";
$confirmacao = "";

$nomeOk = true;
$emailOk = true;
$senhaOk = true;
$confirmacaoOk = true;

// criando a persistência de dados
if($_POST){
    $nome = $_POST['nomeUsuario'];
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];
    $confirmacao = $_POST['confirmacaoUsuario'];

    // criando a verificação de dados
    if(strlen($nome) < 5){
        $nomeOk = false;
    }
    if(strpos($email, '@') == false){
        $emailOk = false;
    }
    if(strlen($senha) < 6){
        $senhaOk = false;
    }
    if($senha != $confirmacao){
        $confirmacaoOk = false;
    }

    // se estiver tudo certo, vai adicionar ao banco de dados
    if($nomeOk && $emailOk && $senhaOk && $confirmacaoOk) {
        addUsuario($nome, $email, $senha);

        header('location: sucessoUsuario.php');
    }

}


// addProduto($nome, $descricao, $preco, $imagem);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/createUsuario.css">
    <title>Criar Usuário | PetShop</title>
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

            <h3>Criar Usuário</h3>

            <form action="createUsuario.php" method="POST">

                <div id="nome">
                <label for="nomeUsuario">Nome Completo</label><br>
                    <input type="text" name="nomeUsuario" id="nomeUsuario" value="<?= $nome ?>" placeholder="Maria da Silva" required><br>
                    <?= ($nomeOk? '': '<span class="erro">O nome é muito curto') ?>
                </div>

                <div id="email">
                <label for="emailUsuario">E-mail</label><br>
                <input type="email" name="emailUsuario" id="emailUsuario" value="<?= $email ?>" placeholder="maria@email.com" required><br>
                <?= ($emailOk? '': '<span class="erro">O e-mail é inválido') ?>
                </div>

                <div id ="senhas">
                <div id="senha">
                <label for="senhaUsuario">Senha</label><br>
                    <input type="password" name="senhaUsuario" id="senhaUsuario" value="<?= $senha ?>" required><br>
                    <?= ($senhaOk? '': '<span class="erro">A senha é muito curta') ?><br>
                    <?= ($confirmacaoOk? '': '<span class="erro">A senha e a confirmação são diferentes') ?>
                </div>

                <div id="confirmacao">
                <label for="confirmacaoUsuario">Confirmação de Senha</label><br>
                    <input type="password" name="confirmacaoUsuario" id="confirmacaoUsuario" value="<?= $confirmacao ?>" required><br>
                </div>
                </div>

                <div>
                <button type="submit">Enviar</button>
                </div>
            </form>


            <h3>Usuários</h3>
    

            <?php foreach($usuarios as $value): ?>
                    <div class="usuario">
                        <ul>
                        <li><?= $value["nome"] ?></li>
                        <li><?= $value["email"] ?></li>
                        <li><a href=""><img src="img/remove.png" alt="remover"></a></li>
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