<?php

use App\Controllers\UserController;
use App\Controllers\ShoppingListController;
use App\Router;

$router = new Router();

$router->get('/', UserController::class, 'index');
$router->post('/signup', UserController::class, 'signup');
$router->post('/login', UserController::class, 'login');

$router->get('/lists', ShoppingListController::class, 'index');


$router->dispatch();