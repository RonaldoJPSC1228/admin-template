<?php
class User extends Conectar
{

    protected $fillable = ["user_id", "user_name", "user_lastname", "user_identification", "created_at", "updated_at", "deleted_at", "state"];

    protected $cast = [
        "user_id" => "integer",
        "user_name" => "string",
        "user_lastname" => "string",
        "user_identification" => "string",
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime",
        "state" => "integer"
    ];


    public function get_user()
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_user WHERE state = '1'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_user_x_id($user_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_user WHERE user_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_user($user_name, $user_lastname, $user_identification)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_user (user_id, user_name, user_lastname, user_identification, created_at, updated_at, deleted_at, state) VALUES (NULL, ?, ?, ?, now(), NULL, NULL, '1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_name);
        $sql->bindValue(2, $user_lastname);
        $sql->bindValue(3, $user_identification);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_user($user_id, $user_name, $user_lastname, $user_identification)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_user SET user_name = ?, user_lastname = ?, user_identification = ?, updated_at = now() WHERE user_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_name);
        $sql->bindValue(2, $user_lastname);
        $sql->bindValue(3, $user_identification);
        $sql->bindValue(4, $user_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_user($user_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_user SET state = '2', deleted_at = now() WHERE user_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}
?>