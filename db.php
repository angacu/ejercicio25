<?php
class db
{
  // atributos necesarios para realizar la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="usuarios";
  // objeto de conexion
  private $conexion;
  // control de errores
  private $error=false;
  private $error_msj="";
  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
        $this->error_msj="No se ha podido realizar la conexion a la bd. Algo has possat mal";
      }
  }
  // hay error en la conexion??
  function hayError(){
    return $this->error;
  }
  // msj de error
  function msjError(){
    return $this->error_msj;
  }
  // consultas vs la base de datos
  public function realizarConsulta($consulta){
    if($this->error==false){
      $resultado = $this->conexion->query($consulta);
      return $resultado;
    }else{
      $this->error_msj="Nanai de consulta: ".$consulta;
      return null;
    }
  }
}
 ?>
