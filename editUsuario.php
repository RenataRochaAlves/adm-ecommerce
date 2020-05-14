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
        ["nome" => "Criar Usuários",
        "link" => "createUsuario.php"]];

if($_GET['id']){
    $usuario = usuarioId($_GET['id']);

    $nome = $usuario['nome'];
    $email = $usuario['email'];
    $senha = "";
    $confirmacao = "";
}

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
        if($_POST['senhaUsuario']){
            editaUsuario($_GET['id'], $nome, $email, $senha);

            header('location: sucessoUsuario.php');
        } else {
            editaUsuario($_GET['id'], $nome, $email, $usuario['senha']);

            header('location: sucessoUsuario.php');
        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/createUsuario.css">
    <title>Editar Usuário | PetShop</title>
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

            <h3>Editar Usuário</h3>

            <form method="POST">

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
                    <input type="password" name="senhaUsuario" id="senhaUsuario" value="<?= $senha ?>"><br>
                    <?= ($senhaOk? '': '<span class="erro">A senha é muito curta') ?><br>
                    <?= ($confirmacaoOk? '': '<span class="erro">A senha e a confirmação são diferentes') ?>
                </div>

                <div id="confirmacao">
                <label for="confirmacaoUsuario">Confirmação de Senha</label><br>
                    <input type="password" name="confirmacaoUsuario" id="confirmacaoUsuario" value="<?= $confirmacao ?>"><br>
                </div>
                </div>

                <div>
                <button type="submit">Enviar</button>
                </div>
            </form>

    </main>

    <footer>
        <p>Copyright © Renata Rocha</p>
    </footer>
</body>
</html>