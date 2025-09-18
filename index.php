<?php

require_once("autoloader.php");
use App\router\Router;
use App\controllers\HomeController;

$router = new Router();
$router->add("GET", "/PHP/udemy/Todo-App/", "HomeController@index");

$router->dispatch();