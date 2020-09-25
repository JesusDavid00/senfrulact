<?php 
// include_once'../secion/conexion.php';

$sql_mostrar= 'SELECT * FROM usuario';
$sentecia_mostrar=$pdo->prepare($sql_mostrar);
$sentecia_mostrar->execute();
$resultado=$sentecia_mostrar->fetchAll();
// var_dump($resultado);
 ?>
