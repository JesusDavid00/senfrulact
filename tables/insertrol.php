<?php 
include_once'../secion/conexion.php';
  
 $rol=$_POST['rol'];
  //$sql_rol_mostrar = "SELECT idrol , tipo_rol FROM Rol";
 //$sentenciaMostrar= $pdo->prepare($sql_rol_mostrar);
  //$sentenciaMostrar->execute(array($rol));
 // $resultadomostrar=$sentenciaMostrar->fetch();

 //if(empty($resultadomostrar)){
    // header('location:../tablas.php?registradorol');
// exit();

 //}else{

  $sql_rol = "INSERT INTO Rol (tipo_rol) values(?)";
  $senteciarol= $pdo->prepare($sql_rol);
  if($senteciarol->execute(array($rol))){
   header('location:../tablas.php?exitorol');
    echo 'noda';
  }else{
   header('location:../tablas.php?registradorol');
    echo 'nada';
    die();
  }