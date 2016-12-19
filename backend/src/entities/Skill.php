<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 19/12/16
 * Time: 08:52
 */

namespace Entity;

//TODO: SkillDAO

class Skill
{
    var $id;
    var $description;
    var $value;
    var $usuario_id;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->description = $data['description'];
        $this->value = $data['value'];
        $this->usuario_id = $data['usuario_id'];
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
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