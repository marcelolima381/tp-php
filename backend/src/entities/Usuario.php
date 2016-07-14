<?php

namespace Entity;

/**
 * Entitade que representa um Usuário comum
  >>>>>>> Stashed changes
 *
 * @author asantos07
 */
class Usuario extends Entidade {

    var $nome;
    var $dataN;
    var $email;
    var $login;
    var $id;
    var $link;
    var $dataN;
    var $senha;

    public function __construct($nome, $dataN, $email, $login, $link, $dataN, $senha) {
        $this->nome = $nome;
        $this->dataN = $dataN;
        $this->email = $email;
        $this->login = $login;
        $this->link = $link;
        $this->dataN = $dataN;
        $this->senha = $senha;
    }

    public function getExt() {
        return ".u";
    }

}
