<?php
   include_once ('../secion/conexion.php');
	
 $idusuarioeditar=$_GET['idusuario'];
$Inactivo='Inactivo';
 
     $sql_editar_usuario= 'UPDATE usuario  SET activo=? WHERE id_usuario=? ';
        $sentencia_editar_usuario= $pdo->prepare( $sql_editar_usuario);
     if($sentencia_editar_usuario->execute(array($Inactivo,$idusuarioeditar))){
       header('location:../usuario.php?Desactivado');
     }else{
     	header('location:../usuario.php?error');
     }
       