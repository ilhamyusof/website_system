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
        <?php
         if(isset($_GET["id"]))
            {
                $moduledepartment_id = $_GET["id"];
                $sql =  "SELECT * FROM moduledepartment where moduledepartment_id = :moduledepartment_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":moduledepartment_id", $moduledepartment_id);
                $stmt->execute();

                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $moduledepartment_id = $dt["moduledepartment_id"];
                    $module = $dt["module"];
                    $description = $dt["description"];
                }
            }
            else
            {
                echo " Data is not found!";
            }
            ?>
				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b;"><?= $module; ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Module</a></li>
								<li class="breadcrumb-item active" aria-current="page">Management</li>
							</ol>
						</div>
						<div class="text-wrap mt-6">
							<div class="example">
								<?php 
								if($roles == "1"  || $roles == "2" || $roles == "3"  || $roles == "4" || $roles == "6"  || $roles == "11" || $roles == "23" || $roles == "24"  )
								{
								?>
								<div class="btn-list text-right">
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Add Specific Module / Task</button>
									
								</div>
							<?php } else {} ?>
							</div>
						</div>
						<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form id="modal" class="form-horizontal" method="POST" action="system-modalinsertdepartment_v1.php" enctype="multipart/form-data">
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
													<input type="text" class="form-control" id="description" name="description">
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Image Module:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="image" id="image">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Document:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="document" id="document">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Thumbnail Image:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">video:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="video" id="video">
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
							<div class="col-sm-12">
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">Log Activities Done</h3>
									</div>
									<div class="card-body row justify-content-between">
										<div class="col-md-12 bg-muted border p-5">
											<ul class="mb-5">
									<?php 
                           			$user_id = $_SESSION["user_id"];
		                            $id = $_GET["id"];
																			
									 $statement = $conn->prepare("SELECT moduledepartment.moduledepartment_id, moduledepartment.module, moduledepartment.description, moduledepartment.id_department, checklist.checklist_id, checklist.id_taskdepartment, checklist.user_id, checklist.moduledepartment_id, checklist.module , checklist.status FROM moduledepartment INNER JOIN checklist ON moduledepartment.moduledepartment_id = checklist.moduledepartment_id WHERE checklist.moduledepartment_id = '$id' AND user_id = '$user_id'");

		                                        $statement->execute();

		                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
		                                       {
		                                       	extract($data);
                            ?>
									
											<?php if($status = "complate"){

											?>
												<li><span class="fas fa-check text-success"></span> <?= $module;?></li>	
											<?php } else{ ?>
												<li><span class="fas fa-times text-success"></span> <?= $module;?></li>
												<?php } ?>	
									<?php } ?>
												</ul>
													</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">

							<!-- Boxes de Acoes -->
							<?php 
                           
                            $id = $_GET["id"];
																	
							 $statement = $conn->prepare(" SELECT moduledepartment.moduledepartment_id, moduledepartment.module, moduledepartment.description, 

							 	taskdepartment.id_taskdepartment , taskdepartment.module, taskdepartment.description , taskdepartment.image, taskdepartment.document, taskdepartment.moduledepartment_id 

							 	FROM moduledepartment INNER JOIN taskdepartment ON moduledepartment.moduledepartment_id = taskdepartment.moduledepartment_id WHERE moduledepartment.moduledepartment_id = '$id'");

                                        $statement->execute();

                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                       {
                                       	extract($data);
                            ?>
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="box">
									<div class="icon">
										<div class="image">
											<i class="avatar avatar-xxl brround" style="background-image: url(department/<?php echo $image; ?>)"></i> 
										</div>
										<div class="info card">
											<h3 class="title"><?= $module; ?></h3>
											<p style="text-align: justify;"><?= $description;?></p>	
											<a class="btn text-white center-block bg-gradient-primary" href="system-lmsmanagementdetail_v1.php?id=<?php echo $id_taskdepartment; ?>&module=<?php echo $moduledepartment_id;?>">Read More <i class="fa fa-angle-double-right"></i></a>
											
										</div>
									</div>
									<div class="space"></div>
								</div>
							</div>									
							<?php } ?>
								
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
<?php 
include('system-footer.php');
?>