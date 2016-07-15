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
     * Checa se $newer tem algum valor diferente do objeto e sobrepôe a $this.
     * @param Object $newer
     */
    abstract public function updateData($newer = array());

    /**
     * Retorna e extenção do arquivo desse tipo de objeto no 'banco de dados'
     * @return string
     */
    abstract static public function getExt();

    /**
     * Escreve o objeto no 'banco de dados'
     */
    public function flush() {
        $previous = \Persistence\Persist::readObject($this->getId(), $this->getExt());
        if ($previous) {
            $this->updateData($previous);
        }
        \Persistence\Persist::writeObject($this);
    }

    public function getId() {
        return $this->id;
    }

}
