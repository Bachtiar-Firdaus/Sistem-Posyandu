
   <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

      <!--  content -->
        <div class="content-wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">KELOLA KMS</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
 <section class="container-fluid" style="overflow-y: auto; overflow-x: scroll;">
    <div class="dropdown">
<!--         <a href="<?php echo site_url() ?>/admin_controller/tambah_info_desa" style="float: left; margin-bottom: 10px;"
            class=" btn btn-primary">Tambah</a> -->
<!-- 
<button class="btn btn-success" onclick="add_m_kd()"><i class="glyphicon glyphicon-plus"></i> TAMBAH USER</button> -->
<button class="btn btn-default" id="btnn2" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> REFRESH</button>
</div>  <br />

        <table id="table" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>NAMA</th>
                    <th>JK</th>
                    <th>ALAMAT</th>
                    <th>NOHP</th>
                    <th>KATEGORI</th>
                    <th>UMUR BULAN</th>
                    <th>TANGGAL KMS</th>
                    <th>BERAT BADAN</th>
                    <th>KELUHAN</th>
                    <th>TINDAKAN</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>

            <tbody>
            </tbody>

            <tfoot>
            <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
            </tr>
            </tfoot>

        </table><br><br>



                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- akhir content -->
 
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin_controller/ajax_list2')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_m_kd()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('TAMBAH USER'); // Set Title to Bootstrap modal title

    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload Photo'); // label photo upload
}

function edit_m_kd(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin_controller/ajax_edit2')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            '','','','',
            $('[name="no"]').val(data.no);
            $('[name="tanggal"]').val(data.tanggal);
            $('[name="nama"]').val(data.nama);
            $('[name="jk"]').val(data.jk);
            $('[name="alamat"]').val(data.alamat);
            $('[name="nohp"]').val(data.nohp);
            $('[name="kategori"]').val(data.kategori);
            $('[name="umur_b"]').val(data.umur_b);
            $('[name="umur_h"]').val(data.umur_h);
            $('[name="tanggal_kms"]').val(data.tanggal_kms);
            $('[name="berat_badan"]').val(data.berat_badan);
            $('[name="keluhan"]').val(data.keluhan);
            $('[name="tindakan"]').val(data.tindakan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit USER'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('admin_controller/ajax_add2')?>";
    } else {
        url = "<?php echo site_url('admin_controller/ajax_update2')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_m_kd(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin_controller/ajax_delete2')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script> 

<!-- Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="no"/> 

                <div class="form-group" >

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> NO</label>
                            <div class="col-md-7">
                                <input readonly name="no" placeholder="NOMOR DITENTUKAN SISTEM" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> TANGGAL</label>
                            <div class="col-md-7">
                                <input readonly name="tanggal" placeholder="masukan TANGGAL" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> NAMA</label>
                            <div class="col-md-7">
                                <input readonly name="nama" placeholder="masukan NAMA" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> JENIS KELAMIN</label>
                            <div class="col-md-7">
                                <input readonly name="jk" placeholder="masukan JENIS KELAMIN" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> ALAMAT</label>
                            <div class="col-md-7">
                                <input readonly name="alamat" placeholder="masukan ALAMAT" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> NO HP</label>
                            <div class="col-md-7">
                                <input readonly name="nohp" placeholder="masukan NO HP" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>


                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> KATEGORI</label>
                            <div class="col-md-7">
                                <input readonly name="kategori" placeholder="masukan KATEGORI" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>


                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> UMUR BULAN</label>
                            <div class="col-md-7">
                                <input readonly name="umur_b" placeholder="masukan UMUR BULAN" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>



                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> TANGGAL KMS</label>
                            <div class="col-md-7">
                                <input name="tanggal_kms" placeholder="masukan TANGGAL" class="form-control" type="date">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> BERAT BADAN</label>
                            <div class="col-md-7">
                                <input name="berat_badan" placeholder="masukan BERAT BADAN" class="form-control" type="number">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> KELUHAN</label>
                            <div class="col-md-7">
                                <input name="keluhan" placeholder="masukan KELUHAN" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;"> TINDAKAN</label>
                            <div class="col-md-7">
                                <input name="tindakan" placeholder="masukan TINDAKAN" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <!-- /.input group -->
                        <div class="row">
                            <div class="col-md-12">
                                
                                <button type="button" onclick="reset()" class="btn btn-danger">Batal</button>
                                <button type="button" id="btnSave" onclick="save()" style="margin-right: 10;" class="btn btn-success">Simpan</button>
                            </div>
                            <!-- /.col-->
                        </div>



                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->    



        

  </section>


</div>

