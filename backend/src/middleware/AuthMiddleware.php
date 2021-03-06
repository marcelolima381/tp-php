<?php

namespace Middleware;

/**
 * Description of newPHPClass
 *
 * @author asantos07
 */
class AuthMiddleware {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next) {
        $body = $request->getParsedBody();
        $route = $request->getAttribute('route');
        $arguments = $route->getArguments();
        $name = $route->getName();
        session_start();
        if (PHP_SESSION_ACTIVE != session_status()) {
            return $response->withStatus(303)->write(var_dump(session_name()));
//            ->withHeader("Location", HOST . "/frontend/#/login");
        } else {
            if ($name == 'registerJob') {
                $empresa = \Persistence\Persist::readObject($body['companyId'], \Entity\Empresa::getExt());
                if ($empresa && $empresa->id == $_SESSION['userId'] && $_SESSION['userType'] == 'company') {
                    $next($request, $response);
                } else {
                    return $response->withStatus(401);
                }
            } elseif ($name == 'patch') {
                if (($body['id'] == $_SESSION['userId'] && $_SESSION['userType'] == $arguments['type']) || (array_key_exists('companyId', $body) && $body['companyId'] == $_SESSION['userId'])) {
                    $next($request, $response);
                } else {
                    return $response->withStatus(401);
                }
            }elseif($name == 'applyJob'){
                if($body['id'] == $_SESSION['userId'] && $_SESSION['userType'] == 'user'){
                    $next($request, $response);
                } else {
                    return $response->withStatus(401);
                }
            }
        }
        return $response;
    }

}
