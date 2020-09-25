<?php 
include_once("secion/conexion.php");
ob_start();
 ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventario</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!--  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
 -->
 <link rel="shortcut icon" href="images/LogoSena.png"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                      <img class="align-content" src="images/LogoSena.png" alt="" style="width: 100px">
                </div>
                <div class="login-form">
                    <h3 class="text-center lead">Inicio de Sesión</h3>

                    <form action="secion/inicio.php" method="POST" >
                        <!-- <input type="hidden" name="rol" value="<?php echo $resultadoRol['tipo_rol'] ?>"> -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Usuario"  class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password"  name="Clave" class="form-control" placeholder="Contraseña">
                        </div>
                         <?php 

                if(isset($_GET["Rellena"])){
                echo '<div class="alert alert-danger  text-center " role="alert">
                  Rellena todos lo campos.                     </div>';
                header('Refresh:2; URL=Login.php');   
           }elseif(isset($_GET["incorrecto"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                        Usuario y/o contraseña incorrectos.
                       </div>';
                 header('Refresh:2; URL=Login.php');
                 
            }elseif(isset($_GET["Inactivo"])){
                 echo '<div class="alert alert-danger text-center " role="alert">
                      El usuario se encuentra inactivo.                    
                       </div>';
                 header('Refresh:2; URL=Login.php');
                  }elseif(isset($_GET["IniciaCecion"])){
                 echo '<div class="alert alert-danger text-center " role="alert">
                No puedes entrar sin iniciar cesión.
                       </div>';
                 header('Refresh:2; URL=Login.php');
                        ob_end_flush();

             }

            ?>

                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Iniciar sesión</button>
                        <div class="register-link m-t-15 text-center">
                           
                        </div>
                 </form>
             <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-12 text-center">
                       2019 &copy Sena - Sistema de Control de Inventario para el  Centro Biotecnológico del Caribe SENA.
                    </div>
                </div>
            </div>
        </footer>
                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
