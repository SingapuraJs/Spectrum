<?php

use Controller\UserController;
use Controller\AuthController;


Flight::route('GET /register', [new UserController(), 'create']);
Flight::route('POST /register', [new UserController(), 'store']);

Flight::route('GET /login', [new AuthController(), 'login']);
Flight::route('POST /login', [new AuthController(), 'auth']);