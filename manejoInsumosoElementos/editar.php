<?php
   include_once ('../secion/conexion.php');
	 // echo 'editar.php?id=?&codigo=?&nombre=?&cantidad=?&unidad=?&fecha=?';
	 // echo '<br>';


 
$cantidadEn=$_POST['cantidadEn'];
$unidadIn=$_POST['unidadIn'];
$descripcionA=$_POST['descripcionA'];
$productoE=$_POST['productoE']; 
$NombreEle=$_POST['NombreEle'];
$cantidadEn2=$_POST['cantidadEn2'];
$unidadIn2=$_POST['unidadIn2']; 
$idutilizadoE=$_POST['idutilizado'];
 // var_dump($cantidadEn2);
 //  var_dump($unidadIn2);
 //   var_dump($unidadIn);
 //   var_dump($cantidadEn);
//  var_dump($descripcionA);
//  var_dump($productoE);
//  var_dump($NombreEle);
// var_dump($idutilizadoE);
var_dump($_POST);

 
        $sql_editarU= 'UPDATE elementoutilizado SET Cantidad=?,idunidad=?,detalle=?,idproducto=?, cantidad1=? , unidad=?, idelemento=? where idUtilizado=?'; 

       $sentencia_editarU= $pdo->prepare( $sql_editarU);
       if($sentencia_editarU->execute(array($cantidadEn, $unidadIn, $descripcionA, $productoE, $cantidadEn2, $unidadIn2,$NombreEle,$idutilizadoE))){
       header("location:../registrosManejoI.php?&ManejoEdi");
       	echo 'lll';
       }else{
       	 header("location:../registrosManejoI.php?&NoManejoEdi");
       	echo 'kkk';
       }

    
