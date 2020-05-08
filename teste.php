<?php 

include('includes/functions.php');

$usuarios = carregaUsuarios();

$id = 3;

    $editado = ["id" => $id,
                "nome" => "Teste 2",
                "email" => "teste2@petshop.com",
                "senha" => password_hash("123456", PASSWORD_DEFAULT)];

    foreach($usuarios as $key => $usuario){
        if($usuario['id'] == $id){
            $posicao = $key;
        }
    }

   $usuarios[$posicao] = $editado;

    echo "<pre>";
    print_r($usuarios);
    echo "</pre>";


?>