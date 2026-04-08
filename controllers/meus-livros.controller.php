<?php

if(!auth()) {
    abort(401);
}

$usuario_id = auth()->id;
$livros = Livro::getByUser($usuario_id);

view('meus-livros', compact('livros'));