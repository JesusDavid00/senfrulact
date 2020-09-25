<?php  
include_once'../secion/conexion.php';
$tipoentrada=$_POST['tipoentrada'];

   $sql_tipoentrada = "INSERT INTO tipo_entrada (tipo_entradas) values(?)";
  $senteciaroltipoentrada= $pdo->prepare($sql_tipoentrada);
  if($senteciaroltipoentrada->execute(array($tipoentrada))){
 header('location:../tablas.php?exitotipoentrada');
    echo 'noda';
  }else{
   header('location:../tablas.php?registradotipoentrada');
    echo 'nada';
    die();
  }
 
 
