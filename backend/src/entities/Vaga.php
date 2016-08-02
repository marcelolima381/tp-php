<?php

namespace Entity;

/**
 * Entidade que representa uma vaga.
 * Esquema de arquivo é [id].vaga
 *
 * @author asantos07
*/
class Vaga extends Entidade {

    var $titulo;
    var $empresaId;
    var $funcao;
    var $salario;

    public function __construct(array $data = array()) {
        $this->titulo = $data->titulo;
        $this->empresaId = $data->empresaId;
        $this->funcao = $data->funcao;
        $this->salario = $data->salario;
        $this->id = $data->id;
    }

	public static function getExt() {
		return ".vaga";
	}

    public function mergeData($older) {
        if (!$this->titulo) {
            $this->titulo = $older->titulo;
        }
        if (!$this->empresaId) {
            $this->empresaId = $older->empresaId;
        }
        if (!$this->funcao) {
            $this->funcao = $older->funcao;
        }
        if (!$this->salario) {
            $this->salario = $older->salario;
        }
    }

}
