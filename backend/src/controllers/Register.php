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
        $entidade = $this->checkValid($args['type'], $parsedBody);
        if ($entidade == null) {
            return $response->withStatus(400);
        } elseif (\Persistence\Persist::readObject($entidade->getExt(), $entidade->getId())) {
            return $response->withStatus(409);
        } else {
            $entidade->flush();
            return $response->withStatus(201);
        }
    }

    private function checkValid($type, $json_array) {
        $entidade = null;
        switch ($type) {
            case 'u':
                $ext = \Entity\Usuario::getExt();
                if ($this->checkUser($json_array)) {
                    $entidade = new \Entity\Usuario($json_array);
                }
                break;
            case 'c':
                $ext = \Entity\Empresa::getExt();
                $entidade = new \Entity\Empresa($json_array);
                break;
            case 'j':
                $ext = \Entity\Vaga::getExt();
                $entidade = new \Entity\Vaga($json_array);
        }
        return $entidade;
    }

    private function checkUser($data) {
        if (isset($data['nome'], $data['dataN'], $data['email'], $data['link'], $data['senha'], $data['telefone'], $data['id'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
