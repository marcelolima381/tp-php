<?php

namespace Controller;
use Entity\Credentials;
use Entity\CredentialsDAO;
use Entity\LoginMap;
use Entity\LoginMapDAO;


/**
 * Gerencia as rotas de criação de entidades
 *
 * @author asantos07
 */
class Register extends DefaultController {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {

        $dao = null;

        $parsedBody = $request->getParsedBody();

        $entidade = \Helper\Validator::validadeCreateBasic($args['type'], $parsedBody);

        if ($entidade == null) {
            return $response->withStatus(400);
        } elseif ($args['type'] != 'job' && $this->emailBelongs($parsedBody['id'], $parsedBody['email'])) {
            return $response->withStatus(409);
        } else {
            if (array_key_exists("passwd", $parsedBody)) {

                if($args['type'] == "user"){
                    $dao = \Entity\UsuarioDAO::getInstance();
                }
                elseif($args['type'] == "company"){
                    $dao = \Entity\EmpresaDAO::getInstance();
                }
                elseif($args['type'] == "job"){
                    $dao = \Entity\VagaDAO::getInstance();
                }
                else{
                    return $response->withStatus(409);
                }


                $id = $dao->insert($entidade);

                $kek['crecencial'] =  md5($id) . md5($entidade->getExt());
                $kek['password'] = md5($parsedBody['passwd']);

                $creden = new Credentials($kek);
                $dao = CredentialsDAO::getInstance();
                $dao->insert($creden);


                $kek['id'] = $id;
                $kek['type'] = $args['type'];
                $kek['email'] = $entidade->getEmail();
                $login_map = new LoginMap($kek);

                $dao = LoginMapDAO::getInstance();

                $dao->insert($login_map);

            } elseif (array_key_exists("companyId", $parsedBody)) {
                $empresa = \Persistence\Persist::readObject($parsedBody['companyId'], \Entity\Empresa::getExt(), true);
                $empresaObj = \Helper\Validator::validadeCreate('company', $empresa);
                $empresaObj->addVaga($entidade);
            } else {
                return $response->withStatus(400);
            }
            //$entidade->flush();
            //Persistence\AutoIncrement::increment($entidade->getExt());
            return $response->withStatus(201)->withJson($entidade);
        }
    }

    /**
     * Checa se o ID está associado ao email, retorna 1 se sim e -1 se não. Caso o email não esteja cadastrado retorna 0.
     * 
     * @param type $id ID da entidade
     * @param type $email Email da entidade
     * @return int
     */
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
