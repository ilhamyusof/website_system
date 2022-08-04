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
							<div class="col-sm-12 col-md-12">
								<div class="card">									
									<div class="card-header">
										<h3 class="card-title">List Module</h3>
									</div>
									<div class="card-body">
							<!-- Boxes de Acoes -->
							<?php 
                           
                            $id = $_GET["id"];
																	
							 // $statement = $conn->prepare(" SELECT department.id_department, department.job_department, taskdepartment.id_taskdepartment , taskdepartment.module, taskdepartment.description , taskdepartment.image, taskdepartment.document, taskdepartment.id_department FROM department INNER JOIN taskdepartment ON department.id_department = taskdepartment.id_department WHERE department.id_department = '$id'");

                             $statement = $conn->prepare(" SELECT department.id_department, department.job_department, moduledepartment.moduledepartment_id , moduledepartment.module, moduledepartment.description, moduledepartment.id_department FROM department INNER JOIN moduledepartment ON department.id_department = moduledepartment.id_department WHERE department.id_department = '$id'");

                                        $statement->execute();

                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                       {
                                       	extract($data);
                            ?>
										<div class="list-group">
											<a href="system-lmsmanagementdetail_v4.php?id=<?php echo $moduledepartment_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1" style="color: #94171b;"><?= $module; ?></h5>
													<!-- <small>3 days ago</small> -->
												</div>
												<p class="mb-1"><?= $description;?></p>
												<!-- <small>Donec id elit non mi porta.</small> -->
											</a>											
										</div>								
									<?php } ?>
									</div>
								</div>
							</div>
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
<?php 
include('system-footer.php');
?>