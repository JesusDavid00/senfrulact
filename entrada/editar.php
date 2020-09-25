<?php
   include_once ('../secion/conexion.php');
	 // echo 'editar.php?id=?&codigo=?&nombre=?&cantidad=?&unidad=?&fecha=?';
	 // echo '<br>';


$idusuario=$_POST['id_usuario'];
$elementoNuevo=$_POST['elementoNuevo'];
$entradaIn=$_POST['entradaIn']; 
$EntradaNuevo=$_POST['EntradaNuevo']; 
$tipoentrada=$_POST['tipoentrada']; 
$cantidadEntra=$_POST['cantidadEntra']; 
$fechaEntradaIn=$_POST['fechaEntradaIn']; 
$identrada=$_POST['identrada'];
var_dump($_POST);

     $sql_editarP= 'UPDATE entrada SET  idusuario=?, idelemento=? ,idunidad=? , idtipoentrada=?,id_tipoMateria=?, cantidad=?, fecha_caducidad=? WHERE identrada =? ';

        $sentencia_editarI= $pdo->prepare( $sql_editarP);
     if($sentencia_editarI->execute(array($idusuario,$elementoNuevo,$entradaIn,$EntradaNuevo,$tipoentrada,$cantidadEntra,$fechaEntradaIn,$identrada))){
        header('location:../EntradaInsumosNuevos.php?editadoEntradai');
      }else{
     	header('location:../EntradaInsumosNuevos.php?errorEntradai');
      }
       


