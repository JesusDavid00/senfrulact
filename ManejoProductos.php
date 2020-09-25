<?php ob_start();   
 include_once'secion/conexion.php';
 // include_once('secion/abilitado.php');
include_once'producto/mostrarp.php';
$sql_mostrarproductos= 'SELECT m.* , u.descripcion , (d.nombre) AS Nombre , p.nombre , P.id_producto from manejoproducto m INNER JOIN productos p on m.id_producto=p.id_producto inner join destinatorio d on m.id_destino=d.id_destino inner join unidad u on m.idunidad=u.idUnidad';
$sentecia_mostrarproductos=$pdo->prepare($sql_mostrarproductos);
$sentecia_mostrarproductos->execute();
$resultadoproductos=$sentecia_mostrarproductos->fetchAll();
// var_dump($resultado);
//include_once'./producto/mostrarp.php';
$sql_mostrarunidad= 'SELECT * from unidad';
$sentecia_mostrarunidad=$pdo->prepare($sql_mostrarunidad);
$sentecia_mostrarunidad->execute();
$resultadounidad=$sentecia_mostrarunidad->fetchAll();


$sql_productos= 'SELECT * from productos';
$setproductos=$pdo->prepare($sql_productos);
$setproductos->execute();
$resusltadproductos=$setproductos->fetchAll();

$sql_productosManejoPro= 'SELECT * from productos';
$setproductosManejoPro=$pdo->prepare($sql_productosManejoPro);
$setproductosManejoPro->execute();
$resusltadproductosManejoPro=$setproductosManejoPro->fetch();


$sql_destono= 'SELECT * from destinatorio';
$setdestono=$pdo->prepare($sql_destono);
$setdestono->execute();
$resusltaddestono=$setdestono->fetchAll();

$sql_salidas= 'SELECT * from salidas';
$setsalidas=$pdo->prepare($sql_salidas);
$setsalidas->execute();
$resusltadsalidas=$setsalidas->fetch();

$sql_update= 'SELECT * from elementoutilizado';
$setupdate=$pdo->prepare($sql_update);
$setupdate->execute();
$resusltadupdate=$setupdate->fetch();
//var_dump($resultadounidad);

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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>?>

