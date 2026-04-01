<?php

$id = $_REQUEST['id'];

$db = new DB;

$livro = $db->query(
    query: 'select * from livros where id = :id',
    class: Livro::class,
    params: [':id' => $id]
)->fetch();

view('livro', compact('livro'));