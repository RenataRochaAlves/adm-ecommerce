<?php 

session_start();

unset($_SESSION['nome']);
unset($_SESSION['email']);

require('includes/functions.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mensagemSucesso.css">
    <title>Logout efetuado com sucesso | PetShop</title>
</head>
<body>
    <header>
        <div>
            <img src="img/031-paw.png" alt="E-commerce Logo">
            <h2>PetShop</h2>
        </div>
    </header>

    <main>
        <div id="conteudo">
            
            <div class="mensagem">
                <img src="img/029-cage.png" alt="gaiola">
                <h3>Logout efetuado com sucesso!</h3>
            </div>
            <div>
                <a href="loginUsuario.php"><button>Fazer login</button></a>
                <a href="home.php" id="home"><button>Ir para a home</button></a>
            </div>
            </div>
    </main>

    <footer>
        <p>Copyright © Renata Rocha</p>
    </footer>
</body>
</html>