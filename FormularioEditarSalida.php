 <?php 
include_once'secion/conexion.php';
// include_once('secion/abilitado.php');
if(isset($_GET['id_salidas'])){
       $idPSalida=($_GET['id_salidas']);

      $sql_editarProductoSalida ='SELECT d.nombre , d.id_destino, u.descripcion , u.idUnidad,s.id_salidas, s.Nombre, s.Cantidad , s.fecha_caducidad , s.fechaRegistroSalida  from salidas s inner join unidad u on u.idUnidad = s.idunidad inner join destinatorio d on s.id_destino = d.id_destino where  id_salidas=?';
    
       $gsent_editarProductoSalida = $pdo->prepare($sql_editarProductoSalida);
       $gsent_editarProductoSalida->execute( array($idPSalida));
        
       $resulProductoSalida = $gsent_editarProductoSalida->fetch();
$sql_mostrarunidad= 'SELECT * from unidad';
$sentecia_mostrarunidad=$pdo->prepare($sql_mostrarunidad);
$sentecia_mostrarunidad->execute();
$resultadounidad=$sentecia_mostrarunidad->fetchAll();


$sql_tipodestino= 'SELECT * from destinatorio';
$setdestino=$pdo->prepare($sql_tipodestino);
$setdestino->execute();
$resusltadotidestino=$setdestino->fetchAll();
//var_dump($resultadounidad); 
$sql_tipodusuario= 'SELECT id_usuario , Identificacion from usuario';
$setdusuario=$pdo->prepare($sql_tipodusuario);
$setdusuario->execute();
$resusltadotidusuario=$setdusuario->fetch();


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
        <!-- Header-->
         

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
                    <!-- <div class="col-sm-8">
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
                    </div> -->
                </div>
            </div>
        </div>

     <div class="container">
       <form action="SalidaProducto/editar.php" method="POST" >
            <input type="hidden" name="id_salidas" value="<?php echo $idPSalida  ?>">
           <input type="hidden" name="id_usuario" value="<?php  echo $resusltadotidusuario['id_usuario'] ?>" >
          <div class="row ">
            <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                  <label for="invalidNombre" class="">Nombre:</label>
                  <input type="text" name="NombreSa"  class="form-control"  id="invalidNombre" value="<?php echo $resulProductoSalida['Nombre'] ;?>">
              </div>
            </div>
           <div class="col-12 col-md-4 ">
              <div class="form-group"> 
                <label for="invalidcantidad" class="">Cantidad:</label>
                <input type="text" name="cantidadSa" class="form-control" id="invalidcantidad" value="<?php echo $resulProductoSalida['Cantidad'] ;?>">
              </div>
            </div>
            <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                <label for="invalidCaducidad" class="">Fecha de Caducidad:</label>
                <input type="Date" name="fechaSa" class="form-control"  id="invalidCaducidad" value="<?php echo $resulProductoSalida['fecha_caducidad'] ;?>">
              </div> 
            </div>
          </div>
          <div class="row">
              <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                <label for="invalidEmail" class="">Seleccione una unidad:</label>
                <select name="unidadSa"  class="form-control">
                  <option value="<?php echo $resulProductoSalida['idUnidad'] ?>"><?php  echo $resulProductoSalida['descripcion'] ?></option>
                 <?php foreach ($resultadounidad as $unidadS):?>
                  <option value="<?php echo $unidadS['idUnidad']?>"><?php echo $unidadS['descripcion'] ;?></option>
                  <?php endforeach; ?>  
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4 ">
               <div class="form-group "> 
                <label for="invalidEmail" class="">Seleccione un destino:</label>
                <select name="destinoSa"  class="form-control form-sinboder">
                  <option value="<?php echo $resulProductoSalida['id_destino'] ?>"><?php  echo $resulProductoSalida['nombre'] ?></option>
                   <?php foreach ($resusltadotidestino as $destinoS):?>
                  <option value="<?php echo $destinoS['id_destino']?>"><?php echo $destinoS['nombre'] ;?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
            </div>
          </div>
         <div class="form-gruop" >
            <button class="btn btn-secundary ">Agregar</button>
          </div>
        <!--   <a class="btn btn-primary" href="login.html">Guardar</a> -->
      </form>
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
