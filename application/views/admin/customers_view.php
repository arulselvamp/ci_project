<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customers List</title>

<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>

<style>
.body { font-family: 'Open Sans', sans-serif;font-size: 16px;}
.table,.h5,.ol { font-family: 'Open Sans', sans-serif;font-size: 14px;}
    .center {
                          display: block;
                          margin-left: auto;
                          margin-right: auto;
                          
                        }
    ol.breadcrumb {
            border:1px solid;
            border-color:#253B80;       
         }

    </style>

  </head>

  <body id="page-top">
    <?php
                $user = $this->session->userdata('admin_user');
                extract($user);
            ?>


    <div id="wrapper">

      <!-- Sidebar -->
    <?php include APPPATH.'views/admin/includes/sidebar3.php';?>

      <div id="content-wrapper">

        <?php include APPPATH.'views/admin/includes/header3.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            
            <li class="breadcrumb-item">
              <strong><a href="<?php echo site_url('Dashboard'); ?>">Home</a></strong>
            </li>
            <li class="breadcrumb-item active"><strong>Customers List</strong></li>

          </ol>
          <!-- Icon Cards-->
          <div class="row">
                <div class="container">
        
        <center><h5>Customers List</h5></center>
        <!-- <button class="btn btn-primary btn-sm" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Customer</button><br> -->
        <br />
        <table id="table" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
            <thead> 
                <tr>                 
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Phone</th>
                    <th>Customer Address</th>
                    <th style="width:125px;">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
        </table>
    </div>

    <script src="<?php echo base_url('bootstrap/jquery2/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap/bootstrap2/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap/datatables2/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap/datatables2/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('bootstrap/bootstrap-datepicker2/js/bootstrap-datepicker.min.js')?>"></script>

<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/Customers/ajax_list')?>",
            "type": "POST",
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
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
 
 
 
function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Student'); // Set Title to Bootstrap modal title
}
 
function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/Customers/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="customer_id"]').val(data.customer_id);
            $('[name="fname"]').val(data.fname);
            $('[name="lname"]').val(data.lname);
            $('[name="email"]').val(data.email);
            $('[name="mob"]').val(data.mob);
            $('[name="address"]').val(data.address);
            
            $('#modal_form3').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Student'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function display_person(id)
{
    save_method = 'display';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/Customers/ajax_display/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $('[name="customer_id"]').val(data.customer_id);
            $('[name="fname"]').val(data.fname);
            $('[name="lname"]').val(data.lname);
            $('[name="email"]').val(data.email);
            $('[name="mob"]').val(data.mob);
            $('[name="address"]').val(data.address);
     
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Display Student'); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('admin/Customers/ajax_add')?>";
    } else {
        url = "<?php echo site_url('admin/Customers/ajax_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
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
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]).css("color", "red"); //select span help-block class set text error string
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

function save2()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('admin/Customers/ajax_add')?>";
    } else {
        url = "<?php echo site_url('admin/Customers/ajax_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form3').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form3').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]).css("color", "red"); //select span help-block class set text error string
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
 
function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/Customers/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            data:{id:id},
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Department has in Users records, Students records and marks records. Cannot delete now. Please delete the dependent records first and then try.');
            }
        });
 
    }
}
 
</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h3>Add Customer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                       
                        <div class="form-group">
                        <div class="row">   
                            <div class="col-md-4">
                                <label class="form-group">Customer First Name</label>
                            </div>                         
                            <div class="col-md-8">
                                <input name="fname" placeholder="Enter Customer First Name" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Last Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="dept_name" placeholder="Enter Customer Last Name" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div> 

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Email ID</label>
                            </div>
                            <div class="col-md-8">
                                <input name="email" placeholder="Enter Email ID" class="form-control" type="email" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>                       

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Phone Number</label>
                            </div>
                            <div class="col-md-8">
                                <input name="mob" placeholder="Enter Customer Phone Number" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>  

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Address</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="address" cols=50 rows=4 class="form-control"></textarea><input type="text" name="customer_id">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>  

                    </div>
                </form>                

            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_form2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h3>Display Customer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <center>
            <div class="modal-body form">            

                <form action="#" id="form2" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        
                        <div class="form-group">
                        <div class="row">   
                            <div class="col-md-4">
                                <label class="form-group">Customer First Name</label>
                            </div>                         
                            <div class="col-md-8">
                                <input name="fname" placeholder="Enter Customer First Name" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Last Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="dept_name" placeholder="Enter Customer Last Name" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div> 

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Email ID</label>
                            </div>
                            <div class="col-md-8">
                                <input name="email" placeholder="Enter Email ID" class="form-control" type="email" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>                       

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Phone Number</label>
                            </div>
                            <div class="col-md-8">
                                <input name="mob" placeholder="Enter Customer Phone Number" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>  

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Address</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="address" cols=50 rows=4 class="form-control" disabled></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>    

                    </div>
                </form>              

            </div></center>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_form3" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h3>Edit Customer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <center>
            <div class="modal-body form">
                <form action="#" id="form3" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                                            
                        <div class="form-group">
                        <div class="row">   
                            <div class="col-md-4">
                                <label class="form-group">Customer First Name</label>
                            </div>                         
                            <div class="col-md-8">
                                <input name="fname" placeholder="Enter Customer First Name" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Last Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="lname" placeholder="Enter Customer Last Name" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div> 

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Email ID</label>
                            </div>
                            <div class="col-md-8">
                                <input name="email" placeholder="Enter Email ID" class="form-control" type="email" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>                       

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Phone Number</label>
                            </div>
                            <div class="col-md-8">
                                <input name="mob" placeholder="Enter Customer Phone Number" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>  

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Customer Address</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="address" cols=50 rows=4 class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>   
                        <input type="hidden" name="customer_id">                          

                    </div>
                </form>                

            </div></center>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save2()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
   <?php include APPPATH.'views/admin/includes/footer2.php';?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="<?php //echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/chart-area-demo.js'); ?>"></script>

  </body>

</html>
