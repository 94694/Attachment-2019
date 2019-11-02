  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Attachment </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdmins" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user-secret"></i>
            <span class="nav-link-text">Manage Admins</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAdmins">
            <li>
              <a href="#">New Admin</a>
            </li>
            <li>
              <a href="#">All Admins</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseStudents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Students</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseStudents">
            <li>
              <a href="http://localhost/attachment/pages/admin/addstudent.php">New Student</a>
            </li>
            <li>
              <a href="http://localhost/attachment/pages/admin/students.php">All Students</a>
            </li>
          </ul>
        </li>
                 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSupervisor" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Supervisors</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseSupervisor">
            <li>
              <a href="http://localhost/attachment/pages/admin/addsupervisor.php">New Supervisor</a>
            </li>
            <li>
              <a href="http://localhost/attachment/pages/admin/supervisors.php">All Supervisors</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAttachment" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Attachments</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAttachment">
            <li>
              <a href="http://localhost/attachment/pages/admin/studentsupervisor.php">Assign Supervisor</a>
            </li>
            <li>
              <a href="http://localhost/attachment/pages/admin/supervisions.php">Supervisions</a>
            </li>
          </ul>
        </li>
      
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>