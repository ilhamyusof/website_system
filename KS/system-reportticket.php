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

				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Report Ticket</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Ticket</a></li>
								<li class="breadcrumb-item active" aria-current="page">Report Ticket</li>
							</ol>
						</div>
						<?php 
	                      if($roles == "1")
		                  {
		                  ?>
						<div class="card">
							<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
							<div class="card-header">
								<h3 class="card-title">All Record Ticket</h3>
							</div>
							<div class="card-body">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default active">
										<div class="panel-heading " role="tab" id="headingOne">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
													Ticket New 
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
																	<th class="wd-15p">Detail</th>
																	<th class="wd-20p">Status</th>
																	<!-- <th class="wd-15p">Action</th>	 -->
																</tr>
															</thead>
															<?php 
							                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'IT'");

							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>
															<tbody>
																<tr>
																	<td>
																		<span style="color: Blue;"><?= $created_by; ?></span><br>
																		<span>Apply date: <?= $created_date; ?></span>
																	</td>
																	<td>
																		<span style="color: Blue;"><?= $type; ?></span><br>
																		<span>Due date: <?= $duedate; ?></span><br>
																		<?php 
																		if($prioritize == 'Urgent'){
																		?>
																			<span class="tag tag-danger"><?= $prioritize; ?></span>
																		<?php }
																		else if ($prioritize == 'High'){
																		?>
																			<span class="tag tag-orange"><?= $prioritize; ?></span>
																			<?php }
																		else if ($prioritize == 'Medium'){
																		?>
																			<span class="tag tag-yellow"><?= $prioritize; ?></span>
																			<?php }
																		else {
																		?>
																			<span class="tag tag-gray"><?= $prioritize; ?></span>
																		<?php } ?>
																	</td>			
																	<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																	<td style="text-align: center;">
																		<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																		
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

												Ticket Close 
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
																	<th class="wd-15p">Detail</th>
																	<th class="wd-20p">Status</th>
																	<th class="wd-15p">Action</th>	
																</tr>
															</thead>
															<?php 
							                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'IT'");
							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>

															<tbody>
																<tr>
																	<td>
																		<span style="color: Blue;"><?= $created_by; ?></span><br>
																		<span>Apply date: <?= $created_date; ?></span>
																	</td>
																	<td>
																		<span style="color: Blue;"><?= $type; ?></span><br>
																		<span>Due date: <?= $duedate; ?></span><br>
																		<?php 
																		if($prioritize == 'Urgent'){
																		?>
																			<span class="tag tag-danger"><?= $prioritize; ?></span>
																		<?php }
																		else if ($prioritize == 'High'){
																		?>
																			<span class="tag tag-orange"><?= $prioritize; ?></span>
																			<?php }
																		else if ($prioritize == 'Medium'){
																		?>
																			<span class="tag tag-yellow"><?= $prioritize; ?></span>
																			<?php }
																		else {
																		?>
																			<span class="tag tag-gray"><?= $prioritize; ?></span>
																		<?php } ?>
																	</td>																			
																	<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																	<td style="text-align: center;">
																		<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php 
		                    }else if ($roles == "2"){ ?>
		                <div class="card">
							<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
							<div class="card-header">
								<h3 class="card-title">All Record Ticket</h3>
							</div>
							<div class="card-body">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default active">
										<div class="panel-heading " role="tab" id="headingOne">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
													Ticket New 
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
																	<th class="wd-15p">Detail</th>
																	<th class="wd-20p">Status</th>
																	<!-- <th class="wd-15p">Action</th>	 -->
																</tr>
															</thead>
															<?php 
							                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'BD'");

							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>
															<tbody>
																<tr>
																	<td>
																		<span style="color: Blue;"><?= $created_by; ?></span><br>
																		<span>Apply date: <?= $created_date; ?></span>
																	</td>
																	<td>
																		<span style="color: Blue;"><?= $type; ?></span><br>
																		<span>Due date: <?= $duedate; ?></span><br>
																		<?php 
																		if($prioritize == 'Urgent'){
																		?>
																			<span class="tag tag-danger"><?= $prioritize; ?></span>
																		<?php }
																		else if ($prioritize == 'High'){
																		?>
																			<span class="tag tag-orange"><?= $prioritize; ?></span>
																			<?php }
																		else if ($prioritize == 'Medium'){
																		?>
																			<span class="tag tag-yellow"><?= $prioritize; ?></span>
																			<?php }
																		else {
																		?>
																			<span class="tag tag-gray"><?= $prioritize; ?></span>
																		<?php } ?>
																	</td>			
																	<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																	<td style="text-align: center;">
																		<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																		
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

												Ticket Close 
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
																	<th class="wd-15p">Detail</th>
																	<th class="wd-20p">Status</th>
																	<th class="wd-15p">Action</th>	
																</tr>
															</thead>
															<?php 
							                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'BD'");
							                                        $statement->execute();

							                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
							                                       {
							                                       	extract($data);
							                                ?>

															<tbody>
																<tr>
																	<td>
																		<span style="color: Blue;"><?= $created_by; ?></span><br>
																		<span>Apply date: <?= $created_date; ?></span>
																	</td>
																	<td>
																		<span style="color: Blue;"><?= $type; ?></span><br>
																		<span>Due date: <?= $duedate; ?></span><br>
																		<?php 
																		if($prioritize == 'Urgent'){
																		?>
																			<span class="tag tag-danger"><?= $prioritize; ?></span>
																		<?php }
																		else if ($prioritize == 'High'){
																		?>
																			<span class="tag tag-orange"><?= $prioritize; ?></span>
																			<?php }
																		else if ($prioritize == 'Medium'){
																		?>
																			<span class="tag tag-yellow"><?= $prioritize; ?></span>
																			<?php }
																		else {
																		?>
																			<span class="tag tag-gray"><?= $prioritize; ?></span>
																		<?php } ?>
																	</td>																			
																	<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																	<td style="text-align: center;">
																		<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php }else if($roles == "3"){?>
		                   	<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Ticket</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Ticket New 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<!-- <th class="wd-15p">Action</th>	 -->
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'Marketing'");

									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>
																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																				
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

														Ticket Close 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>	
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'Marketing'");
									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>																			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php } else if ($roles == "4"){?>
							<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Ticket</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Ticket New 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<!-- <th class="wd-15p">Action</th>	 -->
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'HR'");

									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>
																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																				
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

														Ticket Close 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>	
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'HR'");
									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>																			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php } else if($roles == "6"){?>
							<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Ticket</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Ticket New 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<!-- <th class="wd-15p">Action</th>	 -->
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'Account'");

									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>
																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																				
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

														Ticket Close 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>	
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'Account'");
									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>																			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php } else if($roles == "11"){?>
							<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Ticket</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Ticket New 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<!-- <th class="wd-15p">Action</th>	 -->
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'Operation'");

									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>
																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																				
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

														Ticket Close 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>	
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'Operation'");
									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>																			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php } else if($roles == "16"){?>
							<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Ticket</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Ticket New 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<!-- <th class="wd-15p">Action</th>	 -->
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'CS'");

									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>
																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																				
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

														Ticket Close 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>	
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'CS'");
									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>																			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php } else if($roles == "23"){ ?>
							<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Ticket</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Ticket New 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<!-- <th class="wd-15p">Action</th>	 -->
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'Training'");

									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>
																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<!-- <a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a> -->
																				
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

														Ticket Close 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>	
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'Training'");
									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>																			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php } else if($roles == "24") { ?>
							<div class="card">
								<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">All Record Ticket</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Ticket New 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<!-- <th class="wd-15p">Action</th>	 -->
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' AND department = 'Admin'");

									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>
																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<!-- <td style="text-align: center;">
																				<a href="system-view-ticket.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-blue" ><i class="mdi mdi-lead-pencil"></i>&nbsp;View</button></a>
																				
																			</td> -->
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

														Ticket Close 
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
																			<th class="wd-15p">Detail</th>
																			<th class="wd-20p">Status</th>
																			<th class="wd-15p">Action</th>	
																		</tr>
																	</thead>
																	<?php 
									                                        $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'Close' AND department = 'Admin'");
									                                        $statement->execute();

									                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
									                                       {
									                                       	extract($data);
									                                ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="color: Blue;"><?= $created_by; ?></span><br>
																				<span>Apply date: <?= $created_date; ?></span>
																			</td>
																			<td>
																				<span style="color: Blue;"><?= $type; ?></span><br>
																				<span>Due date: <?= $duedate; ?></span><br>
																				<?php 
																				if($prioritize == 'Urgent'){
																				?>
																					<span class="tag tag-danger"><?= $prioritize; ?></span>
																				<?php }
																				else if ($prioritize == 'High'){
																				?>
																					<span class="tag tag-orange"><?= $prioritize; ?></span>
																					<?php }
																				else if ($prioritize == 'Medium'){
																				?>
																					<span class="tag tag-yellow"><?= $prioritize; ?></span>
																					<?php }
																				else {
																				?>
																					<span class="tag tag-gray"><?= $prioritize; ?></span>
																				<?php } ?>
																			</td>																			
																			<td style="text-align: center;"><span class="tag tag-azure"><?php echo $status; ?></span></td>
																			<td style="text-align: center;">
																				<a href="system-view-ticket_v1.php?id=<?php echo $data["ticket_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-tune"></i>&nbsp;View</button></a>
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
						<?php 
		                    } else { ?>
		                <?php } ?>
			        </div>
				</div>
<?php 
include('system-footer.php');
?>