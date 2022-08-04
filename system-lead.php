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
        <!--<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>	-->
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
							<h4 class="page-title" style="text-transform: uppercase;">Clinic Assistant Report</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Clinic Assistant Report</li>
							</ol>
						</div>
	                <?php
                         if(isset($_GET['message'])){
                             $message = $_GET['message'];
                             echo $message;
                         }
                        ?>
						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<a href="system-add-lead.php" class="btn btn-info">Add New Lead</a>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
								<div class="card-header">
									<h3 class="card-title">All Record Clinic Assistant Report</h3>
								</div>
								<div class="card-body">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default active">
											<div class="panel-heading " role="tab" id="headingOne">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
														Lead Status Not Close
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
							                                        $statement = $conn->prepare("SELECT tracker.tracker_id,tracker.lead, tracker.gender, tracker.pain_id, tracker.engagement_id, tracker.status, tracker.centers_id,  tracker.payment, tracker.notes, tracker.FUOne, tracker.FUTwo,tracker.FUThree, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id, user.name, pain.pain_id, pain.type_pain, engagement.engagement_id, engagement.engagement_name,centers.centers_id, centers.name AS branch
																		FROM tracker
																		JOIN user
																		  ON user.user_id = tracker.user_id 
																		JOIN pain
																		  ON pain.pain_id = tracker.pain_id
																		JOIN centers
																		  ON centers.centers_id = tracker.centers_id
																		JOIN engagement
																		  ON engagement.engagement_id = tracker.engagement_id 
																		WHERE tracker.user_id = '$user_id' AND tracker.status IN('Pending','Not Close') ORDER BY created_date DESC ");
							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>
															<tbody>
																<tr>
																	<td>
																		<span style="color: Blue;"><?= $lead; ?></span><br>
																	    <span style="color: Blue;"><stonge>Follow Up 1:</stonge>&nbsp;&nbsp;<?= $FUOne; ?></span><br>
																	    <span style="color: Blue;"><stonge>Follow Up 2:</stonge>&nbsp;&nbsp;<?= $FUTwo; ?></span><br>
																	    <span style="color: Blue;"><stonge>Follow Up 3:</stonge>&nbsp;&nbsp;<?= $FUThree; ?></span><br>
																	</td>
																	<td>
																		<span><stonge>Gender:</stonge> 
																		<?php 
																		if($gender == 'F'){
																			echo "Female";
																		}else { echo "Male";}
																		?>
																		</span><br>
																		<span><stonge>Type Pain:</stonge>  <?= $type_pain; ?></span><br>
																		<span><stonge>Engagement: </stonge> <?= $engagement_name; ?></span><br>
																		<?php 
																				if($status == 'Pending'){
																				?>
																					<stonge>Status:</stonge>&nbsp;&nbsp;<span class="tag tag-danger"><?= $status; ?></span><br>
																				<?php }
																				else if ($status == 'Close'){
																				?>
																					<stonge>Status:</stonge>&nbsp;&nbsp;<span class="tag tag-orange"><?= $status; ?></span><br>
																					<?php }
																				else if ($status == 'Not Close'){
																				?>
																					<stonge>Status:</stonge>&nbsp;&nbsp;<span class="tag tag-yellow"><?= $status; ?></span><br>
																					<?php }
																				else {
																				?>
																					<stonge>Status:</stonge>&nbsp;&nbsp;<span class="tag tag-gray"><?= $status; ?></span><br>
																					
																				<?php } ?>
																		<span><stonge>Branch: </stonge> <?= $branch; ?></span><br>
																		<span><stonge>Created Date:</stonge>  <?= $created_date; ?></span>
																	</td>																			
																	<td style="text-align: center;">
																	<?php if($FUOne == "0000-00-00"){ ?>
																	
																	   <span class="float-center">
																		    <a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editFUOne"		
																				data-tracker_id="<?php echo $tracker_id; ?>"
                                                                                data-status="<?= $status; ?>" 
                                                                                data-FUOne="<?php echo $FUOne;?>">
																			   <i class="fas fa-refresh"> First Follow Up</i>
																			</a>
																		</span>
																		<div class="modal fade" id="editFUOne" tabindex="-1" role="dialog"  aria-hidden="true">
                                                							<div class="modal-dialog" role="document">
                                                								<div class="modal-content">
                                                									<form id="modal" class="form-horizontal" method="POST" action="system-addlead.php" enctype="multipart/form-data">
                                                										<div class="modal-header">
                                                											<h5 class="modal-title" id="example-Modal3">Follow Up Leads</h5>
                                                											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                												<span aria-hidden="true">&times;</span>
                                                											</button>
                                                										</div>
                                                										<div class="modal-body">
                                                												<div class="form-group">
                                                													<label for="recipient-name" class="form-control-label" style = "text-align: left;">Date:</label>
                                                													<input type="date" class="form-control" id="FUOne" name="FUOne">
                                                													<input type="text" class="form-control" id="tracker_id" name="tracker_id" hidden="">
                                                												</div>
                                                												<div class="form-group">
                                                													<label for="recipient-name" class="form-control-label">status:</label>
                                                													<select name="status" id="status" required="required" class="form-control input-sm" required>
                                                													<option value="">-- Choose --</option>
                                                													<option value="Close">Close</option>
                                                													<option value="Not Close">Not Close</option>
                                                													</select>
                                                												</div>
                                                										</div>
                                                										<div class="modal-footer">
                                                											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                											<button type="submit" name="submitFUOne" id="submitFUOne" class="btn btn-primary">Submit</button>
                                                									</div>
                                                									</form>
                                                								</div>
                                                							</div>
                                                						</div>
																	<?php } else if ($FUTwo == "0000-00-00") { ?>
																	    <span class="float-center">
																		    <a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editFUTwo"		
																				data-tracker_id="<?php echo $tracker_id; ?>"
                                                                                data-status="<?= $status; ?>" 
                                                                                data-FUTwo="<?php echo $FUTwo;?>">
																			   <i class="fas fa-refresh">Second Follow Up</i>
																			</a>
																		</span>
																		<div class="modal fade" id="editFUTwo" tabindex="-1" role="dialog"  aria-hidden="true">
                                                							<div class="modal-dialog" role="document">
                                                								<div class="modal-content">
                                                									<form id="modal" class="form-horizontal" method="POST" action="system-addlead.php" enctype="multipart/form-data">
                                                										<div class="modal-header">
                                                											<h5 class="modal-title" id="example-Modal3">Second Follow Up Leads</h5>
                                                											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                												<span aria-hidden="true">&times;</span>
                                                											</button>
                                                										</div>
                                                										<div class="modal-body">
                                                												<div class="form-group">
                                                													<label for="recipient-name" class="form-control-label" style = "text-align: left;">Date:</label>
                                                													<input type="date" class="form-control" id="FUTwo" name="FUTwo">
                                                													<input type="text" class="form-control" id="tracker_id" name="tracker_id" hidden="">
                                                												</div>
                                                												<div class="form-group">
                                                													<label for="recipient-name" class="form-control-label">status:</label>
                                                													<select name="status" id="status" required="required" class="form-control input-sm" required>
                                                													<option value="">-- Choose --</option>
                                                													<option value="Close">Close</option>
                                                													<option value="Not Close">Not Close</option>
                                                													</select>
                                                												</div>
                                                										</div>
                                                										<div class="modal-footer">
                                                											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                											<button type="submit" name="submitFUTwo" id="submitFUTwo" class="btn btn-primary">Submit</button>
                                                									</div>
                                                									</form>
                                                								</div>
                                                							</div>
                                                						</div>
																	<?php } else if ( $FUThree == "0000-00-00") { ?>
																	    <span class="float-center">
																		    <a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editFUThree"		
																				data-tracker_id="<?php echo $tracker_id; ?>"
                                                                                data-status="<?= $status; ?>" 
                                                                                data-FUThree="<?php echo $FUThree;?>">
																			   <i class="fas fa-refresh">Three Follow Up</i>
																			</a>
																		</span>
																		<div class="modal fade" id="editFUThree" tabindex="-1" role="dialog"  aria-hidden="true">
                                                							<div class="modal-dialog" role="document">
                                                								<div class="modal-content">
                                                									<form id="modal" class="form-horizontal" method="POST" action="system-addlead.php" enctype="multipart/form-data">
                                                										<div class="modal-header">
                                                											<h5 class="modal-title" id="example-Modal3">Three Follow Up Leads</h5>
                                                											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                												<span aria-hidden="true">&times;</span>
                                                											</button>
                                                										</div>
                                                										<div class="modal-body">
                                                												<div class="form-group">
                                                													<label for="recipient-name" class="form-control-label" style = "text-align: left;">Date:</label>
                                                													<input type="date" class="form-control" id="FUThree" name="FUThree">
                                                													<input type="text" class="form-control" id="tracker_id" name="tracker_id" hidden="">
                                                												</div>
                                                												<div class="form-group">
                                                													<label for="recipient-name" class="form-control-label">status:</label>
                                                													<select name="status" id="status" required="required" class="form-control input-sm" required>
                                                													<option value="">-- Choose --</option>
                                                													<option value="Close">Close</option>
                                                													<option value="Not Close">Not Close</option>
                                                													</select>
                                                												</div>
                                                										</div>
                                                										<div class="modal-footer">
                                                											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                											<button type="submit" name="submitFUThree" id="submitFUThree" class="btn btn-primary">Submit</button>
                                                									</div>
                                                									</form>
                                                								</div>
                                                							</div>
                                                						</div>
																	<?php } else {}?>
																		
																		
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
													Lead Status Close 
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
																		<th class="wd-15p">Detail Clinic Assistant Report</th>
																		<th class="wd-15p">Detail</th>
																		<th class="wd-20p">Status</th>
																		<th class="wd-15p">Action</th>
																	</tr>
																</thead>
																<?php 
															 //		$user_id = $_SESSION["user_id"];
							         //                               $statement = $conn->prepare("SELECT tracker.tracker_id,tracker.lead, tracker.phone, tracker.inquiring, tracker.identification, tracker.gender, tracker.ic, tracker.pain_id, tracker.package_id, tracker.engagement_id, tracker.status, tracker.centers_id, tracker.therapist_id, tracker.payment, tracker.mri, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id, user.name, pain.pain_id, pain.type_pain, package.package_id, package.package_name, package.package_display, package.price, engagement.engagement_id, engagement.engagement_name,centers.centers_id, centers.name AS branch
																// 		FROM tracker
																// 		JOIN user
																// 		  ON user.user_id = tracker.user_id 
																// 		JOIN pain
																// 		  ON pain.pain_id = tracker.pain_id
																// 		JOIN package
																// 		  ON package.package_id = tracker.package_id
																// 		JOIN centers
																// 		  ON centers.centers_id = tracker.centers_id
																// 		JOIN engagement
																// 		  ON engagement.engagement_id = tracker.engagement_id 
																// 		WHERE tracker.user_id = '$user_id' AND tracker.status = 'Close' ");
							         //                               $statement->execute();

							         //                              while($data = $statement->fetch(PDO::FETCH_ASSOC))
							         //                              {
							         //                              	extract($data);
							         
							                                        $user_id = $_SESSION["user_id"];
							                                        $statement = $conn->prepare("SELECT tracker.tracker_id,tracker.lead, tracker.gender, tracker.pain_id, tracker.engagement_id, tracker.status, tracker.centers_id,  tracker.payment, tracker.notes, tracker.FUOne, tracker.FUTwo,tracker.FUThree, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id, user.name, pain.pain_id, pain.type_pain, engagement.engagement_id, engagement.engagement_name,centers.centers_id, centers.name AS branch
																		FROM tracker
																		JOIN user
																		  ON user.user_id = tracker.user_id 
																		JOIN pain
																		  ON pain.pain_id = tracker.pain_id
																		JOIN centers
																		  ON centers.centers_id = tracker.centers_id
																		JOIN engagement
																		  ON engagement.engagement_id = tracker.engagement_id 
																		WHERE tracker.user_id = '$user_id' AND tracker.status IN('Close') ORDER BY created_date DESC ");
							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>


                                                            	<tbody>
																	<tr>
																	<td>
																		<span style="color: Blue;"><?= $lead; ?></span><br>
																		<span style="color: Blue;"><stonge>Follow Up 1:</stonge>&nbsp;&nbsp;<?= $FUOne; ?></span><br>
																	    <span style="color: Blue;"><stonge>Follow Up 2:</stonge>&nbsp;&nbsp;<?= $FUTwo; ?></span><br>
																	    <span style="color: Blue;"><stonge>Follow Up 3:</stonge>&nbsp;&nbsp;<?= $FUThree; ?></span><br>
																	</td>
																	<td>
																		<span>Gender: 
																		<?php 
																		if($gender == 'F'){
																			echo "Female";
																		}else { echo "Male";}
																		?>
																		</span><br>
																		
																		<span>Type Pain: <?= $type_pain; ?></span><br>
																		
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