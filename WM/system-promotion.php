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
							<h4 class="page-title">Data Promotion</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data promotion</li>
							</ol>
						</div>
						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<a href="system-add-new-promotion.php" class="btn btn-secondary">Add New Promotion</a>
								</div>
							</div>
						</div>
						 <?php
                             if(isset($_GET['message'])){
                                 $message = $_GET['message'];
                                 echo $message;
                             }
                            ?>
						
						<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Promotion </h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="True"  aria-controls="collapseOne">
															Promotion New 
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
																			<th class="wd-15p">Promotion Detail</th>	
																			<th class="wd-20p">Promotion Status</th>
																			<th class="wd-15p">Action</th>													
																		</tr>
																	</thead>
																	<?php 
								                                        $statement = $conn->prepare("SELECT * FROM promotion WHERE status = 'Open' ");
								                                        $statement->execute();

								                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                           $promotion_id = $data["promotion_id"];
								                                           $title = $data["title"];
								                                           $description = $data["description"];
								                                           $start_date = $data["start_date"];
								                                           $end_date = $data["end_date"];
								                                           $status = $data["status"];
								                                           $image = $data["image"];
								                                           $created_date = $data["created_date"];
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<a href="system-edit-promotion.php?id=<?php echo $data["promotion_id"]; ?>"><span style="color: blue;" ><?php echo $title; ?></span></a><br>
																				<span><?php echo $description; ?></span><br>
																				<span>Created date: <?php echo $created_date; ?></span>
																			</td>
																			<td><span style="color: Blue;"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-edit-promotion.php?id=<?php echo $data["promotion_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>

																				<a href="system-deletepromotion.php?id=<?php echo $data["promotion_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-danger"><i class="fe fe-trash"></i></button></a>
																				
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
														Promotion Close 
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
																			<th class="wd-15p">Promotion Detail</th>	
																			<th class="wd-20p">Promotion Status</th>
																		</tr>
																	</thead>
																	<?php 
								                                        $statement = $conn->prepare("SELECT * FROM promotion WHERE status = 'Close' ");
								                                        $statement->execute();

								                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                           $promotion_id = $data["promotion_id"];
								                                           $title = $data["title"];
								                                           $description = $data["description"];
								                                           $start_date = $data["start_date"];
								                                           $end_date = $data["end_date"];
								                                           $status = $data["status"];
								                                           $image = $data["image"];
								                                           $created_date = $data["created_date"];
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<a href="system-edit-promotion.php?id=<?php echo $data["promotion_id"]; ?>"><span style="color: blue;" ><?php echo $title; ?></span></a><br>
																				<span><?php echo $description; ?></span><br>
																				<span>Created date: <?php echo $created_date; ?></span>
																			</td>
																			<td><span style="color: Blue;"><?php echo $status; ?></span></td>
																			
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