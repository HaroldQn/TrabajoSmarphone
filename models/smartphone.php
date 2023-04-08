<?php

require_once "conexion.php";

class Smartphone extends Conexion{
    private $accesoBD;

    public function __CONSTRUCT(){
        $this->accesoBD = parent::getConexion();
    }

    public function listarSmartphone(){
        try{
            $consulta = $this->accesoBD->prepare("CALL spu_listar_celulares()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function registrarSmartphone($datos = []){
        try{
            $consulta = $this->accesoBD->prepare("CALL spu_agregar_celular(?,?,?,?,?,?,?)");
            $consulta->execute(
                array(
                    $datos["marca"],
                    $datos["modelo"],
                    $datos["sistema_operativo"],
                    $datos["tipo_pantalla"],
                    $datos["bateria"],
                    $datos["camara"],
                    $datos["precio"]
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function eliminarSmartphone($idcelular = 0){
        try{
            $consulta = $this->accesoBD->prepare("CALL spu_eliminar_celular(?)");
            $consulta->execute(array($idcelular));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


}
