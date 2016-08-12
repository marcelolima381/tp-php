<?php

namespace Controller;

/**
 * Description of Login
 *
 * @author asantos07
 */
class Login extends DefaultController {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        session_unset();
        $cred = $request->getParsedBody();
        $userIdType = $this->translateEmailId($cred['email']);
        $type = $userIdType->type;
        switch ($type) {
            case "user":
                $ext = \Entity\Usuario::getExt();
                break;
            case "company":
                $ext = \Entity\Empresa::getExt();
                break;
            default :
                return $response->withStatus(400);
        }
        $userId = $userIdType->id;
        $logged = $this->checkCredential($userId, $cred['passwd'], $ext);
        if ($logged) {
            session_start();
            $_SESSION['userId'] = $userIdType->id;
            $_SESSION['userType'] = $type;
            session_set_cookie_params(432000);
            return $response->withStatus(200)->withJson($userIdType);
        } else {
            return $response->withStatus(401);
        }
    }

    /**
     * Checa se a senha do usuário bate
     * 
     * @param int $id
     * @param string $passwd
     * @param string $type
     * @return boolean
     */
    private function checkCredential($id, $passwd, $type) {
        $typeH = md5($type);
        $idH = md5($id);
        $path = CRED . $idH . $typeH;
        if (file_exists($path)) {
            $hash = file_get_contents($path);
            if (md5($passwd) === $hash) {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Retorna o ID associado ao email. Caso não haja retorna -1.
     * 
     * @param string $email
     * @return mixed
     */
    private function translateEmailId($email) {
        if (file_exists(LOGIN . $email)) {
            $fileObj = json_decode(file_get_contents(LOGIN . $email));
            return $fileObj;
        } else {
            return -1;
        }
    }

}
