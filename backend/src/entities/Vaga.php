<?php

namespace Entity;

/**
 * Entidade que representa uma vaga.
 * Esquema de arquivo é [id].v
 *
 * @author asantos07
 */
class Vaga extends Entidade {

    var $titulo;
    var $empresaId;
    var $funcao;
    var $salario;

    public function __construct(array $data = array()) {
        $this->titulo = $data['titulo'];
        $this->empresaId = $data['empresaId'];
        $this->funcao = $data['funcao'];
        $this->salario = $data['salario'];
        $this->id = $data['id'];
    }

    public function updateData($newer = array()) {
        if ($newer['titulo']) {
            $this->titulo = $newer['titulo'];
        }
        if ($newer['empresaId']) {
            $this->empresaId = $newer['empresaId'];
        }
        if ($newer['funcao']) {
            $this->funcao = $newer['funcao'];
        }
        if ($newer['$salario']) {
            $this->$salario = $newer['$salario'];
        }
    }

    public static function getExt() {
        return ".v";
    }

}
