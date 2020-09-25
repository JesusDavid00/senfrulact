<?php  
include_once'../secion/conexion.php';
$siglas=$_POST['siglas'];
  $descripcion=$_POST['descripcion'];

   $sql_unidadmedidas = "INSERT INTO unidad (siglas , descripcion) values(?,?)";
  $senteciarolunidadmedidas= $pdo->prepare($sql_unidadmedidas);
  if($senteciarolunidadmedidas->execute(array($siglas,$descripcion))){
 header('location:../tablas.php?exitounidadMedidas');
    echo 'noda';
  }else{
   header('location:../tablas.php?registradounidadMedidas');
    echo 'nada';
    die();
  }
 
 
 ?>