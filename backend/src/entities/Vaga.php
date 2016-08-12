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

    public function __construct(array $data = array()) {
        $this->name = $data['name'];
        $this->companyId = $data['companyId'];
        $this->text = $data['text'];
        $this->salary = $data['salary'];
        $this->location = $data['location'];
        $this->requirements = $data['requirements'];
        $this->workload = $data['workload'];
        $this->id = $data['id'];
    }

    /**
     * @return string Retorna ".user"
     */
    public static function getExt() {
        return ".job";
    }

}
