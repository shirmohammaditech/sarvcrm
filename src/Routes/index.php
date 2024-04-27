<?php

use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->post('/signup', HomeController::class, 'signup');
$router->dispatch();