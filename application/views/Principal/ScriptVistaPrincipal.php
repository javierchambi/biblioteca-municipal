<script>
  $('.flexdatalist').flexdatalist({
     selectionRequired: 1,
     minLength: 1
});
</script>
<script>
    $('#tablek').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Buscar',
            sSearch: '',
            lengthMenu: 'Mostrar _MENU_ Registros',
        }
    });
  </script>
<script>
    $(document).on("click","#add",function(e){
        e.preventDefault();
        var nro = $("#nro").val();
        var nombre = $("#nombre_l").val();
        var apellidos = $("#apellidos_l").val();
        var dni = $("#dni_l").val();
        var sexo = $("#sexo").val();
        var grado = $("#grado_i").val();
        var tipo = $("#tipo_l").val();
        var libros = $(".flexdatalist").val();
        var libros_def = libros.split(',');
        if(nro=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado un numero de prestamo</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(nombre=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el nombre del lector</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(apellidos=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado los apellidos del lector</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(dni=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el DNI del lector</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if($.isNumeric(dni)==false)
        {
            bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un DNI</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(sexo=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Debes seleccionar el sexo del lector</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(grado=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Debes seleccionar el grado del lector</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(tipo=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Debes seleccionar el tipo del lector</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(libros=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>&nbsp;&nbsp;&nbsp;No has seleccionado libros</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else
        {
          //alert(nro+" "+nombre+" "+apellidos+" "+dni+" "+sexo+" "+grado+" "+tipo);
          $.ajax({
            url: '<?php echo base_url(); ?>PanelPrincipal/Principal/insertar',
            type: "post",
            dataType: "json",
            data: {
              nro: nro,
              nombre: nombre,
              apellidos: apellidos,
              dni: dni,
              sexo: sexo,
              grado: grado,
              tipo: tipo,
              libros: libros_def
            },
            success: function(data)
            {
              if(data=="Duplicado")
              {
                bootbox.dialog({        
                message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error</h5><p class='mg-b-0 tx-gray' style='text-align:center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Este dato ya existe</p></div></div></div></div>",
                closeButton: true
                 }); 
              }
              else
              {
                $("#modalInsert").modal('hide');
                location.reload();
                $("#registro")[0].reset();
              }
            }
          });
        }
    });
</script>
   <script>
    $(document).on("click","#finish",function(e){
          e.preventDefault();
          var nro = $(this).attr("value");
          //alert(nro);
          bootbox.confirm({
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Warning.png'  width='300'><br><div class='lead bg-warning alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Aviso</h5><p class='mg-b-0 tx-gray' style='text-align:center'>¿Estas seguro de finalizar el prestamo?</p></div></div></div></div>",
            buttons: {
              confirm: {
              label: 'Si,eliminar',
              className: 'btn-teal'
              },
              cancel: {
              label: 'No,cancelar',
              className: 'btn-pink'
              }
          },
          callback: function (result) {
            if(result==true)
            {
                $.ajax({
                url: "<?php echo base_url(); ?>PanelPrincipal/Principal/finalizar",
                type: "post",
                dataType: "json",
                data: {
                  nro: nro
                 },
                });
                location.reload();
            }
          }
          });
        });
  </script>
  