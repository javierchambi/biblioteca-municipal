<script>
    $('#tablek').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Buscar',
            sSearch: '',
            lengthMenu: '_MENU_ Registros',
        }
    });
</script>
<script>
    $(document).on("click","#add",function(e){
        e.preventDefault();
        var codigo = $("#Codigo").val();
        var titulo = $("#Titulo").val();
        var autor = $("#Autor").val();
        var cantidad = $("#Cantidad").val();
        var año = $("#Año").val();
        var fullPath = document.getElementById('Portada').value;
        if (fullPath) 
        {
          var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
          var imagen = fullPath.substring(startIndex);
          if (imagen.indexOf('\\') === 0 || imagen.indexOf('/') === 0) 
          {
            imagen = imagen.substring(1);
          }
        }
        var clasificacion = $("#Clasificacion").val();
        var categoria = $("#Categoria").val();
        var tipo = $("#Tipo").val();
        //alert(codigo+" "+titulo+" "+autor+" "+cantidad+" "+año+" "+imagen+" "+clasificacion+" "+categoria+" "+tipo);
        if(codigo=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el codigo del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(titulo=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el titulo del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(autor=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado al autor del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(cantidad=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado las cantidades disponibles</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if($.isNumeric(cantidad)==false)
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(clasificacion=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la clasificacion del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(categoria=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la categoria del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(tipo=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el tipo del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else
        {
          //alert(codigo+" "+titulo+" "+autor+" "+cantidad+" "+año+" "+imagen+" "+clasificacion+" "+categoria+" "+tipo);
          $.ajax({
            url: '<?php echo base_url(); ?>Libros/Libros/insertar',
            type: "post",
            dataType: "json",
            data: {
              codigo: codigo,
              titulo: titulo,
              autor: autor,
              cantidad: cantidad,
              año: año,
              portada: imagen,
              clasificacion: clasificacion,
              categoria: categoria,
              tipo: tipo,
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
            url: '<?php echo base_url(); ?>Libros/Libros/modal_edicion',
            type: "post",
            dataType: "json",
            data: {
              edit_id : edit_id
            },
            success: function(data)
            {
                //alert(data);
                $("#modalUpdate").modal('show');
                $("#codigo").val(data.post.Codigo);
                $("#codigo_ed").val(data.post.Codigo);
                $("#titulo_ed").val(data.post.Titulo);
                $("#autor_ed").val(data.post.Autor);
                $("#cantidad_ed").val(data.post.Cantidad);
                $("#año_ed").val(data.post.Año);
                $("#clasificacion_ed").val(data.post.Clasificacion);
                $("#categoria_ed").val(data.post.Categoria_Nro);
                $("#tipo_ed").val(data.post.Tipo_Nro);
            }
          });
        });
  </script>
  <script>
    $(document).on("click","#updte",function(e){
      e.preventDefault();
      var codigo = $("#codigo").val();
      var codigo_ed = $("#codigo_ed").val();
      var titulo_ed = $("#titulo_ed").val();
      var autor_ed = $("#autor_ed").val();
      var cantidad_ed = $("#cantidad_ed").val();
      var año_ed = $("#año_ed").val();
      var fullPath = document.getElementById('portada').value;
      if (fullPath) 
      {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var imagen = fullPath.substring(startIndex);
        if (imagen.indexOf('\\') === 0 || imagen.indexOf('/') === 0) 
        {
          imagen = imagen.substring(1);
        }
      }
      var clasificacion_ed = $("#clasificacion_ed").val();
      var categoria_ed = $("#categoria_ed").val();
      var tipo_ed = $("#tipo_ed").val();
      //alert(codigo+" "+codigo_ed+" "+titulo_ed+" "+autor_ed+" "+cantidad_ed+" "+año_ed+"-"+imagen+"-"+clasificacion_ed+" "+categoria_ed+" "+tipo_ed);
      if(codigo_ed=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el codigo del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(titulo_ed=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el titulo del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(autor_ed=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado al autor del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(cantidad_ed=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado las cantidades disponibles</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if($.isNumeric(cantidad_ed)==false)
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(clasificacion_ed=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la clasificacion del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(categoria_ed=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la categoria del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(tipo_ed=="Error")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el tipo del libro</p></div></div></div></div>",
            closeButton: true
            }); 
        }
       else
          {
            $.ajax({
              url: '<?php echo base_url(); ?>/Libros/Libros/actualizacion',
              type: "post",
              dataType: "json",
              data:
              {
                codigo: codigo,
                codigo_ed: codigo_ed,
                titulo_ed: titulo_ed,
                autor_ed: autor_ed,
                cantidad_ed: cantidad_ed,
                año_ed: año_ed,
                imagen: imagen,
                clasificacion_ed: clasificacion_ed,
                categoria_ed: categoria_ed,
                tipo_ed: tipo_ed
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
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Warning.png'  width='300'><br><div class='lead bg-warning alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Aviso</h5><p class='mg-b-0 tx-gray' style='text-align:center'>¿Estas seguro de eliminar este elemento?</p></div></div></div></div>",
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
                url: "<?php echo base_url(); ?>Libros/Libros/eliminar",
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
   <script>
    $(document).on("click","#addexistence",function(e){
          e.preventDefault();
          var codigo = $("#libro").val();
          var cantidad = $("#cantidad").val();
          if(codigo=="Error")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el codigo del libro</p></div></div></div></div>",
              closeButton: true
              }); 
          }
          else if(cantidad=="")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado las cantidades a añadir</p></div></div></div></div>",
              closeButton: true
              }); 
          }
          else if($.isNumeric(cantidad)==false)
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero</p></div></div></div></div>",
              closeButton: true
              }); 
          }
          else
          {
            //alert(codigo+" "+titulo+" "+autor+" "+cantidad+" "+año+" "+imagen+" "+clasificacion+" "+categoria+" "+tipo);
            $.ajax({
              url: '<?php echo base_url(); ?>Libros/Libros/agregar_existencias',
              type: "post",
              dataType: "json",
              data: {
                codigo: codigo,
                cantidad: cantidad
              },
              success: function(data)
              {
                  $("#modalAdd").modal('hide');
                  location.reload();
                  $("#registro")[0].reset();
              }
            });
          }
          });
  </script>
  