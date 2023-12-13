<?php

use Controller\AuthController;
use Controller\PostController;
use Controller\UserController;

Flight::route('GET /register', function () {
    $controller = new UserController();
    echo $controller->create();
});

Flight::route('POST /register', function () {
    $controller = new UserController();
    $controller->store();
});

Flight::route('GET /login', function () {
    $controller = new AuthController();
    echo $controller->login();
});

Flight::route('POST /login', function () {
    $controller = new AuthController();
    if($controller->verifyAuthenticated() != true){
        $controller->logout();
    }

    echo $controller->auth();
});

Flight::route('GET /profile/@username', function ($username) {
    $controller = new UserController();
    $auth = new AuthController();
    if($auth->verifyAuthenticated() != true){
        $auth->redirect();
    }
    echo $controller->profile($username);
});

Flight::route('GET /logout', function () {
    $controller = new AuthController();
    $controller->logout();
});

Flight::route('POST /post', function () {
    $controller = new PostController();
    $controller->doPost();
}

);



