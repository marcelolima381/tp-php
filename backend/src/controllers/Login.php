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
        switch ($cred['type']) {
            case "user":
                $ext = \Entity\Usuario::getExt();
                $type = \Entity\Usuario::class;
                break;
            case "company":
                $ext = \Entity\Empresa::getExt();
                $type = \Entity\Empresa::class;
        }
        $userIdType = $this->translateEmailId($cred['email']);
        $userId = $userIdType->id;
        $logged = $this->checkCredential($userId, $cred['passwd'], $ext);
        if ($logged) {
            session_start();
            $_SESSION['userId'] = $cred['id'];
            $_SESSION['userType'] = $type;
            session_set_cookie_params(432000);
            session_name("auth");
            return $response->withStatus(200)->withJson($userIdType);
        } else {
            return $response->withStatus(401);
        }
    }

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

    private function translateEmailId($email) {
        if(file_exists(LOGIN . $email)){
            $fileObj = json_decode(file_get_contents(LOGIN . $email));
            return $fileObj;
        } else {
            return -1;
        }
    }
    
//    class ClassName {
//    function __construct() {
//    
//    }
// }

}
