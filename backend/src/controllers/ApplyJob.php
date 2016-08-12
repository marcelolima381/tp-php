<?php

namespace Controller;

/**
 * Gerencia as rotas para cadastrar usuários em vagas
 *
 * @author asantos07
 */
class ApplyJob  extends DefaultController{
    
    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        $userId = $request->getParsedBodyParam('id');
        $jobId = $args['id'];
        $job = \Persistence\Persist::readObject($jobId, \Entity\Vaga::getExt());
        if($job == NULL){
            return $response->withStatus(404);
        }
        $jobObj = \Helper\Validator::validadeCreate('job', $job);
        return $response->withJson($jobObj);
    }

}
