<?php 
include_once ('../secion/conexion.php');



$tipoprductos=$_POST['tipop'];
$nombre=$_POST['Nombre']; 
$cantidad=$_POST['cantidad']; 
$StopMin=$_POST['StopMin']; 
$unidad=$_POST['unidadp']; 
$fecha=$_POST['fecha']; 



$sql_NombreUnico='SELECT Nombre FROM productos where Nombre=?';

$senteciaNombreUnico=$pdo->prepare($sql_NombreUnico);

$senteciaNombreUnico->execute(array($nombre));
$resultadoNombreUnico=$senteciaNombreUnico->fetch();
if($resultadoNombreUnico){
  header("location:../producto.php?&ExisteNombreIn");
  die();
}

if (empty($tipoprductos) || empty($unidad) || empty($nombre) || empty($StopMin) || empty($fecha)) {
          header("location:../producto.php?&NoLLeneDatos");
exit();
}else{
	$sql_insertproductos = 'INSERT INTO productos (idtipoproducto,idunidad,Nombre,StopMin,fecha_caducidad) VALUES (?,?,?,?,?)';
 $sentecia_insertarproductos= $pdo->prepare($sql_insertproductos );
  $sentecia_insertarproductos->execute( array($tipoprductos,$unidad,$nombre,$StopMin,$fecha));
          header("location:../producto.php?&exito");

}



?>
        
  