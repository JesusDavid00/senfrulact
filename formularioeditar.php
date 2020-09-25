<?php 
include_once'secion/conexion.php';
//include_once('secion/abilitado.php');
if(isset($_GET['id'])){
       $id=($_GET['id']);

      $sql_editar_usuario =('SELECT u.Nombre,u.id_usuario,ti.tipo , ti.idtipo,r.tipo_rol,r.idrol, u.Apellidos , u.Usuario , u.Identificacion , u.Clave FROM usuario  u inner join tipocedula ti on u.tipo_documento =ti.idtipo inner join rol r on u.idrol=r.idrol WHERE id_usuario=? ');
    
       $gsent_editar_usuario = $pdo->prepare($sql_editar_usuario);
       $gsent_editar_usuario->execute( array($id));
        
       $resul = $gsent_editar_usuario->fetch();

$sql_mostrartipocedula= 'SELECT * from tipocedula';
$sentecia_mostrartipocedula=$pdo->prepare($sql_mostrartipocedula);
$sentecia_mostrartipocedula->execute();
$resultadocedula=$sentecia_mostrartipocedula->fetchAll(); 

$sql_mostrarRolusario= 'SELECT * from rol';
$sentecia_mostrarRolusario=$pdo->prepare($sql_mostrarRolusario);
$sentecia_mostrarRolusario->execute();
$resultadorol=$sentecia_mostrarRolusario->fetchAll();



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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <?php include_once'menu/menu.php'; ?>
    <h3 class="text-center text-white lead">Editar usuario</h3>
    
 <div class="content">
  <div class="animated fadeIn">
    <div><a href="usuario.php"><i class="fa  fa-chevron-left mr-1"></i>volver</a></div>
       <form action="./usuario/editarusuario.php"  method="POST">
         <input type="hidden" name="idusuario" value="<?php echo $resul['id_usuario']; ?>">
        <!--   <input type="hidden" name="idrol" value="<?php //echo $resul['idrol']; ?>" class="form-control" id="idrol" aria-describedby="nombreHelp"> -->

        <div class="row ">
          <div class="col col-md-6 col-lg-6">
          <div class="form-group">
            <label for="nombre">Nombres:</label>

              <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombreHelp" value="<?php echo utf8_encode($resul['Nombre']); ?>">
           <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
             </div>
            </div>
           <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="Apellidos">Apellidos:</label>
               <input type="text" name="Apellidos" class="form-control" id="Apellidos" value="<?php echo utf8_encode($resul['Apellidos']); ?>">
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-6 col-lg-6">
          <div class="form-group "> 
                <label  class="">Seleccione  el tipo de documento:</label>
                <select name="documenEdi"  class="form-control form-sinboder">
                    <option value="<?php echo $resul['idtipo'] ?>"><?php echo $resul['tipo'] ?></option>
                    <?php foreach ($resultadocedula as $Tipo):?>
                  <option value="<?php echo $Tipo['idtipo']?>"><?php echo $Tipo['tipo'] ;?></option>
                  <?php endforeach; ?>  
                </select>
              </div>
            </div>
           <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="Numero">Número de documento:</label>
               <input type="text" name="numero" class="form-control" id="Numero" value="<?php echo $resul['Identificacion']; ?>">
           </div>
          </div>
        </div>
         <div class="row">
          <div class="col col-md-6 col-lg-6">
         <div class="form-group "> 
                <label  class="">Seleccione  el tipo de rol:</label>
                <select name="rol"  class="form-control form-sinboder">
                    <option value="<?php echo $resul['idrol'] ?>"><?php echo $resul['tipo_rol'] ?></option>
                    <?php foreach ($resultadorol as $rol):?>
                  <option value="<?php echo $rol['idrol']?>"><?php echo $rol['tipo_rol'] ;?></option>
                  <?php endforeach; ?>  
                </select>
              </div>
            </div>
           <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="email">Usuario:</label>
               <input type="email" name="usuario" class="form-control" id="email" value="<?php echo $resul['Usuario']; ?>">
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-4 col-lg-6">
          <div class="form-group">
             <label for="contraseña3">Contraseña:</label>
               <input type="password" name="contraseña" class="form-control" id="contraseña" value="<?php echo $resul['Clave']; ?>" >
           </div>
        </div>
      </div>
          <!--  <div class="form-group form-check">
             <input type="checkbox" name="activo" class="form-check-input" id="exampleCheck1">
              <label  class="form-check-label" for="exampleCheck1">activo</label>
           </div> -->
          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
   </div> 
         <div class="form-gruop ml-3" >
           <button class="offset-lg-6"><i class="fa fa-refresh mr-1"></i>Actualizar</button>
      </div>
  </form>
   </div>
<?php include_once'modales/modal.php' ?>
 </div>
</div>



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