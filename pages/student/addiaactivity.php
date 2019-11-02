<?php
session_start();

$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

$_SESSION['ias']='';
$_SESSION['iaf']='';

if(isset($_POST['addiadailybtn']))
{
    $iaDate=$_POST['iaDate'];
    $iaDescription=$_POST['iaDescription'];
    $studentId=$_SESSION['username'];



    $insertQuery="INSERT INTO iaDailyactivities(iaDailyDate, iaActivities,iaStudentId) VALUES('$iaDate','$iaDescription','$studentId')";

    $results=mysqli_query($con, $insertQuery);

    if($results===TRUE)
    {
        $_SESSION['ias']='Activity inserted ';
        $_SESSION['iaf']='';
    }else{
        $_SESSION['ias']='';
        $_SESSION['iaf']='Insert failed '.$studentId;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Attachment</title>
  <!-- Bootstrap core CSS--><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="http://localhost/attachment/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->

  <link href="http://localhost/attachment/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="http://localhost/attachment/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="http://localhost/attachment/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav " id="page-top">
 <?php include '../student/studentnav.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">New IA Activity</li>
      </ol>
    </div>

      <?php $success = $_SESSION['ias'];
      $fail = $_SESSION['iaf'];
      if ($success!="" && $fail==""){ echo '
      <div class="messagebox alert alert-success" style="display: block">
              <button type="button" class="close" data-dismiss="alert">*</button>
              <div class="cs-text">
                  <i class="fa fa-check"></i>
                  <strong><span>';echo $success; echo '</span></strong>
              </div> 
      </div>';}else if($success=="" && $fail!=""){ echo '
      <div class="messagebox alert alert-danger" style="display: block">
              <button type="button" class="close" data-dismiss="alert">*</button>
              <div class="cs-text">
                  <i class="fa fa-close"></i>
                  <strong><span>';echo $fail; echo '</span></strong>
              </div> 
      </div>';}else if($success=="" && $fail==""){ echo '<div></div>';}?>
                                
    <form role="form" id="student_registration" method="post" action="">
            <div class="col-md-12" >
                 <div class="form-group col-md-6 col-lg-6" >
                    <label class="control-label">IA Activity Date*</label>
                    <input type="text" name="iaDate" class="form-control" required="required" id="iaDate">
                </div>
                <div class="form-group col-md-12 col-lg-12" >
                    <label  class="control-label">IA Activities*</label>
                    <textarea style="height: 200px;" type="text" name="iaDescription" class="form-control"  required="required"></textarea>
                </div>
                <div class="form-group col-md-12 col-lg-12">
                <div class="modal-header"></div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit" name="addiadailybtn">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </div>
        </form>
  </div>
    <!-- Bootstrap core JavaScript-->
    <script src="http://localhost/attachment/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/attachment/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="http://localhost/attachment/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="http://localhost/attachment/vendor/datatables/jquery.dataTables.js"></script>
    <script src="http://localhost/attachment/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="http://localhost/attachment/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="http://localhost/attachment/js/sb-admin-datatables.min.js"></script>
     <script src="http://localhost/kangeta/assets/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('#iaDate').datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true,
        calendarWeeks: false
        });
    </script>
</body>

</html>
