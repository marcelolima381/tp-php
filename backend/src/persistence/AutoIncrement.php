<?php

namespace Persistence;

/**
 * Description of AutoIncrement
 *
 * @author asantos
 */
class AutoIncrement {

    static public function get($ext) {
        $filename = DB . "auto_increment" . $ext;
        $file = (int) file_get_contents($filename);
        return ++$file;
    }
    
    static public function increment($ext) {
        $filename = DB . "auto_increment" . $ext;
        $file = (int) file_get_contents($filename);
        echo $file;
        $file = $file + 1;
        $newfile = fopen($filename, "w");
        fwrite($newfile, $file);
        fclose($newfile);
        return (int)$file;
    }

}
