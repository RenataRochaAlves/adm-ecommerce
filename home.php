<?php 

require('includes/functions.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home | PetShop</title>
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
        <div class="imagem">
            <img src="img/044-paw-1.png" alt="medalha animal">
        </div>
        <div class="info">
            <h3>Site para a criação, edição e exclusão de produtos e usuários administradores do e-commerce PetShop</h3>
            <p>Faça login para continuar</p>
            <a href="loginUsuario.php"><button>Fazer login</button></a>
        </div>
    </main>

    <footer>
        <p>Copyright © Renata Rocha</p>
    </footer>
</body>
</html>