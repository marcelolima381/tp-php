<?php

namespace Entity;

/**
 * Entitade que representa um Usuário comum
 * Esquema de arquivo é [id].user
 * 
 * @author asantos07
 */
class Usuario extends Entidade {

    var $name;
    var $birthD;
    var $email;
    var $telephone;
    var $languages;
    var $text;
    var $skills;
    var $contributions;
    var $graduation;
    var $experience;

    public function __construct(array $data = []) {
        $this->name = $data['name'];
        $this->birthD = $data['birthD'];
        $this->email = $data['email'];
        $this->id = $data['id'];
        $this->telephone = $data['telephone'];
        $this->languages = $data['languages'];
        $this->text = $data['text'];
        $this->skills = $data['skills'];
        $this->contributions = $data['contributions'];
        $this->graduation = $data['graduation'];
        $this->experience = $data['experience'];
    }

    /**
     * @return string Retorna ".user"
     */
    static public function getExt() {
        return ".user";
    }

    /**
     * @return string O email associado à entidade
     */
    public function getEmail() {
        return $this->email;
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
    public function getBirthD()
    {
        return $this->birthD;
    }

    /**
     * @param mixed $birthD
     */
    public function setBirthD($birthD)
    {
        $this->birthD = $birthD;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param mixed $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @return mixed
     */
    public function getContributions()
    {
        return $this->contributions;
    }

    /**
     * @param mixed $contributions
     */
    public function setContributions($contributions)
    {
        $this->contributions = $contributions;
    }

    /**
     * @return mixed
     */
    public function getGraduation()
    {
        return $this->graduation;
    }

    /**
     * @param mixed $graduation
     */
    public function setGraduation($graduation)
    {
        $this->graduation = $graduation;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }


}
