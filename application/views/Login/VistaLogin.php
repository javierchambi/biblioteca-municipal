<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>

    <!-- vendor css -->
    <link href="<?php echo base_url();?>/assets/libraries/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/libraries/Ionicons/css/ionicons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/images/Icon.ico"/>

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/libraries/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
          <form action="<?php echo base_url();?>Login/Login/ingresar" id="login" class="form" method="post">
            <div class="login-wrapper wd-400 wd-xs-400 pd-25 pd-xs-60 bg-white rounded shadow-base">
                  <div class="tx-center mg-b-30" >
                      <h2>Login</h2>
                  </div>
                  <hr style="height:3px;border:none;color:#868ba1;background-color:#868ba1;">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon bg-teal text-white"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                         <input type="text" id="usuario" class="form-control" name="usuario" placeholder="Nombre de usuario">
                    </div>
                  </div><!-- form-group -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon bg-teal text-white"><i class="icon ion-locked tx-16 lh-0 op-6"></i></span>
                        <input type="password" id="contraseña" class="form-control" name="contraseña" placeholder="Contraseña">
                    </div>
                  </div><!-- form-group -->
                  <button type="submit" class="btn btn-teal btn-block" id="login">Ingresar</button>
            </div><!-- login-wrapper -->
          </form>
          <img src="<?php echo base_url();?>assets/images/LogoUp.png" alt="" width="300">
    </div><!-- d-flex -->
    <script src="<?php echo base_url();?>assets/libraries/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/popper.js/popper.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/jqueryValidator/dist/jquery.validate.min.js"></script>
    <!-- Bootbox -->
    <script src="<?php echo base_url();?>assets/libraries/bootbox/bootbox.min.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/bootbox/bootbox.locales.min.js"></script>

    <script>
      $(document).on("ready",main);
      function main()
      {
        $("#login").submit(function(event){
            event.preventDefault();
            var user = $("#usuario").val();
            var pass = $("#contraseña").val();
            if(user=="")
            {
                bootbox.dialog({        
                  message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error de login</h5><p class='mg-b-0 tx-gray'>No has ingresado un nombre de usuario</p></div></div></div></div>",
                  closeButton: true
                });  
            }
            else if(pass=="")
            {
                bootbox.dialog({   
                  message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error de login</h5><p class='mg-b-0 tx-gray'>Nos has ingresado una contraseña </p></div></div></div></div>",    
                  closeButton: true
                  });  
            }
            else
            {
              $.ajax({
                url:$(this).attr("action"),
                type:$(this).attr("method"),
                data:$(this).serialize(),
                success:function(resp){
                  if(resp=="Error")
                  {     
                      bootbox.dialog({        
                      message: "<div align='center'><img src='<?php echo base_url();?>/assets/images/Error.png' width='300'><br><div class='lead bg-danger alert-bordered pd-y-40 text-white container' role='alert' align='center'><div class='d-flex align-items-center justify-content-start'><div><h5 class='mg-b-2 tx-danger text-white'>Error de login</h5><p class='mg-b-0 tx-gray'>Usuario y/o contraseña incorrecta </p></div></div></div></div>",    
                      closeButton: true
                      });  
                  }
                  else
                  {
                    window.location.href = "<?php echo base_url();?>PanelPrincipal/Principal";
                  }
                }
              });
            }
        });
      }
    </script>
  </body>
</html>
