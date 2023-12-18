<?php

use Controller\HomeController;

Flight::route('/', function () {
    Flight::redirect('/home');
});

Flight::route('/home', function () {
    $controller = new HomeController();
    echo $controller->index();
});


require __DIR__ . '/UserRoutes.php';
?>