<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 19/12/16
 * Time: 09:03
 */

namespace Entity;


class ContributionDAO implements DefaultDAO
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

        $usuario_id = $object->getUsuarioId();
        $description = $object->getDescription();

        $query = "INSERT INTO contribution (usuario_id,description) VALUES($usuario_id,'$description')";

        if(!mysqli_query($connection,$query)){
            echo mysqli_error($connection);
        }

        $object->setId(mysqli_insert_id($connection));

        $connection->close();

        return $object;
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
        // TODO: Implement getById() method.
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