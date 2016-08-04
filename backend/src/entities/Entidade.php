<?php

namespace Entity;

/**
 * Superclasse que define os métodos básicos das entidades
 *
 * @author asantos07
 */
abstract class Entidade {

    /**
     *
     * @var int ID único da entidade 
     */
    public $id;

    /**
     * @param array $data Array associativo com todas as propriedades da entidade
     */
    abstract public function __construct(array $data = []);

    /**
     * Escreve o objeto no 'banco de dados'
     */
    public function flush() {
        \Persistence\Persist::writeObject($this);
    }

    /**
     * Retorna o ID da entidade
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Retorna e extenção do arquivo desse tipo de objeto no 'banco de dados'
     * @return string
     */
    abstract static public function getExt();
}
