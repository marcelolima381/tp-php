<?php

require_once '../vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

define("DB", "../data/");

$app = new \Slim\App();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$test = function () {
    echo 'Funfou!';
};

$app->get('/', $test);


$app->group('/user', function () {
    $this->get('[/{range:[0-9]+-[0-9]+}]', '\Controller\User');
    $this->get('/{id:[0-9]+}', '\Controller\User');
});

$app->group('/company', function () {
    $this->get('[/{range:[0-9]+-[0-9]+}]', '\Controller\Company');
    $this->get('/{id:[0-9]+}', '\Controller\Company');
});

$app->group('/job', function () {
    $this->get('[/{range:[0-9]+-[0-9]+}]', '\Controller\Job');
    $this->get('/{id:[0-9]+}', '\Controller\Job');
});

$app->group('/register', function () {
    $this->post('/{type:j}', '\Controller\Register')->add(new \Middleware\AuthMiddleware());
    $this->post('/{type:[u|c]}', '\Controller\Register');
});

$app->patch('/alter/{type:[u|e|v]}/{id:[0-9]+}', '\Controller\Alter')->add(new \Middleware\AuthMiddleware());

$app->run();