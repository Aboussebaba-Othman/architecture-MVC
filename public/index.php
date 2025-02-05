<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

$router->add('/', 'Front\HomeController', 'index');
$router->add('/about', 'Front\HomeController', 'about');

$url = $_SERVER['REQUEST_URI'];
$router->dispatch($url);
