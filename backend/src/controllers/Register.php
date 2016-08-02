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
        $entidade = \Helper\Validator::validadeCreate($args['type'], $parsedBody);
        if ($entidade == null) {
            return $response->withStatus(400);
        } elseif (\Persistence\Persist::readObject($entidade->getId(), $entidade->getExt()) || \Persistence\AutoIncrement::get($entidade->getExt()) != $entidade->getId()) {
            return $response->withStatus(409);
        } else {
            if (array_key_exists("senha", $parsedBody)) {
                // Cria o arquivo de credencial (senha + login)
                $credfile = md5($entidade->login) . md5($entidade->getExt());
                $file = fopen(CRED . $credfile, "w");
                fwrite($file, md5($parsedBody['senha']));
                fclose($file);
                // Cria o arquivo para mapear login -> id
                $mapfile = $entidade->getLogin();
                $file = fopen(LOGIN . $mapfile, "w");
                fwrite($file, );
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

}
