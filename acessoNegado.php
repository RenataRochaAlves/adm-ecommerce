<?php 

require('includes/functions.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mensagemSucesso.css">
    <title>Acesso Negado | PetShop</title>
</head>
<body>
    <header>
        <div>
            <img src="img/031-paw.png" alt="E-commerce Logo">
            <h2>PetShop</h2>
        </div>
        
        <nav class="login">
            <ul>
                <li><a href="loginUsuario.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="conteudo">
            
            <div class="mensagem">
            <img src="img/033-bird-house.png" alt="casa de passarinho">
            <h3>Essa página só está disponível para usuários logados!</h3>
            </div>
            <a href="loginUsuario.php"><button>Fazer login</button></a>
            
        </div>
    </main>

    <footer>
        <p>Copyright © Renata Rocha</p>
    </footer>
</body>
</html>