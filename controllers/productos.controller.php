<?php

//TODO: controlador de productos

require_once('../models/productos.model.php');
//error_reporting(0);
$productos = new productos;

switch ($_GET["op"]) {
        //TODO: operaciones de productos

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los productos
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase productos.model.php
        $datos = $productos->todos(); // Llamo al metodo todos de la clase productos.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idproductos = $_POST["idproductos"];
        $datos = array();
        $datos = $productos->uno($idproductos);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimiento para insertar un producto en la base de datos
    case 'insertar':
        $Nombre_Producto = $_POST["Nombre_Producto"];
        $Graba_IVA = $_POST["Graba_IVA"];
        $Codigo_Barras = $_POST["Codigo_Barras"];

        $datos = array();
        $datos = $productos->insertar($Nombre_Producto, $Graba_IVA, $Codigo_Barras);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un producto en la base de datos
    case 'actualizar':
        $idproductos = $_POST["idproductos"];
        $Nombre_Producto = $_POST["Nombre_Producto"];
        $Graba_IVA = $_POST["Graba_IVA"];
        $Codigo_Barras = $_POST["Codigo_Barras"];
        $datos = array();
        $datos = $productos->actualizar($idproductos, $Nombre_Producto, $Graba_IVA);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para eliminar un producto en la base de datos
    case 'eliminar':
        $idproductos = $_POST["idproductos"];
        $datos = array();
        $datos = $productos->eliminar($idproductos);
        echo json_encode($datos);
        break;
}