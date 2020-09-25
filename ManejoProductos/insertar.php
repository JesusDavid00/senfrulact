<?php 
include_once ('../secion/conexion.php');

$NomnreMpro=$_POST['NomnreMpro'];

$CantidadManejoPro=$_POST['CantidadManejoPro'];
$unidadManejoPro=$_POST['unidadManejoPro'];
$DestinoManejoPro=$_POST['DestinoManejoPro'];  
$NombreSalida1=$_POST['NombreSalida1']; 
$fechaManejoPro=$_POST['fechaManejoPro']; 
$id_producto=$_POST['id_producto']; 
 $resusltadupdate=$_POST['idUtilizado']; 



if   ( empty($NomnreMpro) || empty($CantidadManejoPro) || empty($unidadManejoPro) || empty($DestinoManejoPro) || empty($NombreSalida1) || empty($fechaManejoPro)) {
        header("location:../ManejoProductos.php?&NoLLeneDatosPro");
	echo 'no fue ralizado';
exit();
}else{
	$sql_insertManejoProducto = 'INSERT INTO manejoproducto (id_producto,Cantidad,idunidad,id_destino ,id_salidas ,fecha_caducidad) VALUES (?,?,?,?,?,?)';
 $sentecia_insertarManejoProducto= $pdo->prepare($sql_insertManejoProducto );
  $sentecia_insertarManejoProducto->execute( array($NomnreMpro,$CantidadManejoPro,$unidadManejoPro,$DestinoManejoPro,$NombreSalida1,$fechaManejoPro));

   	//actualiza en la otra tabla 
     $sql_insertManejo = 'UPDATE productos set Cantidad= (Cantidad - "'.$CantidadManejoPro.'") where id_producto=?';
     var_dump($NomnreMpro);
    $sentecia_insertaManejo= $pdo->prepare($sql_insertManejo );
   $sentecia_insertaManejo->execute(array($NomnreMpro));

          header("location:../ManejoProductos.php?&SiLLeneDatosPro");
  echo 'si fue ralizado';
}

