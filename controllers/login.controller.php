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
        query: "select * from usuarios where email = :email",
        class: Usuario::class,
        params: compact('email')
    )->fetch();


    if ($usuario) {
        $senhaSalva = $usuario->senha;
        $senhasIguais = password_verify($senha, $senhaSalva);

        if( !$senhasIguais ){
            flash()->push('validacoes_login', ['E-mail ou senha inválidos.']);
            header('location: /login');
            exit();
        }

        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', "Seja bem-vindo! $usuario->nome!");
        header('location: /');
        exit();
    }
}

view('login');
