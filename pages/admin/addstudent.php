<?php
session_start();

$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

$courses=mysqli_query($con,"SELECT * FROM courses");

$_SESSION['srs']='';
$_SESSION['srf']='';

if(isset($_POST['addstudentbtn']))
{
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $gender=$_POST['gender'];
    $suid=$_POST['suid'];
    $email=$_POST['emailAddress'];
    $pno=$_POST['phoneNumber'];
    $courseid=$_POST['courseId'];

    $pPassword=md5($suid); 


    $insertQuery="INSERT INTO students(studentFname, studentLname, studentPhone, studentGender, studentEmail, studentCourseId,studentSUID, studentPassword) VALUES('$fname','$lname','$pno','$gender','$email','$courseid','$suid','$pPassword')";

    $results=mysqli_query($con, $insertQuery);

    if($results===TRUE)
    {
        $_SESSION['srs']='Student inserted ';
        $_SESSION['srf']='';
    }else{
        $_SESSION['srs']='';
        $_SESSION['srf']='Insert failed';
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
        <li class="breadcrumb-item active">New Student</li>
      </ol>
    </div>

      <?php $success = $_SESSION['srs'];
      $fail = $_SESSION['srf'];
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
                    <label for="firstName" class="control-label">First Name*</label>
                    <input type="text" name="firstName" class="form-control" id="firstName" required="required">
                </div>
                <div class="form-group col-md-6 col-lg-6" >
                    <label for="lastName" class="control-label">Last Name*</label>
                    <input type="text" name="lastName" class="form-control" id="lastName" required="required">
                </div>
                <div class="form-group col-md-6 col-lg-6">
                      <label class="">Gender *</label><br>
                      <label class="radio-inline ">
                          <input type="radio" name="gender" id="gender" value="Male" required="required" autocomplete="off">Male
                      </label>
                      <label class="radio-inline ">
                          <input type="radio" name="gender" id="gender" value="Female" required autocomplete="off">Female
                      </label>
                  </div>
                  <div class="form-group col-md-6 col-lg-6">
                      <label for="suid" class="control-label">Student No.*</label>
                      <input type="text" name="suid" class=" form-control" id="suid" required="required">
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    <label for="phoneNumber" class="control-label"> Current Phone No.*</label>
                    <input type="text" name="phoneNumber" class=" form-control" id="phoneNumber" required="required">
                  </div>
                   <div class="form-group col-md-6 col-lg-6">
                    <label class="control-label"> Student Email*</label>
                    <input type="text" name="emailAddress" placeholder="" class=" form-control" id="emailAddress" required="required">
                </div>

                <div class="form-group col-md-6 col-lg-6">
                    <label  class="control-label"> Courses *</span></label>
                    <select type="text" name="courseId" placeholder="" class=" form-control"  required="required">
                        <option value=""> --Select Course--</option>
                        <?php if($courses)
                            { 
                            while($row=mysqli_fetch_assoc($courses)){?>
                        <option value="<?php echo $row['courseAutoId'];?>"> <?php echo $row['courseCode'];?> </option>

                               <?php } }  ?>
                    </select>
                </div>
                
                <div class="form-group col-md-12 col-lg-12">
                <div class="modal-header"></div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit" name="addstudentbtn">
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
