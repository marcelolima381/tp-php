<?php

require_once '../vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$test = function () {
    echo 'Funfou!';
};

$app->get('/', $test);


$app->get('/user[[/{range:[0-9]+-[0-9]+(?!\S)}][/{id:[0-9]+}]]', '\Controller\User');

$app->post('/register/{type:[u|e|v]}', '\Controller\Register');

$app->patch('/alter/{type:[u|e|v]}/{id:[0-9]+}', '\Controller\Alter');
