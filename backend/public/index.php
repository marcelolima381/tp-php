<?php

require_once '../vendor/autoload.php';

use Slim\Http\Request;
use Slim\Http\Response;

define("DB", "../data/");
define("CRED", "../credentials/");
define("HOST", "http://localhost:8080");

$app = new \Slim\App();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$test = function () {
    echo 'Testando...';
};

$app->get('/', $test);

/**
 * Insecure routes
 */
$app->group('/user', function () {
    $this->get('[/{range:[0-9]+[-][0-9]+}]', '\Controller\User');
    $this->get('/{id:[0-9]+}', '\Controller\User');
    $this->get('/available', '\Controller\User');
});
$app->group('/company', function () {
    $this->get('[/{range:[0-9]+-[0-9]+}]', '\Controller\Company');
    $this->get('/{id:[0-9]+}', '\Controller\Company');
});
$app->group('/job', function () {
    $this->get('[/{range:[0-9]+-[0-9]+}]', '\Controller\Job');
    $this->get('/{id:[0-9]+}', '\Controller\Job');
});
$app->get('/verify/{type:[u|c]}/{id:[0-9]+}', '\Controller\EmailVerify');

/**
 * "Secure" routes
 */
$app->group('/register', function () {
    $this->post('/{type:j}', '\Controller\Register')->setName('registerJob')->add(new \Middleware\AuthMiddleware());
    $this->post('/{type:[u|c]}', '\Controller\Register');
});
$app->patch('/alter/{type:[u|c|j]}/{id:[0-9]+}', '\Controller\Alter')->setName('patch')->add(new \Middleware\AuthMiddleware());

/**
 * Rota de Login
 */
$app->post('/login', '\Controller\Login');

$app->run();
