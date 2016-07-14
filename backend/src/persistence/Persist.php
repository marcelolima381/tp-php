<?php

namespace Persistence;

class Persist {

    /**
     * 
     * @param object $type O objeto a ser lido
     */
    static public function readObject(\Entity\Entidade $type, $id) {
        $ext = $type->getId();
        $file = file_get_contents(DB . $id . $ext);
        $array = \JsonHandler::decode($file);
        return $array;
    }

    static public function readObjectRange($upper, $lower, \Entity\Entidade $type) {
        $array;
        $ext = $type->getId();
        if ($upper > $lower) {
            for ($c = $lower; $c < $upper; $c++) {
                $file = file_get_contents(DB . $c . $ext);
                $array[$c] = \JsonHandler::decode($file);
            }
        }
        return $array;
    }

    static public function writeObject($object) {
        $encoded = \JsonHandler::encode($object);
        $filename = $object->getId() . $object->getExt();
        $file = fopen($filename, "w");
        fwrite($file, $encoded);
        fclose($file);
    }

}
