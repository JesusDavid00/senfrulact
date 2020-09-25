<?php
   include_once ('../secion/conexion.php');
	 // echo 'editar.php?id=?&codigo=?&nombre=?&cantidad=?&unidad=?&fecha=?';
	 // echo '<br>';
    $documenEdi=$_POST['documenEdi'];
    $numero=$_POST['numero'];
    $nombreeditar=$_POST['nombre'];
    $apellidoeditar=$_POST['Apellidos'];
    $rol=$_POST['rol'];
    $usuarioeditar=$_POST['usuario'];
    $clave = $_POST['contraseña'];
    $password = password_hash( $clave , PASSWORD_DEFAULT);

    $idusuario = $_POST['idusuario'];
 // $contrase=$_POST["contraseña"];
 // $contraseñaeditar=$_POST["contraseña3"];
 // $contraseña2editar=$_POST["contraseña2"];

 var_dump($_POST);

//  $consultarclave = 'SELECT Clave FROM usuario WHERE id_usuario=?';
//  $sentenciaClaveu= $pdo->prepare('$consultarclave');
//   $sentenciaClaveu->execute(array($numero));
//    $resultadoClave=$sentenciaClaveu->fetch();
//  // print_r($resultado_usuario_email).'<br>' ;
// //   // print_r($resulselct_agregar12).'<br>';
// 	 if($resultadoClave){
//   //  ECHO'';
//  header('location:../usuario.php?&error');
//      die();
//      	 }
//  $password = password_hash( $contraseña , PASSWORD_DEFAULT);
 	 


	 // echo $id;
	 // echo '<br>';
	 // echo $color;
	 // echo '<br>';
	 // echo $descripcion;	

     $sql_editar_usuario= 'UPDATE usuario  SET idrol=?,Tipo_documento=?,Identificacion=?, Nombre=? ,Apellidos=?  ,Usuario=?, Clave=? WHERE id_usuario=? ';
        $sentencia_editar_usuario= $pdo->prepare( $sql_editar_usuario);
     if($sentencia_editar_usuario->execute(array($rol,$documenEdi,$numero,$nombreeditar,$apellidoeditar,$usuarioeditar,$password,$idusuario))){
       header('location:../usuario.php?editado');
     }else{
     	header('location:../usuario.php?error');
     }
       


