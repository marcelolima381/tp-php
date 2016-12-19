<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 19/12/16
 * Time: 08:44
 */

namespace Entity;


class Contribution
{
    var $description;
    var $id;
    var $usuario_id;

    /**
     * Contribution constructor.
     */
    public function __construct($data)
    {
        $this->description = $data['description'];
        $this->id = $data['id'];
        $this->usuario_id = $data['usuario_id'];
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }


}