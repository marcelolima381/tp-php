<?php

namespace Controller;

/**
 * Gerencia as rotas de criação de entidades
 *
 * @author strudel
 */
class Register extends DefaultController {

    public function __invoke($request, $response, $args) {
        $parsedBody = $request->getParsedBody();
        $type;
        switch ($args['type']) {
            case 'u':
                $type = \Entity\Usuario::class;
                break;
            case 'c':
                $type = \Entity\Empresa::class;
                break;
            case 'j':
                $type = \Entity\Vaga::class;
        }
        if (\Persistence\Persist::readObject($type, $parsedBody['id'])) {
            return $response->withStatus(409);
        } else {
            $entidade = new $type($parsedBody);
            \Persistence\Persist::writeObject($entidade);
            return $response->withStatus(201);
        }
    }

}
