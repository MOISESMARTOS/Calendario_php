<?php

require('conector.php');
session_start();

if (isset($_SESSION['username'])) {
  $con = new ConectorBD('localhost', 'root', '');
  if ($con->initConexion('agendas')=='OK') {
    $consultar_user = $con->consultar(['usuarios'], ['id'], 'WHERE username = "'.$_SESSION['username'].'"');
      if ($consultar_user->num_rows != 0) {
        $user_id = $consultar_user->fetch_assoc();
      }

    $resultado = $con->consultar(['eventos'], ['*'], 'WHERE fk_usuario = "'.$user_id['id'].'"');
    if ($resultado) {
      $i=0;
      while ($fila = $resultado->fetch_assoc()) {
        $response['eventos'][$i]['id'] = $fila['id'];
        $response['eventos'][$i]['title'] = $fila['titulo'];
        if ($fila['allDay']==1) {
          $response['eventos'][$i]['allDay'] = true;
          $response['eventos'][$i]['start'] = $fila['start_date'];
          $response['eventos'][$i]['end'] = $fila['end_date'];
        } else {
          $response['eventos'][$i]['allDay'] = false;
          $response['eventos'][$i]['start'] = $fila['start_date']." ".$fila['start_hour'];
          $response['eventos'][$i]['end'] = $fila['end_date']." ".$fila['end_hour'];
        }

        $i++;

      }

      $response['msg'] = 'OK';

    }

  } else {
    $response['msg'] = 'No se ha podido establecer una conexion con la db';
  }

} else {
  $response['msg'] = 'No existe una sesion activa';
}

echo json_encode($response);

 ?>
