<?php  
include_once'../secion/conexion.php';



$idSt = $_GET['idUtilizado'];


	 $sql_eliminarUt= 'DELETE FROM elementoutilizado  WHERE idUtilizado=? ';
     $sentencia_eliminarUt= $pdo->prepare( $sql_eliminarUt);
     $sentencia_eliminarUt->execute(array( $idSt));
     header('location:../registrosManejoI.php?eliminarUt');
