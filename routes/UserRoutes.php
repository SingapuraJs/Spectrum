<?php

use Controller\AuthController;
use Controller\UserController;
use GrahamCampbell\ResultType\Success;

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
