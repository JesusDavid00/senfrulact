  <?php 

//   $sql_insumosEntrada= 'SELECT * from entrada';
// $setinsumosEntrada=$pdo->prepare($sql_insumosEntrada);
// $setinsumosEntrada->execute();
// $resusltadinsumosEntrada=$setinsumosEntrada->fetchAll();


   ?>

   <!-- Logout Modal-->
  <div class="modal fade" id="modalEntradas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#192a56">
          <h5 class="modal-title text-center text-white" id="exampleModalLabel">Listado de entradas de insumos</h5>
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
               <!--  <?php foreach ($resusltadinsumosEntrada as $mostraEntradas) {?> -->
                        <tr>
                          <th scope="row"><?php// echo $mostraEntradas['']?></th>
                          <td><?php //echo $mostraEntradas['fecha_entrada']?></td>
                          <td><?php //echo $mostraEntradas['cantidad']?></td>
                          <td><?php// echo $mostraEntradas['fecha_caducidad']?></td>
                        </tr>
                 <!--  <?php } ?> -->
                   </tbody>
                 </table>

        </div>
        <div class="modal-footer" style="background:#b2bec3">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>