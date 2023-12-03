<?php 

use Controller\HomeController;

Flight::route('/', function () {
    $controller = new HomeController();
    echo $controller->index();
});

require __DIR__ . '/UserRoutes.php';
?>