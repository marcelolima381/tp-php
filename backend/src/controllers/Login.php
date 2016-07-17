<?php

namespace Controller;

/**
 * Description of Login
 *
 * @author asantos07
 */
class Login extends DefaultController {

    public function __invoke($request, $response, $args) {
        session_unset();
        $cred = $request->getParsedBody();
        switch ($cred['tipo']) {
            case "u":
                $ext = \Entity\Usuario::getExt();
                $type = \Entity\Usuario::class;
                break;
            case "c":
                $ext = \Entity\Empresa::getExt();
                $type = \Entity\Empresa::class;
        }
        $logged = $this->checkCredential($cred['id'], $cred['senha'], $ext);
        if ($logged) {
            session_start();
            $_SESSION['userId'] = $cred['id'];
            $_SESSION['userType'] = $type;
            session_set_cookie_params(432000);
//            session_name("auth");
            return $response->withStatus(200);
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

}
