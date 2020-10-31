</div>
</div>
</div>
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>

<footer class="main-footer">
    <strong>Copyright © 2018-<?= date('Y')  ?> <a href="<?php echo base_url('/'); ?>">SMK Wahid Hasyim</a>.</strong>
</footer>
</div>

<!-- Sweet Alert2 -->
<script src="<?php echo base_url('assets/template/plugins'); ?>/sweetalert2/sweetalert2.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url('assets/template/plugins'); ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/template/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/'); ?>/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function() {
        $("#table1").DataTable({});
        $('[data-toggle="modal"]').tooltip()
    });
</script>
<!-- Alert -->
<script>
    window.setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function() {
            $(this).btnhapus();
        });
    }, 10000);
</script>
<!-- Active -->
<script>
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
<!-- .Active -->
</body>

</html>