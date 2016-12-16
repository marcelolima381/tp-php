<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 15/12/16
 * Time: 16:39
 */

namespace Entity;


class EmpresaDAO implements DefaultDAO
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



        $nome = $object->getName();
        $email = $object->getEmail();

        $query = "INSERT INTO empresa (name,email) VALUES('$nome','$email')";

        if(!mysqli_query($connection,$query)){

            echo mysqli_error($connection);

        }

        $id = mysqli_insert_id($connection);

        $connection->close();

        return $id;
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

        $query = "SELECT * FROM empresa WHERE id = $object";

        $resultado = mysqli_query($connection,$query);

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