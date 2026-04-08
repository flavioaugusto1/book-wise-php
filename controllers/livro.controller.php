<?php

$id = $_REQUEST['id'];
$livro = Livro::get($id);

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
