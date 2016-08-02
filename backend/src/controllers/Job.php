<?php

namespace Controller;

/**
 * Description of Job
 *
 * asantos07*/
class Job {

	public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        if (array_key_exists("range", $args)) {
            $jobs = $this->getByRange($args['range']);
            if ($jobs) {
                return $response->withJson($jobs);
            } else {
                return $response->withStatus(404);
            }
        } elseif (array_key_exists("id", $args)) {
            $job = $this->getById($args['id']);
            if ($job) {
                return $response->withJson($job);
            } else {
                return $response->withStatus(404);
            }
        }
    }

    /**
     *
     * @param string $range
     * @return array(Vaga) Retorna array de Vaga se houver, se não retorna NULL
     */
    private function getByRange($range) {
        $bounds = [];
        preg_match("/([0-9]+)[-]([0-9]+)/", $range, $bounds);
        if ($bounds[1] >= $bounds[2]) {
            return NULL;
        }
        $jobs = \Persistence\Persist::readObjectRange($bounds[2], $bounds[1], \Entity\Vaga::getExt());
        if ($jobs) {
            return $jobs;
        } else {
            return NULL;
        }
    }

	/**
	 *
	 * @param int $id
	 * @return Vaga Retorna Vaga se houver, se não retorna NULL
	 */
	private function getById($id) {
		$job = \Persistence\Persist::readObject($id, \Entity\Vaga::getExt());
		if ($job) {
			return $job;
		} else {
			return null;
        }
    }

}
