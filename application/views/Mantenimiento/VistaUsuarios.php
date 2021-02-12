<div class="br-mainpanel" style="position: relative;">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Listado de Usuarios del sistema</h4>
           <br>
           <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modalInsert">Registrar nuevo usuario</a>
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
                      <th class="bg-dark text-white">Nombre</th>
                      <th class="bg-dark text-white">Apellidos</th>
                      <th class="bg-dark text-white">DNI</th>
                      <th class="bg-dark text-white">Sexo</th>
                      <th class="bg-dark text-white">Usuario</th>
                      <th class="bg-dark text-white">Contraseña</th>
                      <th class="bg-dark text-white">Libros</th>
                      <th class="bg-dark text-white">Accion</th> 
                    </tr>
                  </thead>
                  <tbody align="center">
                  <?php 
                    if(!empty($usuario)):?>
                    <?php 
                    foreach ($usuario as $key):
                    ?>
                    <tr>
                        <td style="vertical-align: middle;"><?php echo $key->Nro; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Nombre; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Apellidos; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->DNI; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Sexo; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Username; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Password; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Tipo_usuario; ?></td>
                        <td align="center" style="vertical-align: middle;">
                            <a class="btn btn-info" id="edit" value="<?php echo $key->Nro; ?>" style="color: #fff;"><span class="fa fa-pencil"></span></a>
                            <a class="btn btn-danger bg-pink" id="del" value="<?php echo $key->Nro; ?>" style="color: #fff;"><span class="fa fa-trash"></span></a>                              
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
                                <img src="<?php echo base_url();?>assets/images/02.png" alt="" width="300">
                            </div>
                        </div><!-- col-6 -->
                          <div class="col-lg-6 bg-white">
                            <div class="pd-30">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <div class="pd-x-30 pd-y-10">
                                <h3 class="tx-inverse  mg-b-5">Incorporar nuevo usuario</h3>
                                <hr style="height:3px;border:none;color:#868ba1;background-color:#868ba1;">
                                <form action="" id="registro">
                                    <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Nro" id="nro">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Nombre del usuario" id="nombre">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Apellidos del usuario" id="apellidos">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="DNI del usuario" id="dni">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="sexo">
                                            <option value="Error">Sexo</option>
                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="tipo">
                                            <option value="Error">Tipo de usuario</option>
                                            <option value="Trabajador">Trabajador</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12"  placeholder="Usuario" id="usuario">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white">&nbsp;<i class="icon ion-key tx-16 lh-0 op-6"></i>&nbsp;</span>
                                        <input class="form-control pd-y-12" type="password" placeholder="Contraseña" id="password">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white">&nbsp;<i class="icon ion-key tx-16 lh-0 op-6"></i>&nbsp;</span>
                                        <input class="form-control pd-y-12" type="password" placeholder="Repetir contraseña" id="password_f">
                                    </div>
                                    </div><!-- form-group -->
                                    <button class="btn btn-primary pd-y-12 btn-block" id="add">Registrar</button>
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
                            <input class="form-control pd-y-12" type="hidden" placeholder="Nro" id="nro">
                            <label for="nro_ed">Nro</label>
                            <input class="form-control pd-y-12" placeholder="Nro" id="nro_ed">
                            <br>
                            <label for="nombre_ed">Nombre</label>
                            <input class="form-control pd-y-12" placeholder="Nombre del trabajador" id="nombre_ed">
                            <br>
                            <label for="apellidos_ed">Apellidos</label>
                            <input class="form-control pd-y-12" placeholder="Apellidos del trabajador" id="apellidos_ed">
                            <br>
                            <label for="dni_ed">DNI</label>
                            <input class="form-control pd-y-12" placeholder="DNI del trabajador" id="dni_ed">
                            <br>
                            <label for="sexo_ed">Sexo</label>
                            <div class="input-group">
                                <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="sexo_ed">
                                    <option value="Error">Sexo</option>
                                    <option value="H">Hombre</option>
                                    <option value="M">Mujer</option>
                                </select>
                            </div>
                            <br>
                            <label for="tipo_ed">Tipo</label>
                            <div class="input-group">
                                <select class="form-control" data-placeholder="Tipo" tabindex="-1" aria-hidden="true" id="tipo_ed">
                                    <option value="Error">Tipo de usuario</option>
                                    <option value="Trabajador">Trabajador</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <br>
                            <label for="username_ed">Nombre de usuario</label>
                            <input class="form-control pd-y-12" placeholder="Nombre de usuario del trabajador" id="username_ed">
                            <br>
                            <label for="password_ed">Contraseña</label>
                            <input class="form-control pd-y-12" placeholder="Contraseña" id="password_ed">
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