</head>
<body>
   <?php include'menu/menu.php'; ?>
        <!-- Header-->
        <h3 class="text-center lead">Control de inventario de productos</h3>
              <?php 

                if(isset($_GET["SiLLeneDatosPro"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     El registro del producto fue agregado correctamente.
                     </div>';
                header('Refresh:2; URL=ManejoProductos.php');   
           }elseif(isset($_GET["NoLLeneDatosPro"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                       El registro del producto no fue agregado.
                       </div>';
                 header('Refresh:2; URL=ManejoProductos.php');
                 
            }elseif(isset($_GET["SiLLenaDos"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                      El registro de control de producto fue actualizado correctamente.
                       </div>';
                 header('Refresh:2; URL=ManejoProductos.php');
            }elseif(isset($_GET['NoLLenaDos'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                     El registro de control de producto no fue actualizado.
                       </div>';
                        header('Refresh:2; URL=ManejoProductos.php');

            }elseif(isset($_GET['ExitosM'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                      El regirstro de  control  de productos  fue eliminado.
                       </div>';
                        header('Refresh:2; URL=ManejoProductos.php');
             }elseif(isset($_GET['errorp'])){
                  echo '<div class="alert alert-danger text-center " role="alert">
                      El Producto no Fue Editado...
                       </div>';
                        header('Refresh:2; URL=producto.php');
                        ob_end_flush();

             }

                  ?>

 
        <div>


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Control de productos</strong>
                                    <button class="offset-md-7 mr-2" data-toggle="modal" data-target="#Inproducto" ><i class="fa  fa-plus mr-1"></i>Agregar salida</button>
                                <button class=""><i class=" fa  fa-download  mr-1"></i>Excel</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <!--  <div class="form-group row" style="margin-left:700px;" >
                                        <label class="form-control-label col-4">Buscar:</label>
                                    <input type="" class="form-control col-10" "name="">
                                   </div> -->
                                    <thead>
                                        <tr>
                                             <th>Nombre del Producto</th>
                                             <th>Cantidad</th>
                                            <th>Unidad de Medida</th>
                                            <th>Nombre del Destino</th>
                                            <th>Fecha Registro</th>
                                            <th>Fecha caducidad</th>
                                            
                                            <!--  <th>rol</th> -->
                                            <!-- <th>Usuario</th> -->
                                            <!-- <th>Clave</th -->
                                             <th>Acciones
                                             </th>
                                            
                                            <!--  <th><a href="#" style="color:blue;">ver</a></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php  foreach($resultadoproductos as $datos):?>
                                        <tr>

                                            <td><?php echo $datos['nombre'] ?></td>
                                            <td><?php echo $datos['Cantidad'] ?></td>
                                            <td><?php echo $datos['descripcion'] ?></td>
                                           <!--  <td><?php echo $datos[2] ?></td> -->
                                            <td><?php echo $datos['Nombre'] ?></td>
                                            <td><?php echo $datos['fechaRegistro'] ?></td>
                                            <td><?php echo $datos[7] ?></td>
                                              <!-- <td><?php// echo $datos['Rol'] ?></td> -->
                                            <!-- <td><?php //echo $datos['Usuario'] ?></td>
                                            <td><?php //echo $datos['Clave'] ?></td>-->
                                             <td>
                                              <?php if($rol=="Administrador"){ ?>
                                            <a data-toggle="modal" data-target="#eliminar"><i class="fa fa-trash-o" style="color:red;"></i></a>
                                            
                                            
                                            <a href="formularioeditarMp.php?idmanejop=<?php echo $datos['idmanejop'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i></a>
                                         <?php }else{ ?>
                                          <a href="formularioeditarMp.php?idmanejop=<?php echo $datos['idmanejop'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i></
                                            <?php } ?>

                                            </td>
                                            <!--<a href="usuario/eliminar.php?id=<?php// echo $datos['id_usuario'] ?>">
                                             <td><a href="#"  style="color:blue;">ver</a></td> --> 
                                        </tr>
                                        
                                     <?php   endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
               <!--  modol para elimnar manejo de productos -->
               <div class="modal fade" id="eliminar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="background:#192a56">
                      <h5 class="modal-title text-white" id="staticBackdropLabel">lista de roles registrados</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ¿Deseas mover el regirstro de control de producto?
                    </div>
                    <div class="modal-footer" style="background: #e67e22">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="ManejoProductos/eliminar.php?idmanejop=<?php echo $datos['idmanejop'] ?>">Mover</a>
                    </div>
                  </div>
                </div>
              </div>
                <!-- modal para añadir productos -->
               <div class="modal fade" id="Inproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header  " style="background:#192a56">
                      <h5 class="modal-title offset-md-4 text-white" id="exampleModalLabel2">Manejo de productos</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body ">
                          <form action="ManejoProductos/insertar.php" method="POST" >
                        <input type="hidden" name="id_producto" value="<?php echo $resusltadproductosManejoPro['id_producto'] ?>">
                        <input type="hidden" name="NombreSalida1" value="<?php  echo $resusltadsalidas['id_salidas'] ?>">
                        <input type="hidden" name="idUtilizado" value="<?php echo $resusltadupdate['idUtilizado'] ?>">
                      <div class="row ">
                        <div class="col-12 col-md-4 ">
                          <div class="form-group "> 
                            <label for="invalidtipo" class="">Nombre del productos:</label>
                           <select name="NomnreMpro"  class="form-control form-sinboder">
                                <option selected>--Seleccione--</option>
                               <?php foreach ($resusltadproductos as $tipoMp):?>
                              <option value="<?php echo $tipoMp['id_producto']?>"><?php echo $tipoMp['Nombre'] ;?></option>
                              <?php endforeach; ?> 
                            </select>
                        </div>
                      </div>
                        <div class="col-12 col-md-4 ">
                          <div class="form-group"> 
                            <label for="invalidcantidad" class="">Cantidad:</label>
                            <input type="text" name="CantidadManejoPro" placeholder="Digite la cantidad" class="form-control form-sinboder" id="invalidcantidad" required>
                          </div>
                        </div>
                       <div class="col-12 col-md-4 ">
                          <div class="form-group "> 
                            <label for="invalidEmail" class="">Unidad de Medidas:</label>
                            <select name="unidadManejoPro"  class="form-control form-sinboder">
                              <option selected>--Seleccione --</option>
                               <?php foreach ($resultadounidad as $unidad):?>
                              <option value="<?php echo $unidad['idUnidad']?>"><?php echo $unidad['descripcion'] ;?></option>
                              <?php endforeach; ?> 
                            </select>
                          </div>
                        </div>
                         </div>
                         <div class="row">
                          <div class="col-12 col-md-6 ">
                        <div class="form-group "> 
                            <label for="invalidEmail" class="">Nombre del destino:</label>
                            <select name="DestinoManejoPro"  class="form-control form-sinboder">
                              <option selected>--Seleccione--</option>
                               <?php foreach ($resusltaddestono as $NombreDestino):?>
                              <option value="<?php echo $NombreDestino['id_destino']?>"><?php echo $NombreDestino['nombre'] ;?></option>
                              <?php endforeach; ?> 
                            </select>
                          </div> 
                        </div>
                          <div class="col-12 col-md-6 ">
                           <div class="form-group "> 
                            <label for="invalidCaducidad" class="">Fecha de Caducidad:</label>
                            <input type="Date" name="fechaManejoPro" placeholder="Digite la fecha de caducidad" class="form-control form-sinboder" id="invalidCaducidad" required>
                          </div> 
                        </div>
                      </div>
                      </div>
                    <div class="modal-footer " style="background: #e67e22">
                     <div class="form-gruop" >
                        <button class="btn btn-secundary ">Agregar</button>
                      </div>
                      <button class="btn btn-secundary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                    <!--   <a class="btn btn-primary" href="login.html">Guardar</a> -->
                  </form>
                  </div>
                </div>
              </div>
             <?php include_once('modales/modal.php'); ?>    
             </div>
            </div><!-- .animated -->
        </div><!-- .content -->

                                            

          <!--  <div class="clearfix"></div>

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
        </footer> -->
       

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>



       


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>








</body>
</html>
