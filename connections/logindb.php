<?php
session_start();



$username=$_POST['username'];
$password=md5($_POST['password']);

//create connection
$conn = mysqli_connect('localhost', 'root', '', 'attachment');//this is ok
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else
	{
		$queryStudent=mysqli_query($conn,"SELECT * FROM students WHERE studentSUID='$username' AND studentPassword='$password'");
		$queryAdmin=mysqli_query($conn,"SELECT * FROM admin WHERE adminSUID='$username' AND adminPassword='$password'");
		$querySupervisor=mysqli_query($conn,"SELECT * FROM supervisor WHERE supervisorSUID='$username' AND supervisorPassword='$password'");
		// if()
		$rowCountStudent=mysqli_num_rows($queryStudent);

		$rowCountAdmin=mysqli_num_rows($queryAdmin);

		$rowCountSupervisor=mysqli_num_rows($querySupervisor);
		
		if($rowCountStudent>0)
			{
				header('Location: http://localhost/attachment/pages/student/student.php');
				$_SESSION['username'] = $username;

			} else if($rowCountAdmin>0)
				{
					header('Location: http://localhost/attachment/pages/admin/admin.php');
					$_SESSION['username'] = $username;

				}else if($rowCountSupervisor>0)
					{
						header('Location: http://localhost/attachment/pages/supervisor/supervisor.php');
						$_SESSION['username'] = $username;

					}  else
						{
							echo "<script type='text/javascript'>alert('Wrong Password or Username. Try again');location.href='http://localhost/attachment/index.html';</script>";
						}
	}

?>