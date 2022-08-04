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
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-status bg-yellow br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<div class="card-title">Data Tables</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th class="wd-15p">Jobs Title</th>														
														<th class="wd-20p">Jobs Status</th>
														<th class="wd-15p">Action</th>														
													</tr>
												</thead>

												<?php 
			                                        $statement = $conn->prepare("SELECT * FROM job WHERE status = 'Open' ");
												// $statement = $conn->prepare ("SELECT job.* , career.* FROM job INNER JOIN career ON job.job_id = career.job_id ");
													// $statement = $conn->prepare("SELECT job.job_id, job.title, job.type_job, job.salary, job.location, job.type, job.description, job.description, job.requirement, job.benefit, job.company,job.status,job.created_date, career.career_id , career.name, career.email , career.contact, career.position , career.resume, career.respond_date , career.job_id FROM job
													// 	INNER JOIN career
													// 	ON job.job_id = career.job_id
													// 	WHERE job.job_id = :id");


													// $statement = $conn->prepare ("SELECT job.* , career.* FROM job INNER JOIN career  ");
			                                        $statement->execute();

			                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
			                                       {
			                                           $job_id = $data["job_id"];
			                                           $title = $data["title"];
			                                           $type_job = $data["type_job"];
			                                           $salary = $data["salary"];
			                                           $location = $data["location"];
			                                           $description = $data["description"];
			                                           $requirement = $data["requirement"];
			                                           $benefit = $data["benefit"];
			                                           $company = $data["company"];
			                                           $status = $data["status"];
			                                           $created_date = $data["created_date"];
			                                    ?>

												<tbody>
													<tr>
														<td>
															<a href="system-list-new-career.php?id=<?php echo $data["job_id"]; ?>"><span style="color: blue;" ><?php echo $title; ?></span></a><br>
															<span>Created date: <?php echo $created_date; ?></span>
														</td>
														<td><span style="color: Blue;"><?php echo $status; ?></span></td>
														<td style="text-align: center;">
															<a href="system-edit-new-career.php?id=<?php echo $data["job_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>
															<a href="system-closecareer.php?id=<?php echo $data["job_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-danger"><i class="fe fe-trash"></i></button></a>
														</td>														
													</tr>
												 <?php
		                                          // $counter++;
		                                            }
		                                          ?>
												</tbody>
											</table>
										</div>
									</div>
									<!-- table-wrapper -->
								</div>
								<!-- section-wrapper -->

							</div>
						</div>
					</div>
				</div>
<?php 
include('system-footer.php');
?>