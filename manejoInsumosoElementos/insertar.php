<?php 
include_once ('../secion/conexion.php');



$NombreEl=$_POST['NombreEl'];
$producto=$_POST['producto'];
$cantidadIn=$_POST['cantidadIn'];
$cantidadIn1=$_POST['cantidadIn1'];
$unidadIn=$_POST['unidadIn']; 
$unidadIn2=$_POST['unidadIn2']; 
$descripcion=$_POST['descripcion']; 
$idutilizado=$_POST['idutilizado'];
 $fecha_caducidad=$_POST['fecha_caducidad'];


// var_dump($unidadIn);
// var_dump($unidadIn2);

 if (empty($cantidadIn) || empty($unidadIn) || empty($descripcion) || empty($fecha_caducidad) || empty($producto) || empty($cantidadIn1) || empty($unidadIn2)||  empty($NombreEl)) {
           header("location:../registrosManejoI.php?&NoLLeEL");
 	echo 'mmmm';	
exit();
 }else{
	$sql_insearElu = 'INSERT INTO elementoutilizado(Cantidad,idunidad,detalle,fecha_caducidad,idproducto,cantidad1 , unidad ,idelemento) VALUES (?,?,?,?,?,?,?,?)';
 $sentecia_insertarElu= $pdo->prepare($sql_insearElu );
  $sentecia_insertarElu->execute( array($cantidadIn,$unidadIn,$descripcion,$fecha_caducidad,$producto,$cantidadIn1,$unidadIn2,$NombreEl));
  
    $sql_insertEntradascna = 'UPDATE elementos set cantidad = (cantidad - "'.$cantidadIn.'") where idelemento=?';
    $sentecia_insertarEntradacna= $pdo->prepare($sql_insertEntradascna );
   $sentecia_insertarEntradacna->execute(array($NombreEl));

   $sql_insertmANEJO = 'UPDATE productos set Cantidad = (Cantidad + "'.$cantidadIn1.'") where id_producto=?';
   // var_dump($producto);
   // var_dump($cantidadIn1);
    $sentecia_insertamANEJO= $pdo->prepare($sql_insertmANEJO );
   $sentecia_insertamANEJO->execute(array($producto));

         header("location:../registrosManejoI.php?&exitoElu");
  echo 'todo';

}
?>
        
  