<?php

use Alura\MVC\Controller\Controller;
use Alura\MVC\Controller\EditVideoController;
use Alura\MVC\Controller\FormController;
use Alura\MVC\Controller\NewVideoController;
use Alura\MVC\Controller\RemoveVideoController;
use Alura\MVC\Controller\VideoListController;
use Alura\MVC\Repository\VideoRepository;

/** @var Controller $controller */

require_once __DIR__ . "/../vendor/autoload.php";

$dbPath = __DIR__ . "/../banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$routes = require_once __DIR__ . "/../config/routes.php";

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllerClass($videoRepository);
} else {
    http_response_code(404);
}

$controller->req();
