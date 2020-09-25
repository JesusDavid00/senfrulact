<?php 
ob_start();
 include_once'secion/conexion.php';
 // include_once('secion/abilitado.php');
 $sql_mostrarinsumos= 'SELECT e.idUtilizado , e.detalle , e.fechaRegistro, e.Cantidad , e.cantidad1 , e.unidad, e.fecha_caducidad, el.nombre , u.descripcion , p.Nombre from elementoutilizado e INNER join productos p on e.idproducto=p.id_producto INNER join elementos el on e.idelemento=el.idelemento inner join unidad u on e.idunidad=u.idUnidad';
$sentecia_mostrarinsumos=$pdo->prepare($sql_mostrarinsumos);
$sentecia_mostrarinsumos->execute();
$resultadoinsumos=$sentecia_mostrarinsumos->fetchAll();
//include_once'usuario/mostrarusuario.php';
//include_once'./producto/mostrarp.php';
$sql_mostrarInventario= 'SELECT * from unidad';
$sentecia_mostrarInventario=$pdo->prepare($sql_mostrarInventario);
$sentecia_mostrarInventario->execute();
$resultadoInventario=$sentecia_mostrarInventario->fetchAll();


$sql_tipopreoductoselemneto= 'SELECT * from elementos';
$setpelemneto=$pdo->prepare($sql_tipopreoductoselemneto);
$setpelemneto->execute();
$resusltadotipoelemneto=$setpelemneto->fetchAll();

//var_dump($resultadounidad);
// var_dump($resultado);
$sql_tipopreoductoproductoIn= 'SELECT * from productos';
$setproductoIn=$pdo->prepare($sql_tipopreoductoproductoIn);
$setproductoIn->execute();
$resultadoproductoIn=$setproductoIn->fetchAll();

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   <?php include_once'head.php'; ?>

</head>
<body>
    <!-- Left Panel -->
