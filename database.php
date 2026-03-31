<?php

class DB
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:database.sqlite');
    }

    public function livros($pesquisa = null)
    {
        $prepare = $this->db->prepare('select * from livros where title like :pesquisa');
        $prepare->bindValue(':pesquisa', "%$pesquisa%");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_CLASS, Livro::class);
    }

    public function livroPorId($id)
    {
        $prepare = $this->db->prepare("select * from livros where id = :id");
        $prepare->bindParam(':id', $id);
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();
        return $prepare->fetch();
    }
}
