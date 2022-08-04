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