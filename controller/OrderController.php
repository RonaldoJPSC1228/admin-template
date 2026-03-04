<?php
    require_once("../config/conexion.php");
    require_once("../models/Order.php");

    $order = new Order();

    switch ($_GET["op"]) {
        case "list_order":
            $datos = $order->get_order();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["order_id"];
                $sub_array[] = $row["order_code"];
                // $sub_array[] = $row["user_id"];
                $sub_array[] = $row["user_name"];
                // $sub_array[] = $row["prod_id"];
                $sub_array[] = $row["prod_name"];
                $sub_array[] = $row["num_prod"];
                $sub_array[] = '$' . number_format($row["prod_unit_value"], 2);
                $sub_array[] = '$' . number_format($row["valor_total"], 2);
                $sub_array[] = '<a href="/view/Orders/edit-view.php?id=' . $row["order_id"] . '" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</a>';
                $sub_array[] = '<button type="button" onClick="eliminar(' . $row["order_id"] . ');" id="' . $row["order_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-button">Eliminar <i class="fa-solid fa-trash"></i></button>';
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
            /* http://localhost:8000/controller/OrderController.php?op=list_order */
            break;

        case "get_by_id":
            $datos = $order->get_order_x_id($_POST["order_id"]);
            if (is_array($datos) && count($datos) > 0) {
                $output = array();
                foreach ($datos as $row) {
                    $output["order_id"] = $row["order_id"];
                    $output["order_code"] = $row["order_code"];
                    $output["user_id"] = $row["user_id"];
                    $output["prod_id"] = $row["prod_id"];
                    $output["num_prod"] = $row["num_prod"];
                }
                echo json_encode($output);
            }
            break;

        case "create_order":
            $datos = $order->insert_order($_POST["user_id"], $_POST["prod_id"], $_POST["num_prod"]);
            echo json_encode($datos);
            break;
        
        case "update_order":
            $datos = $order->update_order($_POST["order_id"], $_POST["user_id"], $_POST["prod_id"], $_POST["num_prod"]);
            echo json_encode($datos);
            break;
        
        case "delete_order":
            $datos = $order->delete_order($_POST["order_id"]);
            echo json_encode($datos);
            break;
    }
?>