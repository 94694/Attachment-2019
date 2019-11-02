<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Attachment</title>
  <!-- Bootstrap core CSS-->
  <link href="http://localhost/attachment/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="http://localhost/attachment/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="http://localhost/attachment/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="http://localhost/attachment/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <?php include '../admin/adminnav.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Home</li>
      </ol>
       <div class="row">
                <div class="col-md-12">
                     <a class="btn btn-primary btn-s" href="http://localhost/attachment/pages/admin/addstudent.php"><span class="fa fa-plus-circle"></span>&nbsp;Add Students</a>
                    <br><br>
                    <table  class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Full Name</th>
                                <th class="text-center">SUID</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Action</th>
                             </tr>
                        </thead>
                        <tbody >
                            <tr>
                                <td class="text-left">Serah Mwangi</td>
                                <td class="text-left">94694</td>
                                <td class="text-left">079200421</td>
                                <td class="text-center"><button class="btn btn-warning fa fa-eye"> View </button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
            </div>
    </div>
    
  </div>
    <!-- Bootstrap core JavaScript-->
    <script src="http://localhost/attachment/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/attachment/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="http://localhost/attachment/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="http://localhost/attachment/vendor/chart.js/Chart.min.js"></script>
    <script src="http://localhost/attachment/vendor/datatables/jquery.dataTables.js"></script>
    <script src="http://localhost/attachment/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="http://localhost/attachment/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="http://localhost/attachment/js/sb-admin-datatables.min.js"></script>
    <script src="http://localhost/attachment/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
