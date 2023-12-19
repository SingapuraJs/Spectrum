<?php

use Controller\AuthController;
use Controller\PostController;
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
    if($controller->verifyAuthenticated() != true){
        $controller->logout();
    }

    echo $controller->auth();
});

Flight::route('GET /profile', function () {
    Flight::redirect('/profile/' . $_SESSION['user']['name']);
});


Flight::route('GET /profile/@username', function ($username) {
    $controller = new UserController();
    $auth = new AuthController();

    if(empty($_SESSION)){
        echo $controller->profile($username);
        exit;
    }

    if($auth->verifyAuthenticated() != true){
        $auth->redirect();
        echo $controller->profile($username);
        exit;
    }
    $posts = new PostController;
    echo $controller->profile($username);
});

Flight::route('GET /logout', function () {
    $controller = new AuthController();
    $controller->logout();
});

Flight::route('POST /profile/@username/post', function () {
    $controller = new PostController();
    $auth = new AuthController();
    if($auth->verifyAuthenticated() != true){
        $auth->redirect();
    }
    $controller->doPost();
});

   

Flight::route('POST /profile/@username/bio', function () {
    $controller = new UserController();
    $auth = new AuthController();
    if($auth->verifyAuthenticated() != true){
        $auth->redirect();
    }
    $controller->updateBio();
});

Flight::route('POST /profile/@username/image', function () {


    $controller = new UserController();
    $auth = new AuthController();
    if($auth->verifyAuthenticated() != true){
        $auth->redirect();
        Flight::redirect('/login');
    }
    $controller->updatePic();
});

Flight::route('POST /profile/@username/delete/@id', function(){

    $controller = new PostController;
    $auth = new AuthController();
    if($auth->verifyAuthenticated() != true){
        $auth->redirect();
        Flight::redirect('/login');
    }
    $controller->deletePost();
}

);


