<?php

namespace Entity;

/**
 * Entidade que representa uma vaga.
 * Esquema de arquivo é [id].vaga
 *
 * @author asantos07
 */
class Vaga extends Entidade {

    var $name;
    var $companyId;
    var $text;
    var $salary;
    var $location;
    var $requirements;
    var $workload;
    var $interested;

    public function __construct(array $data = array()) {
        $this->name = $data['name'];
        $this->companyId = $data['companyId'];
        $this->text = $data['text'];
        $this->salary = $data['salary'];
        $this->location = $data['location'];
        $this->requirements = $data['requirements'];
        $this->workload = $data['workload'];
        $this->id = $data['id'];
        $this->interested = $data['interested'];
    }

    /**
     * @return string Retorna ".user"
     */
    public static function getExt() {
        return ".job";
    }

    /**
     * Adiciona um usuário à lista de interessados
     * 
     * @param \Entity\Usuario $user
     * @return boolean
     */
    public function addInterested(\Entity\Usuario $user) {
        $userId = $user->getId();
        if (array_search($userId, $this->interested) === FALSE) {
            $this->interested[] = $userId;
            $this->flush();
            return TRUE;
        }else {
            return FALSE;
        }
    }

}
