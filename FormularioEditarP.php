<?php 
include_once'secion/conexion.php';
// include_once('secion/abilitado.php');
if(isset($_GET['id_producto'])){
       $idP=($_GET['id_producto']);

      $sql_editarProducto =('SELECT p.Nombre , p.Cantidad , p.fecha_registro, p.fecha_caducidad , un.descripcion , un.idUnidad, ti.idtipoproductos,  ti.tipo_productos, p.id_producto FROM productos p inner join unidad un on p.idunidad=un.idUnidad INNER join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where id_producto=?');
    
       $gsent_editarProducto = $pdo->prepare($sql_editarProducto);
       $gsent_editarProducto->execute( array($idP));
        
       $resulProducto = $gsent_editarProducto->fetch();

$sql_mostrarInventario= 'SELECT * from unidad';
$sentecia_mostrarInventario=$pdo->prepare($sql_mostrarInventario);
$sentecia_mostrarInventario->execute();
$resultadoInventario=$sentecia_mostrarInventario->fetchAll();

$sql_tipopreoductos= 'SELECT * from tipo_productos';
$setp=$pdo->prepare($sql_tipopreoductos);
$setp->execute();
$resusltadotipoproductos=$setp->fetchAll();

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

<!--     <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
 -->
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
<body style="">
    <?php include'menu/menu.php'; ?> 
    <h3 class="text-center lead">Editar lista de  productos</h3>
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

      <!--   <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h3>Editar Producto</h3>
                            </div>
                        </div>
                    </div>
                  <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"><i class=" fa fa-user"></i> Agregar</button>
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
                    </div 
            </div>
        </div>
        <div> -->
             
     <div class="content">
       <div class="animated fadeIn">
          <a href="producto.php"><i class="fa  fa-chevron-left mr-1"></i>volver</a>
         <form action="producto/editar.php" method="POST" >
            <input type="hidden" name="id_producto" value="<?php echo $idP ?>">
            <input type="hidden" name="idproductos">
            <input type="hidden" name="idunidad">
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 ">
              <div class="form-group row "> 
                <label for="invalidtipo" class="col-lg-2 col-form-label ">productos:</label>
               <select name="tipoEd"  class="form-control col-lg-10">
                    <option  value="<?php echo $resulProducto['idtipoproductos'] ?>" ><?php echo $resulProducto['tipo_productos'] ?></option>
                   <?php foreach ($resusltadotipoproductos as $tipoPe):?>
                  <option value="<?php echo $tipoPe['idtipoproductos']?>"><?php echo $tipoPe['tipo_productos'] ;?></option>
                  <?php endforeach; ?> 
                </select>
            </div>
               <div class="form-group row "> 
                  <label for="invalidNombre" class="col-lg-2 col-form-label">Nombre:</label>
                  <input type="text" name="NombreEd" value="<?php echo $resulProducto['Nombre']?>" class="form-control col-lg-10"  id="invalidNombre" >
              </div>
              <div class="form-group row"> 
                <label for="invalidcantidad" class="col-lg-2 col-form-label">Cantidad:</label>
                <input type="text" name="cantidadEp" value="<?php echo $resulProducto['Cantidad']?>" class="form-control col-lg-10" id="invalidcantidad" >
              </div>
               <div class="form-group row  "> 
                <label for="invalidEmail" class="col-lg-2 col-form-label">Unidad:</label>
                <select name="unidadEp"  class="form-control col-lg-10">
                  <option value="<?php echo $resulProducto['idUnidad'] ?>"><?php echo $resulProducto['descripcion'] ?></option>
                   <?php foreach ($resultadoInventario as $unidadP):?>
                  <option value="<?php echo $unidadP['idUnidad']?>"><?php echo $unidadP['descripcion'] ;?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
           
               <div class="form-group row "> 
                <label for="invalidCaducidad" class="col-lg-2 col-form-label">Fecha de Caducidad:</label>
                <input type="Date" name="fechaEp"value="<?php echo $resulProducto['fecha_caducidad']?>" class="form-control col-lg-10" id="invalidCaducidad" >
              </div> 
            </div>
             </div>
         <div class="form-gruop">
            <button class="offset-lg-6" ><i class="fa fa-refresh mr-1"></i>Actualizar</button>
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
