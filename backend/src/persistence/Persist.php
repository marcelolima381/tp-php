<?php

namespace Persistence;

class Persist {

    /**
     * 
     * @param array $options Array com fileN, 
     */
    static public function readObject(array $options = array()) {
        if(!isset($options['fileN'])){
            
        }
    }

    static public function writeObject($object) {
        $encoded = \JsonHandler::encode($object);
        $fileN = $object->getId() . $object->getExt();
        $file = fopen($filename, "w");
    }

}
