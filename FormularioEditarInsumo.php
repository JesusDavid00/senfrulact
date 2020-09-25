<?php 
include_once'secion/conexion.php';
// include_once('secion/abilitado.php');
if(isset($_GET['idelemento'])){
       $idEi=($_GET['idelemento']);

      $sql_editarelementoIn ='SELECT u.idUnidad , u.descripcion,e.idelemento, e.nombre, e.cantidad , e.fecha_caducidad, e.fechaRegistro , e.StopMin from elementos e inner join unidad u on u.idUnidad = e.idunidad WHERE idelemento=?';
    
       $gsent_editarelementoIn = $pdo->prepare($sql_editarelementoIn);
       $gsent_editarelementoIn->execute( array($idEi));
       $resulelementoIn = $gsent_editarelementoIn->fetch();

$sql_mostrarunidadinsumo= 'SELECT * from unidad';
$sentecia_mostrarunidadinsumo=$pdo->prepare($sql_mostrarunidadinsumo);
$sentecia_mostrarunidadinsumo->execute();
$resultadounidadinsumo=$sentecia_mostrarunidadinsumo->fetchAll();


$sql_tipopreoductosI= 'SELECT * from Tipo_materia';
$setpI=$pdo->prepare($sql_tipopreoductosI);
$setpI->execute();
$resusltadotipoI=$setpI->fetchAll();





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
    <h3 class="text-center lead ">Editar registros de insumos</h3>
        <!-- Header-->
    

   <div class="content">
      <div class="animated fadeIn">
         <a href="insumos.php"><i class="fa  fa-chevron-left mr-1"></i>volver</a>
        <form action="insumo/editar.php" method="POST" >
          <input type="hidden" name="idelemento" value="<?php echo $idEi ?>">
          <div class="row justify-content-center ">
            <div class="col-12 col-md-6 ">
           <!--    <div class="form-group row"> 
                <label for="invalidtipo" class="col-lg-3 col-form-label">Tipo de insumo:</label>
               <select name="tipoIn"  class="form-control col-lg-9">
                    <option value="<?php //echo $resulelementoIn['id_tipoMateria'] ?>"><?php //echo $resulelementoIn['Tipo_materia'] ?></option>
                   <?php //foreach ($resusltadotipoI as $tipoIn):?>
                  <option value="<?php //echo $tipoIn['id_tipoMateria']?>"><?php //echo $tipoIn['Tipo_materia'] ;?></option>
                  <?php// endforeach; ?> 
                </select>
            </div> -->
             <div class="form-group row "> 
                  <label for="invalidNombreI" class="col-lg-3 col-form-label">Nombre:</label>
                  <input type="text" name="NombreEditarI"  class="form-control  col-lg-9"  id="invalidNombreI"  value="<?php echo $resulelementoIn['nombre'] ?>">
              </div>
            <!--   <div class="form-group row"> 
                <label for="invalidcantidadI" class="col-lg-3 col-form-label">Cantidad:</label>
                <input type="text" name="cantidadEditarC"  class="form-control col-lg-9" id="invalidcantidadI"  value="<?php// echo $resulelementoIn['cantidad'] ?>">
              </div> -->
                <div class="form-group row"> 
                <label for="StopMin" class="col-lg-3 col-form-label">StopMin:</label>
                <input type="text" name="StopMin"  class="form-control col-lg-9" id="StopMin"  value="<?php echo $resulelementoIn['StopMin'] ?>">
              </div>
               <div class="form-group  row"> 
                <label for="invalidEmail" class="col-lg-3 col-form-label">Unidad de Medidas:</label>
                <select name="unidadEditarI"  class="form-control form-control col-lg-9">
                  <option value="<?php echo $resulelementoIn['idUnidad'] ?>"><?php echo $resulelementoIn['descripcion'] ?></option>
                   <?php foreach ($resultadounidadinsumo as $unidadI):?>
                  <option value="<?php echo $unidadI['idUnidad']?>"><?php echo $unidadI['descripcion'] ;?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
               <div class="form-group row"> 
                <label for="invalidCaducidadI" class="col-lg-3 col-form-label">Fecha de Caducidad:</label>
                <input type="text" name="fechaI"  class="form-control  col-lg-9" id="invalidCaducidadI" value="<?php echo $resulelementoIn['fecha_caducidad'] ?>" >
              </div> 
            </div>
          </div>
         <div class="form-gruop" >
           <button class="offset-lg-6" ><i class="fa fa-refresh mr-1"></i>Actualizar</button>
          </div>
        <!--   <a class="btn btn-primary" href="login.html">Guardar</a> -->
      </form>

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
        <?php include_once('modales/modal.php'); ?>
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
