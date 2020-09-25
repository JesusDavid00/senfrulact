<?php 
include_once'secion/conexion.php';
// include_once('secion/abilitado.php');
if(isset($_GET['identrada'])){
       $identrada=($_GET['identrada']);

      $sql_editarentrada =('SELECT ti.nombre as Nombre , ti.idelemento , pi.idtipoentrada ,pi.tipo_entradas, tm.id_tipoMateria , tm.Tipo_materia, en.Cantidad , en.identrada , en.fecha_caducidad , en.fecha_entrada , u.nombre , u.Identificacion , u.id_usuario , un.idUnidad , un.descripcion from entrada en inner join elementos ti on en.idelemento = ti.idelemento inner join tipo_materia tm on en.id_tipoMateria=tm.id_tipoMateria inner join tipo_entrada pi on en.idtipoentrada=pi.idtipoentrada inner join usuario u on en.idusuario=u.id_usuario inner join unidad un on en.idunidad=un.idUnidad where identrada=?');
    
       $gsent_editarentrada = $pdo->prepare($sql_editarentrada);
       $gsent_editarentrada->execute( array($identrada));
        
       $resulentrada = $gsent_editarentrada->fetch();

$sql_mostrarunidadinsumo= 'SELECT * from unidad';
$sentecia_mostrarunidadinsumo=$pdo->prepare($sql_mostrarunidadinsumo);
$sentecia_mostrarunidadinsumo->execute();
$resultadounidadinsumo=$sentecia_mostrarunidadinsumo->fetchAll();


$sql_tipopreoductosI= 'SELECT * from Tipo_materia';
$setpI=$pdo->prepare($sql_tipopreoductosI);
$setpI->execute();
$resusltadotipoI=$setpI->fetchAll();

$sql_tipoEntradaEditar= 'SELECT * from tipo_entrada';
$setTipoEn=$pdo->prepare($sql_tipoEntradaEditar);
$setTipoEn->execute();
$tipoEntradaEditar=$setTipoEn->fetchAll();

$sql_tipopreoduelementoEditar= 'SELECT * from elementos';
$setpElemntoE=$pdo->prepare($sql_tipopreoduelementoEditar);
$setpElemntoE->execute();
$resusltadoelementoEditar=$setpElemntoE->fetchAll();

}
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
  <h3 class="text-center lead my-4 ">Editar registros de entrada de insumos</h3>
        <!-- Header-->

<div class="content">
         <div class="animated fadeIn">
        <div><a href="EntradaInsumosNuevos.php"><i class="fa  fa-chevron-left mr-1"></i>volver</a></div>
              <form action="entrada/editar.php" method="POST" >
                  <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                      <input type="hidden" name="identrada" value="<?php echo $resulentrada['identrada'] ?>">
                       <input type="hidden" name="id_usuario" value="<?php echo $resulentrada['id_usuario'] ?>">
                        <div class="form-group row "> 
                        <label for="invalidEmail" class="col-lg-4 col-form-label">Nombre:</label>
                        <select name="elementoNuevo"  class="form-control col-lg-8 ">
                          <option value="<?php echo $resulentrada['idelemento']?>"><?php echo $resulentrada['Nombre'] ?></option>
                            <?php foreach ($resusltadoelementoEditar as $elementoNuevo):?>
                          <option value="<?php echo $elementoNuevo['idelemento']?>"><?php echo $elementoNuevo['nombre'] ;?></option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                    <div class="form-group row" >
                        <label for="invalidEmail" class="col-lg-4 col-form-label">Unidad de Medida:</label>
                           <select name="entradaIn"  class="form-control col-lg-8">
                              <option value="<?php echo $resulentrada['idUnidad']?>"><?php echo $resulentrada['descripcion']?></option> 
                              <?php foreach ($resultadounidadinsumo as $entradaIn):?>
                              <option value="<?php echo $entradaIn['idUnidad']?>"><?php echo $entradaIn['descripcion'] ;?></option>
                             <?php endforeach; ?> 
                        </select>
                      </div>
                    <div class="from-group row">
                         <label for="invalidEmail" class="col-lg-4 col-form-label">Tipo de Entrada:</label>
                            <select name="EntradaNuevo"  class="form-control col-lg-8">
                              <option value="<?php echo $resulentrada['idtipoentrada']?>"><?php echo $resulentrada['tipo_entradas']?></option>
                               <?php foreach ($tipoEntradaEditar as $EntradaNuevoTp):?>
                               <option value="<?php echo $EntradaNuevoTp['idtipoentrada']?>"><?php echo $EntradaNuevoTp['tipo_entradas'] ;?></option>
                          <?php endforeach; ?> 
                        </select>
                    </div>
                  <div class="form-group row">
                      <label for="invalidtipo" class="col-lg-4 col-form-label">Tipo de insumo:</label>
                         <select name="tipoentrada"  class="form-control col-lg-8">
                            <option value="<?php echo $resulentrada['id_tipoMateria']?>"><?php echo $resulentrada['Tipo_materia']?></option>
                            <?php foreach ($resusltadotipoI as $tipoIin):?>
                            <option value="<?php echo $tipoIin['id_tipoMateria']?>"><?php echo $tipoIin['Tipo_materia'] ;?></option>
                            <?php endforeach; ?> 
                         </select>
                   </div>
                       <div class="form-group row"> 
                        <label for="invalidcantidadI" class="col-lg-4 col-form-label">Cantidad:</label>
                        <input type="text" name="cantidadEntra"  class="form-control col-lg-8" id="invalidcantidadI" value=" <?php echo $resulentrada['Cantidad'] ?>" >
                    </div>
                       <div class="form-group row"> 
                        <label for="invalidCaducidadI" class="col-lg-4 col-form-label">Fecha de Caducidad:</label>
                        <input type="text" name="fechaEntradaIn" class="form-control col-lg-8" id="invalidCaducidadI" value=" <?php echo $resulentrada['fecha_caducidad'] ?>"  >
                      </div> 
                  </div>
                </div>
                    <div class="form-group">
                      <button class="offset-lg-6"><i class="fa fa-refresh mr-1"></i>Actualizar</button>
                    </div>
                <!--   <a class="btn btn-primary" href="login.html">Guardar</a> -->
              </form>

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
