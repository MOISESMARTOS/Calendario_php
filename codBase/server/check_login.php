<?php

require('conector.php');

$con = new ConectorBD('localhost','root','');

if ($con->initConexion('agendas')=='OK') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $resultado = $con->consultar(['usuarios'], ['password'], 'WHERE username = "'.$username.'"');
  if ($resultado->num_rows != 0 && password_verify($password, $resultado->fetch_assoc()['password'])) {
    session_start();
    $_SESSION['username'] = $username;
    $response['msg'] = 'OK';
  } else {
    $response['msg'] = 'Usuario o contrasenia incorrectos';
  }

} else {
  $response['msg'] = 'No se ha podido conectar con la base de datos';
}

$con->cerrarConexion();
echo json_encode($response);


 ?>
