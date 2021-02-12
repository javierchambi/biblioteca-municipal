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
        var descripcion = $("#descripcion").val();
        var nro = $("#nro").val();
        if(nro=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado un numero del tipo</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if($.isNumeric(nro)==false)
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(descripcion=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la descripcion del tipo</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else
        {
          $.ajax({
            url: "<?php echo base_url();?>Mantenimiento/Tipos/insertar",
            type: "post",
            dataType: "json",
            data:
            {
                nro: nro,
                descripcion_t: descripcion
            },
            success: function(data)
            {
              if(data=="Duplicado")
              {
                bootbox.dialog({        
                  message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error</h5><p class='mg-b-0 tx-gray' style='text-align:center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Este dato ya existe</p></div></div></div></div>",
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
    $(document).on("click","#edit",function(e){
          e.preventDefault();
          var edit_id = $(this).attr("value");
          //alert(edit_id);
          $.ajax({
            url: '<?php echo base_url(); ?>Mantenimiento/Tipos/modal_edicion',
            type: "post",
            dataType: "json",
            data: {
              edit_id : edit_id
            },
            success: function(data)
            {
                //alert(data);
                $("#modalUpdate").modal('show');
                $("#nro").val(data.post.Nro);
                $("#nro_ed").val(data.post.Nro);
                $("#descripcion_ed").val(data.post.Descripcion_t);
            }
          });
        });
  </script>
  <script>
    $(document).on("click","#updt",function(e){
          e.preventDefault();
          var nro = $("#nro").val();
          var nro_ed = $("#nro_ed").val();
          var descripcion_ed = $("#descripcion_ed").val();
          if(nro_ed=="")
          {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado un numero del tipo</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if($.isNumeric(nro_ed)==false)
          {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if(descripcion_ed=="")
          {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la descripcion del tipo</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else
          {
            $.ajax({
              url: '<?php echo base_url(); ?>Mantenimiento/Tipos/actualizacion',
              type: "post",
              dataType: "json",
              data:
              {
                nro: nro,
                nro_ed: nro_ed,
                descripcion_ed: descripcion_ed,
              },
              success: function(data)
              {
                $("#modalUpdate").modal('hide');
                location.reload();
              }
            });
          }
        });
  </script>
   <script>
    $(document).on("click","#del",function(e){
          e.preventDefault();
          var nro = $(this).attr("value");
          bootbox.confirm({
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/03.png' width='300'><br><br><div class='alert alert-warning alert-bordered pd-y-40' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><i class='icon ion-alert-circled alert-icon tx-52 tx-warning mg-r-20'></i><div><h5 class='mg-b-2 tx-warning'>¿Eliminar?</h5><p class='mg-b-0 tx-gray'>¿Esta seguro que desea eliminar este dato?</p></div></div></div></div>",
            buttons: {
              confirm: {
              label: 'Si,eliminar',
              className: 'btn-success'
              },
              cancel: {
              label: 'No,cancelar',
              className: 'btn-danger'
              }
          },
          callback: function (result) {
            if(result==true)
            {
                $.ajax({
                url: "<?php echo base_url(); ?>Mantenimiento/Tipos/eliminar",
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
          //alert(nro);
        });
  </script>
