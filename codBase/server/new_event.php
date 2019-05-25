<?php
  require('conector.php');
  session_start();

  if (isset($_SESSION['username'])) {
    $con = new ConectorBD('localhost', 'root', '');
    if ($con->initConexion('agendas')=='OK') {
    $resultado = $con->consultar(['usuarios'], ['id'], 'WHERE username = "'.$_SESSION['username'].'"');
      if ($resultado->num_rows != 0) {
        $fila = $resultado->fetch_assoc();
      }
      $data['titulo'] = '"'.$_POST['titulo'].'"';
      $data['start_date'] = '"'.$_POST['start_date'].'"';
      $data['end_date'] = '"'.$_POST['end_date'].'"';
      $data['start_hour'] = '"'.$_POST['start_hour'].'"';
      $data['end_hour'] = '"'.$_POST['end_hour'].'"';
      $data['fk_usuario'] = '"'.$fila['id'].'"';
      if ($_POST['allDay']=='true') {
        $data['allDay'] = 1;
      } else {
        $data['allDay'] = 0;
      }

      if ($con->insertData('eventos', $data)) {
        $response['msg'] = 'OK';
      } else {
        $response['msg'] = 'No se pudo insertar los datos en la DB';
      }


    } else {
      $response['msg'] = 'No se pudo conectar con la db';
    }

  } else {
    $response['msg'] = 'No existe una sesion activa';
  }

  echo json_encode($response);

 ?>
