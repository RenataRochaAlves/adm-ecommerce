<?php 

// include('produtos.json');

$produtos = ["id" => 1,
            "nome" => "Ração Golden 1kg",
            "descricao" => "Ração Golden sabor carne e arroz para cães adultos de raças pequenas",
            "preco" => 13,99,
            "imagem" => "img/produtos/Ração_Golden_Formula_Carne_e_Arroz_para_Cães_Adultos_de_Raças_Pequenas_-_1_Kg_1210469.jpg"];

$json = json_encode($produtos);

file_put_contents('includes/produtos.json', $json);


// função para pegar o array associativo do json
function carregaProdutos() {

    // puxa os arquivos do json e armazena em uma variável
    $json = file_get_contents("includes/produtos.json");

    // decodifica esses arquivos em um array associativo e armazena em outra variável
    $produtos = json_decode($json, true);

    // retorna o array associativo
    return $produtos;
}

function addProduto($nome, $descricao, $valor, $imagem){

    // coloca array associativo de produtos até o momento dentro de uma variável
    $produtos = carregaProdutos();

    // armazena os dados recebidos do produto em uma variável
    $novoProduto = ["id" => count($produtos) + 1,
                    "nome" => $nome,
                    "descricao" => $descricao,
                    "valor" => $valor,
                    "imagem" => $imagem];

    // coloca os dados do produto novo dentro do array de produtos 
    $produtos[] = $novoProduto;

    // codifica o array de produtos para json
    $json = json_encode($produtos);

    // verifica se o array não está vazio
    if(strlen($produtos) > 0){
        // transferre os dados para o arquivo json
        file_put_contents('includes/produtos.json', $json);
    }
}

?>