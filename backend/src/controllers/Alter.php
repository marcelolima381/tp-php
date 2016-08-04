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
            $entidade->flush();
            if ($parsedBody['passwd']) {
                $filename = md5($entidade->getId()) . md5($entidade->getExt());
                $file = fopen(CRED . $filename, "w");
                fwrite($file, md5($parsedBody['passwd']));
                fclose($file);
            }
            return $response->withStatus(200);
        } else {
            return $response->withStatus(409);
        }
    }

}
