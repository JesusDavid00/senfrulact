  <?php 

$sql_frutas= 'SELECT ti.* , P.* from productos p inner join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where tipo_productos="frutas"';
$setfrutas=$pdo->prepare($sql_frutas);
$setfrutas->execute();
$resusltadfrutas=$setfrutas->fetchAll();

   ?>

   <!-- Logout Modal-->
  <div class="modal fade" id="modalFrutas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#192a56">
          <h5 class="modal-title text-center text-white" id="exampleModalLabel">Listado de productos frutas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           
             <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Fecha registros</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                <?php foreach ($resusltadfrutas as $modalfrutas2) {?>
                        <tr>
                          <th scope="row"><?php echo $modalfrutas2['tipo_productos']?></th>
                          <td><?php echo $modalfrutas2['fecha_registro']?></td>
                          <td><?php echo $modalfrutas2['Cantidad']?></td>
                          <td><?php echo $modalfrutas2['Nombre']?></td>
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