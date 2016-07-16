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
    var $senha;
    var $telefone;

    public function __construct(array $data = []) {
        $this->nome = $data['nome'];
        $this->dataN = $data['dataN'];
        $this->email = $data['email'];
        $this->link = $data['link'];
        $this->senha = $data['senha'];
        $this->id = $data['id'];
        $this->telefone = $data['telefone'];
    }

    static public function getExt() {
        return ".u";
    }

    public function updateData($newer = array()) {
        if ($newer['nome']) {
            $this->nome = $newer['nome'];
        }
        if ($newer['dataN']) {
            $this->dataN = $newer['dataN'];
        }
        if ($newer['email']) {
            $this->email = $newer['email'];
        }
        if ($newer['link']) {
            $this->link = $newer['link'];
        }
        if ($newer['senha']) {
            $this->senha = $newer['senha'];
        }
        if ($newer['telefone']) {
            $this->telefone = $newer['telefone'];
        }
    }

}
