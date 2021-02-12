<script language="JavaScript" type="text/javascript">
    // Reloj digital para web javascript
    // Copyright 2015 bloguero-ec.
    // Usese cómo mas le convenga no elimine estas líneas (http://www.bloguero-ec.com)
    function show5(){
    if (!document.layers&&!document.all&&!document.getElementById)
    return
    var Digital=new Date()
    var hours=Digital.getHours()
    var minutes=Digital.getMinutes()
    var seconds=Digital.getSeconds()
    var f = new Date();
    //document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
    var dn="PM"
    if (hours<12)
    dn="AM"
    if (hours>12)
    hours=hours-12
    if (hours==0)
    hours=12
    
    if (minutes<=9)
    minutes="0"+minutes
    if (seconds<=9)
    seconds="0"+seconds
    //change font size here to your desire
    myclock= hours+":"+minutes+":"
        +seconds+" "+dn;
    if (document.layers){
    document.layers.liveclock.document.write(myclock)
    document.layers.liveclock.document.close()
    }
    else if (document.all)
    liveclock.innerHTML=myclock
    else if (document.getElementById)
    document.getElementById("liveclock").innerHTML=myclock
    setTimeout("show5()",1000)
    }
    window.onload=show5
</script>
<div class="br-mainpanel" style="position: relative;">
    <br>
      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
          <div class="col">
            <div class="bg-dark rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-clipboard tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Prestamos (Biblioteca)</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $TNoInfantil ?></p>
                  <span class="tx-11 tx-roboto tx-white-6">Realizados</span>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col">
            <div class="bg-purple rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-map tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Prestamos (Biblioteca Infantil)</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $TInfantil ?></p>
                  <span class="tx-11 tx-roboto tx-white-6">Relizados</span>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col">
            <div class="bg-primary rounded overflow-hidden">
                <div class="pd-25 d-flex align-items-center">
                  <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Fecha y hora de hoy</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1" id="liveclock"></p>
                    <span class="tx-11 tx-roboto tx-white-6">
                    <?php 
                        date_default_timezone_set("America/Lima");
                        $time = time();
                        $fecha = date("d"."/"."m"."/"."Y", $time);
                        echo $fecha;
                    ?>
                    </span>
                  </div>
                </div>
              </div>
          </div><!-- col-3 -->
        </div><!-- row -->
        <br>
        <h4 class="tx-gray-800 mg-b-5">Prestamos de hoy</h4><br>
        <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modalInsert">Registrar nuevo prestamo</a>
        <br>
        <br>
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
                      <th class="bg-dark text-white">Nro</th>
                      <th class="bg-dark text-white">Nombre</th>
                      <th class="bg-dark text-white">Apellidos</th>
                      <th class="bg-dark text-white">DNI</th>
                      <th class="bg-dark text-white">Sexo</th>
                      <th class="bg-dark text-white">Grado</th>
                      <th class="bg-dark text-white">Lector</th>
                      <th class="bg-dark text-white">Libros</th>
                      <th class="bg-dark text-white" style="font-size:9px;vertical-align: middle;">Hora prestamo</th> 
                      <th class="bg-dark text-white">Accion</th> 
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php 
                      if(!empty($prestamos)):?>
                      <?php 
                      foreach ($prestamos as $key):
                      ?>
                      <tr role="row" class="odd">
                        <td style="vertical-align: middle;"><?php echo $key->Nro; ?></td>
                        <td style="vertical-align: middle;white-space: pre-wrap;"><?php echo $key->Nombre; ?></td>
                        <td style="vertical-align: middle;white-space: pre-wrap;"><?php echo $key->Apellidos; ?></td>
                        <td style="vertical-align: middle;"><?php echo $key->DNI; ?></td> 
                        <td style="vertical-align: middle;"><?php echo $key->Sexo; ?></td> 
                        <td style="vertical-align: middle;white-space: pre-wrap;"><?php echo $key->Grado; ?></td> 
                        <td style="vertical-align: middle;"><?php echo $key->Tipo_lector; ?></td> 
                        <td style=" white-space: pre-wrap;">
                            <?php
                            $libros = $this->ModelPrincipal->mostrar_libros_prestados($key->Nro);
                            if(!empty($libros)):?>
                            <?php 
                            foreach ($libros as $aux):
                            ?>
                            <blockquote class="blockquote bd-l bd-5 pd-l-20">
                                <footer style="font-size:12px;"><?= $aux->Titulo ?></footer>
                            </blockquote>
                            <?php endforeach; ?>
                            <?php endif; ?> 
                        </td> 
                        <td style="vertical-align: middle;"><?php echo $key->Hora_inicio; ?></td>
                        <td style="text-align:center;vertical-align: middle;">
                          <a class="btn btn-info" id="finish" value="<?php echo $key->Nro; ?>" style="color: #fff;"><span class="fa fa-cog"></span></a>
                        </td>
                      </tr>                         
                      <?php endforeach; ?>
                    <?php endif; ?>                     
                  </tbody>
                </table>
          </div><!-- table-wrapper -->
      </div><!-- br-pagebody -->
  </div>
  <br>
      <!-- Modal para ingresar -->
