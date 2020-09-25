<?php 
include_once'secion/conexion.php';

if(isset($_GET['idUtilizado'])){
       $idEi=($_GET['idUtilizado']);

      $sql_editarelEu =('SELECT e.idUtilizado , e.Cantidad , e.cantidad1 as cantidad1, e.fechaRegistro , el.nombre , el.idelemento , u.descripcion , p.Nombre ,p.id_producto, e.idproducto, e.unidad, e.idUnidad , e.detalle  FROM elementoutilizado e inner join elementos el on e.idelemento=el.idelemento inner join unidad u on e.idunidad=u.idUnidad inner join productos p on e.idproducto=p.id_producto WHERE idUtilizado=?');
    
       $gsent_editarelEu = $pdo->prepare($sql_editarelEu);
       $gsent_editarelEu->execute( array($idEi));
        
       $resulelEu = $gsent_editarelEu->fetch();
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


}
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
        <!-- Header-->
  <h3 class="text-center lead">Editar Control  de registros de insumos</h3>  
   <div class="content">
      <div class="animated fadeIn">
        <a href="registrosManejoI.php"><i class="fa  fa-chevron-left mr-1"></i>volver</a>
      <form action="manejoInsumosoElementos/editar.php" method="POST" >
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 ">
              <div class="form-group row "> 
                <input type="hidden" name="idutilizado" value="<?php echo $resulelEu['idUtilizado'] ?>" >
                <label for="invalidtipo" class="col-lg-4 col-md-4 col-form-label">Nombre insumo:</label>
               <select name="NombreEle"  class="form-control col-lg-8 col-md-8">
                    <option value="<?php echo $resulelEu['idelemento'] ?>"><?php echo $resulelEu['nombre'] ?></option>
                   <?php foreach ($resusltadotipoelemneto as $tipoEl):?>
                  <option value="<?php echo $tipoEl['idelemento']?>"><?php echo $tipoEl['nombre'] ;?></option>
                  <?php endforeach; ?> 
                </select>
            </div>
            <div class="form-group row"> 
                <label for="invalidcantidadI" class="col-lg-4 col-md-4 col-form-label">Cantidad:</label>
                <input type="text" name="cantidadEn"  class="form-control col-lg-8 col-md-8" id="invalidcantidadI" value="<?php echo $resulelEu['Cantidad']; ?>" >
              </div>
               <div class="form-group row"> 
                <label for="invalidEmail" class="col-lg-4 col-md-4 col-form-label">Unidad de Medidas:</label>
                <select name="unidadIn"  class="form-control col-lg-8 col-md-8">
                  <option value="<?php echo $resulelEu['idUnidad'] ?>"><?php echo $resulelEu['descripcion'] ?></option>
                   <?php foreach ($resultadoInventario as $unidadIn):?>
                  <option value="<?php echo $unidadIn['idUnidad']?>"><?php echo $unidadIn['descripcion'] ;?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
              <div class="form-group row"> 
                <label for="invalidEmail" class="col-lg-4 col-md-4 col-form-label">Nombre del producto:</label>
                <select name="productoE"  class="form-control col-lg-8 col-md-8">
                  <option value="<?php echo $resulelEu['id_producto'] ?>"><?php echo $resulelEu['Nombre'] ?></option>
                   <?php foreach ($resultadoproductoIn as $producto):?>
                  <option value="<?php echo $producto['id_producto']?>"><?php echo $producto['Nombre'] ;?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
              <div class="form-group row"> 
                <label for="invalidcantidadI" class="col-lg-4 col-md-4 col-form-label">Cantidad:</label>
                <input type="text" name="cantidadEn2"  class="form-control col-lg-8 col-md-8" id="invalidcantidadI" value="<?php echo $resulelEu['cantidad1']; ?>" >
              </div>
               <div class="form-group row"> 
                <label for="invalidEmail" class="col-lg-4 col-md-4 col-form-label">Unidad de Medidas:</label>
                <select name="unidadIn2"  class="form-control col-lg-8 col-md-8">
                  <option value="<?php echo $resulelEu['unidad'] ?>"><?php echo $resulelEu['unidad'] ?></option>
                   <?php foreach ($resultadoInventario as $unidadIn2):?>
                  <option value="<?php echo $unidadIn2['descripcion']?>"><?php echo $unidadIn2['descripcion'] ;?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
              
          <div class="from-group row">
            <label for="idinvalid" >Descripcion del pedido:</label>
            <textarea class="form-control" id="idinvalid"  name="descripcionA" ><?php echo $resulelEu['detalle']; ?></textarea>
          </div>
        </div>
       </div>
         <div class="form-gruop" >
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


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script> 

</body>
</html>
