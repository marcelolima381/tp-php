<?php

namespace Middleware;

/**
 * Description of newPHPClass
 *
 * @author asantos07
 */
class AuthMiddleware {

    const ACC_LEVEL = [
        "registerJob" => \Entity\Empresa::class,
        "patch" => "owner"
    ];

    public function __invoke($request, $response, $next) {
        session_start();
        $body = $request->getParsedBody();
        $route = $request->getAttribute('route');
        $arguments = $route->getArguments();
        $name = $route->getName();
        if (PHP_SESSION_ACTIVE != session_status() || "auth" == session_name()) {
            return $response->withStatus (303)->withHeader ("Location", HOST . "/login");
        } elseif (self::ACC_LEVEL[$name] == $_SESSION["userType"]) {
            $next($request, $response);
        } elseif (self::ACC_LEVEL[$name] == "owner") {
            if ($arguments['id'] == $_SESSION['userId'] && $body['id'] == $_SESSION['userId']) {
                $next($request, $response);
            }
        }
        return $response;
    }

}
