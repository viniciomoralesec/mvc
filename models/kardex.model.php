<?php
//TODO: Clase de Kardex
require_once('../config/config.php');
class Kardex
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from Kardex
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Kardex`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idKardex) //select * from Kardex where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Kardex` WHERE `idKardex`=$idKardex";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Kardex` (`Estado`, `Fecha_Transaccion`, `Cantidad`, `Valor_Compra`, `Valor_Venta`, `Unidad_Medida_idUnidad_Medida`, `Unidad_Medida_idUnidad_Medida1`, `Unidad_Medida_idUnidad_Medida2`, `Valor_Ganacia`, `IVA`, `IVA_idIVA`, `Proveedores_idProveedores`, `Productos_idProductos`, `Tipo_Transaccion`) VALUES ( '$Estado', '$Fecha_Transaccion', '$Cantidad', '$Valor_Compra', '$Valor_Venta', '$Unidad_Medida_idUnidad_Medida', '$Unidad_Medida_idUnidad_Medida1', '$Unidad_Medida_idUnidad_Medida2', '$Valor_Ganacia', '$IVA', '$IVA_idIVA', '$Proveedores_idProveedores', '$Productos_idProductos', '$Tipo_Transaccion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($idKardex, $Estado, $Fecha_Transaccion, $Cantidad, $Valor_Compra, $Valor_Venta, $Unidad_Medida_idUnidad_Medida, $Unidad_Medida_idUnidad_Medida1, $Unidad_Medida_idUnidad_Medida2, $Valor_Ganacia, $IVA, $IVA_idIVA, $Proveedores_idProveedores, $Productos_idProductos, $Tipo_Transaccion) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Kardex` SET `Estado`='$Estado',`Fecha_Transaccion`='$Fecha_Transaccion',`Cantidad`='$Cantidad',`Valor_Compra`='$Valor_Compra',`Valor_Venta`='$Valor_Venta' ,`Unidad_Medida_idUnidad_Medida`='$Unidad_Medida_idUnidad_Medida',`Valor_Venta`='$Valor_Venta',`Unidad_Medida_idUnidad_Medida1`='$Unidad_Medida_idUnidad_Medida1',`Unidad_Medida_idUnidad_Medida2`='$Unidad_Medida_idUnidad_Medida2' ,`Valor_Ganacia`='$Valor_Ganacia' ,`IVA`='$IVA' ,`IVA_idIVA`='$IVA_idIVA' ,`Proveedores_idProveedores`='$Proveedores_idProveedores' ,`Productos_idProductos`='$Productos_idProductos',`Tipo_Transaccion`='$Tipo_Transaccion' WHERE `idKardex` = $idKardex";
            if (mysqli_query($con, $cadena)) {
                return $idKardex;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idKardex) //delete from Kardex where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Kardex` WHERE `idKardex`= $idKardex";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}