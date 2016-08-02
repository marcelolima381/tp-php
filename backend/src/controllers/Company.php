<?php

namespace Controller;

/**
 * Description of Company
 *
 * asantos07*/
class Company {

	public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        if (array_key_exists("range", $args)) {
            $companies = $this->getByRange($args['range']);
            if ($companies) {
                return $response->withJson($companies);
            } else {
                return $response->withStatus(404);
            }
        } elseif (array_key_exists("id", $args)) {
            $company = $this->getById($args['id']);
            if ($company) {
                return $response->withJson($company);
            } else {
                return $response->withStatus(404);
            }
        }
    }

    /**
     *
     * @param string $range
     * @return array(Empresa) Retorna array de Empresa se houver, se não retorna NULL
     */
    private function getByRange($range) {
        $bounds = [];
        preg_match("/([0-9]+)[-]([0-9]+)/", $range, $bounds);
        if ($bounds[1] >= $bounds[2]) {
            return NULL;
        }
        $companies = \Persistence\Persist::readObjectRange($bounds[2], $bounds[1], \Entity\Empresa::getExt());
        if ($companies) {
            return $companies;
        } else {
            return NULL;
        }
    }

	/**
	 *
	 * @param int $id
	 * @return Empresa Retorna Empresa se houver, se não retorna NULL
	 */
	private function getById($id) {
		$company = \Persistence\Persist::readObject($id, \Entity\Empresa::getExt());
		if ($company) {
			return $company;
		} else {
			return null;
        }
    }

}
