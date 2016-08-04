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
		if (!isset($cred['tipo'])) {
			return $response->withStatus(400);
		}
		switch ($cred['tipo']) {
			case "user":
				$ext = \Entity\Usuario::getExt();
				$type = \Entity\Usuario::class;
				break;
			case "company":
				$ext = \Entity\Empresa::getExt();
				$type = \Entity\Empresa::class;
		}
		$logged = $this->checkCredential($cred['id'], $cred['passwd'], $ext);
		if ($logged) {
			session_start();
			$_SESSION['userId'] = $cred['id'];
			$_SESSION['userType'] = $type;
			$json = new \stdClass();
			$json->id = $cred['id'];
			$json->type = $cred['tipo'];
			session_set_cookie_params(432000);
			session_name("auth");
			return $response->withStatus(200)->withJson($json);
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
