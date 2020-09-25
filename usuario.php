
<?php 
 session_start();
include_once('secion/conexion.php');

if(isset($_SESSION['Usuario'])){
  $Usuario=$_SESSION['Usuario'];
 
  $sql = "SELECT u.*, r.idrol , r.tipo_rol FROM usuario u inner join rol r on u.idrol=r.idrol WHERE Usuario = '$Usuario'";
  $sentencia = $pdo->prepare($sql);
  $sentencia->execute();

  $resultado = $sentencia->fetch();
  $usuario=$resultado['Usuario'];
$rol=$resultado['tipo_rol'];
if($rol=="Administrador"){

ob_start();
    //ut8_encode sirve para los caracteres especiales
$sql_mostrarUsuario= 'SELECT   r.tipo_rol , ti.tipo , us.id_usuario, us.Nombre , us.Apellidos , us.Tipo_documento , us.Identificacion , us.Usuario, us.activo from usuario us INNER join tipocedula ti on ti.idtipo=us.Tipo_documento inner join Rol r on r.idrol=us.idrol';
$sentecia_mostrarUsuario=$pdo->prepare($sql_mostrarUsuario);
$sentecia_mostrarUsuario->execute();
$resultadoUsuario=$sentecia_mostrarUsuario->fetchAll();

$sql_mostrarRolusario= 'SELECT * from rol';
$sentecia_mostrarRolusario=$pdo->prepare($sql_mostrarRolusario);
$sentecia_mostrarRolusario->execute();
$resultadorol=$sentecia_mostrarRolusario->fetchAll();

$sql_mostrartipocedula= 'SELECT * from tipocedula';
$sentecia_mostrartipocedula=$pdo->prepare($sql_mostrartipocedula);
$sentecia_mostrartipocedula->execute();
$resultadocedula=$sentecia_mostrartipocedula->fetchAll();

// var_dump($resultado);

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

   <!--  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
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
   
   <?php include_once'menu/menu.php'; ?>
   <h3 class="text-center text-white lead">Administración de usuario</h3>
        <!-- Header-->
             <?php 

                if(isset($_GET["exito"])){
                echo '<div class="alert alert-primary  text-center " role="alert">
                     el usuario  registro correctamente..
                     </div>';
                header('Refresh:2; URL=usuario.php');   
           }elseif(isset($_GET["error"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                        el usuario ya  esta registrado en la base de datos
                       </div>';
                 header('Refresh:2; URL=usuario.php');
                 
            }elseif(isset($_GET["incorrecta"])){
                 echo '<div class="alert alert-primary text-center " role="alert">
                       la confirmación de la clave esta incorrecta
                       </div>';
                 header('Refresh:2; URL=usuario.php');
            }elseif(isset($_GET['EstadoActivo'])){
                  echo '<div class="alert alert-danger text-center " role="alert">
                       El Usuario se encuentra activo. Inahilitelo para poder eliminarlo.
                       </div>';
                        header('Refresh:2; URL=usuario.php');
             }elseif(isset($_GET['editado'])){
                  echo '<div class="alert alert-primary text-center " role="alert">
                       el registro se a editado  correctamente....
                       </div>';
                        header('Refresh:2; URL=usuario.php');
                        ob_end_flush();

             }

                  ?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Usuarios registrados</strong>
                                 <button class="offset-md-7 mr-4 " data-toggle="modal" data-target="#user" ><i class="fa  fa-plus mr-1"></i>Usuario nuevo</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>t. iden</th>
                                            <th>N°identificación</th>
                                             <th>Rol</th>
                                            <!--  <th>rol</th> -->
                                            <th>Usuario</th>
                                            <!-- <th>Clave</th -->
                                                <th>Acciones</th>
                                            
                                            <!--  <th><a href="#" style="color:blue;">ver</a></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php  foreach($resultadoUsuario as $datos):?>
                                        <tr>
                                            <td><?php echo utf8_encode($datos['Nombre']) ?></td>
                                            <td><?php echo utf8_encode($datos['Apellidos']) ?></td>
                                            <td><?php echo utf8_encode($datos['tipo'] )?></td>
                                            <td><?php echo $datos['Identificacion'] ?></td>
                                             <td><?php echo $datos['tipo_rol'] ?></td> 
                                            <td><?php echo utf8_encode ($datos['Usuario']) ?></td>
                                            <!-- <td><?php echo $datos['Clave'] ?></td> -->
                                             <td>
                                              
                                            <a href="usuario/eliminar.php?idusuario=<?php echo $datos['id_usuario'] ?>">
                                           <i class="fa fa-trash-o (alias)" style="color:red;"></i> </a>
                                            

                                            <a href="formularioeditar.php?id=<?php echo $datos['id_usuario'] ?>">
                                           <i class="fa fa-edit (alias)" style="color:red;"></i> </a>

                                          <?php if ($datos['activo'] == "Activo"): ?>
                                                <a href="usuario/inhabilitarUsuario.php?idusuario=<?php echo $datos['id_usuario'] ?>">
                                           <i class="fa fa-user (alias) " style="color:red;"></i> </a>
                                       <?php else: ?>
                                         <a href="usuario/habilitarUsuario.php?idusuario=<?php echo $datos['id_usuario'] ?>">
                                           <i class="fa fa-users (alias) " style="color:red;"></i> </a>
                                           <?php endif ?>
                                      
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

  <!-- Modal -->
  <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#192a56">
        <h5 class="modal-title text-white text-center" id="exampleModalLabel">Registros de usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <div class="modal-body">
       <form action="./usuario/registrarUsuario.php"  method="POST">
         <input type="hidden" name="idusuario" class="form-control" id="idusuario" aria-describedby="nombreHelp" placeholder="">
          <!--<input type="hidden" name="idrol" class="form-control" id="idrol" aria-describedby="nombreHelp" placeholder="">-->

        <div class="row ">
          <div class="col col-md-6 col-lg-6">
          <div class="form-group">
            <label for="nombre">Nombres:</label>
              <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="digita el nombre">
           <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
             </div>
            </div>
           <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="Apellidos">Apellidos:</label>
               <input type="text" name="Apellidos" class="form-control" id="Apellidos" placeholder="Digite el apellido">
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-6 col-lg-6">
          <div class="form-group "> 
                <label  class="">Seleccione  el tipo de documento:</label>
                <select name="documen"  class="form-control form-sinboder">
                    <option selected>--Seleccione el  Tipo  de  documento--</option>
                    <?php foreach ($resultadocedula as $Tipo):?>
                  <option value="<?php echo $Tipo['idtipo']?>"><?php echo $Tipo['tipo'] ;?></option>
                  <?php endforeach; ?>  
                </select>
              </div>
            </div>
           <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="Numero">Número de documento:</label>
               <input type="text" name="numero" class="form-control" id="Numero" placeholder="Número">
           </div>
          </div>
        </div>
         <div class="row">
          <div class="col col-md-6 col-lg-6">
            <div class="form-group "> 
                <label  class="">Seleccione  el tipo de rol:</label>
                <select name="rol"  class="form-control form-sinboder">
                    <option selected>--Seleccione el  Tipo el de rol--</option>
                    <?php foreach ($resultadorol as $rol):?>
                  <option value="<?php echo $rol['idrol']?>"><?php echo $rol['tipo_rol'] ;?></option>
                  <?php endforeach; ?>  
                </select>
              </div>
            </div>
           <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="email">Usuario:</label>
               <input type="email" name="usuario" class="form-control" id="email" placeholder="email">
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="contraseña">Contraseña:</label>
               <input type="password" name="contraseña" class="form-control" id="contraseña" placeholder="contraseña">
           </div>
        </div>
          <div class="col col-md-6 col-lg-6">
          <div class="form-group">
             <label for="contraseña2">Contraseña:</label>
               <input type="password" name="contraseña2" class="form-control" id="contraseña2" placeholder="contraseña2">
           </div>
        </div>
      </div>
          <!--  <div class="form-group form-check">
             <input type="checkbox" name="activo" class="form-check-input" id="exampleCheck1">
              <label  class="form-check-label" for="exampleCheck1">activo</label>
           </div> -->
          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
   </div> 
      <div class="modal-footer" style="background:#e67e22">
         <div class="form-gruop" >
            <button class="btn btn-primary">Agregar</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </form>
    </div>
  </div>
  </div>


                  <?php include_once('modales/modal.php'); ?>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

                                            

<!-- 
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
<?php 
}else{
 header('location:index.php?IniciarSecionAdmin');
}
 }else{
    echo'no autorizado';
    // var_export($Usuario);
   header('location:Login.php');
 }
 
 ?>