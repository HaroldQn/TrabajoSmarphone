<?php

class Conexion{

    //Atributos
    private $host       ='localhost';
    private $port       ='3306';
    private $database   ='smartphones';
    private $charset    ='UTF8';
    private $user       ='root';
    private $password   ='';

    private $pdo;


    //Accedemos a la base de datos
  private function conectarServidor(){
    //OBJETO            SOBRECARGAS
    $conexion = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}",
                                          $this->user,$this->password);
    return $conexion;
  }
    
  //Metodo 2: Retorna el acceso
   public function getConexion(){
    try{
      //Pasaremos la conexion al atributo/objeto pdo
      $this->pdo = $this->conectarServidor();
    
      //Controlar los errores
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      //Retornamos la conexion al modelo que lo necesite
      return $this->pdo;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}