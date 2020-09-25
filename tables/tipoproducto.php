<?php  
include_once'../secion/conexion.php';
$tipop=$_POST['tipop'];
  $descripciontp=$_POST['descripciontp'];

   $sql_productotp = "INSERT INTO tipo_productos (tipo_productos , descripcion) values(?,?)";
  $senteciarolproductotp= $pdo->prepare($sql_productotp);
  if($senteciarolproductotp->execute(array($tipop,$desproductotp))){
 header('location:../tablas.php?exitoproductotp');
    echo 'noda';
  }else{
   header('location:../tablas.php?registradoproductotp');
    echo 'nada';
    die();
  }
 
 
 ?>