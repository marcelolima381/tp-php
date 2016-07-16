<?php

namespace Controller;

/**
 * Trata todas as rotas de usuários
 *
 * @author Ariel
 */
class User {

    public function __invoke($request, $response, $args) {
        if($args['range']){
            return $response->write("keks");
        }elseif($args['id']){
            return $response->write("kek");
        }
    }

}
