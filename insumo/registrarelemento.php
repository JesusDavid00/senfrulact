<?php 
include_once ('../secion/conexion.php');

$idelemento=$_POST['idelemento'];
$tipoI=$_POST['tipoIin'];
$nombreI=$_POST['NombreI']; 
$StopMin1=$_POST['StopMin1'];  
$unidadI=$_POST['unidadI']; 
$fechaI=$_POST['fechaI']; 
$identrada=$_POST['identrada'];



$sql_InsumosRe= 'SELECT nombre  from elementos where nombre=?';
$sentenciaRe = $pdo->prepare($sql_InsumosRe);

$sentenciaRe->execute(array($nombreI));
$resultadoRe=$sentenciaRe->fetch();
if($resultadoRe){
   header("location:../insumos.php?&ReInsumo");
   die();
}
 
// var_dump($nombreI);
// var_dump($cantidadI);
// var_dump($tipoI);
// var_dump($unidadI);
	 $sql_insertIn = 'INSERT INTO elementos (idmateria,idunidad,nombre,StopMin,fecha_caducidad) VALUES (?,?,?,?,?)';
     $sentecia_insertarIn= $pdo->prepare($sql_insertIn );
    if($sentecia_insertarIn->execute(array($tipoI,$unidadI,$nombreI,$StopMin1,$fechaI))){
    	header("location:../insumos.php?&exitoInsumo");
    	echo 'nada';
    }else{
    header("location:../insumos.php?&NoexitoIn");
    	echo 'nonda';
    }  
?>
