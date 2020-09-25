<?php 
include_once 'secion/conexion.php';
// include_once('secion/abilitado.php');
ob_start();
$sql_mostrar_rol='SELECT * from rol';
$senteciasMostrar=$pdo->prepare($sql_mostrar_rol);
$senteciasMostrar->execute();
$resultadoMostrar=$senteciasMostrar->fetchAll();

$sql_mostrar_tipoI='SELECT * from tipo_materia';
$senteciasMostrartipo=$pdo->prepare($sql_mostrar_tipoI);
$senteciasMostrartipo->execute();
$resultadsMostrartipo=$senteciasMostrartipo->fetchAll();

$sql_mostrar_destino='SELECT * from destinatorio';
$senteciasMostrarDestino=$pdo->prepare($sql_mostrar_destino);
$senteciasMostrarDestino->execute();
$resultadsMostrarDestino=$senteciasMostrarDestino->fetchAll();

$sql_mostrar_TipoDocumento='SELECT * from tipocedula';
$senteciasMostrarTipoDocumento=$pdo->prepare($sql_mostrar_TipoDocumento);
$senteciasMostrarTipoDocumento->execute();
$resultadsMostrarTipoDocumento=$senteciasMostrarTipoDocumento->fetchAll();

$sql_mostrar_TipoP='SELECT * from tipo_productos';
$senteciasMostrarTipoP=$pdo->prepare($sql_mostrar_TipoP);
$senteciasMostrarTipoP->execute();
$resultadsMostrarTipoP=$senteciasMostrarTipoP->fetchAll();

$sql_mostrar_TipoUnidad='SELECT * from unidad';
$senteciasMostrarTipoUnidad=$pdo->prepare($sql_mostrar_TipoUnidad);
$senteciasMostrarTipoUnidad->execute();
$resultadsMostrarTipoUnidad=$senteciasMostrarTipoUnidad->fetchAll();

$sql_mostrar_TipoEntrada='SELECT * from tipo_entrada';
$senteciasMostrarTipoEntrada=$pdo->prepare($sql_mostrar_TipoEntrada);
$senteciasMostrarTipoEntrada->execute();
$resultadsMostrarTipoEntrada=$senteciasMostrarTipoEntrada->fetchAll();

 ?>  

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
  <?php include'menu/menu.php'; ?>

        <h3 class="text-center lead ">Alministración de consultas</h3>
    
    <?php 
                   if(isset($_GET["registradorol"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     El rol ya esta registrado..
                     </div>';
                header('Refresh:2; URL=tablas.php');

            }elseif(isset($_GET["exitorol"])){
               echo '<div class="alert alert-primary  text-center " role="alert">
                  El rol se añadio correctamente..
                    </div>';
                header('Refresh:2; URL=tablas.php');
            }elseif(isset($_GET["registradodocumentop"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     El tipo de documento  ya esta registrado..
                     </div>';
                header('Refresh:2; URL=tablas.php');

            }elseif(isset($_GET["exitodocumentop"])){
               echo '<div class="alert alert-primary  text-center " role="alert">
                  El tipo de documento se añadio correctamente..
                    </div>';
                header('Refresh:2; URL=tablas.php');
                ob_end_flush();
            }elseif(isset($_GET["exitounidadMedidas"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                      El tipo de unidad se añadio correctamente..
                     </div>';
                header('Refresh:2; URL=tablas.php');

            }elseif(isset($_GET["registradounidadMedidas"])){
               echo '<div class="alert alert-primary  text-center " role="alert">
                 El tipo de unidad ya se encuentra registrado...
                    </div>';
                header('Refresh:2; URL=tablas.php');
             }elseif(isset($_GET["exitoproductotp"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                      El tipo de producto se añadio correctamente..
                     </div>';
                header('Refresh:2; URL=tablas.php');

            }elseif(isset($_GET["registradoproductotp"])){
               echo '<div class="alert alert-primary  text-center " role="alert">
                 El tipo de producto ya se encuentra registrado...
                    </div>';
                header('Refresh:2; URL=tablas.php');
             }elseif(isset($_GET["exitomateria"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                      El tipo de materia se añadio correctamente..
                     </div>';
               header('Refresh:2; URL=tablas.php');
            }elseif(isset($_GET["registradomateria"])){
               echo '<div class="alert alert-primary  text-center " role="alert">
                 El tipo de materia ya se encuentra registrado...
                    </div>';
                header('Refresh:2; URL=tablas.php');
                 }elseif(isset($_GET["exitotipoentrada"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                      El tipo de entrada se añadio correctamente..
                     </div>';
               header('Refresh:2; URL=tablas.php');
            }elseif(isset($_GET["registradotipoentrada"])){
               echo '<div class="alert alert-primary  text-center " role="alert">
                 El tipo de entrada  ya se encuentra registrado...
                    </div>';
                header('Refresh:2; URL=tablas.php');
                ob_end_flush();
                }
                ?> 
</div>
<div class="content">    
    <div class="animated fadeIn">
        <div>
            <ul>
                <li><p></p></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    <?php include_once('modales/modal.php'); ?>
        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
      </div>
    </div>


     <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>