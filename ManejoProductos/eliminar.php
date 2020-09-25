<?php  
include_once'../secion/conexion.php';



$id = $_GET['idmanejop'];


	 $sql_eliminarmanejo= 'DELETE FROM manejoproducto WHERE idmanejop=? ';
     $sentencia_eliminarmanejo= $pdo->prepare( $sql_eliminarmanejo);
     $sentencia_eliminarmanejo->execute(array( $id));
     header('location:../ManejoProductos.php?ExitosM');