<?php
include 'db.php';
class Usuario extends db
{

  function __construct()
  {
    parent::__construct();
  }

  // funcion insertar
  function insertarUsuario($nombre, $apellidos, $email, $pass){
    $sql="INSERT INTO usuarios (id, usuario, nombre, apellidos, email, rol, pass)
          VALUES (NULL, '".$email."', '".$nombre."', '".$apellidos."', '".$email."', 'USER', '".sha1($pass)."')";
  // realizamos las consultas con:
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
  // devolver ultimo usuario insertado
      $sql="SELECT * from usuarios ORDER BY id DESC"
  // empezamos a realizar consultas:
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function LoginUsuario($email){
  // construimos la estructura de la consulta y la realizamos
    $sql="SELECT * from usuarios WHERE usuario='".$email."'";
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function MiPerfil($usuario){
  // construimos otra consulta
    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
  // realizamos la otra consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
  // resultados mediante tabla
      $tabla=[];
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }
  // actualizacion delperfil
  public function ActualizarMiPerfil($usuario, $nombre, $apellidos, $rol)
  {
    $sql="UPDATE usuarios SET nombre='" .$nombre ."', apellidos='" .$apellidos ."', rol= '".$rol."' WHERE usuario='" .$usuario ."'";
    $actualizarperfil=$this->realizarConsulta($sql);
    if ($actualizarperfil=!false) {
      return true;
    }else {
      return false;
    }
  }
// comprobacion de emeail
  function Comprobaremail($email){
    // construimos otra consula y la realizamos
    $sql="SELECT email from usuarios WHERE email='".$email."'";
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      if ($resultado->num_rows>0) {
        return null;
      }else {
        return 1;
      }
    }else{
      return null;
    }
  }
    function Roles(){
      $sql="SELECT * from roles";
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=null){
        // resultados 
        $tabla=[];
        while($fila=$resultado->fetch_assoc()){
          $tabla[]=$fila;
        }
        return $tabla;
      }else{
        return null;
      }
    }
}
 ?>
