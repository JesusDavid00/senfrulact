<?php 
ob_start();
 include_once'secion/conexion.php';
 // include_once('secion/abilitado.php');
 $sql_mostrarinsumos= ' SELECT e.* ,  us.id_usuario , u.descripcion , el.nombre , ti.Tipo_materia  from entrada e inner join elementos el on e.idelemento=el.idelemento inner join usuario us on  e.idusuario=us.id_usuario inner join unidad  u on  e.idunidad = u.idUnidad inner join tipo_materia ti on e.id_tipoMateria=ti.id_tipoMateria inner join tipo_entrada t on e.idtipoentrada=t.idtipoentrada';
$sentecia_entradas=$pdo->prepare($sql_mostrarinsumos);
$sentecia_entradas->execute();
$reentradas=$sentecia_entradas->fetchAll();
//include_once'usuario/mostrarusuario.php';
//include_once'./producto/mostrarp.php';
$sql_mostrarunidadinsumo= 'SELECT * from unidad';
$sentecia_mostrarunidadinsumo=$pdo->prepare($sql_mostrarunidadinsumo);
$sentecia_mostrarunidadinsumo->execute();
$resultadounidadinsumo=$sentecia_mostrarunidadinsumo->fetchAll();

$sql_mostrarentraadatipo= 'SELECT * from tipo_entrada';
$sentecia_mostrarentraadatipo=$pdo->prepare($sql_mostrarentraadatipo);
$sentecia_mostrarentraadatipo->execute();
$resultadoentraadatipo=$sentecia_mostrarentraadatipo->fetchAll();

$sql_mostrarUsuarioEn= 'SELECT * from usuario';
$sentecia_mostrarUsuarioEn=$pdo->prepare($sql_mostrarUsuarioEn);
$sentecia_mostrarUsuarioEn->execute();
$resultadoUsuarioEn=$sentecia_mostrarUsuarioEn->fetch();

$sql_tipopreoductosI= 'SELECT * from Tipo_materia';
$setpI=$pdo->prepare($sql_tipopreoductosI);
$setpI->execute();
$resusltadotipoI=$setpI->fetchAll();

$sql_tipopreodelemntos= 'SELECT * from elementos';
$setelementos=$pdo->prepare($sql_tipopreodelemntos);
$setelementos->execute();
$resusltadelemntos=$setelementos->fetchAll();

$sql_tipopreodeEntraada= 'SELECT * from entrada';
$setelEntraada=$pdo->prepare($sql_tipopreodeEntraada);
$setelEntraada->execute();
$resusltadeEntraada=$setelEntraada->fetch();

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
<body>
    <!-- Left Panel -->
