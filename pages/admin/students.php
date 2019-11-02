<?php
session_start();
//connect to localhost and database
$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

$userSUID=$_SESSION['username'];

//query to select all students from database
$studentsQuery="SELECT students.studentFname,students.studentAutoId, students.studentLname,students.studentSUID,students.studentPhone,students.studentEmail,courses.courseCode FROM students join courses on students.studentCourseId=courses.courseAutoId ";

//query the db with mysqli
$students=mysqli_query($con,$studentsQuery);

//initialize session variables
$_SESSION['studentdeletesuccess']='';
$_SESSION['studentdeletefail']='';

if(isset($_POST['deletestudent']))//if submit button called ustudentatepriest is clicked, 
{
    $studentAID=$_POST['ssuid'];

    $deleteQuery="DELETE FROM students WHERE studentAutoId='$studentAID'";

    $delstate=mysqli_query($con, $deleteQuery);

    $affectedRows=mysqli_affected_rows($con);
        if($affectedRows>0)
        {
            $_SESSION['studentdeletesuccess']='Student deleted success';
            $_SESSION['studentdeletefail']='';
        }else{
            $_SESSION['studentdeletesuccess']='';
            $_SESSION['studentdeletefail']='Could not delete student';
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
        <li class="breadcrumb-item active">Students</li>
      </ol>
       <div class="row">
                <div class="col-md-12">
                  <?php $success = $_SESSION['studentdeletesuccess'];
                  $fail = $_SESSION['studentdeletefail'];
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
                    <table  class="table table-bordered" id="students">
                        <thead>
                            <tr>
                                <th class="text-center">STUDENT NAME</th>
                                <th class="text-center">SUID</th>
                                <th class="text-center">PHONE NUMBER</th>
                                <th class="text-center">COURSE</th>
                                <th class="text-center">Action</th>
                             </tr>
                        </thead>
                        <tbody >
                          <?php
                          //check if results is empty.
                            if($students)
                                {  
                                  //while loop to iterate through returned data
                                  while($row=mysqli_fetch_assoc($students))
                                        { ?>
                                <tr>
                                    <td class="text-left"><?php echo $row['studentFname']." " .$row['studentLname'];?></td>
                                    <td class="text-center"><?php echo $row['studentSUID'];?></td>
                                    <td class="text-center"><?php echo $row['studentPhone'];?></td>
                                    <td class="text-center"><?php echo $row['courseCode'];?></td>
                                    <td class="text-center">
                                      
                                     <form style="display:inline;" name="edit_<?php echo $row['studentAutoId']; ?>" method="post" action="http://localhost/attachment/pages/admin/editstudent.php">
                                        
                                        <input required="required" class="form-control" name="ssuid"  value="<?php echo $row['studentAutoId']; ?>" style="display: none;">
                                        <button class="btn btn-primary btn-s" type="submit" name="editstudent" > <span class="fa fa-edit"></span> Edit </button>
                                    </form>
                                    <form style="display:inline;" name="del_<?php echo $row['studentAutoId']; ?>" method="post" action="">
                                        
                                        <input required="required" class="form-control" name="ssuid"  value="<?php echo $row['studentAutoId']; ?>" style="display: none;">
                                        <button class="btn btn-danger btn-s" type="submit" name="deletestudent" > <span class="fa fa-trash"></span> Delete </button>
                                    </form>
                                </td>
                                    </td>
                                </tr>
                                <?php }}?>
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
    <script src="http://localhost/attachment/vendor/datatables/jquery.dataTables.js"></script>
    <script src="http://localhost/attachment/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="http://localhost/attachment/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="http://localhost/attachment/js/sb-admin-datatables.min.js"></script>
    <script src="http://localhost/attachment/js/sb-admin-charts.min.js"></script>
 <script >
$(document).ready(function () {
    //datatable initialization
     var table=$('#students').DataTable({responsive:true,"iDisplayLength": 10,"lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],columnDefs: [ { orderable: false, targets: [4] }]
   });
});
</script>


</body>

</html>
