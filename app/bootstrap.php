<?php
// Created by Icecream <icecream@jokyprod.com>

include_once __DIR__ . '/../vendor/autoload.php';

use App\Router\Router;
use App\Controllers\ {
    HomeController,
    AboutController,
};

$router = new Router();

$router->add('/home', HomeController::class);


$router->run();