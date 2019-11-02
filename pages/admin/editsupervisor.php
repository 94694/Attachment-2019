<?php
session_start();

$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

$faculties=mysqli_query($con,"SELECT * FROM faculties");

if(isset($_POST['editsupervisor']))//if submit button called editsupervisor is clicked, 
{
    $supervisorid=$_POST['supsuid'];

    //query to select specific supervisor
   $supervisorQuery="SELECT supervisor.supervisorFname,supervisor.supervisorAutoId, supervisor.supervisorLname,supervisor.supervisorSUID,supervisor.supervisorPhone,supervisor.supervisorEmail, supervisor.supervisorGender,faculties.facultyCode FROM supervisor join faculties on supervisor.supervisorFacultyId=faculties.facultyAutoId  WHERE supervisorAutoId='$supervisorid'";

    //query the db 
    $supervisors=mysqli_query($con,$supervisorQuery);
} else
  {
    $supervisors="";
  }


$_SESSION['sups']='';
$_SESSION['supf']='';

if(isset($_POST['updatesupervisorbtn']))
{
    $supervisorPID=$_POST['supervisorAutoId'];
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $gender=$_POST['gender'];
    $suid=$_POST['suid'];
    $email=$_POST['emailAddress'];
    $pno=$_POST['phoneNumber'];
    $facultyId=$_POST['facultyId'];

    $updateQ="UPDATE supervisor SET supervisorFname='$fname',supervisorLname='$lname',supervisorSUID='$suid',supervisorGender='$gender',supervisorPhone='$pno', supervisorEmail='$email',supervisorFacultyId='$facultyId' WHERE supervisorAutoId='$supervisorPID' ";

     $results=mysqli_query($con,$updateQ);

    $affectedRows=mysqli_affected_rows($con);
    if($affectedRows>0)
        {
            $_SESSION['sups']='Update success';
            $_SESSION['supf']='';
        }else{
            $_SESSION['sups']='';
            $_SESSION['supf']='No changes';
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
        <li class="breadcrumb-item active">Update Supervisor</li>
      </ol>
    </div>

      <?php $success = $_SESSION['sups'];
      $fail = $_SESSION['supf'];
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
       <?php if($supervisors)
          {  
            //while loop through returned data
            while($row=mysqli_fetch_assoc($supervisors))
                  {  ?>
            <div class="col-md-12" >
                <div class="form-group col-md-6 col-lg-6" hidden="true">
                      <label class="control-label">supervisor PID.*</label>
                      <input type="text" name="supervisorAutoId" class=" form-control" id="suid" required="required" value="<?php echo $row['supervisorAutoId'] ; ?>">
                  </div>
                 <div class="form-group col-md-6 col-lg-6" >
                    <label for="firstName" class="control-label">First Name*</label>
                    <input type="text" name="firstName" class="form-control" id="firstName" required="required" value="<?php echo $row['supervisorFname'] ; ?>">
                </div>
                <div class="form-group col-md-6 col-lg-6" >
                    <label for="lastName" class="control-label">Last Name*</label>
                    <input type="text" name="lastName" class="form-control" id="lastName" required="required" value="<?php echo $row['supervisorLname'] ; ?>">
                </div>
                <?php $gen= $row['supervisorGender'] ;if($gen=="Female"){
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
                      <label for="suid" class="control-label">Supervisor No.*</label>
                      <input type="text" name="suid" class=" form-control" id="suid" required="required" value="<?php echo $row['supervisorSUID'] ; ?>" readonly="true">
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    <label for="phoneNumber" class="control-label"> Current Phone No.*</label>
                    <input type="text" name="phoneNumber" class=" form-control" id="phoneNumber" required="required" value="<?php echo $row['supervisorPhone'] ; ?>">
                  </div>
                   <div class="form-group col-md-6 col-lg-6">
                    <label class="control-label"> Supervisor Email*</label>
                    <input type="text" name="emailAddress" placeholder="" class=" form-control" id="emailAddress" required="required" value="<?php echo $row['supervisorEmail'] ; ?>">
                </div>

                <div class="form-group col-md-6 col-lg-6">
                    <label  class="control-label"> Faculty *</span></label>
                    <select type="text" name="facultyId" placeholder="" class=" form-control"  required="required">
                        <option value="<?php echo $row['supervisorFacultyId'];?>"><?php echo $row['facultyCode'];?></option>
                        <?php if($faculties)
                            { 
                            while($row=mysqli_fetch_assoc($faculties)){?>
                        <option value="<?php echo $row['facultyAutoId'];?>"> <?php echo $row['facultyCode'];?> </option>

                               <?php } }  ?>
                    </select>
                </div>
                
                
                <div class="form-group col-md-12 col-lg-12">
                <div class="modal-header"></div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit" name="updatesupervisorbtn">
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
