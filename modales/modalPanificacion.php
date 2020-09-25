  <?php 
$sql_panificacion= 'SELECT ti.* , p.* from productos p inner join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where tipo_productos="panificacion"';
$setpanificacion=$pdo->prepare($sql_panificacion);
$setpanificacion->execute();
$resusltadpanificacion=$setpanificacion->fetchAll();
   ?>

   <!-- Logout Modal-->
  <div class="modal fade" id="modalPanificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#192a56">
          <h5 class="modal-title text-center text-white" id="exampleModalLabel">Listado de panificación</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           
             <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">Tipo de producto</th>
                          <th scope="col">Fecha registros</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                <?php foreach ($resusltadpanificacion as $mostrapani) {?>
                        <tr>
                          <th scope="row"><?php echo $mostrapani['tipo_productos']?></th>
                          <td><?php echo $mostrapani['fecha_registro']?></td>
                          <td><?php echo $mostrapani['Cantidad']?></td>
                          <td><?php echo $mostrapani['Nombre']?></td>
                        </tr>
                  <?php } ?>
                   </tbody>
                 </table>

        </div>
        <div class="modal-footer" style="background:#b2bec3">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>