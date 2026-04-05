<?php

$id = $_REQUEST['id'];
$livro = $database
    ->query(
        query: 'select * from livros where id = :id',
        class: Livro::class,
        params: [':id' => $id]
    )
    ->fetch();

$avaliacoes = $database
    ->query(
        query: 'select 
                avaliacoes.*,
                u.nome as usuario_nome
                from avaliacoes 
                join usuarios as u on u.id = avaliacoes.usuario_id 
                where livro_id = :id',
        class: Avaliacao::class,
        params: ['id' => $_GET['id']]
    )
    ->fetchAll();

view('livro', compact('livro', 'avaliacoes'));
