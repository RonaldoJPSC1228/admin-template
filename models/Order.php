<?php
class Order extends Conectar
{

    protected $fillable = ["order_id", "order_code", "user_id", "prod_id", "num_prod", "created_at", "updated_at", "deleted_at", "state"];

    protected $cast = [
        "order_id" => "integer",
        "order_code" => "string",
        "user_id" => "integer",
        "prod_id" => "integer",
        "num_prod" => "integer",
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime",
        "state" => "integer"
    ];

    public function get_order()
    {
        $conectar = parent::Conexion();
        parent::set_names();
        // $sql = "SELECT * FROM tm_order WHERE state = '1' ORDER BY num_prod DESC";
        $sql = "SELECT 
        tm_order.order_id,
        tm_order.order_code,
        tm_order.user_id,
        tm_order.prod_id,
        tm_order.num_prod,
        tm_user.user_name,
        tm_product.prod_name,
        tm_product.prod_unit_value,
        (tm_order.num_prod * tm_product.prod_unit_value) AS valor_total
        FROM `tm_order` 
        INNER JOIN tm_user ON tm_order.user_id = tm_user.user_id 
        INNER JOIN tm_product ON tm_order.prod_id = tm_product.prod_id 
        WHERE tm_order.state = '1' 
        ORDER BY num_prod DESC";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_order_x_id($order_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_order WHERE order_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $order_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_order($user_id, $prod_id, $num_prod)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_order (order_id, order_code, user_id, prod_id, num_prod, created_at, updated_at, deleted_at, state) VALUES (NULL, CONCAT('ORD-', DATE_FORMAT(NOW(),'%Y%m%d%H%i%s')), ?, ?, ?, now(), now(), NULL, '1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_id);
        $sql->bindValue(2, $prod_id);
        $sql->bindValue(3, $num_prod);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return ['status' => 'success', 'message' => 'Orden creada correctamente'];
        } else {
            return ['status' => 'error', 'message' => 'Error al crear orden'];
        }
    }

    public function update_order($order_id, $user_id, $prod_id, $num_prod)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_order SET user_id = ?, prod_id = ?, num_prod = ?, updated_at = now() WHERE order_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_id);
        $sql->bindValue(2, $prod_id);
        $sql->bindValue(3, $num_prod);
        $sql->bindValue(4, $order_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return ['status' => 'success', 'message' => 'Orden actualizada'];
        } else {
            return ['status' => 'error', 'message' => 'Orden no encontrada'];
        }
    }

    public function delete_order($order_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_order SET state = '2', deleted_at = now() WHERE order_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $order_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return ['status' => 'success', 'message' => 'Orden eliminada'];
        } else {
            return ['status' => 'error', 'message' => 'Orden no encontrada'];
        }
    }

}
?>