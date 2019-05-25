<?php
require('conector.php');
$con = new ConectorBD('localhost', 'root', '');

$con->initConexion('Agendas');

$usuario = 'Mario@mail.com';
$passw = '12345';
$hash = password_hash($passw, PASSWORD_DEFAULT);
$nombre = 'Mario Manares';
$fechaNac = '1995-10-03';


$data['username'] = '"'.$usuario.'"';
$data['password'] = '"'.$hash.'"';
$data['nombre'] = '"'.$nombre.'"';
$data['fecha_nacimiento'] = '"'.$fechaNac.'"';

$con->insertData('usuarios', $data);




 ?>
