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
        $entidade = \Helper\Validator::validadeCreate($args['type'], $parsedBody);
        if ($entidade == null) {
            return $response->withStatus(400);
        } elseif ($this->emailBelongs($parsedBody['id'], $parsedBody['email'])) {
            return $response->withStatus(409);
        } else {
            if (array_key_exists("passwd", $parsedBody)) {
                $parsedBody['emailV'] = FALSE;
                // Cria o arquivo de credencial (passwd + login)
                $credfile = md5($entidade->login) . md5($entidade->getExt());
                $file = fopen(CRED . $credfile, "w");
                fwrite($file, md5($parsedBody['passwd']));
                fclose($file);
                // Cria o arquivo para mapear email -> id
                $mailfile = $entidade->getEmail();
                $file = fopen(LOGIN . $mailfile, "w");
                fwrite($file, $mailfile);
                fclose($file);
                //                \Helper\Mailer::registrationConfirm($entidade);
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
