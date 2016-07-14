<?php

namespace Entidade;

/**
 * Description of Usuario
 *
 * @author strudel
 */
class Usuario extends Entidade{

    var $nome;
    var $dataN;
    var $email;
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

    /**
     * 
     * @return string
     */
    public function getExt() {
        return ".u";
    }

}
