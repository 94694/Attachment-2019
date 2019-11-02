

if(isset($_POST['overwritecba']))
{
    
    if(isset($_FILES['cbareport']))
    {
        $file = $_FILES['cbareport'];
        $fileName = $_FILES['cbareport']['name'];
        
        $error = $_FILES['cbareport']['error'];;
        $tmpName = $_FILES['cbareport']['tmp_name'];
        // $fileSize = $_FILES['cbareport']['size'];
        $fileType = $_FILES['cbareport']['type'];
        $ext = strtolower(end((explode(".", $fileName))));
        
        $allowed=array('doc','docx','pdf');

        if(in_array($ext,$allowed))
            {
                if($error===0)
                {
                    $nameSave = "CBA".$userSUID;
                    $filePath = '../cbareports/'.$nameSave.'.'.$ext;

                     $updateQuery="UPDATE cbareports SET file_ext='$ext' WHERE studentId='$userSUID')";
                     unlink('attachment/cbareports/'.$nameSave.'.'.$ext);
                     $result = move_uploaded_file($tmpName, $filePath);

                      $results=mysqli_query($con, $updateQuery);//update db
                                $_SESSION['cbarus']='CBA Report was Overwritten ';
                                $_SESSION['cbaruf']='';

                        $affectedRows=mysqli_affected_rows($con);
                        if($affectedRows>0)
                            {
                                $_SESSION['cbarus']='CBA Report was Overwritten ';
                                $_SESSION['cbaruf']='';
                            }
                }
            }

    }else{$_SESSION['cbaruf']="No file";$_SESSION['cbarus']="No file";}

}
