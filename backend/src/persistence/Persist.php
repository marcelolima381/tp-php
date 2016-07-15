<?php

namespace Persistence;

class Persist {

    /**
     * 
     * @param Entidade $ent O objeto a ser lido
     */
    static public function readObject($id, $ext) {
        $array = null;
        if (file_exists(DB . $id . $ext)) {
            $file = file_get_contents(DB . $id . $ext);
            $array = JsonHandler::decode($file);
        }
        return $array ? null : $array;
    }

    static public function readObjectRange($upper, $lower, $ext) {
        $array = array();
        if ($upper > $lower) {
            for ($c = $lower; $c < $upper; $c++) {
                if (file_exists(DB . $c . $ext)) {
                    $file = file_get_contents(DB . $c . $ext);
                    $array[$c] = \Helper\JsonHandler::decode($file);
                }
            }
        }
        return $array;
    }

    static public function writeObject($object) {
        $encoded = \Helper\JsonHandler::encode($object);
        $filename = $object->getId() . $object->getExt();
        $file = fopen("../data/" . $filename, "w");
        fwrite($file, $encoded);
        fclose($file);
    }

}
