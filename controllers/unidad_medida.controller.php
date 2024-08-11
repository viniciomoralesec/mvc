<?php

//TODO: controlador de unidad_medida

require_once('../models/unidad_medida.model.php');
//error_reporting(0);
$unidad_medida = new unidad_medida;

switch ($_GET["op"]) {
        //TODO: operaciones de unidad_medida

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los unidad_medida
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase unidad_medida.model.php
        $datos = $unidad_medida->todos(); // Llamo al metodo todos de la clase unidad_medida.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idunidad_medida = $_POST["idunidad_medida"];
        $datos = array();
        $datos = $unidad_medida->uno($idunidad_medida);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimiento para insertar un proveedor en la base de datos
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];

        $datos = array();
        $datos = $unidad_medida->insertar($Detalle, $Tipo);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un proveedor en la base de datos
    case 'actualizar':
        $idunidad_medida = $_POST["idunidad_medida"];
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];
        $datos = array();
        $datos = $unidad_medida->actualizar($idunidad_medida, $Detalle, $Tipo);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idunidad_medida = $_POST["idunidad_medida"];
        $datos = array();
        $datos = $unidad_medida->eliminar($idunidad_medida);
        echo json_encode($datos);
        break;
}