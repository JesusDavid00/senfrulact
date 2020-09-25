
<?php 
 session_start();
include_once('secion/conexion.php');

if(isset($_SESSION['Usuario'])){
  $Usuario=$_SESSION['Usuario'];
 
  $sql = "SELECT u.*, r.idrol , r.tipo_rol,u.Identificacion FROM usuario u inner join rol r on u.idrol=r.idrol WHERE Usuario = '$Usuario'";
  $sentencia = $pdo->prepare($sql);
  $sentencia->execute();

  $resultado = $sentencia->fetch();
  $usuario=$resultado['Usuario'];
$rol=$resultado['tipo_rol'];
$nombre=$resultado['Nombre'];
$apellido=$resultado['Apellidos'];
$identificacion=$resultado['Identificacion'];
    //ut8_encode sirve para los caracteres especiales


?>

 <?php  


$sql_productos= 'SELECT count(*) as contar from productos p inner join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where tipo_productos="carnicos"';
$setproductos=$pdo->prepare($sql_productos);
$setproductos->execute();
$resusltadproductos=$setproductos->fetch();

$sql_lacteos= 'SELECT count(*) as con from productos p inner join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where tipo_productos="lacteos"';
$setlacteos=$pdo->prepare($sql_lacteos);
$setlacteos->execute();
$resusltadlacteos=$setlacteos->fetch();

$sql_panificacion= 'SELECT count(*) as ContarPan from productos p inner join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where tipo_productos="panificacion"';
$setpanificacion=$pdo->prepare($sql_panificacion);
$setpanificacion->execute();
$resusltadpanificacion=$setpanificacion->fetch();

$sql_frutas= 'SELECT count(*) as ContarFrutas from productos p inner join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where tipo_productos="frutas"';
$setfrutas=$pdo->prepare($sql_frutas);
$setfrutas->execute();
$resusltadfrutas=$setfrutas->fetch();

$sql_contarStopMin= 'SELECT count(*)  as ContarStopMin FROM `productos` WHERE Cantidad<StopMin';
$setcontarStopMin=$pdo->prepare($sql_contarStopMin);
$setcontarStopMin->execute();
$resusltadcontarStopMin=$setcontarStopMin->fetch();

// insumos inventario  decontro de insumos avanzados

$sql_insumos= 'SELECT count(*) as elementos from elementos';
$setinsumos=$pdo->prepare($sql_insumos);
$setinsumos->execute();
$resusltadinsumos=$setinsumos->fetch();

$sql_insumosEntrada= 'SELECT count(*) as entradas from entrada';
$setinsumosEntrada=$pdo->prepare($sql_insumosEntrada);
$setinsumosEntrada->execute();
$resusltadinsumosEntrada=$setinsumosEntrada->fetch();

$sql_salidas= 'SELECT count(*) as utilizado from elementoutilizado';
$setsalidas=$pdo->prepare($sql_salidas);
$setsalidas->execute();
$resusltadsalidas=$setsalidas->fetch();

$sql_StopMinIn= ' SELECT count(*) as StopMinE from  elementos where cantidad<StopMin';
$setStopMinIn=$pdo->prepare($sql_StopMinIn);
$setStopMinIn->execute();
$resusltadStopMinIn=$setStopMinIn->fetch();


$sql_contarStopMincv= 'SELECT  e.nombre , el.fechaRegistro ,el.Cantidad , e.fecha_caducidad from elementos e inner join elementoutilizado el on e.idelemento=el.idelemento where e.idelemento=e.idelemento ';
$setcontarStopMincv=$pdo->prepare($sql_contarStopMincv);
$setcontarStopMincv->execute();
$resusltadcontarStopMincv=$setcontarStopMincv->fetchAll();
 ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8to lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventario</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png"> -->
    <link rel="shortcut icon" href="images/LogoSena.png"> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        ul.colore li{
            background:rgb(241, 243, 244);
        }
        ul.colore li:hover{
            background: rgba(47, 53, 66,1.0);

        }
        .pulso  {
         -webkit-transition:padding 0.6s;
        }
        .pulso:hover{
            padding:0px;
        }
        .letra{
         padding:10px;

        }
        .letra:hover{
            background:rgb(241, 243, 244);
            color:white;
        }
        body{
            background-image:url(images/LogoSena.png);
            background-repeat: no-repeat;
            background-position: 665px 100px ;
            background-size:20% 20%;
         
        }
        </style>
</head>

<body>
    <?php if($rol== "Administrador"){

 ?>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel" >
        <nav class="navbar navbar-expand-sm navbar-default" >
            <div id="main-menu" class="main-menu collapse navbar-collapse" >
                <ul class="nav navbar-nav colore">
                    <li class="active"> 
                        <a href="index.php"><i class="mr-2 fa fa-laptop"></i>Pagina principal</a>
                    </li>
                      <li>
                         <a href="EntradaInsumosNuevos.php" >
                            <i class=" mr-2 fa fa-shopping-cart"></i>Entrada de insumos
                        </a>
                     </li>
                     <li>
                         <a href="insumos.php">
                            <i class=" mr-2 ti-save"></i>Insumos
                        </a>
                     </li>
                       <li>
                      <a href="registrosManejoI.php">
                            <i class="mr-2 fa  fa-truck"></i>Salidas de insumos
                        </a>
                   </li>
                    <li>
                        <a href="producto.php">
                            <i class="mr-2 ti-save"></i>Productos
                        </a>
                   </li> 
                   <li> 
                     <a href="ManejoProductos.php">
                            <i class="mr-2 fa  fa-truck"></i>Salidas de productos
                        </a>
                   </li>
                  <li class="lead letra "><small>Administración</small></li>
                    <li>
                      <a href="#">
                            <i class="mr-2   ti-bar-chart"></i>Reportes
                        </a>
                   </li>
                    <li>
                      <a href="#">
                            <i class="mr-2 ti-search"></i>Consultas   
                        </a>
                   </li>
                         <li>
                      <a href="usuario.php">
                            <i class="mr-2 ti-lock"></i>Usuarios
                        </a>
                   </li>
                      <li>
                      <a href="tablas.php">
                            <i class="mr-2  fa  fa-gears (alias)"></i>Configuración
                        </a>
                   </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel " style="background:#b2bec3 ">
        <!-- Header-->
        <header id="header" class="header" style="background:#f39c12">
            <div class="top-left">
                <div class="navbar-header" style="background:#f39c12">
                    <a class="navbar-brand" href="./"><img src="images/LogoSena.png" alt="Logo" style="width: 40px;  "></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/LogoSena.png" alt="Logo"style="width: 40px; ">> </a>
                    <!-- <small style="color:black; display: inline">Senfrulact</small>
 -->                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu " >
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        
                    <div class="user-area dropdown float-right" >
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h6 class="mr-3" style="color:black ;font-size:16px"><?php echo $rol; ?></h4>
                            <img class="user-avatar rounded-circle" src="images/LogoSena.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu" >
                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $nombre; ?></a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $identificacion ?></a>

                            <a class="nav-link" href="usuario.php"><i class="fa fa-cog"></i>Configuración</a>

                           <!--  <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a> -->
                            <a class="nav-link btn-rotate" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i>Salir</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->

                <div class="row  ">
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body ">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <span class="count"><?php echo $resusltadproductos['contar'] ?></span>
                                    </h3>
                                 <a href="" data-toggle="modal" data-target="#modalProducto"><p class="text-light mt-1 m-0">Carnicos</p></a>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-cart "></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <?php include_once('modales/modalProducto.php'); ?>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count float-left"><?php echo $resusltadlacteos['con'] ?></span>
                                        <span>%</span>
                                    </h3>
                                    <a href="" data-toggle="modal" data-target="#modalLacteos"><p class="text-light mt-1 m-0">Lácteos</p></a>

                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <div id="flotBar1" class="flotBar1"></div>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <?php include_once('modales/modalLacteos.php'); ?>
              
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $resusltadpanificacion['ContarPan'] ?></span>
                                    </h3>
                                  <a href="" data-toggle="modal" data-target="#modalPanificacion"><p class="text-light mt-1 m-0">Panificación</p></a>                      </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                <i class="ti-stats-up icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                     <?php include_once('modales/modalPanificacion.php'); ?>

                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $resusltadfrutas['ContarFrutas'] ?></span>
                                    </h3>
                                    <a href="" data-toggle="modal" data-target="#modalFrutas"><p class="text-light mt-1 m-0">Frutas</p></a>  
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                 <i class="ti-stats-up icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                
                    <!--/.col-->
                    </div>
                </div>
                  <?php include_once('modales/modalFrutas.php'); ?>
                 <!--cart de resgistros de insumos para el control de insumos resientes-->
                  <div class="row  ">
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body ">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <span class="count"><?php echo $resusltadinsumos['elementos'] ?></span>
                                    </h3>
                                     <a href="" data-toggle="modal" data-target="#modalInsumos"><p class="text-light mt-1 m-0">Insumos</p></a> 
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="ti-stats-up icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <?php// include_once('modales/modalInsumos.php'); ?>
                    <!--/.col-->
                               
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count float-left"><?php echo $resusltadinsumosEntrada['entradas'] ?></span>
                                        <span>%</span>
                                    </h3>
                                 <a href="" data-toggle="modal" data-target="#modalEntradas"><p class="text-light mt-1 m-0">Entradas</p></a>                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                  <i class="ti-bar-chart icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
             <?php include_once('modales/modalEntradas.php'); ?>

              
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $resusltadsalidas['utilizado'] ?></span>
                                    </h3>
                                   <a href="#"> <p class="text-light mt-1 m-0">Salidas</p></a>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right"> 
                                <i class="ti-pie-chart icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <?php include_once('modales/modal.php'); ?>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                   <span class="count"><?php echo $resusltadStopMinIn['StopMinE'] ?></span>
                                    </h3>
                                    <a href="" data-toggle="modal" data-target="#modalStopMin"><p class="text-light mt-1 m-0">Stop minimo</p></a>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                  <i class="ti-pulse icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                
                    <!--/.col-->
                    </div>
                    <?php include_once('modales/modalStopMin.php'); ?>


                </div> <!-- cierre del row pulso -->
                 <div class="card">
                  <h5 class="card-header text-center text-white" style="background:#192a56">Insumos mas utilizados</h5>
                  <div class="card-body " >
                   <!--  <h5 class="card-title">jkh</h5>
                    <p class="card-text">axa</p> -->
                    <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Fecha registros</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Fecha de caducidad</th>
                        </tr>
                      </thead>
                      <tbody>
                 <?php foreach ($resusltadcontarStopMincv as $insumo): ?>
                        <tr>
                          <th scope="row"><?php echo $insumo['nombre']?></th>
                          <td><?php echo $insumo['fechaRegistro']?></td>
                          <td><?php echo $insumo['Cantidad']?></td>
                          <td><?php echo $insumo['fecha_caducidad']?></td>
                        </tr>
                   <?php endforeach; ?>
                   </tbody>
                 </table>
                    </div>
                    <div class="card-footer" style="background:#192a56">
                    <a href="#" class=""><i class=" fa  fa-download  mr-1"></i>Excel</a>
                    </div>
                </div>
           <?php include_once('modales/modal.php'); ?>
             </div>

         <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
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
        <!-- /.site-footer -->
    </div>
<?php }else{ ?>
      <aside id="left-panel" class="left-panel" >
        <nav class="navbar navbar-expand-sm navbar-default" >
            <div id="main-menu" class="main-menu collapse navbar-collapse" >
                <ul class="nav navbar-nav colore">
                    <li class="active"> 
                        <a href="index.php"><i class="mr-2 fa fa-laptop"></i>Pagina principal</a>
                    </li>
                      <li>
                         <a href="EntradaInsumosNuevos.php" >
                            <i class=" mr-2 fa fa-shopping-cart"></i>Entrada de Insumos
                        </a>
                     </li>
                     <li>
                         <a href="insumos.php">
                            <i class=" mr-2 ti-save"></i>Insumos
                        </a>
                     </li>
                        <li>
                      <a href="registrosManejoI.php">
                            <i class="mr-2 fa  fa-truck"></i>Salidas de insumos
                        </a>
                   </li>
                    <li>
                        <a href="producto.php">
                            <i class="mr-2 ti-save"></i>Productos
                        </a>
                   </li> 
                   <li> 
                     <a href="ManejoProductos.php">
                            <i class="mr-2 fa  fa-truck"></i>Salidas de productos
                        </a>
                   </li>
                      <img src="images/LogoSena.png" style="width: 300px;  background:rgb(241, 243, 244);">
                </ul>

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel " style="background:#b2bec3 ">
        <!-- Header-->
        <header id="header" class="header" style="background:#6c5ce7">
            <div class="top-left">
                <div class="navbar-header" style="background:#6c5ce7">
                    <a class="navbar-brand " href="./"><img src="images/LogoSena.png" alt="Logo"style="width: 40px; "></a>
                    <a class="navbar-brand hidden " href="./"><img src="images/LogoSena.png" alt="Logo"style="width: 40px; "></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu " >
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        
                    <div class="user-area dropdown float-right" >
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h6 class="mr-3" style="color:black ;font-size:16px"><?php echo $rol; ?></h4>
                            <img class="user-avatar rounded-circle" src="images/LogoSena.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu" >
                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $nombre  ?></a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $identificacion ?></a>
                           <!--  <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a> -->
                            <a class="nav-link btn-rotate" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i>Salir</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->

                <div class="row  ">
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body ">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <span class="count"><?php echo $resusltadproductos['contar'] ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Carnicos</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-cart "></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count float-left"><?php echo $resusltadlacteos['con'] ?></span>
                                        <span>%</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Lacteos </p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <div id="flotBar1" class="flotBar1"></div>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
              
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $resusltadpanificacion['ContarPan'] ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Panificación</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                <i class="ti-stats-up icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $resusltadfrutas['ContarFrutas'] ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Frutas</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                 <i class="ti-stats-up icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                
                    <!--/.col-->
                    </div>
                </div>
                 <!--cart de resgistros de insumos para el control de insumos resientes-->
                  <div class="row  ">
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body ">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <span class="count"><?php echo $resusltadinsumos['elementos'] ?></span>
                                    </h3>
                                     <p class="text-light mt-1 m-0">Insumos</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="ti-stats-up icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count float-left"><?php echo $resusltadinsumosEntrada['entradas'] ?></span>
                                        <span>°</span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Entrada</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                  <i class="ti-bar-chart icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
              
                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $resusltadsalidas['utilizado'] ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Salidas</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right"> 
                                <i class="ti-pie-chart icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>
                    <!--/.col-->

                    <div class="col-sm-6 col-lg-3 pulso">
                        <div class="card text-white " style="background:#192a56">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $resusltadStopMinIn['StopMinE'] ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Stop minimo</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                  <i class="ti-pulse icon-lg pe-7s text-secondary"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                
                    <!--/.col-->
                    </div>


                </div> <!-- cierre del row pulso -->
                 <div class="card">
                  <h5 class="card-header text-center text-white" style="background:#192a56">Insumos mas utilizados</h5>
                  <div class="card-body " >
                   <!--  <h5 class="card-title">jkh</h5>
                    <p class="card-text">axa</p> -->
                    <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Fecha registro</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Fecha caducidad</th>
                        </tr>
                      </thead>
                      <tbody>
                 <?php foreach ($resusltadcontarStopMincv as $insumo): ?>
                        <tr>
                          <th scope="row"><?php echo $insumo['nombre']?></th>
                          <td><?php echo $insumo['fechaRegistro']?></td>
                          <td><?php echo $insumo['Cantidad']?></td>
                          <td><?php echo $insumo['fecha_caducidad']?></td>
                        </tr>
                   <?php endforeach; ?>
                   </tbody>
                 </table>
                    </div>
                    <div class="card-footer" style="background:#192a56">
                    <a href="#" class=""><i class=" fa  fa-download  mr-1"></i>Excel</a>
                    </div>
                </div>
           <?php include_once('modales/modal.php'); ?>
             </div>

         <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
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
        <!-- /.site-footer -->
    </div>

<?php } ?>

    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery.flot.tooltip@0.9.0/js/jquery.flot.tooltip.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.time.min.js"></script>
           <script src="assets/js/init/flot-chart-init.js"></script>


    <script src="assets/js/widgets.js"></script>
     
    
    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
<?php 
 }else{
    echo'no autorizado';
    // var_export($Usuario);
   header('location:Login.php');
 }
 
 ?>