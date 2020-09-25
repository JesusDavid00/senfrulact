<?php 
ob_start();
 include_once'secion/conexion.php';
 // include_once('secion/abilitado.php');
 //$sql_mostrarinsumos= 'SELECT u.descripcion,e.idelemento, e.nombre as nom, e.idmateria,sum(en.Cantidad) as Cantidad , e.fecha_caducidad, e.fechaRegistro , e.StopMin from elementos e LEFT join entrada en on e.idelemento=en.idelemento inner join unidad u on u.idUnidad = e.idunidad group by (e.idelemento )' ;
 $sql_mostrarinsumos='SELECT e.* , u.* FROM elementos e inner join unidad u on e.idunidad=u.idUnidad';
$sentecia_mostrarinsumos=$pdo->prepare($sql_mostrarinsumos);
$sentecia_mostrarinsumos->execute();
$resultadoinsumos=$sentecia_mostrarinsumos->fetchAll();
//include_once'usuario/mostrarusuario.php';
//include_once'./producto/mostrarp.php';
$sql_mostrarunidadinsumo= 'SELECT * from unidad';
$sentecia_mostrarunidadinsumo=$pdo->prepare($sql_mostrarunidadinsumo);
$sentecia_mostrarunidadinsumo->execute();
$resultadounidadinsumo=$sentecia_mostrarunidadinsumo->fetchAll();


$sql_tipopreoductosI= 'SELECT * from Tipo_materia';
$setpI=$pdo->prepare($sql_tipopreoductosI);
$setpI->execute();
$resusltadotipoI=$setpI->fetchAll();

$sql_tipopreodoidemento= 'SELECT e.* , en.*  from elementos  e inner join entrada en on e.idelemento=en.idelemento';
$setpelemento=$pdo->prepare($sql_tipopreodoidemento);
$setpelemento->execute();
$resusltadoidemento=$setpelemento->fetch();
//var_dump($resultadounidad);
// var_dump($resultado);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   <?php include_once'head.php'; ?>

</head>
<body id="insumos">
    <!-- Left Panel -->
