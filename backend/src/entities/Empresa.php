<?php

namespace Entity;

/**
 * Entidade que representa uma Empresa
 * Esquema de arquivo é [id].c
 *
 * @author asantos07
*/
class Empresa extends Entidade {

    var $nome;
    var $email;
    var $senha;
    var $descricao;
    var $area;
    var $cnpj;
    var $telefone;
    var $vagas;

    public function __construct(array $data = []) {
        $this->nome = $data['nome'];
        $this->email = $data['email'];
        $this->senha = $data['senha'];
        $this->descricao = $data['descricao'];
        $this->id = $data['id'];
        $this->area = $data['area'];
        $this->cnpj = $data['cnpj'];
        $this->telefone = $data['telefone'];
        $this->vagas = array();
    }

    static public function getExt() {
        return ".c";
    }

    public function updateData($newer = array()) {
        if ($newer['nome']) {
            $this->nome = $newer['nome'];
        }
        if ($newer['descricao']) {
            $this->descricao = $newer['descricao'];
        }
        if ($newer['email']) {
            $this->email = $newer['email'];
        }
        if ($newer['area']) {
            $this->area = $newer['area'];
        }
        if ($newer['senha']) {
            $this->senha = $newer['senha'];
        }
        if ($newer['telefone']) {
            $this->telefone = $newer['telefone'];
        }
        if ($newer['cnpj']) {
            $this->cnpj = $newer['cnpj'];
        }
    }

}
