</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Sisinfo</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/dist/js/app.min.js') ?>" type="text/javascript"></script>
<!-- Datatables Js -->
<!-- <script src="<?php echo base_url('assets/js/jquery-3.3.1.js') ?>"></script> -->
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/buttons.flash.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/select2/js/select2.min.js') ?>"></script>

<script src="<?php echo base_url('assets/datatables/buttons.print.min.js') ?>"></script><script src="<?php echo base_url('assets/datatables/dataTables.select.min.js') ?>"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
                $("#mytable2").dataTable( {
			        dom: 'Bfrtip',
			        buttons: [			            
			            {
			                extend: 'excel',
			                title: 'Proposal'
			               
			            },
			        ],
			        select: true
			    } );
			    $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
</script>