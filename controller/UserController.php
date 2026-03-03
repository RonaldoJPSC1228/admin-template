<?php
    require_once("../config/conexion.php");
    require_once("../models/User.php");

    $user = new User();

    switch ($_GET["op"]) {
        case "list_user":
            $datos = $user->get_user();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["user_id"];
                $sub_array[] = $row["user_identification"];
                $sub_array[] = $row["user_name"];
                $sub_array[] = $row["user_lastname"];
                $sub_array[] = '<button type="button" onClick="editar(' . $row["user_id"] . ');" id="' . $row["user_id"] . '" class="btn btn-inline btn-warning btn-sm ladda-button">Editar <i class="fa-solid fa-pen-to-square"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar(' . $row["user_id"] . ');" id="' . $row["user_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-button">Eliminar <i class="fa-solid fa-trash"></i></button>';
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
            $datos = $user->get_user_x_id($_POST["user_id"]);
            if (is_array($datos) && count($datos) > 0) {
                $output = array();
                foreach ($datos as $row) {
                    $output["user_id"] = $row["user_id"];
                    $output["user_identification"] = $row["user_identification"];
                    $output["user_name"] = $row["user_name"];
                    $output["user_lastname"] = $row["user_lastname"];
                }
                echo json_encode($output);
            }
            break;

        case "create_user":
            $datos = $user->insert_user($_POST["user_name"], $_POST["user_lastname"], $_POST["user_identification"]);
            echo json_encode($datos);
            break;

        case "update_user":
            $datos = $user->update_user($_POST["user_id"], $_POST["user_name"], $_POST["user_lastname"], $_POST["user_identification"]);
            echo json_encode($datos);
            break;

        case "delete_user":
            $datos = $user->delete_user($_POST["user_id"]);
            echo json_encode($datos);
            break;

        case "select_user":
            $datos = $user->get_user();
            if (is_array($datos) && count($datos) > 0) {
                $html = '<option label="Seleccionar Usuario"></option>';
                foreach ($datos as $row) {
                    $html .= '<option value="' . $row["user_id"] . '">' . $row["user_identification"] . ' - ' . $row["user_name"] . ' ' . $row["user_lastname"] . '</option>';
                }
                echo ($html);
            }
            break;
    }
?>