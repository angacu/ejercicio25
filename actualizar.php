<?php
  include 'usuario.php';
  $usuario= new Usuario();
  $actualizarperfil=$usuario->ActualizarMiPerfil($_POST['email'], $_POST['nombre'], $_POST['apellidos'], $_POST['roles']);

      if ($actualizarperfil==true) {
          header('Location: miperfil.php');
      }else {
          echo "Error al actualizar los datos. <br><br>";
          echo "<a href='miperfil.php'>Volver a mi perfil,</a>";
        }
 ?>
