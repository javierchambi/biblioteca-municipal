<div class="br-mainpanel" style="position: relative;">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Registro de prestamos</h4>
           <br>
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
                      <th class="bg-dark text-white">Grado</th>
                      <th class="bg-dark text-white">Lector</th>
                      <th class="bg-dark text-white">Fecha</th>
                      <th class="bg-dark text-white">Hora</th>
                      <th class="bg-dark text-white">Libros</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                  <?php 
                    if(!empty($prestamos)):?>
                    <?php 
                    foreach ($prestamos as $key):
                    ?>
                    <tr>
                        <td style="font-size: 14px;"><?php echo $key->Nro; ?></td>
                        <td style="font-size: 14px; white-space: pre-wrap;"><?php echo $key->Nombre; ?></td>
                        <td style="font-size: 14px; white-space: pre-wrap;"><?php echo $key->Apellidos; ?></td>
                        <td style="font-size: 14px;"><?php echo $key->DNI; ?></td>
                        <td style="font-size: 14px;"><?php echo $key->Sexo; ?></td>
                        <td style="font-size: 14px; white-space: pre-wrap;"><?php echo $key->Grado; ?></td>
                        <td style="font-size: 14px; white-space: pre-wrap;"><?php echo $key->Tipo_lector; ?></td>
                        <td style="font-size: 14px;"><?php echo $key->Fecha_prestamo; ?></td>
                        <td style="font-size: 14px;"><?php echo $key->Hora_prestamo; ?></td>
                        <td style="white-space: pre-wrap;">
                            <div align="center">
                                <?php 
                                $libros_p = $this->ModelPrestamos->mostrar_libros_prestados($key->Nro);
                                if(!empty($libros_p)):?>
                                <?php 
                                foreach ($libros_p as $reg):
                                ?>
                                <div class="alert alert-primary"><?= $reg->Titulo ?></div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </td>    
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>                      
                  </tbody>
                </table>
          </div><!-- table-wrapper -->
        <!--
            <div class="row">
                    <table id="tablek" class="table table-bordered display dataTable" role="grid" aria-describedby="datatable1_info" style="width: 1110px;">
                        <thead>
                        <tr role="row">
                            <th class="wd-15p sorting_asc bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 143px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">Nro</th>
                            <th class="wd-15p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 143px;" aria-label="Last name: activate to sort column ascending">Nombre</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">Apellidos</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">DNI</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">Sexo</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">Grado de instruccion</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">Tipo de lector</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">Fecha de prestamo</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">Hora del prestamo</th>
                            <th class="wd-20p sorting bg-dark text-white" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Position: activate to sort column ascending">Libros prestados</th>
                        </thead>
                        <tbody>
                                
                        </tbody>
                    </table>
                </div>
            -->
            </div>
        </div>
    </div>
</div>

