<?php
 require('conector.php');
 session_start();

 if(isset($_SESSION['username'])){
   $con = new ConectorBD();
   if ($con->initConexion('agendas')=='OK') {
     $data['start_date'] = '"'.$_POST['start_date'].'"';
     $data['end_date'] = '"'.$_POST['end_date'].'"';
     $data['start_hour'] = '"'.$_POST['start_hour'].'"';
     $data['end_hour'] = '"'.$_POST['end_hour'].'"';
     if ($cond->actualizarRegistro('eventos', $data, 'id = '.$_POST['id'])) {
       $response['msg'] = 'OK';
     } else {
       $response['msg'] = 'Ocurrio un error al actualizar el registro';
     }

   } else {
     $response['msg'] = 'No se pudo establecer conexion con la db';
   }

 } else {
   $response['msg'] = 'No existe una sesion activa';
 }


 ?>
