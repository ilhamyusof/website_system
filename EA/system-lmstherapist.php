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
							<h4 class="page-title">Module Therapist</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Module</a></li>
								<li class="breadcrumb-item active" aria-current="page">Therapist</li>
							</ol>
						</div>

						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<!-- <a href="add-new-department.php" class="btn btn-success">Add New Department</a> -->
									<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Add New Department</button> -->
								</div>
							</div>
						</div>
						<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form id="modal" class="form-horizontal" method="POST" action="system-modalinsertdepartment.php" enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title" id="example-Modal3">Create Department</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Department:</label>
													<input type="text" class="form-control" id="department" name="department">
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Image:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="image" id="image">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
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
							<?php 
                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'therapist'");
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