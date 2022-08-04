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
							<h4 class="page-title">Learning Management System</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Module</a></li>
								<li class="breadcrumb-item active" aria-current="page">LMS</li>
							</ol>
						</div>

						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<!-- <a href="add-new-department.php" class="btn btn-success">Add New Department</a> -->
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Add New Module</button>
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
						<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form id="modal" class="form-horizontal" method="POST" action="system-modalinsertdepartment.php" enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title" id="example-Modal3">Create Module</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Department:</label>
													<input type="text" class="form-control" id="department" name="department">
												</div>
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Category:</label>
													<select class="form-control select2 custom-select" data-placeholder="Choose one" name="category" id="category">
                                                            <option label="Choose one"></option>
                                                            <option value="management">Management</option>
                                                            <option value="therapist">Therapist</option>
                                                            <option value="administrative">Administrative</option>
                                                     </select>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Image:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="image" id="image">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="modal fade" id="editmodule" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form id="modal" class="form-horizontal" method="POST" action="system-editmodulecode.php" enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title" id="example-Modal3">Update Module</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Department:</label>
													<input type="text" class="form-control" id="department" name="department">
													<input type="text" class="form-control" id="id_department" name="id_department" hidden="">
												</div>
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Category:</label>
													
													<!-- <select class="form-control select2 custom-select" data-placeholder="Choose one" name="category" id="category">
                                                            <option label="Choose one"></option>
                                                            <option value="management" >Management</option>
                                                            <option value="therapist" >Therapist</option>
                                                            <option value="administrative">Administrative</option>

                                                     </select> -->
													<select name="category" id="category" required="required" class="form-control input-sm" required>
													<option value="">-- Choose --</option>
													<option value="management">Management</option>
													<option value="therapist">Therapist</option>
													<option value="administrative">Administrative</option>
													</select>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Image:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="image" id="image">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="row">

                             <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">Module</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Module Management
														</a>
													</h4>
												</div>

												

                                                 <!--  loop every user -->
                                                 <?php 
						                      if($roles == "1")
						                  {
						                  ?>
						                   <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>
						                    <?php 
						                    }else if ($roles == "2"){ ?>

						                    	<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'management' AND job_department = 'BUSINESS DEVELOPMENT' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>

						                    <?php }
						                    else if($roles == "3"){
						                    ?>
						                   <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'management' AND job_department = 'SALES' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>

						                    <?php } else if ($roles == "4"){?>
						                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'management' AND job_department = 'HUMAN RESOURCES' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>
						                    <?php } else if($roles == "6"){?>
						                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'management' AND job_department = 'ACCOUNT & FINANCE' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>
						                    <?php } else if($roles == "11"){?>
						                       <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'management' AND job_department = 'OPERATION / PRODUCTION' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>
						                    <?php } else if($roles == "16") { ?>
						                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'management' AND job_department = 'CUSTOMER SERVICE' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>
						                    <?php } else if($roles == "23"){ ?>
						                       <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'therapist' AND job_department = 'TRAINING' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>
						                    <?php } else if($roles == "24") { ?>
						                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<?php 
								                            $statement = $conn->prepare("SELECT * FROM department WHERE category = 'administrative' AND job_department = 'ADMIN & PROCUREMENT' ");
								                            $statement->execute();
								                           	while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                           {
									                           	extract($data);
								                            ?>  
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><img class="img-responsive img-effect" src="department/<?php echo $image; ?>"></a>
																	</div>
																	<div class="card-footer">
																		<a href="system-lmsmanagementdetail.php?id=<?php echo $id_department; ?>"><span class="label label-success float-left mb-0"><?php echo $job_department."<br>";
																				
																		 ?></span></a>
																		<span class="float-right">
																			<a href="system-deletemodule.php?id=<?php echo $id_department; ?>" class="btn btn-danger btn-xs tip" title="Delete">
																				<i class="fas fa-trash"></i>
																			</a>				
																			<a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editmodule"		
																				data-id_department="<?php echo $id_department; ?>"
                                                                                data-job_department="<?php echo $job_department;?>" 
                                                                                data-image="<?php echo $image;?>" 
                                                                                data-category="<?php echo $category;?>">
																			   <i class="fas fa-refresh"></i>
																			</a>
																		</span>
																	</div>
																</div>
															</div>
															<?php
								                            }
								                             ?>
                                                        </div>
                                                    </div>
                                                 </div>
						                    <?php 
						                    } else {
						                    ?>
						                <?php } ?>
                                                 <!--  end loop every user -->
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