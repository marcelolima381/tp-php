<?php

namespace Controller;

/**
 * Superclasse dos controllers
 *
 * @author asantos07
*/
abstract class DefaultController {

    protected $ci;

    public function __construct(\Slim\Container $ci) {
        $this->ci = $ci;
    }

	/**
	 * @param $request
	 * @param $response
	 * @param $args
	 * @return $response
	 */
	abstract public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args);
}
