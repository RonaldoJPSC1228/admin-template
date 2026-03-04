<?php
    class Product extends Conectar {

        protected $fillable = ["prod_id", "prod_name", "prod_reference", "prod_cant", "prod_unit_value", "prod_desc", "cat_id", "created_at", "updated_at", "deleted_at", "state"];
        protected $cast = [
            "prod_id" => "integer",
            "prod_name" => "string",
            "prod_reference" => "string",
            "prod_cant" => "integer",
            "prod_unit_value" => "integer",
            "prod_desc" => "string",
            "cat_id" => "integer",
            "created_at" => "datetime",
            "updated_at" => "datetime",
            "deleted_at" => "datetime",
            "state" => "integer"
        ];

        /* Devuelve todos los productos activos */
        // public function get_product() {
        //     $conectar = parent::Conexion();
        //     parent::set_names();
        //     $sql = "SELECT * FROM tm_product WHERE state = '1'";
        //     $sql = $conectar->prepare($sql);
        //     $sql->execute();
        //     return $resultado = $sql->fetchAll();
        // }

        /* Devuelve todos los productos con una categoría activos */
        public function get_product(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT tm_product.prod_id, tm_product.cat_id, tm_product.prod_name, tm_product.prod_reference, tm_product.prod_cant, tm_product.prod_unit_value, tm_product.prod_desc, 
            tm_category.cat_name FROM `tm_product` INNER JOIN tm_category ON tm_product.cat_id = tm_category.cat_id 
            WHERE tm_product.state = 1";
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

        public function insert_product($prod_name, $prod_reference, $prod_cant, $prod_unit_value, $prod_desc, $cat_id) {
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_product (prod_id, prod_name, prod_reference, prod_cant, prod_unit_value, prod_desc, cat_id, created_at, updated_at, deleted_at, state) VALUES (NULL, ?, ?, ?, ?, ?, ?, now(), NULL, NULL, '1');";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_name);
            $sql->bindValue(2, $prod_reference);
            $sql->bindValue(3, $prod_cant);
            $sql->bindValue(4, $prod_unit_value);
            $sql->bindValue(5, $prod_desc);
            $sql->bindValue(6, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function update_product($prod_id, $prod_name, $prod_reference, $prod_cant, $prod_unit_value, $prod_desc, $cat_id) {
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE tm_product SET prod_name = ?, prod_reference = ?, prod_cant = ?, prod_unit_value = ?, prod_desc = ?, cat_id = ?, updated_at = now() WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_name);
            $sql->bindValue(2, $prod_reference);
            $sql->bindValue(3, $prod_cant);
            $sql->bindValue(4, $prod_unit_value);
            $sql->bindValue(5, $prod_desc);
            $sql->bindValue(6, $cat_id);
            $sql->bindValue(7, $prod_id);
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