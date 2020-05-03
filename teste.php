<?php 

include('includes/functions.php');

$produtos = carregaProdutos();

echo "<pre>";
print_r($produtos);
echo "</pre>";

?>