<?php  
include_once'../secion/conexion.php';



$id = $_GET['idusuario'];
$consultaestado="SELECT * from usuario where id_usuario=?";
$senconsulta= $pdo->prepare( $consultaestado);
$senconsulta->execute(array( $id));
$cuenta=$senconsulta->fetch();
if ($cuenta[8] == 'Activo') {
     header('location:../usuario.php?EstadoActivo');
	exit();
}else{
	 $sql_eliminarusuario= 'DELETE FROM usuario WHERE id_usuario=? ';
     $sentencia_eliminarusuario= $pdo->prepare( $sql_eliminarusuario);
     $sentencia_eliminarusuario->execute(array( $id));
     header('location:../usuario.php?eliminar');
}


     
    
