 <!-- ########## END: MAIN PANEL ########## -->

 <script src="<?php echo base_url();?>/assets/libraries/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/popper.js/popper.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/jqueryUI/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/moment/moment.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/peity/jquery.peity.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/d3/d3.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/bootstrap-tagsinput/typeahead.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/bootstrap-tagsinput/bloodhound.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/rickshaw/rickshaw.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/datatables/jquery.dataTables.js"></script>

    <script src="<?php echo base_url();?>/assets/libraries/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/datatables/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/datatables/buttons.print.min.js"></script>

    <script src="<?php echo base_url();?>/assets/libraries/datatables-responsive/dataTables.responsive.js"></script>

    <script src="<?php echo base_url();?>/assets/libraries/js/bracket.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/js/ResizeSensor.js"></script>
    <script src="<?php echo base_url();?>/assets/libraries/js/dashboard.js"></script>
    <!-- Bootbox -->
    <script src="<?php echo base_url();?>assets/libraries/bootbox/bootbox.min.js"></script>
    <script src="<?php echo base_url();?>assets/libraries<?php echo base_url();?>assets/libraries/bootbox/bootbox.locales.min.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/datalist/jquery.flexdatalist.min.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/chart.js/Chart.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/FileSaver/dist/FileSaver.min.js"></script>
    <script src="<?php echo base_url();?>assets/libraries/CanvasToBlob/js/canvas-to-blob.min.js"></script>
  
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
  </body>
</html>
