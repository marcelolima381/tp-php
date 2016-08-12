<?php

namespace Entity;

/**
 * Entidade que representa uma Empresa
 * Esquema de arquivo é [id].empresa
 *
 * @author asantos07
 */
class Empresa extends Entidade {

    var $name;
    var $email;
    var $profiletext;
    var $areas;
    var $location;
    var $phone;

    /**
     *
     * @var array Array q armazena os IDs das vagas associadas a essa empresa
     */
    var $jobs;

    public function __construct(array $data = []) {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->passwd = $data['passwd'];
        $this->profiletext = $data['profiletext'];
        $this->id = $data['id'];
        $this->areas = $data['areas'];
        $this->location = $data['location'];
        $this->phone = $data['phone'];
        $this->jobs = $data['jobs'];
    }

    /**
     * @return string Retorna ".user"
     */
    static public function getExt() {
        return ".company";
    }

    /**
     * @return string O email associado à entidade
     */
    public function getEmail() {
        return $this->email;
    }

    public function addVaga(\Entity\Vaga $vaga) {
        $this->jobs[] = $vaga->getId();
        $this->flush();
    }

}
