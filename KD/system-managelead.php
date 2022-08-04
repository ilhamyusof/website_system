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
		  if($roles == "3" || $roles == "1" || $roles == "2"|| $roles == "19" || $roles == "18")
		{
		?>				
        	<div class="app-content my-3 my-md-5">
					<div class="side-app">
						
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">lead tracker</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Sale</a></li>
								<li class="breadcrumb-item active" aria-current="page">Lead Tracker</li>
							</ol>
						</div>
						
						<div class="row">
							<?php 
                        		  if( ($roles == "19" && $centers == '1') || $roles == "18" && $centers == '1')
                        		{
                        		?>
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '1'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							    <?php } if( ($roles == "19" && $centers == '2') || $roles == "18" && $centers == '2'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '2'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '3') || $roles == "18" && $centers == '3'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '3'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '4') || $roles == "18" && $centers == '4'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '4'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '5') || $roles == "18" && $centers == '5'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '5'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '6') || $roles == "18" && $centers == '6'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '6'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '9') || $roles == "18" && $centers == '9'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '9'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '10') || $roles == "18" && $centers == '10'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '10'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '12') || $roles == "18" && $centers == '12'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '12'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '13') || $roles == "18" && $centers == '13'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '13'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '14') || $roles == "18" && $centers == '14'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '14'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( ($roles == "19" && $centers == '15') || $roles == "18" && $centers == '15'){?>
							    <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' AND user.centers_id = '15'");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
								<?php } if( $roles == "1" || $roles == "2" ){?>
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST BY PERSON</h3>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id				
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20','15') and user.status = 'Active' ");

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
																		<a href="system-reportmanagelead.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
							    <?php }
                            		else {
                                ?>
                                
                                <?php } ?>
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
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.status,  user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id = '8' and user.status = 'Active'");

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
    		else {}
        ?>
<?php 
include('system-footer.php');
?>