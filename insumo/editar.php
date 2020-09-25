<?php
   include_once ('../secion/conexion.php');
	 // echo 'editar.php?id=?&codigo=?&nombre=?&cantidad=?&unidad=?&fecha=?';
	 // echo '<br>';

 // $tipoMateria=$_POST['tipoIn'];
 $unidadEditarI=$_POST['unidadEditarI']; 
$NombreEditarI=$_POST['NombreEditarI']; 
// $cantidadEditarC=$_POST['cantidadEditarC']; 
 $StopMin=$_POST['StopMin'];
$fechaE=$_POST['fechaI'];
$idelemento=$_POST['idelemento'];

var_dump($_POST);


 if (empty($unidadEditarI) || empty($NombreEditarI) || empty($StopMin)||  empty($fechaE) ||  empty($idelemento)) {
          header('location:../insumos.php?NoLLeNadoIn');
 	echo 'mmmm';	
exit();
 }else{
    $sql_editarP= 'UPDATE elementos SET  idunidad=? , nombre=? , StopMin=?, fecha_caducidad=? WHERE idelemento =? ';

$sentencia_editarI=$pdo->prepare($sql_editarP);
   $sentencia_editarI->execute(array($unidadEditarI,  $NombreEditarI, $StopMin,$fechaE, $idelemento));
      header('location:../insumos.php?editadoIn');
      }


     

       


