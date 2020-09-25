<?php  
include_once'../secion/conexion.php';
$materia=$_POST['materia'];

   $sql_materia = "INSERT INTO tipo_materia (tipo_materia) values(?)";
  $senteciarolmateria= $pdo->prepare($sql_materia);
  if($senteciarolmateria->execute(array($materia))){
 header('location:../tablas.php?exitomateria');
    echo 'noda';
  }else{
   header('location:../tablas.php?registradomateria');
    echo 'nada';
    die();
  }
 
 
 ?>