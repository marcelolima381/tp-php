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

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @param mixed $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProfiletext()
    {
        return $this->profiletext;
    }

    /**
     * @param mixed $profiletext
     */
    public function setProfiletext($profiletext)
    {
        $this->profiletext = $profiletext;
    }

    /**
     * @return mixed
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * @param mixed $areas
     */
    public function setAreas($areas)
    {
        $this->areas = $areas;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return array
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @param array $jobs
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}
