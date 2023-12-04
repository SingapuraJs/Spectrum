<?php

use Controller\HomeController;

Flight::route('/', function () {
    $controller = new HomeController();
    echo $controller->index();
});

Flight::route('/home', function () {
    $controller = new HomeController();
    echo $controller->index();
});

Flight::route('/about', function () {
    $controller = new HomeController();
    echo $controller->about();
});


require __DIR__ . '/UserRoutes.php';
?>