<?php

namespace Controller;

/**
 * Description of EmailVerify
 *
 * @author asantos07
 */
class EmailVerify extends \Controller\DefaultController {

    public function __invoke($request, $response, $args) {
        switch ($args['type']) {
            case "u":
                $entidade = \Persistence\Persist::readObject($args['id'], \Entity\Usuario::getExt());
                break;
            case "c":
                $entidade = \Persistence\Persist::readObject($args['id'], \Entity\Empresa::getExt());
        }
        $entidade->emailVerified();
        return $response->withHeader("Location", HOST . "/frontend/#/")->withStatus(303);
    }

}
