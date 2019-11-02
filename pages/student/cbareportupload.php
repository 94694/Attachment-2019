<?php
session_start();
//connect to localhost and database
$con=mysqli_connect('localhost','root','','attachment') or die('Connection failed '.mysqli_error());

$userSUID=$_SESSION['username'];

//query to select cbareport
$reportQuery="SELECT * FROM cbareports WHERE studentId='$userSUID'";

$files=mysqli_query($con, $reportQuery);

//initialize session variables
$_SESSION['cbarus']='';
$_SESSION['cbaruf']='';


if(isset($_POST['cbaupload']))
{
    // var_dump($files);
    if(($files)&&($files->num_rows !== 0))
    {
        $_SESSION['cbarus']='';
        $_SESSION['cbaruf']='Report Exists. Select to Overwite

            <form style="display:inline;" name="editcba" method="post" action="" enctype="multipart/form-data">
                <input required="required" class="form-control" name="cbareport"  type="file">
                    <br><button class="btn btn-danger btn-s" type="submit" name="overwritecba" > <span class="fa fa-upload"></span> Overwrite 
                    </button>
            </form>
        ';
    }else{
        if(isset($_FILES['cbareport']))
        {
            $file = $_FILES['cbareport'];
            $fileName = $_FILES['cbareport']['name'];
            
            $error = $_FILES['cbareport']['error'];
            $tmpName = $_FILES['cbareport']['tmp_name'];
            // $fileSize = $_FILES['cbareport']['size'];
            $fileType = $_FILES['cbareport']['type'];
            $ext = strtolower(end((explode(".", $fileName))));
            // $ext = strtolower(end((explode(".", $fileName))));
            
            $allowed=array('doc','docx','pdf');

            if(in_array($ext,$allowed))
                {
                    if($error===0)
                    {
                        $nameSave = "CBA".$userSUID;
                        $filePath = '../cbareports/'.$nameSave.'.'.$ext;

                         $insertQuery="INSERT INTO cbareports(studentId, file_name, file_ext) VALUES('$userSUID','$nameSave','$ext')";

                          $results=mysqli_query($con, $insertQuery);//save to db

                            if($results===TRUE)
                            {
                                $_SESSION['cbarus']='CBA Report was uploaded ';
                                $_SESSION['cbaruf']='';
                                $result = move_uploaded_file($tmpName, $filePath);
                                
                            }else{
                                $_SESSION['cbarus']='';
                                $_SESSION['cbaruf']='Failed to upload CBA report';
                            }
                    }else{ $_SESSION['cbarus']='';
                                $_SESSION['cbaruf']=$ext;}
                }

        }else{$_SESSION['cbaruf']="No file";$_SESSION['cbarus']="No file";}

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
 <?php include '../student/studentnav.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> CBA Report Upload & Download</li>
      </ol>
    <div class="form-group col-lg-12">
         <?php $success = $_SESSION['cbarus'];
          $fail = $_SESSION['cbaruf'];
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
                            
             <form  action="" method="post" enctype="multipart/form-data"><hr>
                <div class="form-group col-lg-6">
                    <label><strong>Fresh File Upload</strong></label> <span class="star">*</span>
                    <input class="form-control" name="cbareport" id="cbareport" type="file" parsley-trigger="change" required autocomplete="off" size="20">
                </div>
                <div class="form-group col-lg-6">
                    <label></label> <br>
                    <button type="submit" class="btn btn-warning"  name="cbaupload" id="submit"> <i class="fa fa-upload"></i> Upload CBA Report</button>
                    <input type="reset" class="btn"  value="Reset">
                </div>  
          </form>
        </div>
        <div class="row">
            <div class="col-md-12">
               <table  class="table table-striped table-bordered table-hover display responsive nowrap" cellspacing="0" width="100%"  id="cbareport">
                    <thead>
                        <tr>
                            <th class="text-left">Report Particulars</th>
                            <th class="text-center" style="width:10%">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php foreach($files as $file){ 

                       $file_ext=$file['file_ext'];
                            if($file_ext=="doc"||$file_ext=="docx")
                              {
                                $i='<span><i class="fa fa-file-word-o" style="color:blue"></i></span>';
                              }else{
                                $i='<span><i class="fa fa-file-pdf-o" style="color:red"></i></span>';
                              }

                            $dateUploaded=$file['dateUploaded'];
                            $formattedDate = date("d/m/Y", strtotime($dateUploaded));
                          ?>
                    
                        <td>  
                           
                            <?php echo $i; echo "&nbsp;&nbsp;"; echo "CBA Report ";echo " uploaded on "; echo $formattedDate; ?>
                      </td>
                   
                        <td class="text-center">
                            <span data-placement="top" data-toggle="tooltip" title="Download CBA Report">
                                    <a href="../cbareports/<?php echo $file['file_name'].'.'.$file['file_ext'];?>"style="text-decoration: none"><span><i class="fa fa-download fa-lg"></i></span>
                                    </a>
                            </span>
                        </span>
                        </td>
                    </tr>
                    <?php }?>

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
