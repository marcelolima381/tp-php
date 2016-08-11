<?php

namespace Controller;

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
            if (isset($parsedBody['passwd'])) {
                $parsedBody['passwd'] = NULL;
            }
            if (isset($parsedBody['email'])) {
                $parsedBody['email'] = NULL;
            }
            echo "Manoo";
            $entidade = \Helper\Validator::validadeCreate($args['type'], $parsedBody);
            if ($entidade == NULL) {
                return $response->withStatus(400);
            }
            if ($args['type'] == 'user' || $args['type'] == 'company') {
                if (isset($parsedBody['passwd'])) {
                    // Cria o arquivo de credencial (passwd + login)
                    $credfile = md5($entidade->id) . md5($entidade->getExt());
                    $file = fopen(CRED . $credfile, "w");
                    fwrite($file, md5($parsedBody['passwd']));
                    fclose($file);
                }
            } elseif (!array_key_exists("empresaId", $parsedBody)) {
                return $response->withStatus(400);
            }
            $entidade->flush();
            return $response->withStatus(200)->withJson($entidade);
        } 
            return $response->withStatus(404);
        
    }

}
