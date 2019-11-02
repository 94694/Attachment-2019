<!DOCTYPE html>
<html>
<head>
<title>Attachment System</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.0.3/css/bootstrap.min.css">
    <!-- Font-awesome -->
    <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">


</head>
<body>

	<div class="container-fluid">
    <!-- Second navbar for categories -->
    <nav class="navbar navbar-default" style="background-color: rgb(0,0,128);">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="" style="margin-left: -200px!important"><img width="257px;" src="http://localhost/attachment/assets/images/su_logo.png"/></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- <div class="collapse navbar-collapse" id="navbar-collapse-1"> -->
        <!--   <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;display: inline;">
            <li ><a class="lia" href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Works</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">Categories</a>
            </li>
          </ul> -->
        <!-- </div> -->
        <!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    
    <br><br><br><br>
    <br><br><br><br>
<div class="container">
    <div class="omb_login">
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">	
			    <form class="omb_loginForm" autocomplete="off" method="POST" action="connections/logindb.php">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<br><br>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</form>
			</div>
    	</div>
</div>
<!-- JQuery -->
<script src="assets/jquery-1.11.1/jquery-1.11.1.min.js" ></script>
<!-- Bootstrap script -->
<script src="assets/bootstrap-3.0.3/js/bootstrap.min.js"></script>
<!-- JQuery UI -->
<script src="assets/jquery/jquery-ui.min.js" ></script>
</body>
</html>