<?php 
include_once ('../secion/conexion.php');

 // $identrada=$_POST['identrada'];
 $id_usuario=$_POST['id_usuario'];
 $elementoNuevox=$_POST['elementoNuevo']; 
 $unidadEn=$_POST['entradaIn']; 
 $EntradaNuevoTipoE=$_POST['EntradaNuevoTp']; 
 $tipoInsumoEn=$_POST['tipoIin'];
 $cantidadEn=$_POST['cantidadEn']; 
 $fechaEntradaI=$_POST['fechaEntradaI']; 

	 $sql_insertEntradas = 'INSERT INTO entrada (idusuario,idelemento,idunidad,idtipoentrada,id_tipoMateria,cantidad,fecha_caducidad) VALUES (?,?,?,?,?,?,?)';
    $sentecia_insertarEntrada= $pdo->prepare($sql_insertEntradas );
    $sentecia_insertarEntrada->execute(array($id_usuario,$elementoNuevox,$unidadEn,$EntradaNuevoTipoE,$tipoInsumoEn,$cantidadEn,$fechaEntradaI));
    	//actualiza en la otra tabla 
     $sql_insertEntradascna = 'UPDATE elementos set cantidad= (cantidad + "'.$cantidadEn.'") where idelemento=?';
     var_dump($elementoNuevox);
    $sentecia_insertarEntradacna= $pdo->prepare($sql_insertEntradascna );
   $sentecia_insertarEntradacna->execute(array($elementoNuevox));
 
    if($sentecia_insertarEntrada){
       header("location:../EntradaInsumosNuevos.php?&SiLLenadoEn");
    }else{
     header("location:../EntradaInsumosNuevos.php?&NoLLenadoEn");
    }
 


?>
