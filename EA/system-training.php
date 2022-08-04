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
            $email = $_SESSION["session"];
            $user_id = $_SESSION["user_id"];
            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>
				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">TRAINING</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Module</a></li>
								<li class="breadcrumb-item active" aria-current="page">Training</li>
							</ol>
						</div>

						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<a href="system-add-training.php" class="btn btn-info">Add New Training</a>
								</div>
								
								<br>
								<?php
                             if(isset($_GET['message'])){
                                 $message = $_GET['message'];
                                 echo $message;
                             }
                            ?>
							</div>

						</div>
						<div class="card">
							<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
							<div class="card-header">
								<h3 class="card-title"> All Record Training</h3>
							</div>
							<div class="card-body">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default active">
										<div class="panel-heading " role="tab" id="headingOne">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
													Training New 
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
																	<th class="wd-15p">Detail Traning</th>
																	<th class="wd-15p">Date Training</th>
																	<th class="wd-20p">TIme Training</th>
																	<th class="wd-15p">Organizer</th>
																	<th class="wd-15p">Action</th>
																</tr>
															</thead>
															<?php 
						                                        $statement = $conn->prepare("SELECT * FROM training WHERE status = 'Open'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);			                                        
						                                    ?>
															<tbody>
																<tr>
																	<td>
																		<a href="system-edit-training.php?id=<?php echo $data["training_id"]; ?>"><span style="font-weight: 8px; font-weight: bold;"><?php echo $subject; ?></span></a><br><br>
																			<span>Objective :</span>
																			<span><?php echo $objective; ?></span>
																			
																	</td>
																	<td>

																		<span style="font-weight: bold;"><?php 
																			$new = date('d M Y', strtotime($startdate));
																			echo $new; ?>
																		</span> until
																		<span style="font-weight: bold;"><?php 
																		$new1 = date('d M Y', strtotime($enddate));
																			echo $new1; ?>
																			
																		</span>
																	</td>
																	<td>
																		<span style="font-weight: bold;"><?php 
																		$new2 = date('h:i A', strtotime($starttime));
																		echo $new2;
																		?>				
																		</span> until
																		<span style="font-weight: bold;"><?php 
																		$new3 = date('h:i A', strtotime($endtime));
																		echo $new3;
																		?></span>
																	</td>
																	<td>
																		<span style="font-weight: bold;"><?php echo $organizer; ?></span><br><br>
																		<span>Trainer :</span>
																		<span><?php echo $trainer; ?></span>
																	</td>
																	
																	<td style="text-align: center;">
																		
																		<a href="system-edit-training.php?id=<?php echo $data["training_id"]; ?>"><button type="button" class="btn btn-warning btn-xs tip"><i class="fas fa-pencil-alt" ></i></button></a>
																		
																		<a href="system-join-training.php?id=<?php echo $data["training_id"]; ?>"><button type="button" class="btn btn-info btn-xs tip"><i class="fas fa-refresh" ></i></button></a>

																		<a href="system-delete-training.php?id=<?php echo $data["training_id"]; ?>"><button type="button" class="btn btn-danger btn-xs tip"><i class="fe fe-trash"></i></button></a>

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
									<div class="panel-heading" role="tab" id="headingThwo">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

												Training Close
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
																	<th class="wd-15p">Detail</th>
																	<th class="wd-15p">Status</th>
																	<th class="wd-20p">Branch</th>
																	<th class="wd-15p">Message</th>
																	<th class="wd-15p">Remark</th>
																	<th class="wd-15p">Action</th>		
																</tr>
															</thead>
															<?php 
						                                        $statement = $conn->prepare("SELECT * FROM inquiry WHERE status = 'Pending' ");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);			                                        
						                                    ?>

															<tbody>
																<tr>
																	<td>
																		<a href="system-updateappointment.php?id=<?php echo $data["inquiry_id"]; ?>"><span style="font-weight: 8px;"><?php echo $name; ?></span></a><br>
																		<span><a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope-open-text"></i> &nbsp;<?php echo $email; ?></a></span><br>
																		<a href="https://web.whatsapp.com/send?phone=6<?php echo $contact; ?>"><span><i class="fa fa-phone-volume"></i> &nbsp;&nbsp;<?php echo $contact; ?></span></a><br>
																		<span><?php echo $respond_date; ?></span>
																	</td>
																	<td>
																		<span class="tag tag-yellow"><?php echo $status; ?></span>
																	</td>
																	<td>
																		<span><?php echo $branch; ?></span>
																	</td>
																	<td><span><?php echo $message; ?></span></td>
																	<td><span><?php echo $remark; ?></span></td>
																	<td style="text-align: center;">
																		<a href="system-updateappointment2.php?id=<?php echo $data["inquiry_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>
																		
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
<?php 
include('system-footer.php');
?>