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
							<h4 class="page-title">Record Redeem Gift Card</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Gift Card</li>
							</ol>
						</div>
						<?php
                             if(isset($_GET['message'])){
                                 $message = $_GET['message'];
                                 echo $message;
                             }
                        ?>
                        
                        <?php 
                            if($roles == "9" || $roles == "15" || $roles == "21" || $roles == "13" || $roles == "20"){
                         ?>
						<!--<div class="text-wrap mt-6">-->
						<!--	<div class="example">-->
						<!--		<div class="btn-list text-right">-->
						<!--			<a href="system-giftcard-create.php" class="btn btn-secondary">Add New Gift Card</a>-->
						<!--		</div>-->
						<!--	</div>-->
						<!--</div>-->
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-status bg-yellow br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<div class="card-title">Gift Card</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th class="wd-15p">Detail Receive Gift Card</th>
														<th class="wd-20p">Voucher Code</th>
														<th class="wd-20p">Status</th>
														<th class="wd-15p">Action</th>														
													</tr>
												</thead>

												<?php 
			                                        $statement = $conn->prepare("SELECT * FROM giftcard WHERE status = 'Close' ORDER BY created_date DESC ");
												// $statement = $conn->prepare ("SELECT job.* , career.* FROM job INNER JOIN career ON job.job_id = career.job_id  ");
													// $statement = $conn->prepare("SELECT job.job_id, job.title, job.type_job, job.salary, job.location, job.type, job.description, job.description, job.requirement, job.benefit, job.company,job.status,job.created_date, career.career_id , career.name, career.email , career.contact, career.position , career.resume, career.respond_date , career.job_id FROM job
													// 	INNER JOIN career
													// 	ON job.job_id = career.job_id
													// 	WHERE job.job_id = :id");


													// $statement = $conn->prepare ("SELECT job.* , career.* FROM job INNER JOIN career ");
			                                        $statement->execute();

			                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
			                                       {
			                                           $giftcard_id = $data["giftcard_id"];
			                                           $name = $data["name"];
			                                           $phone = $data["phone"];
			                                           $email = $data["email"];
			                                           $status = $data["status"];
			                                           $voucher = $data["voucher"];
			                                           $created_date = $data["created_date"];
			                                           $created_by = $data["created_by"];
			                                           
			                                    ?>

												<tbody>
													<tr>
														<td>
															<span style="color: black;" >Name: <?php echo $name; ?></span><br>
															<span>Phone: <?php echo $phone; ?></span><br>
															<span>Email: <?php echo $email; ?></span><br>
															<span>Created date: <?php echo $created_date; ?></span>
														</td>
														<td><span style="font-weight:bold; color: black; text-align: center;"><?php echo $voucher; ?></span></td>
														<td><span><?php echo $status; ?></span></td>
														<td style="text-align: center;">
															<a href="system-giftcard-update.php?id=<?php echo $data["giftcard_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>															
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
						<?php } else { ?>
						
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-status bg-yellow br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<div class="card-title">Record Redeem Gift Card</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th class="wd-15p">Detail Receive Gift Card</th>
														<th class="wd-20p">Voucher Code</th>
														<th class="wd-20p">Status</th>
														<th class="wd-20p">Detail REdeem</th>
																												
													</tr>
												</thead>

												<?php 
			                                        $statement = $conn->prepare("SELECT giftcard.giftcard_id, giftcard.name, giftcard.phone, giftcard.email, giftcard.status, giftcard.voucher, giftcard.created_date, giftcard.created_by, giftcard.redeem_date, giftcard.center_id, giftcard.incharge, user.user_id, user.name AS personal, user.email, centers.centers_id, centers.name AS branch
			                                        FROM giftcard
                                                    JOIN user 
                                                    ON giftcard.incharge=user.user_id
                                                    JOIN centers
                                                    ON centers.centers_id = giftcard.center_id
			                                        WHERE giftcard.status = 'Close' ORDER BY created_date DESC ");
			                                        $statement->execute();
			                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
			                                       {
			                                           $giftcard_id = $data["giftcard_id"];
			                                           $name = $data["name"];
			                                           $phone = $data["phone"];
			                                           $email = $data["email"];
			                                           $status = $data["status"];
			                                           $voucher = $data["voucher"];
			                                           $created_date = $data["created_date"];
			                                           $created_by = $data["created_by"];
			                                           $redeem_date = $data["redeem_date"];
			                                           $center_id = $data["center_id"];
			                                           $incharge = $data["personal"];
			                                           $branch = $data["branch"];
			                                           
			                                    ?>

												<tbody>
													<tr>
														<td>
															<span style="color: black; font-weight:bold;" >Name: <?php echo $name; ?></span><br>
															<span>Phone: <?php echo $phone; ?></span><br>
															<span>Email: <?php echo $email; ?></span><br>
															<span>Created date: <?php echo $created_date; ?></span>
														</td>
														<td><span style="font-weight:bold; color: black; text-align: center;"><?php echo $voucher; ?></span></td>
														<td><span style="font-weight:bold; color: red; text-align: center;"><?php echo $status; ?></span></td>
														<td>
														    <span style="color: black; font-weight:bold;" >Personal Incharge: <?php echo $incharge; ?></span><br>
															<span>Date Redeem: <?php echo $redeem_date; ?></span><br>
															<span>Branch: <?php echo $branch; ?></span><br>
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
						<?php } ?>
					</div>
				</div>
<?php 
include('system-footer.php');
?>