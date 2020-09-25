<?php 
include_once ('../secion/conexion.php');



$destinoSa=$_POST['destinoSa'];
$nombreSa=$_POST['NombreSa']; 
$cantidadSa=$_POST['cantidadSa']; 
$unidadSa=$_POST['unidadSa']; 
$fechaSa=$_POST['fechaSa']; 

if (empty($destinoSa) || empty($nombreSa) || empty($cantidadSa) || empty($unidadSa) || empty($fechaSa)) {
          header("location:../producto.php?&NoLLeneSalida");
exit();
}else{
	$sql_insertSalida = 'INSERT INTO salidas (idtipoproducto,idunidad,Nombre,Cantidad,fecha_caducidad) VALUES (?,?,?,?,?)';
 $sentecia_insertarSalida= $pdo->prepare($sql_insertSalida );
  $sentecia_insertarSalida->execute( array($destinoSa,$nombreSa,$cantidadSa,$unidadSa,$fechaSa));
          header("location:../producto.php?&exitoSalida");

}

?>
        
  