<?php include_once'menu/menu.php'; ?>
        <!-- Header-->
         <h3 class="text-center lead ">Tabla de registros de insumos</h3>

                <?php 

                if(isset($_GET["exitoInsumo"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     El registro del insumo fue agregado correctamente..
                     </div>';
                header('Refresh:2; URL=insumos.php');   
           }elseif(isset($_GET["NoLLeNadoIn"])){
                 echo '<div class="alert alert-danger text-center " role="alert">
                        El regsitro del insumo no fue actualizado.
                       </div>';
                 header('Refresh:2; URL=insumos.php');
                 
            }elseif(isset($_GET["ReInsumo"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                       El insumo ya se encuantra registrado.
                       </div>';
                 header('Refresh:2; URL=insumos.php');
            }elseif(isset($_GET['eliminarelemento'])){
                  echo '<div class="alert alert-danger text-center " role="alert">
                       el registro se a eliminado correctamente.
                       </div>';
                        header('Refresh:2; URL=insumos.php');
             }elseif(isset($_GET['editadoIn'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                      El registro del insumo fue actializado corretamente...
                       </div>';
                        header('Refresh:2; URL=insumos.php');
                        ob_end_flush();

             }

                  ?> 
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Registros de insumos</strong>
                                <button class="offset-md-7 mr-lg-3 " data-toggle="modal" data-target="#insumos12" ><i class="fa  fa-plus mr-1"></i>Insumo nuevo</button>
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
                                        <!--   <th>tipo de materia</th> -->
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Unidad</th>
                                            <th>Fecha de registro</th>
                                            <th>Fecha caducidad</th>
                                            
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
                                           <!-- <td><?php //echo $datosI['tipo_materia'] ?></td> -->
                                            <td><?php echo $datosI[3] ?></td>
                                            <td><?php echo $datosI[4] ?></td>
                                            <td><?php echo $datosI['descripcion'] ?></td>
                                            <td><?php echo $datosI[6] ?></td>
                                            <td><?php echo $datosI[7] ?></td>
                      
                                          <!-- <td><?php// echo $datos['Rol'] ?></td> -->
                                            <!-- <td><?php //echo $datos['Usuario'] ?></td>
                                            <td><?php //echo $datos['Clave'] 
                                            ?></td>
                                             <td> -->
                                           <td>
                                            <?php if($rol=="Administrador"){ ?>
                                             <a data-toggle="modal" data-target="#insumoEliminar">
                                           <i class="fa fa-trash-o (alias)" style="color:red;"></i>
                                           
                                            <a href="FormularioEditarInsumo.php?idelemento=<?php echo $datosI['idelemento'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i>
                                         <?php }else{ ?>
                                          <a href="FormularioEditarInsumo.php?idelemento=<?php echo $datosI['idelemento'] ?>">
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
                            </div> <!--CIERE DE CAR DE TABLE-->
                        </div>
                    </div> <!--CIERE DE LA COL-MD-12-->

                </div> <!-- CIERRE DEL ROW -->
                             <!--  modol para elimnar manejo de productos -->
               <div class="modal fade" id="insumoEliminar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <a href="insumo/eliminar.php?idelemento=<?php echo $datosI['idelemento'] ?>">Mover</a>                
                    </div>
                  </div>
                </div>
              </div>
                      
                 <!-- modal para añadir productos -->
               <div class="modal fade" id="insumos12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header  "  style="background:#192a56">
                      <h5 class="modal-title offset-md-4 text-white" id="exampleModalLabel2">Formulario de Insumos</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body ">
                  <form action="insumo/registrarelemento.php" method="POST" >
                      <div class="row ">
                        <!-- <div class="col-12 col-md-4 "> -->
                          <input type="hidden" name="identrada" value="<?php echo $resusltadoidemento['identrada'] ?>">
                          <input type="hidden" name="idelemento" value=" <?php echo $resusltadoidemento['idelemento'] ?>">
                      <!--     <div class="form-group "> 
                            <label for="invalidtipo" class="">Tipo de insumo:</label>
                           <select name="tipoIin"  class="form-control form-sinboder">
                                <option selected>--Seleccione un Tipo de materia--</option>
                               <?php //foreach ($resusltadotipoI as $tipoIin):?>
                              <option value="<?php //echo $tipoIin['id_tipoMateria']?>"><?php //echo $tipoIin['Tipo_materia'] ;?></option>
                              <?php //endforeach; ?> 
                            </select>
                        </div>
 -->                   <!--  </div> -->
                        <div class="col-12 col-md-6 ">
                           <div class="form-group "> 
                              <label for="invalidNombreI" class="">Nombre:</label>
                              <input type="text" name="NombreI" placeholder=" Digite el elementos" class="form-control form-sinboder"  id="invalidNombreI" required>
                          </div>
                        </div>
                         <div class="col-12 col-md-6 ">
                           <div class="form-group "> 
                              <label for="invalidNombreI" class="">Stop Min:</label>
                              <input type="text" name="StopMin1" placeholder=" Digite el Stop Min" class="form-control form-sinboder"  id="invalidNombreI" required>
                          </div>
                        </div>
                        </div>
                       <div class="row">
                       <!-- <div class="col-12 col-md-4 ">
                          <div class="form-group"> 
                            <label for="invalidcantidadI" class="">Cantidad:</label>
                            <input type="text" name="cantidadI" placeholder="Digite la cantidad" class="form-control form-sinboder" id="invalidcantidadI" required>
                          </div>
                        </div> -->
                          <div class="col-12 col-md-6 ">
                           <div class="form-group "> 
                            <label for="invalidEmail" class="">Unidad de Medidas:</label>
                            <select name="unidadI"  class="form-control form-sinboder">
                              <option selected>--Seleccione un Tipo de unidad--</option>
                               <?php foreach ($resultadounidadinsumo as $unidadI):?>
                              <option value="<?php echo $unidadI['idUnidad']?>"><?php echo $unidadI['descripcion'] ;?></option>
                              <?php endforeach; ?> 
                            </select>
                          </div>
                        </div>
                          <div class="col-12 col-md-6 ">
                           <div class="form-group "> 
                            <label for="invalidCaducidadI" class="">Fecha de Caducidad:</label>
                            <input type="Date" name="fechaI" placeholder="Digite la fecha de caducidad" class="form-control form-sinboder" id="invalidCaducidadI" required>
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
      </div><!-- .animated -->
    </div><!-- .content -->
 </div><!-- Right Panel -->

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
