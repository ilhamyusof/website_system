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
        
		<?php 
		  if($roles == "11")
		{
		?>	
			<div class="app-content my-3 my-md-5">
				<div class="side-app">
					<?php
				        if(isset($_GET["id"]))
				            {
				            
				                $operation_id = $_GET["id"];
				                // $sql =  "SELECT * FROM training where training_id = :training_id";
				                $sql =  "SELECT * FROM operation where operation_id = :operation_id";

				                $stmt = $conn->prepare($sql);
				                $stmt->bindParam(":operation_id", $operation_id);
				                $stmt->execute();

				                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
				                {
				                    $operation_id = $dt["operation_id"];
				                    $subject = $dt["subject"];
							        $user_id = $dt["user_id"];
							        $objective = $dt["objective"];
				                }
				            }
				        else
				            {
				                echo " Data is not found!";
				            }
			        ?>
					<div class="page-header">
						<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Training</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
						</ol>
					</div>
					
					<div class="row">
						
							<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
								<div class="card-header">
									<h3 class="card-title">LIST PHYSIOTHERAPIST</h3>
								</div>
								<div class="panel-body">
	                                        <div class="row">
	                                        	<div class="table-responsive">
													<table id="example" class="table table-striped table-bordered" style="width:100%">
														<thead>
															<tr>
																<th class="wd-15p">Detail</th>
																<th class="wd-15p">Branch</th>
																<th class="wd-15p">Action</th>
															</tr>
														</thead>
														<?php 
					                                        $statement = $conn->prepare("SELECT
																 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																FROM user
																JOIN roles
																  ON user.roles_id = roles.roles_id
																JOIN centers
																  ON centers.centers_id = user.centers_id WHERE user.roles_id = '8' AND user.status = 'Active'");

					                                        $statement->execute();

					                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
					                                       {
					                                       	extract($data);			                                        
					                                    ?>
														<tbody>
															<tr>
																<td>
																	<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																		<span><?php echo $email; ?></span><br>
																		<span><?php echo $phone; ?></span>
																		
																</td>
																<td>
																	<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																	
																</td>
																
																<td style="text-align: center;">
																	<a href="system-operation-evaluation.php?id=<?= $user_id ?>&operation=<?= $operation_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
					<!-- <div class="row">
						<div class="card">
						<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
						
						<div class="card-body">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default active">
									<div class="panel-heading " role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
												Physiotherapist
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
																<th class="wd-15p">Detail</th>
																<th class="wd-15p">Branch</th>
																<th class="wd-15p">Action</th>
															</tr>
														</thead>
														<?php 
					                                        $statement = $conn->prepare("SELECT
																 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																FROM user
																JOIN roles
																  ON user.roles_id = roles.roles_id
																JOIN centers
																  ON centers.centers_id = user.centers_id WHERE user.roles_id = '8' AND user.status = 'Active'");

					                                        $statement->execute();

					                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
					                                       {
					                                       	extract($data);			                                        
					                                    ?>
														<tbody>
															<tr>
																<td>
																	<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																		<span><?php echo $email; ?></span><br>
																		<span><?php echo $phone; ?></span>
																		
																</td>
																<td>
																	<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																	
																</td>
																
																<td style="text-align: center;">
																	<a href="system-join-training-v1.php?id=<?= $user_id ?> &training=<?= $training_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	
																	

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
					</div> -->
						<!-- /Boxes de Acoes -->
					</div>

				</div>
			</div>
		<?php }
        	else if($roles == "3"){
        ?>
        	<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<?php
					        if(isset($_GET["id"]))
					            {
					            	
					                $sale_id = $_GET["id"];
					                // $sql =  "SELECT * FROM training where training_id = :training_id";
					                $sql =  "SELECT * FROM sale where sale_id = :sale_id";

					                $stmt = $conn->prepare($sql);
					                $stmt->bindParam(":sale_id", $sale_id);
					                $stmt->execute();

					                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
					                {
					                    $sale_id = $dt["sale_id"];
					                    $subject = $dt["subject"];
								        $user_id = $dt["user_id"];
								        $objective = $dt["objective"];
					                }
					            }
					        else
					            {
					                echo " Data is not found!";
					            }
				        ?>
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">SALES</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
							</ol>
						</div>
						
						<div class="row">
							
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST SALE PERSON</h3>
									</div>
									<div class="panel-body">
                                                <div class="row">
                                                	<div class="table-responsive">
														<table id="example" class="table table-striped table-bordered" style="width:100%">
															<thead>
																<tr>
																	<th class="wd-15p">Detail</th>
																	<th class="wd-15p">Branch</th>
																	<th class="wd-15p">Action</th>
																</tr>
															</thead>
															<?php 
						                                        $statement = $conn->prepare("SELECT
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20') AND user.status = 'Active'");

						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);			                                        
						                                    ?>
															<tbody>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																			<span><?php echo $email; ?></span><br>
																			<span><?php echo $phone; ?></span>
																			
																	</td>
																	<td>
																		<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																		
																	</td>
																	
																	<td style="text-align: center;">
																		<a href="system-operation-evaluation.php?id=<?= $user_id ?>&operation=<?= $sale_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
						<!-- <div class="row">
							<div class="card">
							<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
							
							<div class="card-body">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default active">
										<div class="panel-heading " role="tab" id="headingOne">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
													Physiotherapist
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
																	<th class="wd-15p">Detail</th>
																	<th class="wd-15p">Branch</th>
																	<th class="wd-15p">Action</th>
																</tr>
															</thead>
															<?php 
						                                        $statement = $conn->prepare("SELECT
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id = '8' AND user.status = 'Active'");

						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);			                                        
						                                    ?>
															<tbody>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																			<span><?php echo $email; ?></span><br>
																			<span><?php echo $phone; ?></span>
																			
																	</td>
																	<td>
																		<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																		
																	</td>
																	
																	<td style="text-align: center;">
																		<a href="system-join-training-v1.php?id=<?= $user_id ?> &training=<?= $training_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																		
																		

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
						</div> -->
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
        <?php }
        	else if($roles == "24"){
        ?>
        	<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<?php
					        if(isset($_GET["id"]))
					            {
					            	
					                $administration_id = $_GET["id"];
					                // $sql =  "SELECT * FROM training where training_id = :training_id";
					                $sql =  "SELECT * FROM administration where administration_id = :administration_id";

					                $stmt = $conn->prepare($sql);
					                $stmt->bindParam(":administration_id", $administration_id);
					                $stmt->execute();

					                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
					                {
					                    $administration_id = $dt["administration_id"];
					                    $subject = $dt["subject"];
								        $user_id = $dt["user_id"];
								        $objective = $dt["objective"];
					                }
					            }
					        else
					            {
					                echo " Data is not found!";
					            }
				        ?>
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">ADMINISTRATION</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
							</ol>
						</div>
						
						<div class="row">
							
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST ADMINISTRATION OR CLINIC ASSISTANCE</h3>
									</div>
									<div class="panel-body">
                                                <div class="row">
                                                	<div class="table-responsive">
														<table id="example" class="table table-striped table-bordered" style="width:100%">
															<thead>
																<tr>
																	<th class="wd-15p">Detail</th>
																	<th class="wd-15p">Branch</th>
																	<th class="wd-15p">Action</th>
																</tr>
															</thead>
															<?php 
						                                        $statement = $conn->prepare("SELECT
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);			                                        
						                                    ?>
															<tbody>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																			<span><?php echo $email; ?></span><br>
																			<span><?php echo $phone; ?></span>
																			
																	</td>
																	<td>
																		<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																		
																	</td>
																	
																	<td style="text-align: center;">
																		<a href="system-operation-evaluation.php?id=<?= $user_id ?>&operation=<?= $administration_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
        <?php } else if ($roles == "16") { ?>
            <div class="app-content my-3 my-md-5">
					<div class="side-app">
						<?php
					        if(isset($_GET["id"]))
					            {
					            	
					                $customerservices_id = $_GET["id"];
					                // $sql =  "SELECT * FROM training where training_id = :training_id";
					                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

					                $stmt = $conn->prepare($sql);
					                $stmt->bindParam(":customerservices_id", $customerservices_id);
					                $stmt->execute();

					                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
					                {
					                    $customerservices_id = $dt["customerservices_id"];
					                    $subject = $dt["subject"];
								        $user_id = $dt["user_id"];
								        $objective = $dt["objective"];
					                }
					            }
					        else
					            {
					                echo " Data is not found!";
					            }
				        ?>
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
							</ol>
						</div>
						
						<div class="row">
							
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BRANCH</h3>
									</div>
									<div class="panel-body">
                                                <div class="row">
                                                	<div class="table-responsive">
														<table id="example" class="table table-striped table-bordered" style="width:100%">
															<thead>
																<tr>
																	<th class="wd-15p">Detail</th>
																	<th class="wd-15p">Branch</th>
																	<th class="wd-15p">Action</th>
																</tr>
															</thead>
															<?php 
						                                        $statement = $conn->prepare("SELECT
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);			                                        
						                                    ?>
															<tbody>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																			<span><?php echo $email; ?></span><br>
																			<span><?php echo $phone; ?></span>
																			
																	</td>
																	<td>
																		<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																		
																	</td>
																	
																	<td style="text-align: center;">
																		<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
	   <?php } else if ($roles == "15" || $roles == "9" || $roles == "21" ) { ?>
						<!-- branch shah alam -->
						<?php if($centers == "1") { ?>
			            	<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">LIST BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Detail</th>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT
																				 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																				FROM user
																				JOIN roles
																				  ON user.roles_id = roles.roles_id
																				JOIN centers
																				  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				<td>
																					<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																						<span><?php echo $email; ?></span><br>
																						<span><?php echo $phone; ?></span>
																						
																				</td>
																				<td>
																					<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
						<!-- branch johor  -->
						<?php } else if($centers == "2") { ?>
							<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT * FROM centers WHERE centers_id = '2'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				
																				<td>
																					<span style="font-weight: bold;"><?php echo $name; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							<!-- branch wangsa melawati -->
						<?php } else if($centers == "3") { ?>
							<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">LIST BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Detail</th>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT
																				 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																				FROM user
																				JOIN roles
																				  ON user.roles_id = roles.roles_id
																				JOIN centers
																				  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				<td>
																					<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																						<span><?php echo $email; ?></span><br>
																						<span><?php echo $phone; ?></span>
																						
																				</td>
																				<td>
																					<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							<!-- branch kota damansara -->
						<?php } else if ($centers == "4") { ?>
							<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">LIST BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Detail</th>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT
																				 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																				FROM user
																				JOIN roles
																				  ON user.roles_id = roles.roles_id
																				JOIN centers
																				  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				<td>
																					<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																						<span><?php echo $email; ?></span><br>
																						<span><?php echo $phone; ?></span>
																						
																				</td>
																				<td>
																					<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							<!-- branch bandar puteri bangi -->
						<?php } else if ($centers == "5") { ?>
							<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">LIST BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Detail</th>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT
																				 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																				FROM user
																				JOIN roles
																				  ON user.roles_id = roles.roles_id
																				JOIN centers
																				  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				<td>
																					<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																						<span><?php echo $email; ?></span><br>
																						<span><?php echo $phone; ?></span>
																						
																				</td>
																				<td>
																					<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							<!-- branch kuala selangor -->
						<?php } else if ($centers == "6")  { ?>
							<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">LIST BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Detail</th>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT
																				 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																				FROM user
																				JOIN roles
																				  ON user.roles_id = roles.roles_id
																				JOIN centers
																				  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				<td>
																					<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																						<span><?php echo $email; ?></span><br>
																						<span><?php echo $phone; ?></span>
																						
																				</td>
																				<td>
																					<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							<!-- branch bandar baru bangi -->
						<?php } else if ($centers == "9")  { ?>
							<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">LIST BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Detail</th>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT
																				 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																				FROM user
																				JOIN roles
																				  ON user.roles_id = roles.roles_id
																				JOIN centers
																				  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				<td>
																					<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																						<span><?php echo $email; ?></span><br>
																						<span><?php echo $phone; ?></span>
																						
																				</td>
																				<td>
																					<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							<!-- branch krubong melaka -->
						<?php } else if ($centers == "10")  { ?>
							<div class="app-content my-3 my-md-5">
								<div class="side-app">
									<?php
								        if(isset($_GET["id"]))
								            {
								            	
								                $customerservices_id = $_GET["id"];
								                // $sql =  "SELECT * FROM training where training_id = :training_id";
								                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

								                $stmt = $conn->prepare($sql);
								                $stmt->bindParam(":customerservices_id", $customerservices_id);
								                $stmt->execute();

								                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
								                {
								                    $customerservices_id = $dt["customerservices_id"];
								                    $subject = $dt["subject"];
											        $user_id = $dt["user_id"];
											        $objective = $dt["objective"];
								                }
								            }
								        else
								            {
								                echo " Data is not found!";
								            }
							        ?>
									<div class="page-header">
										<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
											<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
										</ol>
									</div>
									
									<div class="row">
										
											<div class="card">
												<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
												<div class="card-header">
													<h3 class="card-title">LIST BRANCH</h3>
												</div>
												<div class="panel-body">
			                                                <div class="row">
			                                                	<div class="table-responsive">
																	<table id="example" class="table table-striped table-bordered" style="width:100%">
																		<thead>
																			<tr>
																				<th class="wd-15p">Detail</th>
																				<th class="wd-15p">Branch</th>
																				<th class="wd-15p">Action</th>
																			</tr>
																		</thead>
																		<?php 
									                                        $statement = $conn->prepare("SELECT
																				 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																				FROM user
																				JOIN roles
																				  ON user.roles_id = roles.roles_id
																				JOIN centers
																				  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21') AND user.status = 'Active'");

									                                       $statement->execute();
									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       extract($data);			                                        
									                                    ?>
																		<tbody>
																			<tr>
																				<td>
																					<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																						<span><?php echo $email; ?></span><br>
																						<span><?php echo $phone; ?></span>
																						
																				</td>
																				<td>
																					<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																					
																				</td>
																				
																				<td style="text-align: center;">
																					<a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
						<?php } else {} ?>
        <?php } 
    		else {}
        ?>
<?php 
include('system-footer.php');
?>