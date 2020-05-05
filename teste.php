<?php 

include('includes/functions.php');

$usuarios = carregaUsuarios();

var_dump($usuarios);

// $novoUsuario = ["id" => count($usuarios) + 1,
//                 "nome" => $nome,
//                 "email" => $email,
//                 "senha" => password_hash($senha, PASSWORD_DEFAULT)];

// $usuarios[] = $novoUsuario;

// $json = json_encode($usuarios);

// file_put_contents('includes/usuarios.json', $json);

?>