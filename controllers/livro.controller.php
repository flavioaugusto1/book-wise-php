<?php

$id = $_REQUEST['id'];
$livro = $database->query(
    query: 'select * from livros where id = :id',
    class: Livro::class,
    params: [':id' => $id]
)->fetch();

view('livro', compact('livro'));