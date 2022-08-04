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
            $user_id = $_SESSION["user_id"];
            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>

				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Module Management</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Module</a></li>
								<li class="breadcrumb-item active" aria-current="page">Management</li>
							</ol>
						</div>
						<div class="row">
							<?php 
                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'management'");
                                        $statement->execute();

                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                       {
                                       	extract($data);
                            ?>  
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="card card-primary text-center">
									<div class="card-body">
										<!-- servicehospitality.php -->
										<a href="system-lmsmanagementdetail_v3.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
									</div>
									<div class="card-footer">
										<a href="system-lmsmanagementdetail_v3.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department; ?></span></a>
									</div>
								</div>
							</div>
							<?php
                            }
                             ?>
						</div>

						
					</div>
				</div>
<?php 
include('system-footer.php');
?>