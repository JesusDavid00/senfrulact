<?php  
include_once'../secion/conexion.php';



$id = $_GET['idrol'];


	 $sql_eliminaRol= 'DELETE FROM rol WHERE idrol=? ';
     $sentencia_eliminaRol= $pdo->prepare( $sql_eliminaRol);
     $sentencia_eliminaRol->execute(array( $id));
     header('location:../tablas.php?eliminarRol');