<?php

namespace Entity;

/**
 * Entitade que representa um Usuário comum
 * Esquema de arquivo é [id].u
 *
 * @author asantos07
*/
class Usuario extends Entidade {

    var $nome;
    var $dataN;
    var $email;
    var $link;
    var $telefone;
    var $emailV;

    public function __construct(array $data = []) {
        $this->nome = $data['nome'];
        $this->dataN = $data['dataN'];
        $this->email = $data['email'];
        $this->link = $data['link'];
        $this->id = $data['id'];
        $this->telefone = $data['telefone'];
        $this->emailV = false;
    }

    static public function getExt() {
        return ".u";
    }

    public function mergeData($older) {
        if (!$this->nome) {
            $this->nome = $older->nome;
        }
        if (!$this->dataN) {
            $this->dataN = $older->dataN;
        }
        if (!$this->email) {
            $this->email = $older->email;
        }
        if (!$this->link) {
            $this->link = $older->link;
        }
        if (!$this->telefone) {
            $this->telefone = $older->telefone;
        }
        if (!$this->emailV) {
            $this->emailV = $older->emailV;
        }
    }
    
    public function emailVerified() {
        $this->emailV = TRUE;
        $this->flush();
    }

}
