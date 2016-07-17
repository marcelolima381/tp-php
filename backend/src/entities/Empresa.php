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
    /**
     *
     * @var array Array q armazena os IDs das vagas associadas a essa empresa
     */
    var $vagas;

    public function __construct(array $data = []) {
        $this->nome = $data->nome;
        $this->email = $data->email;
        $this->senha = $data->senha;
        $this->descricao = $data->descricao;
        $this->id = $data->id;
        $this->area = $data->area;
        $this->cnpj = $data->cnpj;
        $this->telefone = $data->telefone;
        $this->vagas = [];
    }

    static public function getExt() {
        return ".e";
    }

    public function mergeData($older) {
        if (!$this->nome) {
            $this->nome = $older->nome;
        }
        if (!$this->descricao) {
            $this->descricao = $older->descricao;
        }
        if (!$this->email) {
            $this->email = $older->email;
        }
        if (!$this->area) {
            $this->area = $older->area;
        }
        if (!$this->senha) {
            $this->senha = $older->senha;
        }
        if (!$this->telefone) {
            $this->telefone = $older->telefone;
        }
        if (!$this->cnpj) {
            $this->cnpj = $older->cnpj;
        }
    }
    
    public function addVaga(\Entity\Vaga $vaga){
        $this->vagas[] = $vaga->getId();
    }

}
