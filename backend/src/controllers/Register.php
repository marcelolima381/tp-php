<?php

namespace Controller;

/**
 * Gerencia as rotas de criação de entidades
 *
 * @author asantos07
 */
class Register extends DefaultController {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        $parsedBody = $request->getParsedBody();
        $parsedBody['id'] = \Persistence\AutoIncrement::get($args['type']);
        $entidade = \Helper\Validator::validadeCreateBasic($args['type'], $parsedBody);
        if ($entidade == null) {
            return $response->withStatus(400);
        } elseif ($this->emailBelongs($parsedBody['id'], $parsedBody['email'])) {
            return $response->withStatus(409);
        } else {
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
                // \Helper\Mailer::registrationConfirm($entidade);
            } elseif (array_key_exists("empresaId", $parsedBody)) {
                $empresa = \Persistence\Persist::readObject($parsedBody['empresaId'], \Entity\Empresa::getExt());
                $empresa->addVaga($entidade);
                $empresa->flush();
            } else {
                return $response->withStatus(400);
            }
            $entidade->flush();
            \Persistence\AutoIncrement::increment($entidade->getExt());
            return $response->withStatus(201)->withJson($entidade);
        }
    }

    private function emailBelongs($id, $email) {
        if (!file_exists(LOGIN . $email)) {
            return 0;
        }
        $idEmail = file_get_contents(LOGIN . $email);
        if ($email == $idEmail) {
            return 1;
        } else {
            return -1;
        }
    }

}
