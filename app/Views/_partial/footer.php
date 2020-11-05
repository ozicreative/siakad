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

<script type="text/javascript">
    $(document).ready(function() {
        $("#table1").DataTable({});

        $('[data-toggle="modal"]').tooltip()

        $("#btn_submit").on("click", function() {
            swal({
                title: "Are you sure?",
                text: "Generate data?",
                type: "info",
                showCancelButton: true,
                confirmButtonText: "Yes, do it!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    data = {
                        'kelasid': $("#kelasid").val(),
                        'tanggal': $("#tanggal").val()
                    };
                    console.log(data);

                    $.ajax({
                        url: "<?php echo base_url(); ?>kehadiran/generate",
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        success: function(jsonData) {
                            console.log(jsonData);
                            if (jsonData.responseCode == "200") {
                                swal({
                                    title: "Generate Success",
                                    allowEscapeKey: false,
                                    text: jsonData.responseMsg,
                                    type: "success",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                }, function(isConfirm) {
                                    location.href = "<?php echo base_url(); ?>kehadiran/view/" + jsonData.key_kehadiran
                                });
                            } else {
                                swal("Error", jsonData.responseMsg, "error");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal("Error", errorThrown, "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Save cancelled :)", "error");
                }
            });
        });

        $('#table1 tbody').on('click', 'a', function() {
            var data = table.row($(this).parents('tr')).data();
            if ($(this).attr(nama_kelas) == "edit") {
                location.href = "<?php echo base_url(); ?>kehadiran/view/" + data[0];
            }
        });
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