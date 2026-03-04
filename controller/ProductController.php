<?php
    require_once("../config/conexion.php");
    require_once("../models/Product.php");

    $product = new Product();

    switch ($_GET["op"]) {
        case "list_product":
            $datos = $product->get_product();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["prod_id"];
                $sub_array[] = $row["prod_name"];
                $sub_array[] = $row["prod_reference"];
                $sub_array[] = $row["prod_cant"];
                $sub_array[] = $row["prod_unit_value"];
                $sub_array[] = $row["prod_desc"];
                $sub_array[] = $row["cat_name"];
                // $sub_array[] = $row["cat_id"];
                $sub_array[] = '<button type="button" onClick="editar(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-inline btn-warning btn-sm ladda-button">Editar <i class="fa-solid fa-pen-to-square"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-button">Eliminar <i class="fa-solid fa-trash"></i></button>';
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
            break;

        case "get_by_id":
            $datos = $product->get_product_x_id($_POST["prod_id"]);
            if (is_array($datos) && count($datos) > 0) {
                $output = array();
                foreach ($datos as $row) {
                    $output["prod_id"] = $row["prod_id"];
                    $output["prod_name"] = $row["prod_name"];
                    $output["prod_reference"] = $row["prod_reference"];
                    $output["prod_cant"] = $row["prod_cant"];
                    $output["prod_unit_value"] = $row["prod_unit_value"];
                    $output["prod_desc"] = $row["prod_desc"];
                    $output["cat_id"] = $row["cat_id"];
                }
                echo json_encode($output);
            }

            break;

        case "create_product":
            $datos = $product->insert_product($_POST["prod_name"], $_POST["prod_reference"], $_POST["prod_cant"], $_POST["prod_unit_value"], $_POST["prod_desc"], $_POST["cat_id"]);
            echo json_encode($datos);
            break;

        case "update_product":
            $datos = $product->update_product($_POST["prod_id"], $_POST["prod_name"], $_POST["prod_reference"], $_POST["prod_cant"], $_POST["prod_unit_value"], $_POST["prod_desc"], $_POST["cat_id"]);
            echo json_encode($datos);
            break;

        case "delete_product":
            $datos = $product->delete_product($_POST["prod_id"]);
            echo json_encode($datos);
            break;

        case "select_product":
            $datos = $product->get_product();
            if (is_array($datos) && count($datos) > 0) {
                $html = '<option label="Seleccionar Producto"></option>';
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row['prod_id'] . "'>" . $row['prod_name'] . "</option>";
                }
                echo $html;
            }
            break;
    }
?>