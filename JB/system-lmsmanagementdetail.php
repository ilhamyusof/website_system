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
						<div class="text-wrap mt-6">
							<div class="example">
								<?php 
								if($roles == "1"  || $roles == "2" || $roles == "3"  || $roles == "4" || $roles == "6"  || $roles == "11" || $roles == "16" || $roles == "23" || $roles == "24" )
								{
								?>
								<div class="btn-list text-right">
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2">Create Module
									</button>
								</div>
							<?php } else {} ?>
							</div>
						</div>
					
						<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form id="modal" class="form-horizontal" method="POST" action="system-modalinsertdepartment_v2.php" enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title" id="example-Modal3">Create Specific Module / Task</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Title/Module:</label>
													<input type="text" class="form-control" id="module" name="module">
													<input type="text" class="form-control" id="department" name="department" value="<?php echo $_GET["id"]; ?>" hidden>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Description:</label>
													
													 <textarea class="form-control" rows="6" name="description" id="description" placeholder="Description here.."></textarea>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
									</div>
									</form>
								</div>
							</div>
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
							<!-- <div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="box">
									<div class="icon">
										<div class="image">
											<i class="avatar avatar-xxl brround" style="background-image: url(department/<?php echo $image; ?>)"></i> 
										</div>
										<div class="info card">
											<h3 class="title"><?= $module; ?></h3>
											<p style="text-align: justify;"><?= $description;?></p>

											<a class="btn text-white center-block bg-gradient-primary" href="lmsmanagementdetail_v1.php?id=<?php echo $id_taskdepartment; ?>">Read More <i class="fa fa-angle-double-right"></i></a>
											
										</div>
									</div>
									<div class="space"></div>
								</div>
							</div> -->
									
										<div class="list-group">
											<a href="system-lmsmanagementdetail_v2.php?id=<?php echo $moduledepartment_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
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