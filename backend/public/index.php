<?php

require_once '../vendor/autoload.php';

use Slim\Http\Request;
use Slim\Http\Response;

define("DB", "../data/");
define("CRED", "../credentials/");
define("HOST", "http://localhost:8080");
define("LOGIN", "../login_map/");

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
});
$app->group('/company', function () {
    $this->get('[/{range:[0-9]+-[0-9]+}]', '\Controller\Company');
    $this->get('/{id:[0-9]+}', '\Controller\Company');
});
$app->group('/job', function () {
    $this->get('[/{range:[0-9]+-[0-9]+}]', '\Controller\Job');
    $this->get('/{id:[0-9]+}', '\Controller\Job');
});
$app->get('/verify/{type:user|company}/{id:[0-9]+}', '\Controller\EmailVerify');
$app->post('/search/{type:user|company|job}', '\Controller\Search');

/**
 * "Secure" routes
 */
$app->group('/register', function () {
    $this->post('/{type:job}', '\Controller\Register')->setName('registerJob')->add(new \Middleware\AuthMiddleware());
    $this->post('/{type:user|company}', '\Controller\Register');
});
$app->post('/alter/{type:user|company|job}', '\Controller\Alter')->setName('patch')->add(new \Middleware\AuthMiddleware());

/**
 * Rota de Login
 */
$app->post('/login', '\Controller\Login');

/**
 * Rota de Logout
 */
$app->get('/logout', '\Controller\Logout');

/**
 * Rota de cadastro em vaga
 */
$app->post('/applyjob/{id:[0-9]+}', '\Controller\ApplyJob')->setName('applyJob')->add(new \Middleware\AuthMiddleware());

////////////////////////////////////////////////////////////////////////
$app->post('/testInsertContribution',function(Request $request,Response $response){

    $contribution = $request->getParsedBody();

    $contribution = new \Entity\Contribution($contribution);

    $dao = \Entity\ContributionDAO::getInstance();

    $contribution = $dao->insert($contribution);

    return $response->withJson($contribution);
});

$app->post('/testUpdateContribution',function(Request $request,Response $response){

    $contribution = $request->getParsedBody();

    $contribution = new \Entity\Contribution($contribution);

    $dao = \Entity\ContributionDAO::getInstance();

    $contribution = $dao->update($contribution);

    return $response->withJson($contribution);
});


$app->post('/testDeleteContribution',function(Request $request,Response $response){

    $contribution = $request->getParsedBody();

    $contribution = new \Entity\Contribution($contribution);

    $dao = \Entity\ContributionDAO::getInstance();

    $contribution = $dao->delete($contribution);

    return $response->withJson($contribution);
});

$app->post('/testDeleteAllContribution',function(Request $request,Response $response){

    $dao = \Entity\ContributionDAO::getInstance();

    $dao->deleteAll();
});

$app->post('/testGetByIdContribution',function(Request $request,Response $response){

    $contribution = $request->getParsedBody();

    $contribution = new \Entity\Contribution($contribution);

    $dao = \Entity\ContributionDAO::getInstance();

    $contribution = $dao->getById($contribution);

    return $response->withJson($contribution);
});

$app->post('/testGetAllContribution',function(Request $request,Response $response){


    $dao = \Entity\ContributionDAO::getInstance();

    $contribution = $dao->getAll();

    return $response->withJson($contribution);
});

$app->post('/testGetAllFromUserContribution',function(Request $request,Response $response){

    $contribution = $request->getParsedBody();

    $contribution = new \Entity\Contribution($contribution);

    $dao = \Entity\ContributionDAO::getInstance();

    $contribution = $dao->getAllFromUser($contribution);

    return $response->withJson($contribution);
});
////////////////////////////////////////////////////////////////////////

$app->run();
