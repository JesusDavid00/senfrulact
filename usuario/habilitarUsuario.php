<?php
   include_once ('../secion/conexion.php');

 $idusuarioeditar=$_GET['idusuario'];
$Activo='Activo';
 

     $sql_editar_usuario= 'UPDATE usuario  SET activo=? WHERE id_usuario=? ';
        $sentencia_editar_usuario= $pdo->prepare( $sql_editar_usuario);
     if($sentencia_editar_usuario->execute(array($Activo, $idusuarioeditar))){
       header('location:../usuario.php?Activado');
     }else{
     	header('location:../usuario.php?error');
     }
       