<?php 
//include_once'../secion/conexion.php';

$sql_mostrarproductos= 'SELECT tp.tipo_productos, u.idUnidad, u.descripcion,p.id_producto, p.Nombre, p.id_producto, p.cantidad , p.fecha_caducidad from productos p inner join unidad u on u.idUnidad = p.idunidad inner join tipo_productos tp on tp.idtipoproductos = p.idtipoproducto';
$sentecia_mostrarproductos=$pdo->prepare($sql_mostrarproductos);
$sentecia_mostrarproductos->execute();
$resultadoproductos=$sentecia_mostrarproductos->fetchAll();
// var_dump($resultado);
 


