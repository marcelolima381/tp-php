<?php

namespace Middleware;

/**
 * Description of newPHPClass
 *
 * @author asantos07
 */
class AuthMiddleware {

//	const ACC_LEVEL = ["registerJob" => \Entity\Empresa::class, "patch" => "owner"];

	public function __invoke($request, $response, $next) {
//		$body = $request->getParsedBody();
//		$route = $request->getAttribute('route');
//		$arguments = $route->getArguments();
//		$name = $route->getName();
//		if (PHP_SESSION_ACTIVE != session_status() || "auth" == session_name()) {
//			return $response->withStatus(303)->withHeader("Location", HOST . "/frontend/#/login");
//		} elseif (self::ACC_LEVEL[$name] == $_SESSION["userType"]) {
//			if ($name == "registerJob") {
//				$empresa = \Persistence\Persist::readObject($body['empresaId'], \Entity\Empresa::getExt());
//				if ($empresa && $empresa->getId() == $_SESSION['userId']) {
//					$next($request, $response);
//				} else {
//					return $response->withStatus(401);
//				}
//			} else {
//				$next($request, $response);
//			}
//		} elseif (self::ACC_LEVEL[$name] == "owner") {
//			if (($arguments['id'] == $_SESSION['userId'] && $body['id'] == $_SESSION['userId']) || ($arguments['empresaId'] == $_SESSION['userId'] && $body['empresaId'] == $_SESSION['userId'])) {
//				$next($request, $response);
//			} else {
//				return $response->withStatus(401);
//			}
//		}
//		return $response;
	}

}
