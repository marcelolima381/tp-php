<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 15/12/16
 * Time: 16:28
 */

namespace Entity;


class LoginMapDAO implements DefaultDAO
{
    public static function getInstance() {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    public function insert($object)
    {
        $connection = ConnectionFactory::getConnection();

        $id = $object->getId();
        $type = $object->getType();
        $email = $object->getEmail();

        $query = "INSERT INTO login_map (id,type,email) VALUES($id,'$type','$email')";

        if(!mysqli_query($connection,$query)){
            echo mysqli_error($connection);
        }

        $connection->close();
    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
    }

    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
    }

    public function getById($object)
    {
        $connection = ConnectionFactory::getConnection();

        $query = "SELECT * FROM login_map WHERE email = '$object'";

        //return $query;

        $resultado = mysqli_query($connection,$query);

        $data = null;

        $data = mysqli_fetch_object($resultado);

        return $data;
    }

    public function getByIdReduzido($object)
    {
        // TODO: Implement getByIdReduzido() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getAllReduzido()
    {
        // TODO: Implement getAllReduzido() method.
    }

}