<?php

namespace Controller;

/**
 * Trata as rotas de usuários
 *
 * @author asantos07
*/
class User extends DefaultController {

	public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        if (array_key_exists("range", $args)) {
            $users = $this->getByRange($args['range']);
            if ($users) {
                return $response->withJson($users);
            } else {
                return $response->withStatus(404);
            }
        } elseif (array_key_exists("id", $args)) {
            $user = $this->getById($args['id']);
            if ($user) {
                return $response->withJson($user);
            } else {
                return $response->withStatus(404);
            }
        }
    }

    /**
     *
     * @param string $range
     * @return array(User) Retorna array de Usuario se houver, se não retorna NULL
     */
    private function getByRange($range) {
        $bounds = [];
        preg_match("/([0-9]+)[-]([0-9]+)/", $range, $bounds);
        if ($bounds[1] >= $bounds[2]) {
            return NULL;
        }
        $users = \Persistence\Persist::readObjectRange($bounds[2], $bounds[1], \Entity\Usuario::getExt());
        if ($users) {
            return $users;
        } else {
            return NULL;
        }
    }

	/**
	 *
	 * @param int $id
	 * @return Usuario Retorna Usuario se houver, se não retorna NULL
	 */
	private function getById($id) {
		$user = \Persistence\Persist::readObject($id, \Entity\Usuario::getExt());
		if ($user) {
			return $user;
		} else {
			return null;
        }
    }

}
