  <?php 

$sql_productos= 'SELECT ti.tipo_productos, p.nombre , p.cantidad , p.fecha_registro from productos p inner join tipo_productos ti on p.idtipoproducto=ti.idtipoproductos where ti.tipo_productos="carnicos"';
$setproductos=$pdo->prepare($sql_productos);
$setproductos->execute();
$resusltadproductos=$setproductos->fetchAll();

  

//   $sql_StopMinIn= ' SELECT * from  elementos where cantidad<StopMin';
// $setStopMinIn=$pdo->prepare($sql_StopMinIn);
// $setStopMinIn->execute();
// $resusltadStopMinIn=$setStopMinIn->fetchAll();
   ?>

   <!-- Logout Modal-->
  <div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#192a56">
          <h5 class="modal-title text-center text-white" id="exampleModalLabel">Lista de productos a base de carne</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           
             <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">Tipo producto</th>
                          <th scope="col">Fecha registros</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Nombre</th>
                        <!--   <th scope="col">Fecha de caducidad</th> -->
                        </tr>
                      </thead>
                      <tbody>
                <?php foreach($resusltadproductos as $modalProducto) {?>
                        <tr>
                          <th scope="row"><?php echo $modalProducto['tipo_productos']?></th>
                          <td><?php echo $modalProducto['fecha_registro']?></td>
                          <td><?php echo $modalProducto['cantidad']?></td>
                          <td><?php echo $modalProducto['nombre']?></td>
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