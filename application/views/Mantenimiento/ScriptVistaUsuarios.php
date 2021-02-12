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
        var nro = $("#nro").val();
        var nombre = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var sexo = $("#sexo").val();
        var usuario = $("#usuario").val();
        var password = $("#password").val();
        var password_2 = $("#password_f").val();
        var dni = $("#dni").val();
        var tipo = $("#tipo").val();
        //alert(apellidos);
        if(nro=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/01.png' width='300'><br><br><div class='alert alert-danger alert-bordered pd-y-40' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><i class='icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20'></i><div><h5 class='mg-b-2 tx-danger'>Error</h5><p class='mg-b-0 tx-gray'>Tienes que ingresar un numero</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if($.isNumeric(nro)==false)
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/01.png' width='300'><br><br><div class='alert alert-danger alert-bordered pd-y-40' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><i class='icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20'></i><div><h5 class='mg-b-2 tx-danger'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(nombre=="")
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el nombre del usuario</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(apellidos=="")
        {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado los apellidos del usuario</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(dni=="")
        {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el DNI del usuario</p></div></div></div></div>",
            closeButton: true
            });
        }
        else if($.isNumeric(dni)==false)
        {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un DNI</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(sexo=="Error")
        {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el sexo del usuario</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(tipo=="Error")
        {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el tipo de trabajador que sera el usuario</p></div></div></div></div>",
            closeButton: true
            }); 
        }
        else if(usuario=="")
        {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado un nombre de usuario</p></div></div></div></div>",
            closeButton: true
            });
        }
        else if(password=="")
        {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la contraseña</p></div></div></div></div>",
            closeButton: true
            });
        }
        else if(password!=password_2)
        {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Las contraseñas no coinciden</p></div></div></div></div>",
            closeButton: true
            });
        }
        else
        {
          $.ajax({
            url: "<?php echo base_url();?>Mantenimiento/Usuarios/insertar",
            type: "post",
            dataType: "json",
            data:
            {
                nro: nro,
                nombre: nombre,
                apellidos: apellidos,
                sexo: sexo,
                dni: dni,
                username: usuario,
                password: password,
                tipo_usuario: tipo
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
            url: '<?php echo base_url(); ?>Mantenimiento/Usuarios/modal_edicion',
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
                $("#nombre_ed").val(data.post.Nombre);
                $("#apellidos_ed").val(data.post.Apellidos);
                //$("#sexo_ed").val(data.post.Sexo);
                $("#dni_ed").val(data.post.DNI);
                $("#username_ed").val(data.post.Username);
                $("#password_ed").val(data.post.Password);
                //$("#tipo_ed").val(data.post.Tipo_usuario);
            }
          });
        });
  </script>
  <script>
    $(document).on("click","#updt",function(e){
          e.preventDefault();
          var nro = $("#nro").val();
          var nro_ed = $('#nro_ed').val();
          var nombre_ed = $("#nombre_ed").val();
          var apellidos_ed = $("#apellidos_ed").val();
          var sexo_ed = $("#sexo_ed").val();
          var usuario_ed = $("#username_ed").val();
          var password_ed = $("#password_ed").val();
          var dni_ed = $("#dni_ed").val();
          var tipo_ed = $("#tipo_ed").val();
          if(nro_ed=="")
          {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/01.png' width='300'><br><br><div class='alert alert-danger alert-bordered pd-y-40' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><i class='icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20'></i><div><h5 class='mg-b-2 tx-danger'>Error</h5><p class='mg-b-0 tx-gray'>Tienes que ingresar un numero</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if($.isNumeric(nro_ed)==false)
          {
          bootbox.dialog({        
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/01.png' width='300'><br><br><div class='alert alert-danger alert-bordered pd-y-40' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><i class='icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20'></i><div><h5 class='mg-b-2 tx-danger'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un numero</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if(nombre_ed=="")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el nombre del usuario</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if(apellidos_ed=="")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado los apellidos del usuario</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if(dni_ed=="")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el DNI del usuario</p></div></div></div></div>",
            closeButton: true
            });
          }
          else if($.isNumeric(dni_ed)==false)
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>Lo que ingresaste no fue un DNI</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if(sexo_ed=="Error")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el sexo del usuario</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if(tipo_ed=="Error")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado el tipo de trabajador que sera el usuario</p></div></div></div></div>",
            closeButton: true
            }); 
          }
          else if(usuario_ed=="")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado un nombre de usuario</p></div></div></div></div>",
            closeButton: true
            });
          }
          else if(password_ed=="")
          {
            bootbox.dialog({        
              message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error</h5><p class='mg-b-0 tx-gray'>No has ingresado la contraseña</p></div></div></div></div>",
            closeButton: true
            });
          }
          else
          {
            $.ajax({
              url: '<?php echo base_url(); ?>Mantenimiento/Usuarios/actualizacion',
              type: "post",
              dataType: "json",
              data:
              {
                nro: nro,
                nro_ed: nro_ed,
                nombre_ed: nombre_ed,
                apellidos_ed: apellidos_ed,
                sexo_ed: sexo_ed,
                dni_ed: dni_ed,
                username_ed: usuario_ed,
                password_ed: password_ed,
                tipo_usuario_ed: tipo_ed
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
            message: "<div align='center'><img src='<?php echo base_url();?>assets/images/Warning.png'  width='300'><br><div class='lead bg-warning alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Aviso</h5><p class='mg-b-0 tx-gray' style='text-align:center'>¿Estas seguro de finalizar el prestamo?</p></div></div></div></div>",
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
                url: "<?php echo base_url(); ?>Mantenimiento/Usuarios/eliminar",
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
