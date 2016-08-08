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
    var $passwd;
    var $descricao;
    var $area;
    var $cnpj;
    var $telefone;
    var $emailV;

    /**
     *
     * @var array Array q armazena os IDs das vagas associadas a essa empresa
     */
    var $vagas;

    public function __construct(array $data = []) {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->passwd = $data['passwd'];
        $this->descricao = $data['descricao'];
        $this->id = $data['id'];
        $this->area = $data['area'];
        $this->cnpj = $data['cnpj'];
        $this->telefone = $data['telefone'];
        $this->vagas = [];
        $this->emailV = false;
    }

    static public function getExt() {
	    return ".company";
    }
    
    public function getLogin(){
        return $this->login;
    }

    public function getEmail(){
        return $this->email;
    }

    public function addVaga(\Entity\Vaga $vaga) {
        $this->vagas[] = $vaga->getId();
    }

    public function emailVerified() {
        $this->emailV = TRUE;
        $this->flush();
    }

}
