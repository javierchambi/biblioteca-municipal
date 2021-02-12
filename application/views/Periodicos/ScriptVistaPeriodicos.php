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
        var edicion = $("#Edicion").val();
        var fecha = $("#Fecha").val();
        var fullPath = document.getElementById('Imagen').value;
        if (fullPath) 
        {
          var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
          var imagen = fullPath.substring(startIndex);
          if (imagen.indexOf('\\') === 0 || imagen.indexOf('/') === 0) 
          {
            imagen = imagen.substring(1);
          }
        }
        //alert(edicion+" "+fecha+" "+imagen);
        if(edicion=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado un numero de edicion del periodico</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if($.isNumeric(edicion)==false)
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero de edición</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(fecha=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la fecha del periodico</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else
        {
          //alert(edicion+" "+fecha+" "+imagen);
          $.ajax({
            url: '<?php echo base_url(); ?>Periodicos/Periodicos/insertar',
            type: "post",
            dataType: "json",
            data: {
              edicion: edicion,
              fecha: fecha,
              imagen: imagen
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
    $(document).on("click","#edit",function(e){
          e.preventDefault();
          var edit_id = $(this).attr("value");
          //alert(edit_id);
          $.ajax({
            url: '<?php echo base_url(); ?>Periodicos/Periodicos/modal_edicion',
            type: "post",
            dataType: "json",
            data: {
              edit_id : edit_id
            },
            success: function(data)
            {
                //alert(data);
                $("#modalUpdate").modal('show');
                $("#edicion").val(data.post.Edicion);
                $("#edicion_ed").val(data.post.Edicion);
                $("#fecha_ed").val(data.post.Fecha);
                $("#imagen_ed").val(data.post.Imagen);
            }
          });
        });
  </script>
  <script>
    $(document).on("click","#updt",function(e){
      e.preventDefault();
      var edicion = $("#edicion").val();
      var edicion_ed = $("#edicion_ed").val();
      var fecha_ed = $("#fecha_ed").val();
      var fullPath = document.getElementById('imagen_ed').value;
      if (fullPath) 
      {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var imagen = fullPath.substring(startIndex);
        if (imagen.indexOf('\\') === 0 || imagen.indexOf('/') === 0) 
        {
          imagen = imagen.substring(1);
        }
      }
      //alert(edicion+" "+edicion_ed+" "+fecha_ed+" "+imagen);
      if(edicion_ed=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado un numero de edicion del periodico</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if($.isNumeric(edicion_ed)==false)
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero de edición</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(fecha_ed=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la fecha del periodico</p></div></div></div></div>",
            closeButton: true
            }); 
        }
      else
          {
            //alert(edicion+" "+edicion_ed+" "+fecha_ed+" "+imagen);
            $.ajax({
              url: '<?php echo base_url(); ?>/Periodicos/Periodicos/actualizacion',
              type: "post",
              dataType: "json",
              data:
              {
                edicion: edicion,
                edicion_ed: edicion_ed,
                fecha_ed: fecha_ed,
                imagen: imagen
              },
              success: function(data)
              {
              }
            });
            $("#modalUpdate").modal('hide');
            location.reload();
          }
      //alert(imagen);
    });
  </script>
   <script>
    $(document).on("click","#del",function(e){
          e.preventDefault();
          var nro = $(this).attr("value");
          //alert(nro);
          bootbox.confirm({
            message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Warning.png'  width='300'><br><div class='lead bg-warning alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Aviso</h5><p class='mg-b-0 tx-gray' style='text-align:center'>¿Estas seguro de eliminar este elemento?</p></div></div></div></div>",
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
                url: "<?php echo base_url(); ?>Periodicos/Periodicos/eliminar",
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