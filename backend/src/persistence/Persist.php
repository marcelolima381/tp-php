<?php

namespace Persistence;

use Entity\EmpresaDAO;
use Entity\UsuarioDAO;

class Persist {

    /**
     * 
     * @param Entidade $ent O objeto a ser lido
     */
    static public function readObject($id, $ext, $assoc = FALSE) {

        $dao = null;

        if($ext == ".user")
            $dao = UsuarioDAO::getInstance();
        elseif($ext == ".company")
            $dao = EmpresaDAO::getInstance();

        $user = $dao->getById($id);

        return $user;
    }

    static public function readObjectRange($upper, $lower, $ext) {
        $array = array();
        if ($upper > $lower) {
            for ($c = $lower; $c <= $upper; $c++) {
                if (file_exists(DB . $c . $ext)) {
                    $file = file_get_contents(DB . $c . $ext);
                    $array[$c] = \Helper\JsonHandler::decode($file);
                }
            }
        } else {
            return NULL;
        }
        return $array;
    }

    static public function readObjectAll($ext) {
        $files = scandir(DB);
        $entities = preg_grep('/' . $ext . '/', $files);
        $results = array();
        foreach ($entities as $file) {
            $content = file_get_contents(DB . $file);
            $results[] = \Helper\JsonHandler::decode($content);
        }
        return $results;
    }

    static public function writeObject($object) {
        $encoded = \Helper\JsonHandler::encode($object);
        $filename = $object->getId() . $object->getExt();
        $file = fopen(DB . $filename, "w");
        fwrite($file, $encoded);
        fclose($file);
    }

}
