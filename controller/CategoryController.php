<?php
    require_once("../config/conexion.php");
    require_once("../models/Category.php");

    $category = new Category();

    switch ($_GET["op"]) {
        case "list_category":
            $datos = $category->get_category();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["cat_id"];
                $sub_array[] = $row["cat_name"];
                $sub_array[] = $row["cat_desc"];
                $sub_array[] = '<button type="button" onClick="editar(' . $row["cat_id"] . ');" id="' . $row["cat_id"] . '" class="btn btn-inline btn-warning btn-sm ladda-button">Editar <i class="fa-solid fa-pen-to-square"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar(' . $row["cat_id"] . ');" id="' . $row["cat_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-button">Eliminar <i class="fa-solid fa-trash"></i></button>';
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
            $datos = $category->get_category_x_id($_POST["cat_id"]);
            if (is_array($datos) && count($datos) > 0) {
                $output = array();
                foreach ($datos as $row) {
                    $output["cat_id"] = $row["cat_id"];
                    $output["cat_name"] = $row["cat_name"];
                    $output["cat_desc"] = $row["cat_desc"];
                }
                echo json_encode($output);
            }
            break;

        case "create_category":
            $datos = $category->insert_category($_POST["cat_name"], $_POST["cat_desc"]);
            echo json_encode($datos);
            break;

        case "update_category":
            $datos = $category->update_category($_POST["cat_id"], $_POST["cat_name"], $_POST["cat_desc"]);
            echo json_encode($datos);
            break;

        case "delete_category":
            $datos = $category->delete_category($_POST["cat_id"]);
            echo json_encode($datos);
            break;

        case "select_category":
            $datos = $category->get_category();
            if (is_array($datos) && count($datos) > 0) {
                $html = '<option label="Seleccionar Categoría"></option>';
                foreach ($datos as $row) {
                    $html.= '<option value="' . $row["cat_id"] . '">' . $row["cat_name"] . '</option>';
                }
                echo $html;
            }
            break;
    }
?>