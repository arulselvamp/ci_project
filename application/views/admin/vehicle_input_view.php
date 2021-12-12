<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vehicle Input</title>

<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<style>
.body { font-family: 'Open Sans', sans-serif;font-size: 14px;}
    .center {
                          display: block;
                          margin-left: auto;
                          margin-right: auto;
                          
                        }
        ol.breadcrumb {
            border:1px solid;
            border-color:#253B80;       
         }
            body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-image: url("https://i.imgur.com/GMmCQHC.png");
    background-repeat: no-repeat;
    background-size: 100% 100%
}

.card {
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
}

.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}

input,
textarea,
button {
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    cursor: pointer
}

.btn-block:hover {
    color: #fff !important
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}
    </style>
    <script>
    $(document).ready(function(){
        $('input').tooltip();
        $('select').tooltip();
        $('textarea').tooltip();
    });
    </script>

  </head>

  <body id="page-top">
    <?php
                $auser = $this->session->userdata('admin_user');
                extract($auser);
            ?>
            <!-- <?php //include APPPATH.'views/admin/includes/header3.php';?> -->

    <div id="wrapper">

      <!-- Sidebar -->
    <?php include APPPATH.'views/admin/includes/sidebar3.php';?>

      <div id="content-wrapper">

        <?php include APPPATH.'views/admin/includes/header3.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            
            <li class="breadcrumb-item">
              <strong><a href="#">Home</a></strong>
            </li>
            <li class="breadcrumb-item active"><strong>Vehicle Input</strong></li>

          </ol>
          <!-- Icon Cards-->
          <div class="row">
              <div class="col-1"></div>
              <div class="col-10 form-border">
                  <div class="container">
                
                       <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
          
            <div class="card">
                <h5 class="text-center mb-4">Vehicle Input</h5>
                <form class="form-card" method="post" action="<?= base_url('admin/Vehicles/vehicle_input')?>" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Select Customer<span class="text-danger"> *</span></label> 
                            <select name="customer_id" id="customer_id" class="form-control" data-placement="bottom" title="Select Customer" required>
                      <option value="">Select Customer</option>
                       <?php  
                        $sql ="SELECT customer_id,fname,lname FROM customers";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {                              
                          foreach ($query->result() as $row) {
                            ?>
                             <option value="<?php echo $row->customer_id;?>-<?php echo $row->fname;?>-<?php echo $row->lname;?>" ><?php echo $row->customer_id;?>-<?php echo $row->fname;?>-<?php echo $row->lname;?></option>
                        <?php }  
                        }                
                        ?>
                     </select>
                         </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Vehicle Name<span class="text-danger"> *</span></label> <input type="text" id="vname" name="vname" placeholder="" onblur="validate(3)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Vehicle Model<span class="text-danger"> *</span></label> <input type="text" id="vmodel" name="vmodel" placeholder="" onblur="validate(4)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-6">Vehicle VIN<span class="text-danger"> *</span></label> <input type="text" id="vvin" name="vvin" placeholder="" onblur="validate(4)" required></div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <input type="submit" class="btn-block btn-primary" value="Save" name="submit"/> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

              </div>
              </div>
          </div>
          <br>
          

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
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
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
<script>
  function validate(val) {
v1 = document.getElementById("fname");
v2 = document.getElementById("lname");
v3 = document.getElementById("email");
v4 = document.getElementById("mob");
v5 = document.getElementById("job");
v6 = document.getElementById("ans");

flag1 = true;
flag2 = true;
flag3 = true;
flag4 = true;
flag5 = true;
flag6 = true;

if(val>=1 || val==0) {
if(v1.value == "") {
v1.style.borderColor = "red";
flag1 = false;
}
else {
v1.style.borderColor = "green";
flag1 = true;
}
}

if(val>=2 || val==0) {
if(v2.value == "") {
v2.style.borderColor = "red";
flag2 = false;
}
else {
v2.style.borderColor = "green";
flag2 = true;
}
}
if(val>=3 || val==0) {
if(v3.value == "") {
v3.style.borderColor = "red";
flag3 = false;
}
else {
v3.style.borderColor = "green";
flag3 = true;
}
}
if(val>=4 || val==0) {
if(v4.value == "") {
v4.style.borderColor = "red";
flag4 = false;
}
else {
v4.style.borderColor = "green";
flag4 = true;
}
}
if(val>=5 || val==0) {
if(v5.value == "") {
v5.style.borderColor = "red";
flag5 = false;
}
else {
v5.style.borderColor = "green";
flag5 = true;
}
}
if(val>=6 || val==0) {
if(v6.value == "") {
v6.style.borderColor = "red";
flag6 = false;
}
else {
v6.style.borderColor = "green";
flag6 = true;
}
}

flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

return flag;
}
</script>