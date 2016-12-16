<?php

namespace Controller;
use Entity\Credentials;
use Entity\CredentialsDAO;
use Entity\UsuarioDAO;

/**
 * Gerencia todas as rotas de alteração de entidades
 *
 * @author asantos07
 */
class Alter extends DefaultController {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        $parsedBody = $request->getParsedBody();

        $entidade = \Persistence\Persist::readObject($parsedBody['id'], '.' . $args['type']);



        if ($entidade) {
            if (!isset($parsedBody['passwd']) && $args['type'] != 'job') {
                $parsedBody['passwd'] = NULL;
            }
            if(property_exists($entidade, 'email')){
                $parsedBody['email'] = $entidade->email;
            }
            $entidade = \Helper\Validator::validadeCreate($args['type'], $parsedBody);
            if ($entidade == NULL) {
                return $response->withStatus(400);
            }
            if ($args['type'] == 'user' || $args['type'] == 'company') {
                if (isset($parsedBody['passwd'])) {
                    // Cria o arquivo de credencial (passwd + login)
                    $credfile = md5($entidade->getId()) . md5($entidade->getExt());
                    $dao = CredentialsDAO::getInstance();
                    return var_dump($entidade);
                    $data['crecencial'] = $credfile;
                    $data['password'] = md5($parsedBody['passwd']);

                    $cred = new Credentials($data);
                    $dao->update($cred);
                }
            }
            $entidade->flush();

            $dao = UsuarioDAO::getInstance();
            $dao->update($entidade);


            return $response->withStatus(200)->withJson($entidade);
        }
        return $response->withStatus(404);
    }

}
