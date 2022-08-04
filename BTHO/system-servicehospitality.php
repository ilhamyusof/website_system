<?php
//Start session
    session_start();
    include('system-header.php');
?>

         <?php
            // Connection database
            //include("connection.php");
            // Check, for session 'user_session'
            // include("session.php");
            include("session.php");

            // Set Default Time Zone for Asia/Kuala_Lumpur
            date_default_timezone_set("Asia/Kuala_Lumpur");

            // Check, if username session is NOT set then this page will jump to login page
            if (!isset($_SESSION['session']) && !isset($_SESSION['job'])) {
                header('Location: system-login.php');
                exit();
                session_destroy();
            }
            $email = $_SESSION["session"];
            $user_id = $_SESSION["user_id"];
            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>
				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Data Tables</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</div>
						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<a href="system-add-new-career.php" class="btn btn-secondary">Add New Career</a>
								</div>
							</div>
						</div>

						<div class="row">
							<!-- Boxes de Acoes -->
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="box">
									<div class="icon">
										<div class="image">
											<i class="avatar avatar-xxl brround" style="background-image: url(assets/images/faces/female/16.jpg)"></i> 
										</div>
										<div class="info card">
											<h3 class="title">GREETINGS & REGISTRATION</h3>
											<p style="text-align: justify;">Employees are responsible for greeting clients and visitors to clinic. Admin will be in charge of giving clients directions to various parts of the clinic, contacting employees regarding visitor, answering phones, taking messages, sorting and distibuting mail. Admin will need excellent written and verbal communication skills to representing the PMMY Group to the client and deliver good services to the client.</p><a class="btn text-white center-block bg-gradient-primary" href="#" title="Title Link">Read More <i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
									<div class="space"></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="box">
									<div class="icon">
										<div class="image">
											<i class="avatar avatar-xxl brround" style="background-image: url(assets/images/faces/male/18.jpg)"></i> 
										</div>
										<div class="info card">
											<h3 class="title">REFUNDS</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.</p><a class="btn text-white center-block bg-gradient-success" href="#" title="Title Link">Read More <i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
									<div class="space"></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="box">
									<div class="icon">
										<div class="image">
											<i class="avatar avatar-xxl brround" style="background-image: url(assets/images/faces/male/16.jpg)"></i> 
										</div>
										<div class="info card">
											<h3 class="title">ADMINISTRATOR</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.</p><a class="btn text-white bg-gradient-danger center-block" href="#" title="Title Link">Read More <i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
									<div class="space"></div>
								</div>
							</div><!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
<?php 
include('system-footer.php');
?>