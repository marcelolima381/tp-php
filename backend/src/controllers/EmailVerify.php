<?php

namespace Controller;

/**
 * Description of EmailVerify
 *
 * @author asantos07
 */
class EmailVerify extends \Controller\DefaultController {

	public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        switch ($args['type']) {
	        case "user":
                $entidade = \Persistence\Persist::readObject($args['id'], \Entity\Usuario::getExt());
                break;
	        case "company":
                $entidade = \Persistence\Persist::readObject($args['id'], \Entity\Empresa::getExt());
        }
        $entidade->emailVerified();
        return $response->withHeader("Location", HOST . "/frontend/#/")->withStatus(303);
    }

}
