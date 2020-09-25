<?php 
include_once ('../secion/conexion.php');
//print_r($_POST);

//echo password_hash("jesus", PASSWORD_DEFAULT)."\n";
// registrar en la base de datos desde aqui para ver si fucion
$idusuario=$_POST['idusuario'];
//$idrol=$_POST['idrol'];
 $nombre=$_POST['nombre'];
 $apellido=$_POST['Apellidos'];
$documen=$_POST["documen"];
 $numero=$_POST['numero'];
 $rol=$_POST["rol"];
 $usuario=$_POST['usuario'];
$contraseña=$_POST["contraseña"];
 $contraseña2=$_POST["contraseña2"];
 // $activo=$_POST["activo"];

// // verificar si el usuario existe en  la base de datos
 $sql_usuario_nuevo= ('SELECT Identificacion FROM usuario  WHERE Identificacion=? ');
 $sql_usuario_email= ('SELECT Usuario FROM usuario  WHERE Usuario=? ');
 $sentencia_usuario_nuevo= $pdo->prepare($sql_usuario_nuevo);
 $sentencia_usuario_email= $pdo->prepare($sql_usuario_email);
 $sentencia_usuario_nuevo->execute(array($numero));
 $sentencia_usuario_email->execute(array($usuario));
 $resultado_usuario_nuevo=$sentencia_usuario_nuevo->fetch(); 
 $resultado_usuario_email=$sentencia_usuario_email->fetch();
 // print_r($resultado_usuario_email).'<br>' ;
//   // print_r($resulselct_agregar12).'<br>';
	 if($resultado_usuario_nuevo or $resultado_usuario_email){
  //  ECHO'NADA';
   header('location:../usuario.php?&error');
     die();
 	 }
   $password = password_hash( $contraseña , PASSWORD_DEFAULT);

 // echo '<pre>';
 // var_dump($usuario);
 //  var_dump($password);
 //  var_dump($contraseña2);
 //  echo '</pre>';

// //print_r($_POST);

  if(password_verify($contraseña2, $password)) {
      //echo '¡La contraseña es válida!<br>';
     // if($contraseña2==$password){

        $sql_conect= 'INSERT INTO usuario(idrol ,Tipo_documento,Identificacion,Nombre,Apellidos,Usuario,Clave)VALUES (?,?,?,?,?,?,?)';
         $sentencia_agregar = $pdo->prepare($sql_conect);
         if( $sentencia_agregar->execute( array( $rol,$documen,$numero,$nombre,$apellido,$usuario,$password))){
            echo 'el usuario se registro correctamente';
           header("location:../usuario.php?&exito");
         }else{
     
         header("location:../usuario.php?&Error2");
       // echo 'l usuario no./tables/tablas registrar ingrase nuvamente';
         }
      // header('location:RegistrarUsuarioNuevo.php');
  } else {
   //echo 'La contraseña no considen.';
 header('location:../usuario.php?&incorrecta');

 }


  
