<?php
require 'dados.php';

$id = $_REQUEST['id'];

$filtrado = array_filter($livros, function ($livro) use ($id) {
    return $livro['id'] == $id;
});

$livro = array_pop($filtrado);

view('livro', ['livro' => $livro]);