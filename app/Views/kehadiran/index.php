<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-content">
                <div class="card-options">
                    <a href="#modal1"></a>
                    <button href="#modal1" type="button" class="btn btn-success btn-sm" id="btnAdd"">New Data</button>
                </div>
                <form role=" form" method="POST" id="myForm"></form>
                        <table class="display responsive-table datatable-example" id="example">
                            <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Tanggal</th>
                                    <th>Kelas</th>
                                    <th>Jumlah</th>
                                    <th>Masuk</th>
                                    <th>Alpha</th>
                                    <th>Sakit</th>
                                    <th>Ijin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datagrid as $row) : ?>
                                    <tr>
                                        <td><?= $row['key_kehadiran'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['nama_kelas'] ?></td>
                                        <td><?= $row['JUMLAH'] ?></td>
                                        <td><?= $row['MASUK'] ?></td>
                                        <td><?= $row['ALPHA'] ?></td>
                                        <td><?= $row['SAKIT'] ?></td>
                                        <td><?= $row['IJIN'] ?></td>
                                        <td>
                                            <a name="edit" href="#" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="material-icons m-warning">edit</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Data Kehadiran</h4>
        <p></p>
    </div>
    <form class="form-horizontal" role="form" method="post" id="myform">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="row">
                <div class="input-field col s6">
                    <select id="kelas_id" name="kelas_id">
                        <?php foreach ($datakelas as $row): ?>
                            <option value="<?=$row['id_kelas']?>"><?=$row['nama_kelas']?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="kelas_id">Kelas</label>
                </div>
                <div class="input-field col s6">
                    <label for="tanggal">Tanggal</label>
                    <input id="tanggal" type="date" class="datepicker">
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="modal-footer">
        <a href="#!" id="btn_submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Generate</a>
    </div>
</div>
<!-- End Modal -->
<!-- Script -->
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({
            language: {
                searchPlaceholder: 'Search records',
                sSearch: '',
                sLengthMenu: 'Show _MENU_',
                sLength: 'dataTables_length',
                oPaginate: {
                    sFirst: '<i class="material-icons">chevron_left</i>',
                    sPrevious: '<i class="material-icons">chevron_left</i>',
                    sNext: '<i class="material-icons">chevron_right</i>',
                    sLast: '<i class="material-icons">chevron_right</i>' 
                }
            },
            columnDefs: [
                {
                    targets: [ 0 ],
                    visible: false,
                    searchable: false
                }
            ]
        });
        $('.dataTables_length select').addClass('browser-default');

        $("#btn_submit").on("click",function(){
            swal({   
                title: "Are you sure?",
                text: "Generate data?",
                type: "info",
                showCancelButton: true,
                confirmButtonText: "Yes, do it!",
                closeOnConfirm: false,
                closeOnCancel: false 
            }, function(isConfirm){
                if (isConfirm) {
                    data = {'classroomid'   : $("#classroomid").val(),
                            'tanggal'       : $("#tanggal").val()};
                    console.log(data);

                    $.ajax({
                        url: "<?php echo base_url();?>kehadiran/generate",
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        success: function (jsonData) {
                            console.log(jsonData);
                            if (jsonData.responseCode=="200"){
                                swal({
                                    title: "Generate Success",
                                    allowEscapeKey:false,
                                    text: jsonData.responseMsg,
                                    type: "success",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                }, function (isConfirm) {location.href="<?php echo base_url();?>kehadiran/view/"+jsonData.guid});                   
                            }else{
                                swal("Error", jsonData.responseMsg, "error");                    
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown ){
                            swal("Error", errorThrown, "error");
                        }
                    });

                    // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelled", "Save cancelled :)", "error");
                }
            });
        
        });

        $('#example tbody').on( 'click', 'a', function () {
            var data = table.row( $(this).parents('tr') ).data();
            if($(this).attr('name') == "edit"){
                location.href="<?php echo base_url();?>kehadiran/view/" + data[0];
            }
        });
    });
</script>
<!-- End Script -->