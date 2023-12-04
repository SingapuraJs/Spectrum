<?php

use Controller\HomeController;
use Controller\UserController;


Flight::route('/', function () {
    $controller = new HomeController();
    echo $controller->index();
});

/* ----------------------------------------------------- */

Flight::route('GET /register', function () {
    $controller = new UserController();
    echo $controller->create();
});

Flight::route('POST /register', function () {
    $controller = new UserController();
    echo $controller->store();
});

require __DIR__ . '/UserRoutes.php';
?>