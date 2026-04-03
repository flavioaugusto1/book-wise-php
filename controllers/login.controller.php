<?php
require 'Validacao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar(
        [
            'email' => ['email', 'required'],
            'senha' => ['required', 'min:8', 'max:30']
        ],
        $_POST
    );

    if($validacao->naoPassou('login')){
        header('location: /login');
        exit();
    }

    $usuario = $database->query(
        query: "select * from usuarios where email = :email and senha = :senha",
        class: Usuario::class,
        params: compact('email', 'senha')
    )
        ->fetch();


    if ($usuario) {
        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', "Seja bem-vindo! $usuario->nome!");
        header('location: /');
        exit();
    }
}

view('login');
