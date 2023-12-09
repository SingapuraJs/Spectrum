<?php

use Controller\AuthController;
use Controller\UserController;
use Illuminate\Support\Facades\Auth;

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
    echo $controller->auth();
});

Flight::route('GET /profile', function () {
    $controller = new UserController();
    echo $controller->profile();
});

Flight::route('GET /logout', function () {
    $controller = new AuthController();
    $result = $controller->logout();
});


Flight::route('POST /teste', function () {
    $controller = new UserController();
    $result = $controller->teste();
});


