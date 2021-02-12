<body>
<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><img src="<?php echo base_url();?>assets/images/LogoUp.png" alt="" width="50"><img src="<?php echo base_url();?>assets/images/Titulo.png" alt="" width="120"></div>
<div class="br-sideleft overflow-y-auto">
  <label class="sidebar-label pd-x-15 mg-t-20">Modulos disponibles</label>
  <div class="br-sideleft-menu">
    <a href="<?php echo base_url();?>PanelPrincipal/Principal" class="br-menu-link active">
      <div class="br-menu-item">
        <i class="fa fa-cogs tx-20"></i>
        <span class="menu-item-label">Gestion de prestamos</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <a href="<?php echo base_url();?>Periodicos/Periodicos" class="br-menu-link">
      <div class="br-menu-item">
        <i class="fa fa-newspaper-o tx-20"></i>
        <span class="menu-item-label">Catalogo de periodicos</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <a href="<?php echo base_url();?>Libros/Libros" class="br-menu-link">
      <div class="br-menu-item">
        <i class="fa fa-book tx-20"></i>
        <span class="menu-item-label">Catalogo de libros</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="fa fa-bar-chart tx-20"></i>
        <span class="menu-item-label">Indicadores</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="<?php echo base_url();?>Indicadores/Prestamos" class="nav-link">Registro de prestamos</a></li>
      <li class="nav-item"><a href="<?php echo base_url();?>Indicadores/Graficos" class="nav-link">Estadisticas</a></li>
    </ul>
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Mantenimiento</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="<?php echo base_url();?>Mantenimiento/Categorias" class="nav-link">Categorias de libros</a></li>
      <li class="nav-item"><a href="<?php echo base_url();?>Mantenimiento/Tipos" class="nav-link">Tipos de libros</a></li>
      <li class="nav-item"><a href="<?php echo base_url();?>Mantenimiento/Usuarios" class="nav-link">Usuarios del sistema</a></li>
    </ul>
  </div><!-- br-sideleft-menu -->
<!-- ########## END: LEFT PANEL ########## -->
