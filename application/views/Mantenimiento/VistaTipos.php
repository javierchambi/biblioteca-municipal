<div class="br-mainpanel" style="position: relative;">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Listado de tipos de libros disponibles</h4>
           <br>
           <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modalInsert">Registrar nuevo tipo</a>
           <br><br>
        <div class="br-section-wrapper br-sitemap-section">
        <div class="table-wrapper">
            <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                <table id="tablek" class="table display table-bordered responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid"  style="width: 1110px;">
                  <thead>
                    <style>
                      table
                      {
                        table-layout: fixed;
                      }
                    </style>
                    <tr role="row">
                      <th class="bg-dark text-white">Nro</th>
                      <th class="bg-dark text-white">Descripcion</th>
                      <th class="bg-dark text-white">Accion</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                  <?php 
                        if(!empty($tipo)):?>
                        <?php 
                        foreach ($tipo as $key):
                        ?>
                        <tr>
                        <td style="vertical-align: middle;"><?php echo $key->Nro; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Descripcion_t; ?></td>
                        <td align="center" style="vertical-align: middle;">
                            <a class="btn btn-info" id="edit" value="<?php echo $key->Nro; ?>" style="color: #fff;"><span class="fa fa-pencil"></span></a>
                            <!-- <a class="btn btn-danger bg-pink" id="del" value="<?php echo $key->Nro; ?>" style="color: #fff;"><span class="fa fa-trash"></span></a> -->                              
                        </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>   
                  </tbody>
                </table>
          </div><!-- table-wrapper -->
        </div>
    </div>
</div>
<!-- Modal para ingresar -->
<div id="modalInsert" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="row">
                        <div class="col-lg-6 bg-primary">
                            <div class="pd-40" style="justify-content: center;">
                                <img src="<?php echo base_url();?>assets/images/04.png" alt="" width="300">
                            </div>
                        </div><!-- col-6 -->
                          <div class="col-lg-6 bg-white">
                            <div class="pd-30">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <br><br><br><br><br>
                              <div class="pd-x-30 pd-y-10">
                                <h3 class="tx-inverse  mg-b-5">Nuevo tipo</h3>
                                <hr style="height:3px;border:none;color:#868ba1;background-color:#868ba1;">
                                <form action="" id="registro">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Nro" id="nro">
                                    </div>             
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Nombre del nuevo tipo" id="descripcion">
                                    </div>
                                    <br>
                                    <button class="btn btn-primary pd-y-12 btn-block"id="add">Registrar</button>
                                </form>
                            </div>
                        </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                </div><!-- row -->
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
    <!-- Modal para editar -->
</div>
<div class="modal fade modal-dialog-vertical-center" id="modalUpdate" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-gear"></i>  Modificar datos</h4>
                </div>
                <div class="modal-body pd-25">
                    <form action="" id="registro">
                    <input class="form-control pd-y-12" type="hidden" placeholder="Nro" id="nro">
                    <div class="input-group">
                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                        <input class="form-control pd-y-12" placeholder="Nro" id="nro_ed">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                        <input class="form-control pd-y-12" placeholder="Nombre de la nueva categoria" id="descripcion_ed">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" id="updt" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Cambiar datos</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
    </div>
</div>

