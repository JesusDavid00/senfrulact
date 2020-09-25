<?php
   include_once ('../secion/conexion.php');
	 // echo 'editar.php?id=?&codigo=?&nombre=?&cantidad=?&unidad=?&fecha=?';
	 // echo '<br>';

$nombrepro=$_POST['nombrepro'];
$cantidaEm=$_POST['cantidaEm'];
$unidadEditarM=$_POST['unidadEditarM']; 
$nombredestino=$_POST['nombredestino']; 
$id_salidas=$_POST['id_salidas']; 
$fechaeditarM=$_POST['fechaeditarM'];
$idmanejop=$_POST['idmanejop'];
var_dump($_POST);

     $sql_editarMp= 'UPDATE manejoproducto SET id_producto=?,Cantidad=? ,idunidad=?, id_destino=? , id_salidas=? ,fecha_caducidad=?  WHERE idmanejop=? ';
        $sentencia_editarMp= $pdo->prepare( $sql_editarMp);
     if($sentencia_editarMp->execute(array($nombrepro,$cantidaEm,$unidadEditarM,$nombredestino,$id_salidas,$fechaeditarM,$idmanejop))){
      header('location:../ManejoProductos.php?SiLLenaDos');
       echo 'si se puede'; 
     }else{
     	header('location:../ManejoProductos.php?NoLLenaDos');
       echo 'no se puede';
     }
       


