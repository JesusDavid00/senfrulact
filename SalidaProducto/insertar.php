<?php 
include_once ('../secion/conexion.php');

$id_salidas=$_POST['id_salidas'];
$idusuario=$_POST['idusuario'];
$destinoSa=$_POST['destinoSa'];
$nombreSa=$_POST['NombreSa']; 
$cantidadSa=$_POST['cantidadSa']; 
$unidadSa=$_POST['unidadSa']; 
$fechaSa=$_POST['fechaSa']; 

var_dump($fechaSa);
 if (empty($idusuario) || empty($unidadSa) || empty($destinoSa) || empty($nombreSa) || empty($cantidadSa)|| empty($fechaSa)) {
           header("location:../salidaProducto.php?&NoLLeneSalida");
exit();
 }else{
	$sql_insertSalida = 'INSERT INTO salidas ( id_usuario,idunidad, id_destino , nombre,Cantidad,fecha_caducidad) VALUES (?,?,?,?,?,?)';
	var_dump($sql_insertSalida);
 $sentecia_insertarSalida= $pdo->prepare($sql_insertSalida );
  $sentecia_insertarSalida->execute( array($idusuario,$unidadSa,$destinoSa,$nombreSa,$cantidadSa,$fechaSa));
          header("location:../salidaProducto.php?&exitoSalida");
  echo 'todo';

}

?>
        
  