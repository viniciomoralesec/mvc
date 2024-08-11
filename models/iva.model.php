<?php
//TODO: Clase de IVA
require_once('../config/config.php');
class IVA
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from IVA
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `IVA`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idIVA) //select * from IVA where id = $idIVA
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `IVA` WHERE `idIVA`=$idIVA";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Detalle, $Estado, $Valor)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `IVA` ( `Detalle`, `Estado`, `Valor`) VALUES ('$Detalle','$Estado','$Valor')";
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
    public function actualizar($idIVA, $Detalle, $Estado,$Valor) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `IVA` SET `Detalle`='$Detalle',`Estado`='$Estado',`Valor`='$Valor' WHERE `idIVA` = $idIVA";
            if (mysqli_query($con, $cadena)) {
                return $idIVA;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idIVA) //delete from IVA where id = $idIVA
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `IVA` WHERE `idIVA`= $idIVA";
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