<?php
   include_once ('../secion/conexion.php');
	 // echo 'editar.php?id=?&codigo=?&nombre=?&cantidad=?&unidad=?&fecha=?';
	 // echo '<br>';

$tipoprductosE=$_POST['tipoEd'];
$unidadE=$_POST['unidadEp'];
$nombreE=$_POST['NombreEd']; 
$cantidadE=$_POST['cantidadEp'];  
$fechaE=$_POST['fechaEp']; 
$id_producto=$_POST['id_producto'];

     $sql_editarP= 'UPDATE productos SET idtipoproducto=?,idunidad=?, Nombre=? ,Cantidad=? ,fecha_caducidad=?  WHERE id_producto=? ';
        $sentencia_editarP= $pdo->prepare( $sql_editarP);
     if($sentencia_editarP->execute(array($tipoprductosE,$unidadE,$nombreE,$cantidadE,$fechaE,$id_producto))){
      header('location:../producto.php?editadoP');
     }else{
     	header('location:../producto.php?errorP');
     }
       


