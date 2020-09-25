<?php  
include_once'../secion/conexion.php';



$id = $_GET['idelemento'];

	 $sql_eliminrelemento= 'DELETE FROM elementos WHERE idelemento=? ';
     $sentencia_eliminrelemento= $pdo->prepare( $sql_eliminrelemento);
     $sentencia_eliminrelemento->execute(array( $id));
     header('location:../insumos.php?eliminarelemento');



     
    
