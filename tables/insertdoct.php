<?php  
include_once'../secion/conexion.php';
$documento=$_POST['documento'];
  $siglas=$_POST['siglas'];

   $sql_documentop = "INSERT INTO tipocedula (tipo, siglas) values(?,?)";
  $senteciaroldocumentop= $pdo->prepare($sql_documentop);
  if($senteciaroldocumentop->execute(array($documento,$siglas))){
 header('location:../tablas.php?exitodocumentop');
    echo 'noda';
  }else{
   header('location:../tablas.php?registradodocumentop');
    echo 'nada';
    die();
  }
 
 
 ?>