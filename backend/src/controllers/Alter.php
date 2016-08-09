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
        $entidade = \Helper\Validator::validadeCreate($args['type'], $parsedBody);
        if ($entidade == null) {
            return $response->withStatus(400);
        } elseif (\Persistence\Persist::readObject($entidade->getId(), $entidade->getExt())) {
            if (array_key_exists("passwd", $parsedBody)) {
                // Cria o arquivo de credencial (passwd + login)
                $credfile = md5($entidade->id) . md5($entidade->getExt());
                $file = fopen(CRED . $credfile, "w");
                fwrite($file, md5($parsedBody['passwd']));
                fclose($file);
                // Cria o arquivo para mapear email -> id
                $mapObj = new \stdClass();
                $mapObj->id = $entidade->getId();
                $mapObj->type = $args['type'];
                $file2 = fopen(LOGIN . $entidade->getEmail(), "w");
                fwrite($file2, \Helper\JsonHandler::encode($mapObj));
                fclose($file2);
            } elseif (!array_key_exists("empresaId", $parsedBody)) {
                return $response->withStatus(400);
            }
            $entidade->flush();
            return $response->withStatus(200)->withJson($entidade);
        } else {
            return $response->withStatus(409);
        }
    }

}
