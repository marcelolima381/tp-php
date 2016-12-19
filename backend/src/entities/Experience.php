<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 19/12/16
 * Time: 08:48
 */

namespace Entity;


class Experience
{
    var $id;
    var $description;
    var $year;
    var $usuario_id;

    /**
     * Experience constructor.
     */
    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->description = $data['description'];
        $this->year = $data['year'];
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
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
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