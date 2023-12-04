<?php

use Controller\AuthController;
use Controller\UserController;
use GrahamCampbell\ResultType\Success;

Flight::route('GET /register', function () {
    $controller = new UserController();
    echo $controller->create();
});

Flight::route('POST /register', function () {

    $userData = [
        'usr_usuario' => $_POST['username'],
        'usr_email' => $_POST['email'],
        'usr_senha' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'usr_telefone' => $_POST['tel']
    ];
    $username = $_POST['username'];
    $userEmail = $_POST['email'];

    $controller = new UserController();
    if($controller->model->checkCredentials($username, $userEmail)){
        echo "Usuário ou E-mail já cadastrados";
    }else {
        $result = $controller->store($userData);
        if ($result['success']){
            echo "Usuário cadastrado com sucesso. Você sera redirecionado para a pagina de Login em algum segundos...";
            sleep(5);
            Flight::redirect("./login");
        } else {
            echo "Ocorreu um erro, tente novamente. " . $result['error'] . ".";
        }
    };
});

Flight::route('GET /login', function () {
    $controller = new AuthController();
    echo $controller->login();
});

Flight::route('POST /login', function () {
    $controller = new AuthController();
    echo $controller->auth();
});
