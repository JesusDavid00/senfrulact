  <?php 
 $sql_mostrarinsumos= ' SELECT e.* ,  us.id_usuario , u.descripcion , el.nombre , ti.Tipo_materia  from entrada e inner join elementos el on e.idelemento=el.idelemento inner join usuario us on  e.idusuario=us.id_usuario inner join unidad  u on  e.idunidad = u.idUnidad inner join tipo_materia ti on e.id_tipoMateria=ti.id_tipoMateria inner join tipo_entrada t on e.idtipoentrada=t.idtipoentrada';
$sentecia_entradas=$pdo->prepare($sql_mostrarinsumos);
$sentecia_entradas->execute();
$reentradas=$sentecia_entradas->fetchAll();
  

  $sql_StopMinIn= ' SELECT * from  elementos where cantidad<StopMin';
$setStopMinIn=$pdo->prepare($sql_StopMinIn);
$setStopMinIn->execute();
$resusltadStopMinIn=$setStopMinIn->fetchAll();
   ?>

   <!-- Logout Modal-->
  <div class="modal fade" id="modalStopMin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#192a56">
          <h5 class="modal-title text-center text-white" id="exampleModalLabel">Listado de insumos con stop minino</h5>
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
                          <th scope="col">Fecha de caducidad</th>
                        </tr>
                      </thead>
                      <tbody>
                <?php foreach ($resusltadStopMinIn as $mostraEntradas) {?>
                        <tr>
                          <th scope="row"><?php echo $mostraEntradas[3]?></th>
                          <td><?php echo $mostraEntradas[6]?></td>
                          <td><?php echo $mostraEntradas[4]?></td>
                          <td><?php echo $mostraEntradas[7]?></td>
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