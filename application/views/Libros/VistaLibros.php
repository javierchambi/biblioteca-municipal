<div class="br-mainpanel" style="position: relative;">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Todos los libros de la biblioteca</h4>
           <br>
           <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modalInsert">Registrar nuevo libro</a>
           <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modalAdd">Añadir existencias</a>
           <br><br>
        <div class="br-section-wrapper br-sitemap-section">
        <div class="table-wrapper">
            <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
            <style>
                td
                {
                    white-space: pre-wrap;
                }
            </style>
                <table id="tablek" class="table display table-bordered responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid"  style="width: 1110px;">
                  <thead>
                    <style>
                      table
                      {
                        table-layout: fixed;
                      }
                    </style>
                    <tr role="row">
                      <th class="bg-dark text-white">Codigo</th>
                      <th class="bg-dark text-white">Titulo</th>
                      <th class="bg-dark text-white">Autor</th>
                      <th class="bg-dark text-white">Cantidad</th>
                      <th class="bg-dark text-white">Año</th>
                      <th class="bg-dark text-white">Portada</th>
                      <th class="bg-dark text-white">Clasificacion</th>
                      <th class="bg-dark text-white">Categoria</th>
                      <th class="bg-dark text-white">Tipo</th>
                      <th class="bg-dark text-white">Acciones</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                  <?php 
                    if(!empty($libro)):?>
                    <?php 
                    foreach ($libro as $key):
                    ?>
                    <tr>
                        <td style="vertical-align: middle;"><?php echo $key->Codigo; ?></td>
                        <td style="vertical-align: middle; white-space: pre-wrap;"><?php echo $key->Titulo; ?></td>
                        <td style="vertical-align: middle; white-space: pre-wrap; "><?php echo $key->Autor; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Cantidad; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Año; ?></td>
                        <td style="vertical-align: middle;">
                            <div align="center">
                            <img src="<?php echo base_url()."assets/pictures/libros/".$key->Portada;?>" alt="" width="90">
                            </div>
                        </td>
                        <td style="vertical-align: middle;"><?php echo $key->Clasificacion; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Descripcion_c; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->Descripcion_t; ?></td>
                        <td align="center" style="vertical-align: middle;">
                            <a class="btn btn-info" id="edit" value="<?php echo $key->Codigo; ?>" style="color: #fff;"><span class="fa fa-pencil"></span></a>
                            <!--<a class="btn btn-danger bg-pink" id="del" value="<?php echo $key->Codigo; ?>" style="color: #fff;"><span class="fa fa-trash"></span></a> -->                             
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
                            <div class="" style="justify-content: center;">
                                <br><br><br><br><br>
                                <img src="<?php echo base_url();?>/assets/images/Books.png" alt="" width="400">
                            </div>
                        </div><!-- col-6 -->
                          <div class="col-lg-6 bg-white">
                            <div class="pd-30">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <br>
                              <div class="pd-x-30 pd-y-10">
                                <h3 class="tx-inverse  mg-b-5">Nuevo libro</h3>
                                <hr style="height:3px;border:none;color:#868ba1;background-color:#868ba1;">
                                <form action="" id="registro">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Codigo" id="Codigo">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Titulo" id="Titulo">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" placeholder="Autor" id="Autor">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" tipe="number" placeholder="Cantidad" id="Cantidad">
                                    </div>
                                    <br>   
                                    <div class="input-group">
                                        <span class="input-group-addon bg-dark text-white"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        <input class="form-control pd-y-12" tipe="number" placeholder="Año" id="Año">
                                    </div>                           
                                    <br>
                                    <label for="Portada">Imagen</label>
                                    <label class="custom-file">
                                        <input type="file" id="Portada" class="custom-file-input">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    <br><br>
                                    <div class="input-group">
                                        <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="Clasificacion">
                                            <option value="Error">Clasificacion</option>
                                            <option value="Infantil">Infantil</option>
                                            <option value="No infantil">No infantil</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <select class="form-control" tabindex="-1" aria-hidden="true" id="Categoria">
                                            <option value="Error">Categoria</option>
                                            <?php 
                                            if(!empty($categoria)):?>
                                            <?php 
                                            foreach ($categoria as $key):
                                            ?>
                                            <option value="<?=$key->Nro;?>"><?=$key->Descripcion_c;?></option>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <select class="form-control" tabindex="-1" aria-hidden="true" id="Tipo">
                                            <option value="Error">Tipo</option>
                                            <?php 
                                            if(!empty($tipo)):?>
                                            <?php 
                                            foreach ($tipo as $key):
                                            ?>
                                            <option value="<?=$key->Nro;?>"><?=$key->Descripcion_t;?></option>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <br>
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
                    <form action="" id="update">
                        <div class="form-group">
                            <input class="form-control pd-y-12" type="hidden"  id="codigo">
                            <div class="input-group">
                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                <input class="form-control pd-y-12" placeholder="Codigo" id="codigo_ed">
                            </div>
                            <br>
                            <label for="titulo_ed">Titulo</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                <input class="form-control pd-y-12"  placeholder="Titulo" id="titulo_ed">
                            </div>
                            <br>
                            <label for="autor_ed">Autor</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                <input class="form-control pd-y-12"  placeholder="Autor" id="autor_ed">
                            </div>
                            <br>
                            <label for="cantidad_ed">Cantidad</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                <input class="form-control pd-y-12"  placeholder="Cantidad" id="cantidad_ed">
                            </div>
                            <br>   
                            <label for="año_ed">Año</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                <input class="form-control pd-y-12"  placeholder="Año" id="año_ed">
                            </div>                           
                            <br>
                            <label for="año_ed">Imagen</label><br>
                            <label class="custom-file">
                                <input type="file" id="portada" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </label>
                            <br><br>
                            <label for="clasificacion_ed">Clasificacion</label><br>
                            <div class="input-group">
                                <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="clasificacion_ed">
                                    <option value="Error">Clasificacion</option>
                                    <option value="Infantil">Infantil</option>
                                    <option value="No infantil">No infantil</option>
                                </select>
                            </div>
                            <br>
                            <label for="categoria_ed">Categoria</label><br>
                            <div class="input-group">
                                <select class="form-control" tabindex="-1" aria-hidden="true" id="categoria_ed">
                                    <option value="Error">Categoria</option>
                                    <?php 
                                        if(!empty($categoria)):?>
                                        <?php 
                                        foreach ($categoria as $key):
                                        ?>
                                        <option value="<?=$key->Nro;?>"><?=$key->Descripcion_c;?></option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                </select>
                            </div>
                            <br>
                            <label for="tipo_ed">Tipo</label><br>
                            <div class="input-group">
                                <select class="form-control" tabindex="-1" aria-hidden="true" id="tipo_ed">
                                    <option value="Error">Tipo</option>
                                    <?php 
                                    if(!empty($tipo)):?>
                                    <?php 
                                    foreach ($tipo as $key):
                                    ?>
                                    <option value="<?=$key->Nro;?>"><?=$key->Descripcion_t;?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div><!-- form-group -->
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" id="updte" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Cambiar datos</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
    </div>
</div>
<div class="modal fade modal-dialog-vertical-center" id="modalAdd" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus"></i>  Agregar existencias</h4>
                </div>
                <div class="modal-body pd-25">
                    <form action="" id="update">
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" tabindex="-1" aria-hidden="true" id="libro">
                                    <option value="Error">Nombre del libro</option>
                                    <?php 
                                        if(!empty($solo_libros)):?>
                                        <?php 
                                        foreach ($solo_libros as $key):
                                        ?>
                                        <option value="<?=$key->Codigo;?>"><?=$key->Titulo;?></option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                </select>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                <input type="text" placeholder="Cantidad" class="form-control" id="cantidad">
                            </div>
                        </div><!-- form-group -->
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" id="addexistence" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Añadir</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
    </div>
</div>

