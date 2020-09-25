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
if($rol=="Administrador"){

//include_once('secion/abilitado.php');
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
  <?php include'menu/menu.php'; ?>

        <h3 class="text-center lead ">Configuración de  tablas basicas</h3>
    
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

<div class="content">    
    <div class="animated fadeIn">

     <div class="row justify-content-center">
           <div class="col col-md-3 col-lg-4">
               <form method="POST" action="tables/insertrol.php">
                   <div class="form-group">
                     <label for="rolinvalid" >Tipo rol:</label>
                     <input type="text" id="rolinvalid" name="rol" placeholder="Agregar el rol" class="form-control form-contol-mas" required>
                   </div>
                   <div class="form-group">
                       <button class="offset-lg-2"><i class="fa fa-plus-circle mr-1"></i>Registrar</button>
                       <a data-toggle="modal" data-target="#ModalRol" class="offset-lg-2"><i class="fa fa-plus-square mr-1"></i>Ver</a>
                   </div>
               </form>
           </div>
          <!-- Modal -->
          <div class="modal fade" id="ModalRol" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#192a56">
                  <h5 class="modal-title text-white" id="staticBackdropLabel">lista de roles registrados</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Accines</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($resultadoMostrar as $mostrarRol):?>
                    <tr>
                      <th scope="row"><?php echo $mostrarRol['tipo_rol']?></th>
                      <td>
                       <a href="tables/EliminarRol.php?idrol=<?php echo $mostrarRol['idrol'] ?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
                  
                        <a href="formularioeditarP.php?idrol=<?php echo $mostrarRol['idrol'] ?>">
                       <i class="fa fa-edit (alias)" style="color:red;"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                </div>
                <div class="modal-footer" style="background: #e67e22">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-secondary">Understood</button>
                </div>
              </div>
            </div>
          </div>
            <div class="col col-md-3 col-lg-4">
                 <form method="POST" action="tables/tipoentrada.php">
                   <div class="form-group">
                     <label for="tipoentradainvalid" >Tipo de entrada:</label>
                     <input type="text" id="tipoentradainvalid" name="tipoentrada" placeholder="Digite el tiipo de entrada" class="form-control form-contol-mas" required>
                   </div>
                   <div class="form-group">
                       <button class="offset-lg-2"><i class="fa fa-plus-circle mr-1"></i>Registrar</button>
                     <a data-toggle="modal" data-target="#ModalEntrada" class="offset-lg-2"><i class="fa fa-plus-square mr-1"></i>Ver</a>
                   </div>
               </form>
           </div>
            <div class="modal fade" id="ModalEntrada" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#192a56">
                  <h5 class="modal-title text-white" id="staticBackdropLabel">Listado de tipo entrada</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Accines</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($resultadsMostrarTipoEntrada as $TipoEntrada):?>
                    <tr>
                      <th scope="row"><?php echo $TipoEntrada['tipo_entradas'] ?></th>
                      <td>
                       <a href="tables/eliminar.php?Tipo_entradas=<?php echo $TipoEntrada['idtipoentrada'] ?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
                  
                        <a href="editrarTipoEntrada.php?Tipo_entradas=<?php echo $TipoEntrada['idtipoentrada'] ?>">
                       <i class="fa fa-edit (alias)" style="color:red;"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                </div>
                <div class="modal-footer" style="background: #e67e22">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-secondary">Actualizar</button>
                </div>
              </div>
            </div>
          </div>
             <div class="col col-md-3 col-lg-4">
                 <form method="POST" action="tables/materia.php">
                   <div class="form-group">
                     <label for="materiainvalid" >Tipo de materia:</label>
                     <input type="text" name="materia" id="materiainvalid" placeholder="Digite el tipo de materia" class="form-control form-contol-mas" required>
                   </div>
                   <div class="form-group">
                       <button class="offset-lg-1"><i class="fa fa-plus-circle mr-1"></i>Registrar</button>
                       <a data-toggle="modal" data-target="#ModalMateria" class="offset-lg-2"><i class="fa fa-plus-square mr-1"></i>Ver</a>
                   </div>
               </form>
           </div>
       </div>
        <div class="modal fade" id="ModalMateria" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#192a56">
                  <h5 class="modal-title text-white" id="staticBackdropLabel">Listado de tipo de materia</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Accines</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   foreach ($resultadsMostrartipo as $tipoM): ?>
                    <tr>
                      <th scope="row"><?php echo $tipoM['Tipo_materia'] ?></th>
                      <td>
                       <a href="tables/eliminar.php?id_tipoMateria=<?php echo $datos['id_tipoMateria'] ?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
                  
                        <a href="EditarTipoMateria.php?id_tipoMateria=<?php echo $datos['id_tipoMateria'] ?>">
                       <i class="fa fa-edit (alias)" style="color:red;"></i></a>
                      </td>
                    </tr>
                  <?php   endforeach; ?>
                  </tbody>
                </table>
                </div>
                <div class="modal-footer" style="background: #e67e22">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-secondary">Actualizar</button>
                </div>
              </div>
            </div>
          </div>
       <div class="row justify-content-center">
         <div class="col col-md-3 col-lg-4">
                 <form method="POST" action="tables/insertdoct.php">
                   <div class="form-group">
                    <input type="hidden" name="iddop">
                     <label for="documentoinalid" >Tipo de documento:</label>
                     <input type="text" name="documento"  id="documentoinalid" placeholder="digite tipo de documento" class="form-control form-contol-mas" required>
                      <label for="documentosiglasinalid" >siglas:</label>
                     <input type="text" name="siglas"  id="documentosiglasinalid" placeholder="Agregar siglas" class="form-control form-contol-mas" required>
                   </div>
                   <div class="form-group">
                       <button class="offset-lg-2"><i class="fa fa-plus-circle mr-1"></i>Registrar</button>
                       <a data-toggle="modal" data-target="#ModalDo" class="offset-lg-2"><i class="fa fa-plus-square mr-1"></i>Ver</a>
                   </div>
               </form>
           </div>
            <div class="modal fade" id="ModalDo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#192a56">
                  <h5 class="modal-title text-white" id="staticBackdropLabel">Listado de tipos de documento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Siglas</th>
                      <th scope="col">Accines</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   foreach ($resultadsMostrarTipoDocumento as $TipoDocumento): ?>
                    <tr>
                      <th scope="row"><?php  echo $TipoDocumento['tipo'] ?></th>
                      <th scope="row"><?php  echo $TipoDocumento['siglas'] ?></th>
                      <td>
                       <a href="tables/eliminar.php?idtipo=<?php echo $datos['idtipo'] ?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
                  
                        <a href="EditarTipoDocumento.php?idtipo=<?php echo $datos['idtipo'] ?>">
                       <i class="fa fa-edit (alias)" style="color:red;"></i></a>
                      </td>
                    </tr>
                  <?php   endforeach;?>
                  </tbody>
                </table>
                </div>
                <div class="modal-footer" style="background: #e67e22">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-secondary">Actualizar</button>
                </div>
              </div>
            </div>
          </div>
           <div class="col col-md-3 col-lg-4">
               <form method="POST" action="tables/tipoproducto.php">
                   <div class="form-group">
                     <label for="tipopinvalid" >Tipo de productos:</label>
                     <input type="text" name="tipop" id="tipopinvalid" placeholder="Digite el tipo de producto" class="form-control form-contol-mas">
                     <label for="descripcioninvalid"n class="" >Descripción:</label>
                     <input type="text" name="descripciontp" id="descripcioninvalid" placeholder="Digite la descripción del producto" class=" form-contol-mas form-control">
                   </div>
                   <div class="form-group">
                       <button class="offset-lg-2"><i class="fa fa-plus-circle mr-1"></i>Registrar</button>
                       <a data-toggle="modal" data-target="#ModalPro" class="offset-lg-2"><i class="fa fa-plus-square mr-1"></i>Ver</a>
                   </div>
               </form>
           </div>
            <div class="modal fade" id="ModalPro" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#192a56">
                  <h5 class="modal-title text-white" id="staticBackdropLabel">Listado de tipo de producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col"></th>
                      <th scope="col">Accines</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   foreach ($resultadsMostrarTipoP as $TipoProducto): ?>
                    <tr>
                      <th scope="row"><?php  echo $TipoProducto['tipo_productos']  ?></th>
                      <th scope="row"><?php  echo $TipoProducto['descripcion']  ?></th>
                      <td>
                       <a href="tables/eliminar.php?idtipoproducto=<?php echo $datos['idtipoproducto'] ?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
                  
                        <a href="EditarTipo.php?idtipoproducto=<?php echo $datos['idtipoproducto'] ?>">
                       <i class="fa fa-edit (alias)" style="color:red;"></i></a>
                      </td>
                    </tr>
                  <?php   endforeach; ?>
                  </tbody>
                </table>
                </div>
                <div class="modal-footer" style="background: #e67e22">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-secondary">Understood</button>
                </div>
              </div>
            </div>
          </div>
           <div class="col col-md-3 col-lg-4">
                 <form method="POST" action="tables/medidas.php">
                   <div class="form-group">
                     <label for="uniddainvalid" >Unidad de medida:</label>
                     <input type="text" name="descripcion" id="uniddainvalid" placeholder="Digite la unidad" class="form-control form-contol-mas" required>
                     <label for="siglasinvalid" >siglas:</label>
                     <input type="text" name="siglas" id="siglasinvalid" placeholder="Digite la siglas" class="form-control form-contol-mas" required>
                   </div>
                   <div class="form-group">
                       <button class="offset-lg-1"><i class="fa fa-plus-circle mr-1"></i>Registrar</button>
                       <a data-toggle="modal" data-target="#ModalUnida" class="offset-lg-2"><i class="fa fa-plus-square mr-1"></i>Ver</a>
                  </div>
               </form>
           </div>
            <div class="modal fade" id="ModalUnida" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#192a56">
                  <h5 class="modal-title text-white" id="staticBackdropLabel">Listado de tipo de unidad</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Siglas</th>
                      <th scope="col">Accines</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   foreach ($resultadsMostrarTipoUnidad as $UnidadTipo): ?>
                    <tr>
                      <th scope="row"><?php   echo $UnidadTipo['descripcion'] ?></th>
                      <th scope="row"><?php   echo $UnidadTipo['siglas'] ?></th>
                      <td>
                       <a href="tables/eliminar.php?idUnidad=<?php echo $datos['idUnidad'] ?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
                  
                        <a href="EditarUnidad.php?idUnidad=<?php echo $datos['idUnidad'] ?>">
                       <i class="fa fa-edit (alias)" style="color:red;"></i></a>
                      </td>
                    </tr>
                  <?php  endforeach; ?>
                  </tbody>
                </table>
                </div>
                <div class="modal-footer" style="background: #e67e22">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-secondary">Understood</button>
                </div>
              </div>
            </div>
          </div>
          </div>
    <div class="alert alert-danger mt-4">
      ALBERTENCIA <br>
      Para agregar un nuevo registro a una tabla debemos verificar si el registro no esta insertado en  base de datos. En la pestaña ver lo puede confirmar.
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
<?php 
}else{
 header('location:index.php?IniciarSecionAdmin');
}
 }else{
    echo'no autorizado';
    // var_export($Usuario);
   header('location:Login.php');
 }
 
 ?>