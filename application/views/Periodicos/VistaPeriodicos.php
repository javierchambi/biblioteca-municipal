<div class="br-mainpanel" style="position: relative;">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Listado de periodicos "Don Jaque" disponibles</h4>
           <br>
           <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modalInsert">Registrar nuevo periodico</a>
           <br><br>
           <div class="br-section-wrapper">
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
                      <th class="bg-dark text-white">Edicion</th>
                      <th class="bg-dark text-white">Fecha</th>
                      <th class="bg-dark text-white">Imagenes</th>
                      <th class="bg-dark text-white">Acciones</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php 
                        if(!empty($periodico)):?>
                        <?php 
                        foreach ($periodico as $key):
                        ?>
                        <tr>
                            <td style="vertical-align: middle;"><?php echo $key->Edicion; ?></td>
                            <td style="vertical-align: middle;"><?php echo $key->Fecha; ?></td>
                            <th>
                                <div align="center">
                                    <img src="<?php echo base_url()."assets/pictures/periodicos/".$key->Imagen;?>" alt="" width="200">
                                </div>
                            </th>
                            <td align="center" style="vertical-align: middle;">
                                <a class="btn btn-teal" id="edit" value="<?php echo $key->Edicion; ?>" style="color: #fff;"><span class="fa fa-pencil"></span></a>
                                <a class="btn btn-pink" id="del" value="<?php echo $key->Edicion; ?>" style="color: #fff;"><span class="fa fa-trash"></span></a>                              
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>            
                  </tbody>
                </table>
          </div><!-- table-wrapper -->
        </div><!-- br-pagebody -->
        </div><!-- row -->
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
                            <div class="pd-0" style="text-align: left">
                                <br>
                                <img src="<?php echo base_url();?>/assets/images/Periodico.png" alt="" width="400">
                            </div>
                        </div><!-- col-6 -->
                          <div class="col-lg-6 bg-white">
                            <div class="pd-30">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <br><br>
                              <div class="pd-x-30 pd-y-10">
                                <h3 class="tx-inverse  mg-b-5">Nuevo periodico</h3>
                                <hr style="height:3px;border:none;color:#868ba1;background-color:#868ba1;">
                                <form action="" id="registro">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Edicion" id="Edicion">
                                    </div>
                                    <br>
                                    <label for="Fecha">Fecha</label>
                                    <input class="form-control pd-y-12" type="date" placeholder="Fecha" id="Fecha">
                                    <br>
                                    <label for="Imagen">Imagen del periodico</label>
                                    <label class="custom-file">
                                        <input type="file" id="Imagen" class="custom-file-input">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    <br><br>
                                    </div><!-- form-group -->
                                    <button class="btn btn-primary pd-y-12 btn-block" type="button" id="add">Registrar</button>
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
                        <div class="form-group">
                            <input class="form-control pd-y-12" type="hidden"  id="edicion">
                            <div class="input-group">
                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                <input class="form-control pd-y-12" placeholder="Edicion" id="edicion_ed">
                            </div>
                            <br>
                            <label for="fecha_ed">Fecha</label>
                            <input class="form-control pd-y-12" type="date" placeholder="Fecha" id="fecha_ed">
                            <br>
                            <label for="imagen_ed">Imagen del periodico</label>
                            <br>
                            <label class="custom-file">
                                <input type="file" id="imagen_ed" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </label>
                        </div><!-- form-group -->
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" id="updt" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Cambiar datos</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
    </div>
</div>

