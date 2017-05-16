<?php
include 'seguridad.php';
$sesion=new Seguridad();
if (isset($_SESSION['usuario'])==false) {
  header('Location: index.php');
}else {
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Perfil</title>
    </head>
    <body>
      <form class="" action="actualizar.php" method="post">
        <?php
          include 'usuario.php';
          $perfil=new Usuario();
            $formperfil=$perfil->MiPerfil($_SESSION['usuario']);
              foreach ($formperfil as $fila) {
                      echo "<input type='text' name='email' value='".$fila['email']."' readonly><br><br>";
                      echo "<input type='text' name='nombre' value='".$fila['nombre']."'><br><br>";
                      echo "<input type='text' name='apellidos' value='".$fila['apellidos']."'><br><br>";
                      echo "<input type='text' name='rol' value='".$fila['rol']."' readonly><br><br>";
          }
         ?>
          <select class="" name="roles">
            <option value="CAMBIAR ROL">CAMBIAR ROL</option>
           <?php
           $roles=$perfil->Roles();
           foreach ($roles as $fila) {
             echo "<option value='".$fila['rol']."' name='".$fila['rol']."'>".$fila['rol']."</option>";
           }
            ?>
         </select>
         <br><br>
         <input type="submit" name="actualizar" value="Actualizar">
      </form>
    </body>
  </html>
  <?php
}
 ?>
