<?php

use Alura\MVC\Controller\EditVideoController;
use Alura\MVC\Controller\FormController;
use Alura\MVC\Controller\NewVideoController;
use Alura\MVC\Controller\RemoveVideoController;
use Alura\MVC\Controller\VideoListController;

return [
    "GET|/" => VideoListController::class,
    "GET|/novo-video" => FormController::class,
    "POST|/novo-video" => NewVideoController::class,
    "GET|/editar-video" => FormController::class,
    "POST|/editar-video" => EditVideoController::class,
    "GET|/remover-video" => RemoveVideoController::class,
];
