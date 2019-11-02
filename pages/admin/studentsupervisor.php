<?php
session_start();

$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

$attachments=mysqli_query($con,"SELECT * FROM attachmenttype");
$supervisors=mysqli_query($con,"SELECT * FROM supervisor");

$_SESSION['ass']='';
$_SESSION['asf']='';

if(isset($_POST['addsupervisionbtn']))
{
    $supervisor=$_POST['supervisorId'];
    $attachmenttype=$_POST['attachmentId'];
    $studentid=$_POST['suid'];

    $checkifstudentexists=mysqli_query($con,"SELECT * FROM students WHERE studentSUID='$studentid'");
    // $row_cnt = mysqli_num_rows($checkifstudentexists);//if at a student matched the SUID, then this counts 1 row

    if($checkifstudentexists)
      {
        $supervisorassignedcheck=mysqli_query($con,"SELECT * FROM studentsupervisors WHERE stsupAttachmentAutoId='$attachmenttype' AND stsupStudentId='$studentid'");
          // $row_cnt2 = mysqli_num_rows($supervisorassignedcheck);//if the student already assigned supervisor, then this counts 1 row
           if($supervisorassignedcheck)
            {

              $_SESSION['ass']='';
              $_SESSION['asf']=$studentid.' already assigned a supervisor for this attachment';
            }else{
                $insertQuery="INSERT INTO studentsupervisors( stsupAttachmentTypeId,stsupSupervisorId,stsupStudentId) VALUES('$attachmenttype','$supervisor','$studentid')";
                $results=mysqli_query($con, $insertQuery);

                if($results)
                {
                    $_SESSION['ass']='Supervision added ';
                    $_SESSION['asf']='';
                }else{
                    $_SESSION['ass']='';
                    $_SESSION['asf']='Failed to add supervision';
                }
              }
      }else{
         $_SESSION['ass']='';
        $_SESSION['asf']='The Student with SUID: '.$studentid." does not exist";
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
 <?php include '../admin/adminnav.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Attachment Supervision</li>
      </ol>
    </div>

      <?php $success = $_SESSION['ass'];
      $fail = $_SESSION['asf'];
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
                  <div class="form-group col-md-6 col-lg-6">
                      <label for="suid" class="control-label">Student No.*</label>
                      <input type="number" name="suid" class=" form-control" id="suid" required="required">
                  </div>

                <div class="form-group col-md-6 col-lg-6">
                    <label  class="control-label"> Attachment Type *</span></label>
                    <select type="number" name="attachmentId" placeholder="" class=" form-control"  required="required">
                        <option value=""> --Select Attachment--</option>
                        <?php if($attachments)
                            { 
                            while($row=mysqli_fetch_assoc($attachments)){?>
                        <option value="<?php echo $row['attAutoId'];?>"> <?php echo $row['attCode'];?> </option>

                               <?php } }  ?>
                    </select>
                </div>

                <div class="form-group col-md-6 col-lg-6">
                    <label  class="control-label"> Supervisor *</span></label>
                    <select type="text" name="supervisorId" placeholder="" class=" form-control"  required="required">
                        <option value=""> --Select Supervisor--</option>
                        <?php if($supervisors)
                            { 
                            while($row=mysqli_fetch_assoc($supervisors)){?>
                        <option value="<?php echo $row['supervisorAutoId'];?>"> <?php echo $row['supervisorFname']." ".$row['supervisorLname'];?> </option>

                               <?php } }  ?>
                    </select>
                </div>
                
                <div class="form-group col-md-12 col-lg-12">
                <div class="modal-header"></div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit" name="addsupervisionbtn">
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
  </div>
</body>

</html>
