<?php

//TODO: controlador de iva

require_once('../models/iva.model.php');
//error_reporting(0);
$iva = new iva;

switch ($_GET["op"]) {
        //TODO: operaciones de iva

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los iva
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase iva.model.php
        $datos = $iva->todos(); // Llamo al metodo todos de la clase iva.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idiva = $_POST["idiva"];
        $datos = array();
        $datos = $iva->uno($idiva);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimiento para insertar un proveedor en la base de datos
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $Valor = $_POST["Valor"];

        $datos = array();
        $datos = $iva->insertar($Detalle, $Estado, $Valor);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un proveedor en la base de datos
    case 'actualizar':
        $idiva = $_POST["idiva"];
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $Valor = $_POST["Valor"];
        $datos = array();
        $datos = $iva->actualizar($idiva, $Detalle, $Estado, $Valor);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idiva = $_POST["idiva"];
        $datos = array();
        $datos = $iva->eliminar($idiva);
        echo json_encode($datos);
        break;
}