<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 15/12/16
 * Time: 16:25
 */

namespace Entity;


class LoginMap
{
    var $id;
    var $type;
    var $email;

    /**
     * LoginMap constructor.
     */
    public function __construct($data)
    {
        $this->id = $data["id"];
        $this->type = $data["type"];
        $this->email = $data["email"];
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}