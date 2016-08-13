<?php

namespace Controller;

/**
 * Gerencia as rotas para cadastrar usuários em vagas
 *
 * @author asantos07
 */
class ApplyJob extends DefaultController {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        $userId = $request->getParsedBodyParam('id');
        $jobId = $args['id'];
        $job = \Persistence\Persist::readObject($jobId, \Entity\Vaga::getExt(), true);
        $user = \Persistence\Persist::readObject($userId, \Entity\Usuario::getExt(), true);
        if ($job == NULL || $user == NULL) {
            return $response->withStatus(404);
        }
        $userObj = \Helper\Validator::validadeCreate('user', $user);
        $jobObj = \Helper\Validator::validadeCreate('job', $job);
        $ok = $jobObj->addInterested($userObj);
        if ($ok) {
            return $response->withJson($userObj);
        } else {
            return $response->withStatus(401, "Already Registered");
        }
    }

}
