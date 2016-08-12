<?php

namespace Helper;

/**
 * Helper para validar arrays associativos de objetos
 *
 * @author asantos07
 */
class Validator {

    /**
     * Cria uma entidade sem preencher nenhum campo a mais.
     *
     * @param string $type
     * @param array $json_array
     * @return \Entity\Entidade
     */
    public static function validadeCreate( $type, array $json_array) {
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

    /**
     * Cria uma entidade, preenchendo os campos não-obrigatórios.
     *
     * @param string $type
     * @param array $json_array
     * @return \Entity\Entidade
     */
    public static function validadeCreateBasic( $type, array $json_array) {
        $entidade = null;
        if ($json_array['id'] < 1) {
            return NULL;
        }
        switch ($type) {
            case "user":
                $json_array['birthD'] = NULL;
                $json_array['telephone'] = NULL;
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
                $json_array['profiletext'] = NULL;
                $json_array['areas'] = [];
                $json_array['location'] = NULL;
                $json_array['phone'] = NULL;
		        $json_array['jobs'] = [];
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

    /**
     *
     * @param array $data
     * @return boolean
     */
    public static function checkUser(array $data) {
        if(array_key_exists('passwd', $data) && array_key_exists('name', $data) && array_key_exists('birthD', $data) && array_key_exists('email', $data) && array_key_exists('id', $data) && array_key_exists('telephone', $data) && array_key_exists('languages', $data) && array_key_exists('text', $data) && array_key_exists('skills', $data) && array_key_exists('contributions', $data) && array_key_exists('graduation', $data) && array_key_exists('experience', $data)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param array $data
     * @return boolean
     */
    public static function checkEmpresa(array $data) {
    	// echo json_encode($data);
        if(array_key_exists('name', $data) && array_key_exists('email', $data) && array_key_exists('passwd', $data) && array_key_exists('profiletext', $data) && array_key_exists('areas', $data) && array_key_exists('location', $data) && array_key_exists('phone', $data) && array_key_exists('id', $data) && array_key_exists('jobs', $data)){
             return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @param array $data
     * @return boolean
     */
    public static function checkVaga(array $data) {
        if (isset($data['name'], $data['companyId'], $data['text'], $data['salary'], $data['location'], $data['requirements'], $data['workload'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
