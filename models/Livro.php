<?php

class Livro
{
    public $id;
    public $title;
    public $author;
    public $description;
    public $ano_de_lancamento;
    public $usuario_id;
    public $nota_avaliacao;
    public $total_avaliacoes;


    private function query($where, $params)
    {
        $database = new Database(config('database'));
        return $database->query(
            "select
                    l.*
                    , ifnull(round (sum(a.nota) / 5), 0) as nota_avaliacao
                    , ifnull(count(a.id), 0) as total_avaliacoes
                    from
                    livros l
                    left join avaliacoes a on a.livro_id = l.id
                    where $where
                    group by l.id",
            self::class,
            $params
        );
    }

    public static function get($id)
    {
        return (new self)->query('l.id = :id', ['id' => $id])->fetch();
    }

    public static function all($pesquisar)
    {
        return (new self)->query('title like :filtro', ['filtro' => "%$pesquisar%"])->fetchAll();
    }

    public static function getByUser($usuario_id)
    {
        return (new self)->query('l.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchAll();
    }
}
