<?php  

if(isset($_SESSION['admin'])){
    session_start();
  // echo 'bienvenido ' . $_SESSION['admin'];
    //echo '<a href="Cerrando.php">cerrar seción     lkllñ</a>';
    // $usurname_nombres=$_SESSION['admin'];
    // $sql_nombres='SELECT * FROM usuario WHERE  email= $usurname_nombres';
    // $sentencias_nombres=$conn->prepare($sql);
    // $sentencias_nombres->execute();
    // $resultado_nombres= $sentencias_nombres->fetch()
    // $nombres_nombres = utf8_decode($resultado_nombres[0]);
    //  $apellidos_nombres = utf8_decode($resultado_nombres[1]);
}else {
  header('location:./login.php');
}