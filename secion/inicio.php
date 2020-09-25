

<?php 
//iniciar session siempre
    session_start();
    error_reporting(0);
include_once 'conexion.php';
//funcion para limpiar todo tipo de datos y eviar inyecciones
  function limpiarDatos($datos){
    $datos = trim($datos); //elimina los espacios
    $datos= htmlspecialchars($datos);//trasnforma cualquier < o > en texto
    $datos= filter_var($datos, FILTER_SANITIZE_STRING);//borrar todos los < y > y dejarlos en un solo texto
    return $datos;
  }


 $Usuario = limpiarDatos($_POST['Usuario']);
 $Clave= limpiarDatos($_POST['Clave']);
 $errores = '';
 // var_dump($Clave);
 // var_dump($Usuario);

  if (empty($Usuario) || empty($Clave)) {
     $errores.='<div class="alert alert-info col-md-12 col-sm-12 col-12 col-lg-12" role="alert" >
 Rellene todos los campos.
</div>';
header('Location: ../Login.php?Rellena');
die();
   }else{


$sql = 'SELECT u.*, r.idrol , r.tipo_rol FROM usuario u inner join rol r on u.idrol=r.idrol WHERE Usuario = ? ';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute(array($Usuario));

    $resultado = $sentencia->fetch();

 /*VERIFICAR EL ESTADO DEL USUARIO*/
   if ($resultado['activo']=='Activo') {
     if ($resultado['Usuario'] == $Usuario) {
   if(password_verify($Clave, $resultado['Clave'] )){
  
            //las contraseñas son iguales, iniamos session
            $_SESSION['Usuario'] = $Usuario;
            echo 'las contraseñas son iguales';
              //verifico si es administrador o otro tipo de usuario
           if(($resultado['tipo_rol'] == "Administrador")){
              header('Location:../index.php');
              echo 'este es el panel para el administrador';
           }else if(($resultado['tipo_rol'] == "Aprendiz")){
               header('Location:../index.php');
              echo 'este es el panel para el aprendiz';

           }else{
            header('Location: ../Login.php');
           }
          
            }else{
                 $errores.='<div class="alert alert-success col-md-12 col-sm-12 col-12 col-lg-12" role="alert" >
        Usuario y/o Contraseña Incorrectos.
        </div>';
                      header('Location: ../Login.php?incorrecto');
           
            }
          }else{
             $errores.='<div class="alert alert-success col-md-12 col-sm-12 col-12 col-lg-12" role="alert" >
        Usuario y/o contraseña incorrectos.
        </div>';
            header('Location: ../Login.php?incorrecto');
          
          }
          //fin verificacion estado
           } else{
           header('Location: ../Login.php?Inactivo');

           }


            
            
           }
         //verificar si el usuario ya existe en la bd
           
           

            //recoger la contraseña de la bd del usuario

            //si existe, comprobamos si la contraseña es la misma
            
          

            //importamos la vista del login
            require '../Login.php' ;
   

