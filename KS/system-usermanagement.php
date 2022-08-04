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
							<h4 class="page-title">Record User</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Record</a></li>
								<li class="breadcrumb-item active" aria-current="page">User</li>
							</ol>
						</div>
						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<a href="system-user.php" class="btn btn-info">Add New User</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">Record Staff</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Staff Active
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
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>														
																		</tr>
																	</thead>
																	<?php 
								                                        $statement = $conn->prepare("SELECT * FROM user WHERE status = 'Active' ");	
																	
								                                        $statement->execute();
								                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                           $user_id = $data["user_id"];
								                                           $name = $data["name"];
								                                           $email = $data["email"];
								                                           $phone = $data["phone"];
								                                           $position = $data["position"];
								                                           $password = $data["password"];
								                                           $status = $data["status"];
								                                           $created_date = $data["created_date"];
								                                           $roles_id = $data["roles_id"];
								                                           $centers_id = $data["centers_id"];
								                                           $last_login = $data["last_login"];
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<a href="system-user_edit.php?id=<?php echo $data["user_id"]; ?>"><span style="color: blue;" ><?php echo $name; ?></span></a><br>
																				<span><?php echo $email; ?></span><br>
																				<span>Created date: <?php echo $created_date; ?></span>
																			</td>
																			<td><span style="color: Blue;"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-user-view.php?id=<?php echo $data["user_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>
																				<a href="system-closecareer.php?id=<?php echo $data["user_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-danger"><i class="fe fe-trash"></i></button></a>
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

														Staff Inactive
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
																			<th class="wd-15p">Action</th>														
																		</tr>
																	</thead>
																	<?php 
								                                        $statement = $conn->prepare("SELECT * FROM user WHERE status = 'Inactive' ");	
																	
								                                        $statement->execute();
								                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                           $user_id = $data["user_id"];
								                                           $name = $data["name"];
								                                           $email = $data["email"];
								                                           $phone = $data["phone"];
								                                           $position = $data["position"];
								                                           $password = $data["password"];
								                                           $status = $data["status"];
								                                           $created_date = $data["created_date"];
								                                           $roles_id = $data["roles_id"];
								                                           $centers_id = $data["centers_id"];
								                                           $last_login = $data["last_login"];
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<a href="system-user_edit.php?id=<?php echo $data["user_id"]; ?>"><span style="color: blue;" ><?php echo $name; ?></span></a><br>
																				<span><?php echo $email; ?></span><br>
																				<span>Created date: <?php echo $created_date; ?></span>
																			</td>
																			<td><span style="color: Blue;"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-user_edit.php?id=<?php echo $data["user_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>
																				<a href="system-closecareer.php?id=<?php echo $data["user_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-danger"><i class="fe fe-trash"></i></button></a>
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
					</div>
				</div>
<?php 
include('system-footer.php');
?>