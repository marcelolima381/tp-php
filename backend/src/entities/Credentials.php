<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 15/12/16
 * Time: 16:10
 */

namespace Entity;


class Credentials
{
    var $crecencial;
    var $password;

    public function __construct($data)
    {
        $this->crecencial = $data["crecencial"];
        $this->password = $data["password"];
    }

    /**
     * @return mixed
     */
    public function getCrecencial()
    {
        return $this->crecencial;
    }

    /**
     * @param mixed $crecencial
     */
    public function setCrecencial($crecencial)
    {
        $this->crecencial = $crecencial;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}