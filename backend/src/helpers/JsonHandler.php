<?php

namespace Helper;

/**
 * Helper para 
 *
 * @author asantos07
*/

class JsonHandler {

    protected static $_messages = [JSON_ERROR_NONE => 'No error has occurred',
        JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
        JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON',
        JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
        JSON_ERROR_SYNTAX => 'Syntax error',
        JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded'
       ];
    
    /**
     * Codifica o objeto em uma string JSON
     * 
     * @param type $value
     * @param type $options
     * @return string
     * @throws \RuntimeException
     */
    public static function encode($value, $options = 0) {
        $result = json_encode($value, $options);
        if($result)  {
            return $result;
        }

        throw new \RuntimeException(static::$_messages[json_last_error()]);
    }

    /**
     * Decodifica uma string JSON em um stdClass
     * 
     * @param string $json
     * @param boolean $assoc
     * @return stdClass
     * @throws \RuntimeException
     */
    public static function decode($json, $assoc = false) {
        $result = json_decode($json, $assoc);
        if($result) {
            return $result;
        }
        throw new \RuntimeException(static::$_messages[json_last_error()]);
    }

}
