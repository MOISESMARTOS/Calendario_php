<?php
  require('conector.php');
  session_start();

  if (isset($_SESSION['username'])) {
    $con = new ConectorBD('localhost', 'root', '');
    if ($con->initConexion('agendas')=='OK') {
      if ($con->eliminarRegistro('eventos', 'id = '.$_POST['id'])) {
        $response['msg'] = 'OK';
      } else {
        $response['msg'] = 'Error al eliminar el registro';
      }

    } else {
      $response['msg'] = 'No se ha podido establecer una conexion con la db';
    }

  } else {
    $response['msg'] = 'No existe una sesion activa'
  }



 ?>
