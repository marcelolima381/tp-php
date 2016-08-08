<?php

namespace Persistence;

/**
 * Description of AutoIncrement
 *
 * @author asantos
 */
class AutoIncrement {

    static public function get($type) {
        $filename = DB . "auto_increment." . $type;
        $file = (int) file_get_contents($filename);
        return ++$file;
    }
    
    static public function increment($type) {
        $filename = DB . "auto_increment" . $type;
        $file = (int) file_get_contents($filename);
        $file = $file + 1;
        $newfile = fopen($filename, "w");
        fwrite($newfile, $file);
        fclose($newfile);
        return (int)$file;
    }

}
