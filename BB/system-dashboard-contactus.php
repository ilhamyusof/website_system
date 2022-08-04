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
						<div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-3">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT
                                                  (SELECT COUNT(*) FROM job )
                                                  AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totaljob = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totaljob; ?></h3>
												<div class="text-muted">Total Application Offer</div>
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
                                                 $statement = $conn->prepare("SELECT
                                                  (SELECT COUNT(*) FROM career )
                                                  AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalapply = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalapply; ?></span></h3>
												<div class="text-muted">Total Apply Career In Physiomobile</div>
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
                                                 $statement = $conn->prepare("SELECT
                                                  (SELECT COUNT(*) FROM inquiry )
                                                  AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalinquiry = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalinquiry; ?></span></h3>
												<div class="text-muted">Total Inquiry In Physiomobile</div>
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
                                                 $statement = $conn->prepare("SELECT
                                                  (SELECT COUNT(*) FROM contactus )
                                                  AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalcontactus = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-success rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1  text-green font-30"><span class="counter"><?php echo $totalcontactus; ?></span></h3>
												<div class="text-muted">Total ContactUS In Physiomobile</div>
											</div>
                                             <?php
                                            }
                                             ?>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-status bg-yellow br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<div class="card-title">Jobs</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th class="wd-15p">Jobs Title</th>
														<th class="wd-15p">Candidate</th>
														<th class="wd-20p">Jobs Status</th>
														<th class="wd-15p">Action</th>														
													</tr>
												</thead>
												<?php 
			                                        $statement = $conn->prepare("SELECT * FROM job ");
			                                        $statement->execute();

			                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
			                                       {
			                                           $title = $data["title"];
			                                           $type = $data["type"];
			                                           $salary = $data["salary"];
			                                           $location = $data["location"];
			                                           $description = $data["description"];
			                                           $requirement = $data["requirement"];
			                                           $benefit = $data["benefit"];
			                                           $company = $data["company"];
			                                    ?>

												<tbody>
													<tr>
														<td>
															<span style="color: black;"><?php echo $title; ?></span><br>
															<span><?php echo $location; ?></span><br>
															<span>Created date: 2018/03/12</span>
														</td>
														<td>
															<span>New:</span><br>
															<span>Reject:</span><br>
															<span>Accepted:</span><br>
															<span>Total Apply:</span>
														</td>
														<td>New</td>
														<td>2018/03/12</td>
														
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