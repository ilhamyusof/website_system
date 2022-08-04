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
							<h4 class="page-title">Data Tables</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</div>
						<div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-3">
										<div class="card">
											<div class="card-body">
                                                <?php
						                            if(isset($_GET["id"]))
						                            {
						                                $job_id = $_GET["id"];
						                                $sql =  "SELECT * FROM job where job_id = :job_id";
						                                $stmt = $conn->prepare($sql);
						                                $stmt->bindParam(":job_id", $job_id);
						                                $stmt->execute();

						                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
						                                {
						                                    $job_id = $dt["job_id"];
						                                    $title = $dt["title"];
						                                    $type_job = $dt["type_job"];
						                                    $salary = $dt["salary"];
						                                  //  $location = $dt["location"];
						                                    $description = $dt["description"];
						                                    $requirement = $dt["requirement"];
						                                    $benefit = $dt["benefit"];
						                                    $company = $dt["company"];
						                                    $status = $dt["status"];
						                                    $created_date = $dt["created_date"];
						                                }
						                            }
						                            else
						                            {
						                                echo " Data is not found!";
						                            }
						                            ?>

                                                <?php 
                                                 	$statement = $conn->prepare ("SELECT (SELECT COUNT(*) FROM career WHERE job_id = '$job_id' AND status = 'New') AS cnt");
																$statement->execute();
																while($data = $statement->fetch(PDO::FETCH_ASSOC))
				                                       			{
				                                          		 $cnt1 = $data["cnt"];
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $cnt1; ?></h3>
												<div class="text-muted">Total Application &nbsp; New</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-3">
										<div class="card">
											<div class="card-body">
                                                 <?php 
                                                 	$statement = $conn->prepare ("SELECT (SELECT COUNT(*) FROM career WHERE job_id = '$job_id' AND status = 'Reject') AS cnt");
																$statement->execute();
																while($data = $statement->fetch(PDO::FETCH_ASSOC))
				                                       			{
				                                          		 $cnt2 = $data["cnt"];
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $cnt2; ?></span></h3>
												<div class="text-muted">Total Application Reject</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-3">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 	$statement = $conn->prepare ("SELECT (SELECT COUNT(*) FROM career WHERE job_id = '$job_id' AND status = 'Approve') AS cnt");
																$statement->execute();
																while($data = $statement->fetch(PDO::FETCH_ASSOC))
				                                       			{
				                                          		 $cnt3 = $data["cnt"];
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $cnt3; ?></span></h3>
												<div class="text-muted">Total Application Accepted</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
                                    
									<div class="col-sm-12 col-lg-3">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 	$statement = $conn->prepare ("SELECT (SELECT COUNT(*) FROM career WHERE job_id = '$job_id') AS cnt");
																$statement->execute();
																while($data = $statement->fetch(PDO::FETCH_ASSOC))
				                                       			{
				                                          		 $cnt4 = $data["cnt"];
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-success rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1  text-green font-30"><span class="counter"><?php echo $cnt4; ?></span></h3>
												<div class="text-muted">Total Overall Application </div>
											</div>
                                             <?php
                                            }
                                             ?>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Application Career <a style="color: Blue;"><?php echo $title; ?></a> </h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Application New 
														</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<div class="table-responsive">
																<table id="example" class="table table-striped table-bordered" style="width:100%">
																	<thead>
																		<tr>
																			<th class="wd-15p">Detail Candidate</th>
																			<th class="wd-20p">Prefer Location</th>
																			<th class="wd-15p">Action</th>														
																		</tr>
																	</thead>
																	<?php 
																	// SELECT job.* , career.* FROM job INNER JOIN career ON job.job_id = career.job_id WHERE job.job_id = :job_id
																	$id = $_GET["id"];
																	
								                                   $statement = $conn->prepare("SELECT job.job_id, job.title, job.type_job, job.salary, job.location, job.description, job.description, job.requirement, job.benefit, job.company,job.status,job.created_date, career.career_id , career.name, career.email , career.contact, career.position , career.resume, career.status, career.respond_date , career.job_id , career.centers_id, centers.centers_id,centers.name AS branch
																		FROM job 
																		INNER JOIN career 
																		ON job.job_id = career.job_id 
																		INNER JOIN centers 
																		ON centers.centers_id = career.centers_id
																		WHERE job.job_id = '$id' AND career.status = 'New'");

								                                   $statement->execute();

								                                      while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                           $title = $data["title"];
								                                           $type_job = $data["type_job"];
								                                           $salary = $data["salary"];
								                                           $location = $data["location"];
								                                           $description = $data["description"];
								                                           $requirement = $data["requirement"];
								                                           $benefit = $data["benefit"];
								                                           $company = $data["company"];
								                                           $candidate = $data["name"];
								                                           $branch = $data["branch"];
								                                           $respond_date = $data["respond_date"];
								                                           $status = $data["status"];
								                                           $resume = $data["resume"];
								                                           $career_id = $data["career_id"];
								                                           $job_id = $data["job_id"];
								                                           $contact = $data["contact"];
								                                           $email = $data["email"];
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<a target="_blank" href="resume/<?php echo $resume; ?>"><span style="color: Blue;"><?php echo $candidate; ?></span></a><br>
																				<span>Apply date: <?php echo $respond_date; ?></span><br>
																				<a href="https://web.whatsapp.com/send?phone=6<?php echo $contact; ?>"><span><i class="fa fa-phone-volume"></i> &nbsp;&nbsp;<?php echo $contact; ?></span></a><br>
																				<span><a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope-open-text"></i> &nbsp;<?php echo $email; ?></a></span><br>
																			</td>
																		
																			<td style="text-align: center;"><?php echo $branch; ?></td>
																			<td style="text-align: center;">
																				<a href="system-update-career.php?id=<?php echo $data["career_id"]; ?>&job=<?php echo $data["job_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;Approve</button></a>
																				<a href="system-reject-career.php?id=<?php echo $data["career_id"]; ?>&job=<?php echo $data["job_id"]; ?>"><button type="button" name="reject" id="reject" class="btn btn-icon btn-primary btn-danger" ><i class="mdi mdi-tune"></i>&nbsp;Reject</button></a>
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
                                                    </div>
                                                 </div>
											</div>
										</div>
										<div class="panel panel-default mt-2">
											<div class="panel-heading" role="tab" id="headingTwo">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

														Application Accepted 
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												<div class="panel-body">
													<div class="row">
														<div class="table-responsive">
																<table id="example1" class="table table-striped table-bordered" style="width:100%">
																	<thead>
																		<tr>
																			<th class="wd-15p">Detail Candidate</th>
																			<th class="wd-20p">Status</th>
																			 <th class="wd-15p">Prefer Location</th>			 
																		</tr>
																	</thead>
																	<?php 
																	// SELECT job.* , career.* FROM job INNER JOIN career ON job.job_id = career.job_id WHERE job.job_id = :job_id
																	$id = $_GET["id"];
																	
								                                   $statement = $conn->prepare("SELECT job.job_id, job.title, job.type_job, job.salary, job.location, job.description, job.description, job.requirement, job.benefit, job.company,job.status,job.created_date, career.career_id , career.name, career.email , career.contact, career.position , career.resume, career.status, career.respond_date , career.job_id , career.centers_id, centers.centers_id,centers.name AS branch
																		FROM job 
																		INNER JOIN career 
																		ON job.job_id = career.job_id 
																		INNER JOIN centers 
																		ON centers.centers_id = career.centers_id
																		WHERE job.job_id = '$id' AND career.status = 'Approve'");

								                                   $statement->execute();

								                                      while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                           $title = $data["title"];
								                                           $type_job = $data["type_job"];
								                                           $salary = $data["salary"];
								                                           $location = $data["location"];
								                                           $description = $data["description"];
								                                           $requirement = $data["requirement"];
								                                           $benefit = $data["benefit"];
								                                           $company = $data["company"];
								                                           $candidate = $data["name"];
								                                           $respond_date = $data["respond_date"];
								                                           $status = $data["status"];
								                                           $resume = $data["resume"];
								                                           $branch = $data["branch"];
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<a href="resume/<?php echo $resume; ?>"><span style="color: Blue;"><?php echo $candidate; ?></span></a><br>
																				<span>Apply date: <?php echo $respond_date; ?></span>
																				<a href="https://web.whatsapp.com/send?phone=6<?php echo $contact; ?>"><span><i class="fa fa-phone-volume"></i> &nbsp;&nbsp;<?php echo $contact; ?></span></a><br>
																				<span><a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope-open-text"></i> &nbsp;<?php echo $email; ?></a></span><br>
																			</td>
																			
																			<td style="text-align: center;"><span class="tag tag-lime"><?php echo $status; ?></span></td>
																			<td style="text-align: center;"><?php echo $branch; ?></td>
																			<!-- <td style="text-align: center;">
																				<a href="edit-new-career.php?id=<?php echo $data["job_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i></button></a>
																			</td> -->
																			
																		</tr>
																	 <?php
							                                          // $counter++;
							                                            }
							                                          ?>
																	</tbody>
																</table>
															</div>
                                                    </div>
												</div>
											</div>
										</div>
										<div class="panel panel-default mt-2">
											<div class="panel-heading" role="tab" id="headingThree">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

														Application Rejected
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
												<div class="panel-body">
													<div class="row">
														<div class="table-responsive">
																<table id="example2" class="table table-striped table-bordered" style="width:100%">
																	<thead>
																		<tr>
																			<th class="wd-15p">Detail Candidate</th>
																			<th class="wd-20p">Status</th>
																			 <th class="wd-15p">Prefer Location</th>														 
																		</tr>
																	</thead>
																	<?php 
																	// SELECT job.* , career.* FROM job INNER JOIN career ON job.job_id = career.job_id WHERE job.job_id = :job_id
																	$id = $_GET["id"];
																	
								                                   $statement = $conn->prepare(" SELECT job.job_id, job.title, job.type_job, job.salary, job.location, job.description, job.description, job.requirement, job.benefit, job.company,job.status,job.created_date, career.career_id , career.name, career.email , career.contact, career.position , career.resume, career.status, career.respond_date , career.job_id , career.centers_id, centers.centers_id,centers.name AS branch
																		FROM job 
																		INNER JOIN career 
																		ON job.job_id = career.job_id 
																		INNER JOIN centers 
																		ON centers.centers_id = career.centers_id
																		WHERE job.job_id = '$id' AND career.status = 'Reject'");

								                                   $statement->execute();

								                                      while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                           $title = $data["title"];
								                                           $type_job = $data["type_job"];
								                                           $salary = $data["salary"];
								                                           $location = $data["location"];
								                                           $description = $data["description"];
								                                           $requirement = $data["requirement"];
								                                           $benefit = $data["benefit"];
								                                           $company = $data["company"];
								                                           $candidate = $data["name"];
								                                           $respond_date = $data["respond_date"];
								                                           $status = $data["status"];
								                                           $resume = $data["resume"];
								                                           $branch = $data["branch"];
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<a href="resume/<?php echo $resume; ?>"><span style="color: Blue;"><?php echo $candidate; ?></span></a><br>
																				<span>Apply date: <?php echo $respond_date; ?></span>
																				<a href="https://web.whatsapp.com/send?phone=6<?php echo $contact; ?>"><span><i class="fa fa-phone-volume"></i> &nbsp;&nbsp;<?php echo $contact; ?></span></a><br>
																				<span><a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope-open-text"></i> &nbsp;<?php echo $email; ?></a></span><br>
																			</td>
																			
																			<td style="text-align: center;"><span class="tag tag-red"><?php echo $status; ?></span></td>
																			<td style="text-align: center;"><?php echo $branch; ?></td>
																			<!-- <td style="text-align: center;">
																				<a href="edit-new-career.php?id=<?php echo $data["job_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i></button></a>
																			</td> -->
																			
																		</tr>
																	 <?php
							                                          // $counter++;
							                                            }
							                                          ?>
																	</tbody>
																</table>
															</div>
                                                    </div>
												</div>
											</div>
										</div>
										
									</div>
									</div>
					</div>
				</div>
<?php 
include('system-footer.php');
?>