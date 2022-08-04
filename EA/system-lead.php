<?php
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
            	if($roles == "3"){
            ?>
            	<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">staff evaluation</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Sale</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="card">									
									<div class="card-header">
										<h3 class="card-title">Evaluation Sale</h3>
									</div>
									<div class="card-body">
							<!-- Boxes de Acoes -->
								<?php 
	                                $statement = $conn->prepare("SELECT * FROM sale");
	                                $statement->execute();

	                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
	                               {
	                               	extract($data);			                                        
	                            ?>
										<div class="list-group">
											<a href="system-user-operation-evaluation.php?id=<?= $sale_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1" style="color: #94171b;"><?php echo $subject; ?></h5>
													<!-- <small>3 days ago</small> -->
												</div>
												<p class="mb-1"><?php echo $objective; ?></p>
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
			<?php } else if($roles =="13" || $roles =="15" || $roles =="20"){ ?>
				
			    <div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">lead tracking</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Lead Tracker</li>
							</ol>
						</div>

						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<a href="system-add-lead.php" class="btn btn-info">Add New Lead Tracker</a>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
								<div class="card-header">
									<h3 class="card-title">All Record Lead Tracking</h3>
								</div>
								<div class="card-body">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default active">
											<div class="panel-heading " role="tab" id="headingOne">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
														Lead Tracking Pending & Not Close 
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
																	<th class="wd-15p">Detail Lead Tracker</th>
																	<th class="wd-15p">Detail</th>
																	<th class="wd-20p">Status</th>
																	<th class="wd-15p">Action</th>	
																</tr>
															</thead>
															<?php 
															 		$user_id = $_SESSION["user_id"];
							                                        $statement = $conn->prepare("SELECT tracker.tracker_id,tracker.lead, tracker.phone, tracker.inquiring, tracker.identification, tracker.gender, tracker.ic, tracker.pain_id, tracker.package_id, tracker.engagement_id, tracker.status, tracker.centers_id, tracker.therapist_id, tracker.payment, tracker.mri, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id, user.name, pain.pain_id, pain.type_pain, package.package_id, package.package_name, package.package_display, package.price, engagement.engagement_id, engagement.engagement_name,centers.centers_id, centers.name AS branch
																		FROM tracker
																		JOIN user
																		  ON user.user_id = tracker.user_id 
																		JOIN pain
																		  ON pain.pain_id = tracker.pain_id
																		JOIN package
																		  ON package.package_id = tracker.package_id
																		JOIN centers
																		  ON centers.centers_id = tracker.centers_id
																		JOIN engagement
																		  ON engagement.engagement_id = tracker.engagement_id 
																		WHERE tracker.user_id = '$user_id' AND tracker.status IN('Pending','Not Close') ");
							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>
															<tbody>
																<tr>
																	<td>
																		<span style="color: Blue;"><?= $lead; ?></span><br>
																		<span>Contact Number: <?= $phone; ?></span><br>
																		
																	</td>
																	<td>
																		<span>Inquiring: <?= $inquiring; ?></span><br>
																		<span>Identification: <?= $identification; ?></span><br>
																		<span>Gender: 
																		<?php 
																		if($gender == 'F'){
																			echo "Female";
																		}else { echo "Male";}
																		?>
																		</span><br>
																		<span>IC Number: <?= $ic; ?></span><br>
																		<span>Type Pain: <?= $type_pain; ?></span><br>
																		<span>Type Package: <?= $package_display; ?></span><br>
																		<span>Engagement: <?= $engagement_name; ?></span><br>
																		<span>Status: <?= $status; ?></span><br>
																		<span>Branch: <?= $branch; ?></span><br>
																		<span>Created Date: <?= $created_date; ?></span>
																	</td>																			
																	<td style="text-align: center;">
																		<?php 
																				if($status == 'Pending'){
																				?>
																					<span class="tag tag-danger"><?= $status; ?></span>
																				<?php }
																				else if ($status == 'Close'){
																				?>
																					<span class="tag tag-orange"><?= $status; ?></span>
																					<?php }
																				else if ($status == 'Not Close'){
																				?>
																					<span class="tag tag-yellow"><?= $status; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $status; ?></span>
																				<?php } ?>


																	</td>
																	<td style="text-align: center;">
																		<a href="system-lead-view.php?id=<?php echo $tracker_id; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a>
																		<!-- <a href="reject-career.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="reject" id="reject" class="btn btn-icon btn-primary btn-danger" ><i class="mdi mdi-tune"></i>&nbsp;Reject</button></a> -->
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

													Lead Tracking Close 
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
																		<th class="wd-15p">Detail Lead Tracker</th>
																		<th class="wd-15p">Detail</th>
																		<th class="wd-20p">Status</th>
																		<th class="wd-15p">Action</th>
																	</tr>
																</thead>
																<?php 
															 		$user_id = $_SESSION["user_id"];
							                                        $statement = $conn->prepare("SELECT tracker.tracker_id,tracker.lead, tracker.phone, tracker.inquiring, tracker.identification, tracker.gender, tracker.ic, tracker.pain_id, tracker.package_id, tracker.engagement_id, tracker.status, tracker.centers_id, tracker.therapist_id, tracker.payment, tracker.mri, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id, user.name, pain.pain_id, pain.type_pain, package.package_id, package.package_name, package.package_display, package.price, engagement.engagement_id, engagement.engagement_name,centers.centers_id, centers.name AS branch
																		FROM tracker
																		JOIN user
																		  ON user.user_id = tracker.user_id 
																		JOIN pain
																		  ON pain.pain_id = tracker.pain_id
																		JOIN package
																		  ON package.package_id = tracker.package_id
																		JOIN centers
																		  ON centers.centers_id = tracker.centers_id
																		JOIN engagement
																		  ON engagement.engagement_id = tracker.engagement_id 
																		WHERE tracker.user_id = '$user_id' AND tracker.status = 'Close' ");
							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>

																<tbody>
																	<tr>
																	<td>
																		<span style="color: Blue;"><?= $lead; ?></span><br>
																		<span>Contact Number: <?= $phone; ?></span><br>
																		
																	</td>
																	<td>
																		<span>Inquiring: <?= $inquiring; ?></span><br>
																		<span>Identification: <?= $identification; ?></span><br>
																		<span>Gender: 
																		<?php 
																		if($gender == 'F'){
																			echo "Female";
																		}else { echo "Male";}
																		?>
																		</span><br>
																		<span>IC Number: <?= $ic; ?></span><br>
																		<span>Type Pain: <?= $type_pain; ?></span><br>
																		<span>Type Package: <?= $package_display; ?></span><br>
																		<span>Engagement: <?= $engagement_name; ?></span><br>
																		<span>Status: <?= $status; ?></span><br>
																		<span>Branch: <?= $branch; ?></span><br>
																		<span>Created Date: <?= $created_date; ?></span>
																	</td>																			
																	<td style="text-align: center;">
																		<?php 
																				if($status == 'Pending'){
																				?>
																					<span class="tag tag-danger"><?= $status; ?></span>
																				<?php }
																				else if ($status == 'Close'){
																				?>
																					<span class="tag tag-orange"><?= $status; ?></span>
																					<?php }
																				else if ($status == 'Not Close'){
																				?>
																					<span class="tag tag-yellow"><?= $status; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $status; ?></span>
																				<?php } ?>


																	</td>
																	<td style="text-align: center;">
																		<a href="system-lead-view-v1.php?id=<?php echo $tracker_id; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a>
																		<!-- <a href="reject-career.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="reject" id="reject" class="btn btn-icon btn-primary btn-danger" ><i class="mdi mdi-tune"></i>&nbsp;Reject</button></a> -->
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
						</div>
						
					</div>
				</div>
            <?php } 
        		else {}
            ?>
<?php 
include('system-footer.php');
?>