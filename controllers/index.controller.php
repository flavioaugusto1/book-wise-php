<?php
$pesquisar = $_REQUEST['pesquisar'] ?? '';
$livros = $database->query(
        query:'select * from livros where title like :filtro',
        class: Livro::class,
        params: ['filtro' => "%$pesquisar%"]
)->fetchAll();

view('index', compact('livros'));