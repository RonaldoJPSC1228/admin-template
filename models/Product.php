<?php
    class Product extends Conectar {

        protected $fillable = ["prod_id", "prod_name", "created_at", "updated_at", "deleted_at", "state"];

        public function get_product() {
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_product WHERE state = '1'";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_product_x_id($prod_id) {
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_product WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function insert_product($prod_name) {
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_product (prod_id, prod_name, created_at, updated_at, deleted_at, state) VALUES (NULL, ?, now(), NULL, NULL, '1');";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_name);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function update_product($prod_id, $prod_name) {
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE tm_product SET prod_name = ?, updated_at = now() WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_name);
            $sql->bindValue(2, $prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function delete_product($prod_id) {
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE tm_product SET state = '2', deleted_at = now() WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        
    }
?>