<div id="modalInsert" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
            <div class="modal-body pd-0">
                <div class="row">
                        <div class="col-lg-5 bg-primary">
                            <div class="pd-30" align="center">
                                <img src="<?php echo base_url();?>assets/images/02.png" alt="" width="300">
                            </div>
                        </div><!-- col-6 -->
                          <div class="col-lg-7 bg-white">
                            <div class="pd-15">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <br>
                              <div class="pd-x-30 pd-y-10">
                                <h3 class="tx-inverse  mg-b-5">Registrar un prestamo</h3>
                                <hr style="height:3px;border:none;color:#868ba1;background-color:#868ba1;">
                                <form action="" id="registro">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-5">
                                              <div class="input-group">
                                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                                <input class="form-control pd-y-12" placeholder="Nro" id="nro"> 
                                              </div>
                                            </div>
                                            <div class="col-7">
                                              <div class="input-group">
                                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                <input class="form-control pd-y-12" placeholder="Nombre del lector" id="nombre_l">       
                                              </div>
                                            </div>
                                        </div>
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-7">
                                              <div class="input-group">
                                                <span class="input-group-addon bg-dark text-white"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                <input class="form-control pd-y-12" placeholder="Apellidos del lector" id="apellidos_l">
                                              </div>
                                            </div>
                                            <div class="col-5">
                                              <div class="input-group">
                                                  <span class="input-group-addon bg-dark text-white"><i class="icon ion-edit tx-16 lh-0 op-6"></i></span>
                                                  <input class="form-control pd-y-12" placeholder="DNI" id="dni_l">
                                              </div>
                                            </div>
                                        </div>
                                    </div><!-- form-group -->
                                    <div class="input-group">
                                        <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="sexo">
                                            <option value="Error">Sexo</option>
                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="grado_i">
                                            <option value="Error">Grado de instruccion</option>
                                            <option value="Inicial">Inicial</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Primaria">Secundaria</option>
                                            <option value="Superior tecnica incompleta">Superior tecnica incompleta</option>
                                            <option value="Superior tecnica completa">Superior tecnica completa</option>
                                            <option value="Superior universitaria incompleta">Superior universitaria incompleta</option>
                                            <option value="Superior universitaria completa">Superior universitaria completa</option>
                                        </select>
                                    </div>
                                    <br><div class="input-group">
                                        <select class="form-control" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="tipo_l">
                                            <option value="Error">Tipo de lector</option>
                                            <option value="Infantil">Infantil</option>
                                            <option value="No infantil">No infantil</option>
                                        </select>
                                    </div>
                                    <br>
                                    <input type='text'
                                        placeholder='Libros'
                                        class='flexdatalist form-control'
                                        data-min-length='1'
                                        multiple=''
                                        data-selection-required='1'
                                        list='libros'>
                                    <datalist id="libros">
                                        <?php 
                                        $libros_t = $this->ModelPrincipal->mostrar_libros();
                                        if(!empty($libros_t)):?>
                                        <?php 
                                        foreach ($libros_t as $reg):
                                        ?>
                                        <option value="<?= $reg->Codigo ?>"><?= $reg->Titulo ?></option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </datalist>
                                    <br>
                                    <button class="btn btn-primary pd-y-12 btn-block" id="add">Registrar</button>
                                </form>
                            </div>
                        </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                </div><!-- row -->
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
    <br>
    <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div>
