<!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo $this->session->userdata('Nombre')." ".$this->session->userdata('Apellidos');?></span>
              <img src="http://localhost/UpraviBlio/assets/images/<?php if($this->session->userdata('Sexo')=="H"){echo "IconH.png";} else{echo "IconM.png";}?>" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="<?php echo base_url();?>Login/Login/salir"><i class="icon ion-power"></i>Cerrar sesion</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    </div>
    <!-- ########## END: HEAD PANEL ########## -->