<?php include_once'menu/menu.php'; ?>
  <h3 class="text-center lead ">Control de insumos y materia prima utilizados</h3>
        <!-- Header-->

                <?php 

                if(isset($_GET["exitoElu"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     El  registro  fue agregado correctamente..
                     </div>';
                header('Refresh:2; URL=registrosManejoI.php');   
           }elseif(isset($_GET["NoLLeneDatos"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                        El productos ya  esta registrado en la base de datos
                       </div>';
                 header('Refresh:2; URL=insumos.php');
                 
            }elseif(isset($_GET["NoLLeEL"])){
                 echo '<div class="alert alert-danger text-center " role="alert">
                       El registro no fue completado..
                       </div>';
                 header('Refresh:2; URL=registrosManejoI.php');
            }elseif(isset($_GET['eliminarUt'])){
                  echo '<div class="alert alert-danger text-center " role="alert">
                       El registro del Inventario Fue  Eliminado Correctamente....
                       </div>';
                        header('Refresh:2; URL=registrosManejoI.php');
             }elseif(isset($_GET['ManejoEdi'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                       El Registro del Inventario se Actualizo Correctamente...
                       </div>';
                        header('Refresh:2; URL=registrosManejoI.php');
                      }elseif(isset($_GET['NoManejoEdi'])){
                  echo '<div class="alert alert-danger text-center " role="alert">
                       El Registro del Inventario no Fue Actualizo...
                       </div>';
                        header('Refresh:2; URL=registrosManejoI.php');
                             }elseif(isset($_GET['CantidadInsufi'])){
                  echo  '<div class="alert alert-danger text-center " role="alert">
                       La cantidad ingresada supera la cantidad. 
                       </div>';
                        header('Refresh:2; URL=registrosManejoI.php');
                        ob_end_flush();

             }

                  ?>
  

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Control de  insumos</strong>
                                <button class="offset-md-7 mr-4 " data-toggle="modal" data-target="#ControlInsumos" ><i class="fa  fa-plus mr-1"></i>Nueva salida</button>
                                <button class=""><i class=" fa  fa-download  mr-1"></i>excel</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <!--  <div class="form-group row" style="margin-left:700px;" >
                                        <label class="form-control-label col-4">Buscar:</label>
                                    <input type="" class="form-control col-10" "name="">
                                   </div> -->
                                    <thead>
                                        <tr>
                                            <th>Insumo</th>
                                            <th>Cantidad</th>
                                            <th>Unidad</th>
                                            <th>Fecha</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                             <th>Unidad</th>
                                              <th>Fecha</th>
                                           <!--  <th>Descripcion</th> -->
                                            
                                            <!--  <th>rol</th> -->
                                            <!-- <th>Usuario</th> -->
                                            <!-- <th>Clave</th -->
                                            <th>Acciones</th>
                                            <!--  <th><a href="#" style="color:blue;">ver</a></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach($resultadoinsumos as $datosI):?>
                                        <tr>
                                            <td><?php echo $datosI['nombre'] ?></td>
                                            <td><?php echo $datosI['Cantidad'] ?></td>
                                            <td><?php echo $datosI['descripcion'] ?></td>
                                             <td><?php echo $datosI['fechaRegistro'] ?></td>
                                            <td><?php echo $datosI['Nombre'] ?></td>
                                             <td><?php echo $datosI['cantidad1'] ?></td>
                                             <td><?php echo $datosI['unidad'] ?></td>
                                            <td><?php echo $datosI['fecha_caducidad'] ?></td>
                                           <!--  <td><?php // echo $datosI['detalle'] ?></td>
 -->                      
                                          <!-- <td><?php// echo $datos['Rol'] ?></td> -->
                                            <!-- <td><?php //echo $datos['Usuario'] ?></td>
                                            <td><?php //echo $datos['Clave'] 
                                            ?></td>
                                             <td> -->
                                           <td>
                                            <?php if($rol=="Administrador"){ ?>
                                             <a href="manejoInsumosoElementos/eliminar.php?idUtilizado=<?php echo $datosI['idUtilizado'] ?>">
                                           <i class="fa fa-trash-o (alias)" style="color:red;"></i>
                                           
                                            <a href="FormularioEditarManejoI.php?idUtilizado=<?php echo $datosI['idUtilizado'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i>
                                         <?php }else{ ?>
                                                <a href="FormularioEditarManejoI.php?idUtilizado=<?php echo $datosI['idUtilizado'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i>
                                            <?php } ?>

                                           </td>
                                          <!--   </td>
                                            <a href="usuario/eliminar.php?id=<?php// echo $datos['id_usuario'] ?>">
                                             <td><a href="#"  style="color:blue;">ver</a></td> --> 
                                        </tr>
                                     
                                     <?php   endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                      </div>
             
                                      <!-- modal para añadir productos -->
                         <div class="modal fade" id="ControlInsumos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header " style="background:#192a56">
                                <h5 class="modal-title offset-md-4 text-white" id="exampleModalLabel2">Control de insumos y matria prima</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body ">
                            <form action="manejoInsumosoElementos/insertar.php" method="POST" >
                                <div class="row ">
                                  <div class="col-12 col-md-4 ">
                                    <div class="form-group ">
                                      <input type="hidden" name="idutilizado">
                                      <label for="invalidtipo" class="">Nombre insumo:</label>
                                     <select name="NombreEl"  class="form-control form-sinboder">
                                          <option selected>--Seleccione el nombre del insumo--</option>
                                         <?php foreach ($resusltadotipoelemneto as $tipoEl):?>
                                        <option value="<?php echo $tipoEl['idelemento']?>"><?php echo $tipoEl['nombre'] ;?></option>
                                        <?php endforeach; ?> 
                                      </select>
                                  </div>
                              </div>
                                  <div class="col-12 col-md-4 ">
                                 <div class="form-group"> 
                                      <label for="invalidcantidadI" class="">Cantidad:</label>
                                      <input type="text" name="cantidadIn" placeholder="Digite la cantidad" class="form-control form-sinboder" id="invalidcantidadI" required>
                                    </div>
                                  </div>
                                   <div class="col-12 col-md-4 ">
                                     <div class="form-group "> 
                                      <label for="invalidEmail" class="">Unidad de medidas:</label>
                                      <select name="unidadIn"  class="form-control form-sinboder">
                                        <option selected>--Seleccione un Tipo de unidad--</option>
                                         <?php foreach ($resultadoInventario as $unidadIn):?>
                                        <option value="<?php echo $unidadIn['idUnidad']?>"><?php echo $unidadIn['descripcion'] ;?></option>
                                        <?php endforeach; ?> 
                                      </select>
                                    </div>
                                  </div>
                                  </div>
                                 <div class="row">
                                 <div class="col-12 col-md-4 ">
                                      <div class="form-group "> 
                                      <label for="invalidEmail" class="">Nombre del producto:</label>
                                      <select name="producto"  class="form-control form-sinboder">
                                        <option selected>--Seleccione el producto --</option>
                                         <?php foreach ($resultadoproductoIn as $producto):?>
                                        <option value="<?php echo $producto['id_producto']?>"><?php echo $producto['Nombre'] ;?></option>
                                        <?php endforeach; ?> 
                                      </select>
                                    </div>
                                  </div>
                                    <div class="col-12 col-md-4 ">
                                   <div class="form-group"> 
                                      <label for="invalidcantidadI" class="">Cantidad:</label>
                                      <input type="text" name="cantidadIn1" placeholder="Digite la cantidad producto" class="form-control form-sinboder" id="invalidcantidadI" required>
                                    </div>
                                  </div>
                                    <div class="col-12 col-md-4 ">
                                     <div class="form-group "> 
                                      <label for="invalidEmail" class="">Unidad de medidas:</label>
                                      <select name="unidadIn2"  class="form-control form-sinboder">
                                        <option selected>--Seleccione un Tipo de unidad--</option>
                                         <?php foreach ($resultadoInventario as $unidadIn2):?>
                                        <option value="<?php echo $unidadIn2['descripcion']?>"><?php echo $unidadIn2['descripcion'] ;?></option>
                                        <?php endforeach; ?> 
                                      </select>
                                    </div>
                                  </div>
                                    <div class="col-12 col-md-12">
                                    <div class="form-group row "> 
                                    <label for="invalidcantidadI" class="col-form-label col-md-3">Fecha caducidad:</label>
                                    <input type="date" name="fecha_caducidad"  class="form-control col-md-8" id="invalidcantidadI" required>
                                  </div>
                                </div>
                                </div>
                               <div class="col-12 col-md-12 ">
                                <div class="from-group">
                                  <label>Descripcion del pedido:</label>
                                  <textarea class="form-control" name="descripcion"></textarea>
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
            </div><!-- .animated -->
        </div><!-- .content -->

<!--          <div class="clearfix"></div>

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


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script> 

</body>
</html>
