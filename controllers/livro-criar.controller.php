<?php

require 'Validacao.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /meus-livros');
    exit();
}

if(!auth()){
    abort(401);
}

$usuario_id = auth()->id;
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$descricao = $_POST['descricao'];
$ano_de_lancamento = $_POST['ano_de_lancamento'];


$validacao = Validacao::validar(
    [
        'titulo' => ['required', 'min:3'],
        'autor' => ['required'],
        'descricao' => ['required'],
        'ano_de_lancamento' => ['required'],
    ],
    $_POST
);

if($validacao->naoPassou()){
    header('location: /meus-livros');
    exit();
}

$database->query(
    query: "insert into livros (usuario_id, title, description, author, ano_de_lancamento) values (:usuario_id, :titulo, :descricao, :autor, :ano_de_lancamento)",
    params: compact('usuario_id', 'titulo', 'autor', 'descricao', 'ano_de_lancamento')
);

flash()->push('mensagem', 'Livro criada com sucesso');
header("location: /meus-livros");
exit();