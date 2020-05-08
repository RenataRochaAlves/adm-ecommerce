<?php 

// função que carrega os usuarios existentes
function carregaUsuarios(){

    $json = file_get_contents("includes/usuarios.json");

    $usuarios = json_decode($json, true);

    ksort($usuarios);

    return $usuarios;

}

// função que adiciona um novo usuario
function addUsuario($nome, $email, $senha) {

    $usuarios = carregaUsuarios();

    $ultimo = end($usuarios);

    $novoUsuario = ["id" => $ultimo['id'] + 1,
                    "nome" => $nome,
                    "email" => $email,
                    "senha" => password_hash($senha, PASSWORD_DEFAULT)];

    $usuarios[] = $novoUsuario;

    $json = json_encode($usuarios);

    file_put_contents('includes/usuarios.json', $json);
}



// função para pegar o array associativo do json
function carregaProdutos() {

    // puxa os arquivos do json e armazena em uma variável
    $json = file_get_contents("includes/produtos.json");

    // decodifica esses arquivos em um array associativo e armazena em outra variável
    $produtos = json_decode($json, true);

    // ordena o array de acordo com o numero das chaves
    ksort($produtos);

    // retorna o array associativo
    return $produtos;
}

// $teste = carregaProdutos();

// var_dump($teste);

function addProduto($nome, $descricao, $valor, $imagem){

    // coloca array associativo de produtos até o momento dentro de uma variável
    $produtos = carregaProdutos();

    $ultimo = end($produtos);

    // armazena os dados recebidos do produto em uma variável
    $novoProduto = ["id" => $ultimo['id'] + 1,
                    "nome" => $nome,
                    "descricao" => $descricao,
                    "valor" => $valor,
                    "imagem" => $imagem];

    // coloca os dados do produto novo dentro do array de produtos 
    $produtos[] = $novoProduto;

    // codifica o array de produtos para json
    $json = json_encode($produtos);

    // verifica se o array não está vazio
    // if(strlen($produtos) > 0){
    //     // transferre os dados para o arquivo json
        file_put_contents('includes/produtos.json', $json);
}

// função que deleta os produtos do json
function resetaProdutos(){
    // carrega os dados do json
    $json = file_get_contents('produtos.json');

    $produtos = json_decode($json, true);

    $produtos = $produtos[0];

    $json = json_encode($produtos);

    file_put_contents('produtos.json', $json);
}

// resetaProdutos();

// procura o produto por id
function produtoId($id){
    $produtos = carregaProdutos();

    foreach($produtos as $produto){
        if($produto['id'] == $id){
            return $produto;
        }
    } 
    return false;
}

// função que procura o usuario por id
function usuarioId($id){
    $usuarios = carregaUsuarios();

    foreach($usuarios as $usuario){
        if($usuario['id'] == $id){
            return $usuario;
        }
    } 
    return false;
}

// função para editar um produto por id
function editaProduto($id, $nome, $descricao, $preco, $imagem) {
    $produtos = carregaProdutos();

    for($i=0; $i <= count($produtos); $i++){
        if($produtos[$i]['id'] == $id){
            $posicao = $i;
        }
    }

    $editaProduto = ["id" => $id,
                    "nome" => $nome,
                    "descricao" => $descricao,
                    "valor" => $preco,
                    "imagem" => $imagem];

    $produtos[$posicao] = $editaProduto;

    $json = json_encode($produtos);

    file_put_contents('includes/produtos.json', $json);
}

// função para excluir um produto por id
function deletaProduto($id){
    $produtos = carregaProdutos();

    for($i=0; $i <= count($produtos); $i++){
        if($produtos[$i]['id'] == $id){
            $posicao = $i;
        }
    }

    unset($produtos[$posicao]);

    $json = json_encode($produtos);

    file_put_contents('includes/produtos.json', $json);
}

// função para excluir um usuario por id
function deletaUsuario($id){
    $usuarios = carregaUsuarios();

    foreach($usuarios as $key => $usuario){
        if($usuario['id'] == $id){
            $posicao = $key;
        }
    }

    unset($usuarios[$posicao]);

    $json = json_encode($usuarios);

    file_put_contents('includes/usuarios.json', $json);
}

// função para editar um usuario por id
function editaUsuario($id, $nome, $email, $senha) {
    $usuarios = carregaUsuarios();

    $editado = ["id" => $id,
                "nome" => $nome,
                "email" => $email,
                "senha" => password_hash($senha, PASSWORD_DEFAULT)];

    foreach($usuarios as $key => $usuario){
        if($usuario['id'] == $id){
            $posicao = $key;
        }
    }

   $usuarios[$posicao] = $editado;

    $json = json_encode($usuarios);

    file_put_contents('includes/usuarios.json', $json);
}

?>