<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 15/12/16
 * Time: 16:12
 */

namespace Entity;


class CredentialsDAO implements DefaultDAO
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

        $cred = $object->getCrecencial();
        $pass = $object->getPassword();

        $query = "INSERT INTO credentials (credencial,password) VALUES('$cred','$pass')";

        echo $query;

        if(!mysqli_query($connection,$query)){
            echo mysqli_error($connection);
        }

        $connection->close();

    }

    public function update($object)
    {
        $connection = ConnectionFactory::getConnection();

        $query = "UPDATE credentials SET = ";
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

        $query = "SELECT * FROM credentials WHERE credencial = '$object'";
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