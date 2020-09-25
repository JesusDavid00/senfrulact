<?php  
include_once'../secion/conexion.php';



$id = $_GET['identrada'];

	 $sql_eliminarentrada= 'DELETE FROM entrada WHERE identrada=? ';
     $sentencia_eliminarentrada= $pdo->prepare( $sql_eliminarentrada);
     $sentencia_eliminarentrada->execute(array( $id));
     header('location:../EntradaInsumosNuevos.php?eliminarentrada');



     
    
