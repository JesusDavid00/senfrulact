<?php  
include_once'../secion/conexion.php';



$idSp = $_GET['id_salidas'];


	 $sql_eliminarSp= 'DELETE FROM salidas WHERE id_salidas=? ';
     $sentencia_eliminarSp= $pdo->prepare( $sql_eliminarSp);
     $sentencia_eliminarSp->execute(array( $idSp));
     header('location:../salidaProducto.php?eliminarSp');
