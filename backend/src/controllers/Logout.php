<?php

namespace Controller;


class Logout extends DefaultController {

	/**
	 * @param \Slim\Http\Request $request
	 * @param \Slim\Http\Response $response
	 * @param $args
	 */
	public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		session_start();
		session_unset();
		session_destroy();
		return $response->withStatus(200, "Session Cleared");
	}

}