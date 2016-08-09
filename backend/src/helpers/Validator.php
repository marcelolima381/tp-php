<?php

namespace Helper;

/**
 * Helper para validar arrays associativos de objetos
 *
 * @author asantos07
 */
class Validator {

    public static function validadeCreate($type, $json_array) {
        $entidade = null;
        if ($json_array['id'] < 1) {
            return NULL;
        }
        switch ($type) {
            case "user":
                if (Validator::checkUser($json_array)) {
                    $entidade = new \Entity\Usuario($json_array);
                }
                break;
            case "company":
                if (Validator::checkEmpresa($json_array)) {
                    $entidade = new \Entity\Empresa($json_array);
                }
                break;
            case "job":
                if (Validator::checkVaga($json_array)) {
                    $entidade = new \Entity\Vaga($json_array);
                }
        }
        return $entidade;
    }

    public static function validadeCreateBasic($type, $json_array) {
        $entidade = null;
        if ($json_array['id'] < 1) {
            return NULL;
        }
        switch ($type) {
            case "user":
                $json_array['birthD'] = NULL;
                $json_array['telephone'] = NULL;
                $json_array['emailV'] = FALSE;
                $json_array['languages'] = [];
                $json_array['text'] = NULL;
                $json_array['skills'] = [];
                $json_array['contributions'] = [];
                $json_array['graduation'] = [];
                $json_array['experience'] = [];
                if (Validator::checkUser($json_array)) {
                    $entidade = new \Entity\Usuario($json_array);
                }
                break;
            case "company":
                $json_array['description'] = NULL;
                $json_array['area'] = NULL;
                $json_array['cnpj'] = NULL;
                $json_array['telephone'] = NULL;
                $json_array['emailV'] = FALSE;
                if (Validator::checkEmpresa($json_array)) {
                    $entidade = new \Entity\Empresa($json_array);
                }
                break;
            case "job":
                // TODO:
                if (Validator::checkVaga($json_array)) {
                    $entidade = new \Entity\Vaga($json_array);
                }
        }
        return $entidade;
    }

    public static function checkUser($data = array()) {
        if(array_key_exists('passwd', $data) && array_key_exists('name', $data) && array_key_exists('birthD', $data) && array_key_exists('email', $data) && array_key_exists('id', $data) && array_key_exists('telephone', $data) && array_key_exists('emailV', $data) && array_key_exists('languages', $data) && array_key_exists('text', $data) && array_key_exists('skills', $data) && array_key_exists('contributions', $data) && array_key_exists('graduation', $data) && array_key_exists('experience', $data)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function checkEmpresa($data = array()) {
        if(array_key_exists('name', $data) && array_key_exists('email', $data) && array_key_exists('passwd', $data) && array_key_exists('description', $data) && array_key_exists('area', $data) && array_key_exists('cnpj', $data) && array_key_exists('telephone', $data) && array_key_exists('id', $data) && array_key_exists('emailV', $data)){
             return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function checkVaga($data = array()) {
        if (isset($data['titulo'], $data['empresaId'], $data['funcao'], $data['salario'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
