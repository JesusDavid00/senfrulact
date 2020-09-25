 <!-- Left Panel -->
 <!-- 1. INICIA LA SESIÓN DEL USUARIO
        2. TOMA LOS DATOS DEL USUARIO EJ: EL ESTADO, NOMBRE, NOMBREUSUARIO, ET.
        3. VERIFICA CON UN CONDICIONAL EL ROL DEL USUARIO 
        EJ: <?php if ($resusuario['rol'] == 'Aprendiz'): ?>
     muestra el menu de navegación para el aprendiz
 <?php else: ?>
    muestra el menu del administrador 
 <?php endif ?>

 -->
<?php 
 session_start();
include_once('secion/conexion.php');

if(isset($_SESSION['Usuario'])){
  $Usuario=$_SESSION['Usuario'];
 
  $sql = "SELECT u.*, r.idrol , r.tipo_rol FROM usuario u inner join rol r on u.idrol=r.idrol WHERE Usuario = '$Usuario'";
  $sentencia = $pdo->prepare($sql);
  $sentencia->execute();

  $resultado = $sentencia->fetch();
  $usuario=$resultado['Usuario'];
$rol=$resultado['tipo_rol'];
  $identificacion=$resultado['Identificacion'];
$nombre=$resultado['Nombre'];
    //ut8_encode sirve para los caracteres especiales


?>
<style type="text/css">
       ul.colore li{
            background:rgb(241, 243, 244);
        }
        ul.colore li:hover{
            background: rgba(47, 53, 66,1.0);

        }

       body#usuario ul.menu li:nth-child(1) a,
       body#insumos ul.menu li:nth-child(2) a,
       body#productos ul.menu li:nth-child(3) a,
       body#contacto ul.menu li:nth-child(4) a {
       background: rgba(47, 53, 66,1.0);

}
        .letra{
         padding:10px;
        }
        .letra:hover{
            background:rgb(241, 243, 244);
            color:white;
        }
          button{
          border:none;
          background:none;
          text-decoration: underline;
          color:orange;
        }
        button:hover{
         text-decoration: underline;
         color:green;
      
        }

        .form-contol-mas{
        border:none ;
        border-bottom: 2px solid black !important ;
        background:transparent;
         }
        .form-contol-mas:focus{
        outline:none !important;
        border-radius: none !   important ;
        border-bottom: 2px solid black;
        background:rgba(241,243,244);
        }
        a.lineal{
          border:none;
          background:none;
          text-decoration: underline;
          color:orange;
        }
        a.lineal:hover{
        text-decoration: underline;
        color:green;
        }
        h3{
          padding: 10px;
          background: #2c3e50;
          color:white;  
        }
</style>


<?php if($rol=="Administrador"){ ?>
        <!--  <?php //}else{?> -->
           <aside id="left-panel" class="left-panel" >
        <nav class="navbar navbar-expand-sm navbar-default" >
            <div id="main-menu" class="main-menu collapse navbar-collapse" >
                <ul class="nav navbar-nav colore">
                    <li class="active"> 
                        <a href="index.php"><i class="mr-2 fa fa-laptop"></i>Pagina principal</a>
                    </li>
                      <li class="">
                         <a href="EntradaInsumosNuevos.php" >
                            <i class=" mr-2 fa fa-shopping-cart"></i>Entrada de Insumos
                        </a>
                     </li>
                     <li class="azul">
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
                    <li class="lead letra"><small>Administración</small></li>
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
<!--   <?php //} ?> -->


    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel " style="background:#b2bec3 ">
        <!-- Header-->
        <header id="header" class="header" style="background:#f39c12">
            <div class="top-left">
                <div class="navbar-header" style="background:#f39c12">
                    <a class="navbar-brand" href="./"><img src="images/LogoSena.png" alt="Logo"style="width: 40px; "></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/LogoSena.png" alt="Logo"style="width: 40px; "></a>
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
                          <h6  class="mr-3" style="color:black ; font-size:16px;"><?php echo  $rol; ?></h6>
                            <img class="user-avatar rounded-circle" src="images/LogoSena.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu" >
                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $nombre ?></a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $identificacion ?></a> 
                              <a class="nav-link" href="#"><i class="fa fa-cog"></i>Configuración</a>

                           <!--  <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a> -->
                            <a class="nav-link btn-rotate" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i>Salida</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
      <?php }else{ ?>
                <!--  <?php //}else{?> -->
           <aside id="left-panel" class="left-panel" >
        <nav class="navbar navbar-expand-sm navbar-default" >
            <div id="main-menu" class="main-menu collapse navbar-collapse" >
                <ul class="nav navbar-nav colore">
                    <li class="active"> 
                        <a href="index.php"><i class="mr-2 fa fa-laptop"></i>Pagina principal</a>
                    </li>
                      <li class="">
                         <a href="EntradaInsumosNuevos.php" >
                            <i class=" mr-2 fa fa-shopping-cart"></i>Entrada de Insumos
                        </a>
                     </li>
                     <li class="azul">
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
<!--   <?php //} ?> -->


    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel " style="background:#b2bec3 ">
        <!-- Header-->
        <header id="header" class="header" style="background:#6c5ce7">
            <div class="top-left">
                <div class="navbar-header" style="background:#6c5ce7">
                    <a class="navbar-brand" href="./"><img src="images/LogoSena.png" alt="Logo"style="width: 40px; "></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/LogoSena.png" alt="Logo"style="width: 40px; "></a>
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
                           <h6 class="mr-3" style="color:black ; font-size:16px;"><?php echo  $rol; ?></h6>
                            <img class="user-avatar rounded-circle" src="images/LogoSena.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu" >
                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $nombre ?></a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $identificacion ?></a>

                           <!--  <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a> -->
                            <a class="nav-link btn-rotate" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i>Salir</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

      <?php } ?>
       
        <?php 
      }else{
       header('location:Login.php?IniciaCecion');

        } ?>