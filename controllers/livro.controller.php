<?php

$id = $_REQUEST['id'];
$db = new DB;
$livro = $db->livroPorId($id);

view('livro', compact('livro'));