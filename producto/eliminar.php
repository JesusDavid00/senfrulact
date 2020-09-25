<?php  
include_once'../secion/conexion.php';



$id = $_GET['id_producto'];


	 $sql_eliminarproducto= 'DELETE FROM productos WHERE id_producto=? ';
     $sentencia_eliminarproducto= $pdo->prepare( $sql_eliminarproducto);
     $sentencia_eliminarproducto->execute(array( $id));
     header('location:../producto.php?eliminarproducto');



     
    