<?php include_once'menu/menu.php'; ?>
     <h3 class="text-center lead ">Registros de entradas de insumos</h3>
        <!-- Header-->

                <?php 

                if(isset($_GET["SiLLenadoEn"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     EL Registro de la Entrada de Insumo y Materia Prima Fue Agragado Correctamente...
                     </div>';
                header('Refresh:2; URL=EntradaInsumosNuevos.php');   
           }elseif(isset($_GET["NoLLenadoEn"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                        EL Insumo o Materia Prima no se Encuentra Registrado en la tabla Insumos...
                       </div>';
                 header('Refresh:2; URL=EntradaInsumosNuevos.php');
                 
            }elseif(isset($_GET["NoLLenado"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                       la confirmación de la clave esta incorrecta
                       </div>';
                 header('Refresh:2; URL=EntradaInsumosNuevos.php');
            }elseif(isset($_GET['errorEntradai'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                      El registro no fue actulaizado intentelo nuevamento...
                       </div>';
                        header('Refresh:2; URL=EntradaInsumosNuevos.php');
             }elseif(isset($_GET['editadoEntradai'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                       El registrro fue editado correctamente
                       </div>';
                        header('Refresh:2; URL=EntradaInsumosNuevos.php');
                        ob_end_flush();

             }

                  ?> 

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Registros de entradas</strong>
                                <button  class="offset-md-6 mr-4"  data-toggle="modal" data-target="#entradas"><i class="fa  fa-plus mr-1"></i>Entrada nueva</button>
                                <button><i class="fa  fa-download mr-1"></i>Excel</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                  <!--  <div class="form-group row" style="margin-left:700px;" >
                                        <label class="form-control-label col-4">Buscar:</label>
                                    <input type="" class="form-control col-10" "name="">
                                   </div> -->
                                    <thead>
                                        <tr>
                                          <th>Tipo de materia</th>
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
                                        <?php  foreach($reentradas as $datosI):?>
                                        <tr>
                                           <td><?php echo $datosI['Tipo_materia'] ?></td>
                                            <td><?php echo $datosI['nombre'] ?></td>
                                            <td><?php echo $datosI['cantidad'] ?></td>
                                            <td><?php echo $datosI['descripcion'] ?></td>
                                            <td><?php echo $datosI['fecha_entrada'] ?></td>
                                            <td><?php echo $datosI['fecha_caducidad'] ?></td>
                      
                                          <!-- <td><?php// echo $datos['Rol'] ?></td> -->
                                            <!-- <td><?php //echo $datos['Usuario'] ?></td>
                                            <td><?php //echo $datos['Clave'] 
                                            ?></td>
                                             <td> -->
                                           <td>
                                            <?php if($rol=="Administrador"){ ?>
                                             <a href="entrada/eliminar.php?identrada=<?php echo $datosI['identrada'] ?>">
                                           <i class="fa fa-trash-o (alias)" style="color:red;"></i>
                                           
                                            <a href="FormularioEditarEntradaIn.php?identrada=<?php echo $datosI['identrada'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i>
                                           </td>
                                         <?php }else{ ?>
                                            <a href="FormularioEditarEntradaIn.php?identrada=<?php echo $datosI['identrada'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i>

                                          <?php } ?>
                                        </tr>
                                     
                                     <?php   endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                   <!-- modal para añadir productos -->
           <div class="modal fade" id="entradas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header  " style="background:#192a56">
                  <h5 class="modal-title offset-md-4 text-white" id="exampleModalLabel2">Formulario registro entradas</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body ">
              <form action="entrada/insertar.php" method="POST" >
                  <div class="row ">
                    <div class="col-12 col-md-4 ">
                      <input type="hidden" name="id_usuario" value="<?php echo $resultadoUsuarioEn['id_usuario'] ?>">
                     <!--  <input type="" name="identrada" value="<?php echo $resusltadeEntraada['identrada']?>"> -->
                        <div class="form-group "> 
                        <label for="invalidEmail" class="">Nombre:</label>
                        <select name="elementoNuevo"  class="form-control form-sinboder">
                          <option selected>--Seleccione el Nombre Elemento</option>
                            <?php foreach ($resusltadelemntos as $elementoNuevo):?>
                          <option value="<?php echo $elementoNuevo['idelemento']?>"><?php echo $elementoNuevo['nombre'] ;?></option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                      <div class="form-group "> 
                        <label for="invalidEmail" class="">Unidad de medidas:</label>
                        <select name="entradaIn"  class="form-control form-sinboder">
                          <option selected>--Seleccione un Tipo de unidad--</option> 
                           <?php foreach ($resultadounidadinsumo as $entradaIn):?>
                          <option value="<?php echo $entradaIn['idUnidad']?>"><?php echo $entradaIn['descripcion'] ;?></option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                    </div>
                      <div class="col-12 col-md-4 ">
                         <div class="form-group "> 
                        <label for="invalidEmail" class="">Tipo de entrada:</label>
                        <select name="EntradaNuevoTp"  class="form-control form-sinboder">
                          <option selected>--Seleccione el Tipo de Entrada </option>
                            <?php foreach ($resultadoentraadatipo as $EntradaNuevoTp):?>
                          <option value="<?php echo $EntradaNuevoTp['idtipoentrada']?>"><?php echo $EntradaNuevoTp['tipo_entradas'] ;?></option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                   <div class="col-12 col-md-4 ">
                    <div class="form-group "> 
                        <label for="invalidtipo" class="">Tipo de insumo:</label>
                       <select name="tipoIin"  class="form-control form-sinboder">
                            <option selected>--Seleccione un Tipo de materia--</option>
                           <?php foreach ($resusltadotipoI as $tipoIin):?>
                          <option value="<?php echo $tipoIin['id_tipoMateria']?>"><?php echo $tipoIin['Tipo_materia'] ;?></option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                     </div>
                      <div class="col-12 col-md-4 ">
                       <div class="form-group"> 
                        <label for="invalidcantidadI" class="">Cantidad:</label>
                        <input type="text" name="cantidadEn" placeholder="Digite la cantidad" class="form-control form-sinboder" id="invalidcantidadI" required>
                      </div>
                    </div>
                      <div class="col-12 col-md-4 ">
                       <div class="form-group "> 
                        <label for="invalidCaducidadI" class="">Fecha de Caducidad:</label>
                        <input type="Date" name="fechaEntradaI" placeholder="Digite la fecha de caducidad" class="form-control form-sinboder" id="invalidCaducidadI" required>
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
