<?php
    require_once("../config/conexion.php");
    require_once("../models/product.php");

    $product = new Product();

    switch ($_GET["op"]) {
        case "list_product":
            $datos = $product->get_product();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["prod_id"];
                $sub_array[] = $row["prod_name"];
                $sub_array[] = '<button type="button" onClick="editar(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa-solid fa-pen-to-square"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa-solid fa-trash"></i></button>';
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($datos);
            break;

        case "get_by_id":
            $datos = $product->get_product_x_id($_POST["prod_id"]);
            echo json_encode($datos);
            break;

        case "create_product":
            $datos = $product->insert_product($_POST["prod_name"]);
            echo json_encode($datos);
            break;

        case "update_product":
            $datos = $product->update_product($_POST["prod_id"], $_POST["prod_name"]);
            echo json_encode($datos);
            break;

        case "delete_product":
            $datos = $product->delete_product($_POST["prod_id"]);
            echo json_encode($datos);
            break;
    }
?>