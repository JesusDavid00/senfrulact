<!-- <?php ob_start();   
 include_once'secion/conexion.php';
include_once'producto/mostrarp.php';
// include_once('secion/abilitado.php');
$sql_mostrarproductos= 'SELECT tp.tipo_productos, u.descripcion, u.descripcion,p.id_producto, p.Nombre, p.id_producto, p.cantidad , p.fecha_caducidad, p.fecha_registro from productos p inner join unidad u on u.idUnidad = p.idunidad inner join tipo_productos tp on tp.idtipoproductos = p.idtipoproducto';
$sentecia_mostrarproductos=$pdo->prepare($sql_mostrarproductos);
$sentecia_mostrarproductos->execute();
$resultadoproductos=$sentecia_mostrarproductos->fetchAll();
// var_dump($resultado);
//include_once'./producto/mostrarp.php';
$sql_mostrarunidad= 'SELECT * from unidad';
$sentecia_mostrarunidad=$pdo->prepare($sql_mostrarunidad);
$sentecia_mostrarunidad->execute();
$resultadounidad=$sentecia_mostrarunidad->fetchAll();


$sql_tipodestino= 'SELECT * from destinataria';
$setdestino=$pdo->prepare($sql_tipodestino);
$setdestino->execute();
$resusltadotidestino=$setdestino->fetchAll();
//var_dump($resultadounidad);

?> -->
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>?>

</head>
<body>
  <?php include'menu/menu.php'; ?>
        <!-- Header-->
              <?php 

                if(isset($_GET["exito"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     El productos registro correctamente..
                     </div>';
                header('Refresh:2; URL=producto.php');   
           }elseif(isset($_GET["NoLLeneDatos"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                        El productos ya  esta registrado en la base de datos
                       </div>';
                 header('Refresh:2; URL=producto.php');
                 
            }elseif(isset($_GET["incorrecta"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                       la confirmación de la clave esta incorrecta
                       </div>';
                 header('Refresh:2; URL=producto.php');
            }elseif(isset($_GET['eliminar'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                       el registro se a eliminado correctamente....
                       </div>';
                        header('Refresh:2; URL=producto.php');
             }elseif(isset($_GET['editado'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                       el registro se a editado  correctamente....
                       </div>';
                        header('Refresh:2; URL=producto.php');
                        ob_end_flush();

             }

                  ?> 

      <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SalidaProducto"><i class=" fa fa-user"></i> Agregar</button>
                                    </li>
                                    <li>
                                        <button href="#" class="btn btn-primary" ><i class="fa fa-download"></i> pdf</button>
                                    </li>
                                    <li>
                                     <button href="#" class="btn btn-primary" ><i class="fa fa-download"></i> Exel</button>
                                 </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

<!-- modal para añadir productos -->
   <div class="modal fade" id="SalidaProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header col-azul-claro ">
          <h5 class="modal-title offset-md-4" id="exampleModalLabel2">Salidad de  productos</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body ">
              <form action="SalidaProducto/insertar.php" method="POST" >
            <input type="hidden" name="idsalida">
           <input type="hidden" name="idusuario">
          <div class="row ">
            <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                  <label for="invalidNombre" class="">Nombre:</label>
                  <input type="text" name="NombreSa" placeholder=" Digite el productos" class="form-control form-sinboder"  id="invalidNombre" required>
              </div>
            </div>
           <div class="col-12 col-md-4 ">
              <div class="form-group"> 
                <label for="invalidcantidad" class="">Cantidad:</label>
                <input type="text" name="cantidadSa" placeholder="Digite la cantidad" class="form-control form-sinboder" id="invalidcantidad" required>
              </div>
            </div>
            <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                <label for="invalidCaducidad" class="">Fecha de Caducidad:</label>
                <input type="Date" name="fechaSa" placeholder="Digite la fecha de caducidad" class="form-control form-sinboder" id="invalidCaducidad" required>
              </div> 
            </div>
          </div>
          <div class="row">
              <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                <label for="invalidEmail" class="">Seleccione una unidad:</label>
                <select name="unidadSa"  class="form-control form-sinboder">
                  <!--  <?php foreach ($resultadounidad as $unidad):?>
                  <option value="<?php echo $unidad['idUnidad']?>"><?php echo $unidad['descripcion'] ;?></option>
                  <?php endforeach; ?>  -->
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                <label for="invalidEmail" class="">Seleccione un destino:</label>
                <select name="destinoSa"  class="form-control form-sinboder">
                  <!--  <?php foreach ($resusltadotidestino as $destino):?>
                  <option value="<?php echo $destino['iddestino']?>"><?php echo $destino['tipodestino'] ;?></option>
                  <?php endforeach; ?>  -->
                </select>
              </div>
            </div>
              
          </div>
       </div>
        <div class="modal-footer ">
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
 </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Salida productos</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <!--  <div class="form-group row" style="margin-left:700px;" >
                                        <label class="form-control-label col-4">Buscar:</label>
                                    <input type="" class="form-control col-10" "name="">
                                   </div> -->
                                    <thead>
                                        <tr>
                                            
                                           <th>Nombre</th>
                                           <th>Cantidad</th>
                                            <th>Unidad de Medida</th>
                                            <th>tipo destino</th>
                                            <th>destino</th>
                                            <th>direcion</th>
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

                                        <?php  foreach($resultadoSalidas as $datosSa):?>
                                        <tr>

                                            <td><?php echo $datosSa[0] ?></td>
                                            <td><?php echo $datosSa[1] ?></td>
                                            <td><?php echo $datosSa[4] ?></td>
                                            <td><?php echo $datosSa[2] ?></td>
                                            <td><?php echo $datosSa[6] ?></td>
                                            <td><?php echo $datosSa[8] ?></td>
                                            <td><?php echo $datosSa[7] ?></td>
                                              <!-- <td><?php// echo $datos['Rol'] ?></td> -->
                                            <!-- <td><?php //echo $datos['Usuario'] ?></td>
                                            <td><?php //echo $datos['Clave'] ?></td>-->
                                             <td>
                                            <a href="salidas de productos/eliminar.php?idsalida=<?php echo $datosSa['idsalidas'] ?>"><i class="fa fa-trash-o" style="color:red;"></i></a>
                                            
                                            
                                            <a href="formularioeditarSa.php?idsalida=<?php echo $datosSa['idsalidas'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i></a>
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
            </div><!-- .animated -->
        </div><!-- .content -->

                                            


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
