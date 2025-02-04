<?php

require_once '../vendor/autoload.php';
require_once __DIR__ . '/../app/Core/Router/Router.php';
require_once '../app/Controllers/Front/HomeController.php';



$router = new Router();


$router->addRoute('GET', '/', 'App\Controllers\Front\HomeController', 'index');


$method = $_SERVER['REQUEST_METHOD'];
$url = strtok($_SERVER['REQUEST_URI'], '?'); 
$router->dispatch($url, $method);

echo "URL: $url <br>";
echo "Méthode: $method <br>";
