<?php
session_start();
//connect to localhost and database
$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

//query to select all studentsupervisors from database
$supervisionQuery="SELECT studentsupervisors.stsupAutoId, supervisor.supervisorFname,supervisor.supervisorLname,students.studentFname,supervisor.supervisorSUID,students.studentLname, faculties.facultyCode,attachmenttype.attCode FROM studentsupervisors join supervisor on supervisor.supervisorAutoId=studentsupervisors.stsupSupervisorId join students on students.studentSUID=studentsupervisors.stsupStudentId join attachmenttype on studentsupervisors.stsupAttachmentTypeId=attachmenttype.attAutoId join faculties on supervisor.supervisorFacultyId=faculties.facultyAutoId";

//query the db with mysqli
$supervisions=mysqli_query($con,$supervisionQuery);


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
        <li class="breadcrumb-item active">Supervision</li>
      </ol>
       <div class="row">
                <div class="col-md-12">
                    <table  class="table table-bordered" id="supervisions">
                        <thead>
                            <tr>
                                <th class="text-center">SUPERVISOR NAME</th>
                                <th class="text-center">STUDENT NAME</th>
                                <th class="text-center">ATTACHMENT TYPE</th>
                                <th class="text-center">STUDENT FACULTY</th>
                                <th class="text-center">Action</th>
                             </tr>
                        </thead>
                        <tbody >
                          <?php
                          //check if results is empty.
                            if($supervisions)
                                {  
                                  //while loop to iterate through returned data
                                  while($row=mysqli_fetch_assoc($supervisions))
                                        { ?>
                                <tr>
                                    <td class="text-left"><?php echo $row['supervisorFname']." " .$row['supervisorLname'];?></td>
                                    <td class="text-center"><?php echo $row['studentFname']." " .$row['studentLname'];?></td>
                                    <td class="text-center"><?php echo $row['attCode'];?></td>
                                    <td class="text-center"><?php echo $row['facultyCode'];?></td>
                                    <td class="text-center">
                                      <form style="display:inline;" name="edit_<?php echo $row['studentAutoId']; ?>" method="post" action="http://localhost/attachment/pages/admin/editsupervision.php">
                                        
                                        <input required="required" class="form-control" name="supervisionId"  value="<?php echo $row['stsupAutoId']; ?>" style="display: none;">
                                        <button class="btn btn-success btn-s" type="submit" name="editsupervision" > <span class="fa fa-edit"></span> Edit Supervision </button>
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
    <script src="http://localhost/attachment/vendor/chart.js/Chart.min.js"></script>
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
     var table=$('#supervisions').DataTable({responsive:true,"iDisplayLength": 10,"lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],columnDefs: [ { orderable: false, targets: [4] }]
   });
});
</script>
</body>

</html>
