<?php
   include_once ('../secion/conexion.php');
	 // echo 'editar.php?id=?&codigo=?&nombre=?&cantidad=?&unidad=?&fecha=?';
	 // echo '<br>';

   $unidadSa=$_POST['unidadSa'];
   $destinoSa=$_POST['destinoSa'];
   $nombreSa=$_POST['NombreSa']; 
   $cantidadSa=$_POST['cantidadSa'];
   $fechaSa=$_POST['fechaSa']; 
   $id_salidasSa=$_POST['id_salidas'];
// $id_usuario=$_POST['id_usuario'];
// $id_salidasSa=$_POST['id_salidas'];


 
 

 

  // var_dump($id_salidasSa);

      $sql_editarSp= 'UPDATE salidas SET  idunidad=?, id_destino=?,nombre=?,Cantidad=?,fecha_caducidad=?  WHERE id_salidas=? ';
        $sentencia_editarSp= $pdo->prepare( $sql_editarSp);
      if($sentencia_editarSp->execute(array($unidadSa,$destinoSa,$nombreSa,$cantidadSa,$fechaSa , $id_salidasSa))){
       header('location:../salidaProducto.php?editadoSp');
       ECHO 'ACTUALIZADO CORRECTAMENTE...';
      }else{
      header('location:../salidaProducto.php?errorSp');
       ECHO 'NADAAS';
      }
       


