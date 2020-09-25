<?php 
include_once('../secion/conexion.php');
$cantidad=0;
$cantidad1=0;
$resultado=0;
 $sql_Insumosentradsas= 'SELECT e.* , en.identrada , en.cantidad as Cantidad from elementos  e inner join entrada en on e.idelemento=en.idelemento ';
$sentsumosentradsas = $pdo->prepare($sql_Insumosentradsas);
$sentsumosentradsas->execute();
$resusumosentradsas=$sentsumosentradsas->fetch();
 $idelemento=$resusumosentradsas['idelemento'];
 $cantidad1=$resusumosentradsas['cantidad'];
 $cantidad=$resusumosentradsas['Cantidad'];

$resultado=$cantidad+$cantidad1;
var_dump($resultado);
   $sql='UPDATE elementos e inner join entrada en on e.idelemento=en.idelemento set e.cantidad=? where en.idelemento=?';
    $senten=$pdo->prepare($sql);
   $senten->execute(array($resultado,$idelemento));
 //header('location:../insumos.php');
$resultado=null;
  
 ?>