<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/user/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response

    return $response;
});
$app->run();