<?php
session_start();

$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

$courses=mysqli_query($con,"SELECT * FROM courses");

   // var_dump(mysqli_fetch_assoc($courses));

if(isset($_POST['editprofile']))//if submit button called edit is clicked, 
{
    $studentid=$_POST['ssuid'];

    //query to select specific student
    $studentQ="SELECT students.studentFname,students.studentAutoId, students.studentLname,students.studentSUID,students.studentPhone,students.studentEmail,students.studentGender,students.studentCourseId, courses.courseCode FROM students join courses on students.studentCourseId=courses.courseAutoId  WHERE studentAutoId='$studentid'";

    //query the db 
    $students=mysqli_query($con,$studentQ);
} else
  {
    $students="";
  }


$_SESSION['spus']='';
$_SESSION['spuf']='';

if(isset($_POST['updateprofilebtn']))
{
     $studentPID=$_POST['studentAutoId'];
     $fname=$_POST['firstName'];
     $lname=$_POST['lastName'];
     $gender=$_POST['gender'];
     $email=$_POST['emailAddress'];
     $pno=$_POST['phoneNumber'];

    $updateQ="UPDATE students SET studentFname='$fname',studentLname='$lname',studentGender='$gender',studentPhone='$pno', studentEmail='$email' WHERE studentAutoId='$studentPID' ";

     $results=mysqli_query($con,$updateQ);

    $affectedRows=mysqli_affected_rows($con);
    if($affectedRows>0)
        {
            $_SESSION['spus']='Profile update success';
            $_SESSION['spuf']='';
        }else{
            $_SESSION['spus']='';
            $_SESSION['spuf']='No changes made to profile';
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
        <li class="breadcrumb-item active">My Profile Update</li>
      </ol>
    </div>

      <?php $success = $_SESSION['spus'];
      $fail = $_SESSION['spuf'];
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
                                
    <form role="form" method="post" action="">
       <?php if($students)
          {  
            //while loop through returned data
            while($row=mysqli_fetch_assoc($students))
                  {  ?>
            <div class="col-md-12" >
                <div class="form-group col-md-6 col-lg-6" hidden="true">
                      <label class="control-label">Student PID.*</label>
                      <input type="text" name="studentAutoId" class=" form-control" id="suid" required="required" value="<?php echo $row['studentAutoId'] ; ?>">
                  </div>
                 <div class="form-group col-md-6 col-lg-6" >
                    <label for="firstName" class="control-label">First Name*</label>
                    <input type="text" name="firstName" class="form-control" id="firstName" required="required" value="<?php echo $row['studentFname'] ; ?>">
                </div>
                <div class="form-group col-md-6 col-lg-6" >
                    <label for="lastName" class="control-label">Last Name*</label>
                    <input type="text" name="lastName" class="form-control" id="lastName" required="required" value="<?php echo $row['studentLname'] ; ?>">
                </div>
                <?php $gen= $row['studentGender'] ;if($gen=="Female"){
                  echo '<div class="form-group col-md-6 col-lg-6">
                      <label class="">Gender *</label><br>
                      <label class="radio-inline ">
                          <input type="radio" name="gender" id="gender" value="Male" required="required" autocomplete="off">Male
                      </label>
                      <label class="radio-inline ">
                          <input type="radio" name="gender" id="gender" value="Female" required autocomplete="off" checked="checked">Female
                      </label>
                  </div>';}else{
                  echo '<div class="form-group col-md-6 col-lg-6">
                      <label class="">Gender *</label><br>
                      <label class="radio-inline ">
                          <input type="radio" name="gender" id="gender" value="Male" required="required" autocomplete="off" checked="checked">Male
                      </label>
                      <label class="radio-inline ">
                          <input type="radio" name="gender" id="gender" value="Female" required autocomplete="off" >Female
                      </label>
                  </div>';}?>
                  
                  <div class="form-group col-md-6 col-lg-6">
                      <label for="suid" class="control-label">Student No.*</label>
                      <input type="text" name="suid" class=" form-control" id="suid" required="required" value="<?php echo $row['studentSUID'] ; ?>" disabled="true">
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    <label for="phoneNumber" class="control-label"> Current Phone No.*</label>
                    <input type="text" name="phoneNumber" class=" form-control" id="phoneNumber" required="required" value="<?php echo $row['studentPhone'] ; ?>">
                  </div>
                   <div class="form-group col-md-6 col-lg-6">
                    <label class="control-label"> Student Email*</label>
                    <input type="text" name="emailAddress" placeholder="" class=" form-control" id="emailAddress" required="required" value="<?php echo $row['studentEmail'] ; ?>">
                </div>

                <div class="form-group col-md-6 col-lg-6">
                    <label  class="control-label"> Courses *</span></label>
                    <select type="text" name="courseId" placeholder="" class=" form-control"  required="required" disabled="true">

                        <option value="<?php echo $row['studentCourseId'] ; ?>"><?php echo $row['courseCode'] ; ?></option>
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
                    <input type="submit" class="btn btn-primary" value="Submit" name="updateprofilebtn">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </div>
            <?php }} ?>
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
