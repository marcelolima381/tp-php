<?php

namespace Entity;

/**
 * Entitade que representa um Usuário comum
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
        $this->nome = $data[nome];
        $this->dataN = $data[dataN];
        $this->email = $data[email];
        $this->link = $data[link];
        $this->dataN = $data[dataN];
        $this->senha = $data[senha];
        $this->id = $data[id];
        $this->telefone = $data[telefone];
    }

    static public function getExt() {
        return ".u";
    }

}
