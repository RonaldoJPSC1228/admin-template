<?php
class Category extends Conectar
{

    protected $fillable = ["cat_id", "cat_name", "cat_desc", "created_at", "updated_at", "deleted_at", "state"];
    protected $cast = [
        "cat_id" => "integer",
        "cat_name" => "string",
        "cat_desc" => "string",
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime",
        "state" => "integer"
    ];

    public function get_category()
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_category WHERE state = '1'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_category_x_id($cat_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_category WHERE cat_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_category($cat_name, $cat_desc)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_category (cat_id, cat_name, cat_desc, created_at, updated_at, deleted_at, state) VALUES (NULL, ?, ?, now(), NULL, NULL, '1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_name);
        $sql->bindValue(2, $cat_desc);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_category($cat_id, $cat_name, $cat_desc)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_category SET cat_name = ?, cat_desc = ?, updated_at = now() WHERE cat_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_name);
        $sql->bindValue(2, $cat_desc);
        $sql->bindValue(3, $cat_id);

        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_category($cat_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_category SET state = '2', deleted_at = now() WHERE cat_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


}
?>