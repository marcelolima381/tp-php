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
    var $emailV;
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
        $this->emailV = false;
        $this->languages = $data['languages'];
        $this->text = $data['text'];
        $this->skills = $data['skills'];
        $this->contributions = $data['contributions'];
        $this->graduation = $data['graduation'];
        $this->experience = $data['experience'];
    }

	/**
	 * @return string
	 */
    static public function getExt() {
	    return ".user";
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function emailVerified() {
        $this->emailV = TRUE;
        $this->flush();
    }

}
