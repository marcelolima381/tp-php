<?php

namespace Controller;

class Search extends DefaultController {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        $parsedBody = $request->getParsedBody();


        $field = $parsedBody['field'];
        $value = strtolower($parsedBody['value']);


        $type = $args['type'];
        $results = array();


        $all = \Persistence\Persist::readObjectAll('.' . $type);
        for ($c = 0; $c < count($all); $c++) {
            $ent = $all[$c];
            $f = strtolower($ent->$field);
            if (strpos($f, $value) !== FALSE) {
                $results[] = $ent;
            }
        }
        return $response->withJson($results);
    }

}
