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

    public function trataException($erro){

        if($erro == "Cannot add or update a child row: a foreign key constraint fails (`jobfinder`.`contribution`, CONSTRAINT `fk_contribution_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE)"){
            throw new \Exception("Usuario não existente");
        }
        elseif($erro == "You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''')' at line 1"){
            throw new \Exception("Sem id");
        }
        elseif($erro == "Erro na atualização"){
            throw new \Exception("Erro na atualização");
        }
    }


    public static function getInstance() {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    public function insert($object)
    {

        try{
            $connection = ConnectionFactory::getConnection();

            $usuario_id = $object->getUsuarioId();
            $description = $object->getDescription();

            $query = "INSERT INTO contribution (usuario_id,description) VALUES($usuario_id,'$description')";

            if(!mysqli_query($connection,$query)){

                $this->trataException(mysqli_error($connection));
            }

            $object->setId(mysqli_insert_id($connection));
            $connection->close();

        }
        catch(\Exception $e){
            return $e->getMessage();
        }

        return $object;
    }

    public function update($object)
    {

        try{
            $connection = ConnectionFactory::getConnection();

            $id = $object->getId();
            $description = $object->getDescription();

            $query = "UPDATE contribution SET description = '$description' WHERE id = $id";

            mysqli_query($connection,$query);

            if(mysqli_error($connection)){
                $this->trataException(mysqli_error($connection));
            }
            elseif(mysqli_affected_rows($connection) == 0){
                $this->trataException("Erro na atualização");
            }

        }
        catch(\Exception $e){
            return $e->getMessage();
        }

        return $object;
    }

    public function delete($object)
    {
        $connection = ConnectionFactory::getConnection();

        $id = $object->getId();

        $query = "DELETE FROM contribution WHERE id = $id";

        if(!mysqli_query($connection,$query)){
            return mysqli_error($connection);
        }

        return $object;
    }

    public function deleteAll()
    {
        $connection = ConnectionFactory::getConnection();

        $query = "DELETE FROM contribution";

        if(!mysqli_query($connection, $query)){
            return mysqli_error($connection);
        }

    }

    public function getById($object)
    {
        $connection = ConnectionFactory::getConnection();

        $id = $object->getId();

        $query = "SELECT * FROM contribution WHERE id = $id";

        $resultado = mysqli_query($connection,$query);

        if(!$resultado){
            return mysqli_error($connection);
        }

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
        $connection = ConnectionFactory::getConnection();

        $query = "SELECT * FROM contribution";

        $resultado = mysqli_query($connection,$query);

        if(!$resultado){
            return mysqli_error($connection);
        }

        $data = null;

        while ($row = $resultado->fetch_assoc()){

            $data[] = $row;

        }

        return $data;
    }

    public function getAllReduzido()
    {
        // TODO: Implement getAllReduzido() method.
    }

    public function getAllFromUser($object){

        $connection = ConnectionFactory::getConnection();

        $usuario_id = $object->getUsuarioId();

        $query = "SELECT * FROM contribution WHERE usuario_id = $usuario_id";

        $resultado = mysqli_query($connection,$query);

        if(!$resultado){
            return mysqli_error($connection);
        }

        $data = null;

        while ($row = $resultado->fetch_assoc()){

            $data[] = $row;

        }

        return $data;
    }
}