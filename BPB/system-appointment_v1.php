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
							<h4 class="page-title">Data Appointment / Shah Alam</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Appointment / Inquiry</li>
							</ol>
						</div>
						<!-- <div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<a href="add-new-career.php" class="btn btn-secondary">Add New Career</a>
								</div>
							</div>
						</div> -->
						    
						    <?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('Pending') AND branch IN ('Shah Alam','1')");
                            		$statement1->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$statusnew = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$statuspending = $row["ctn1"]; 
                                			
                                ?>
						<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title"> All Data Appointment / Inquiry</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
															Appointment / Inquiry New <span class="badge badge-danger"><?= $statusnew; ?></span>
														</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	<div class="table-responsive">
																<table id="example4" class="table table-striped table-bordered" style="width:100%">
																	<thead>
																		<tr>
																			<th class="wd-15p">Detail</th>
																			<th class="wd-15p">Status</th>
																			<th class="wd-15p">Message</th>
																			<th class="wd-15p">Package</th>
																			<!-- <th class="wd-15p">Action</th>	 -->											
																		</tr>
																	</thead>
																	<?php 
								                                        $statement = $conn->prepare("SELECT * FROM inquiry WHERE branch IN ('Shah Alam', '1') AND status = 'New'");
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
																				<span class="tag tag-azure"><?php echo $status; ?></span>
																			</td>
																			
																			<td><span><?php echo $message; ?></span></td>
																			<td><span><?php echo $package; ?></span></td>
																			<!-- <td style="text-align: center;">
																				<a href="updateappointment.php?id=<?php echo $data["inquiry_id"]; ?>"><button type="button" name="approve" id="approve" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>
																				<a href="updatecontactus.php?id=<?php echo $data["inquiry_id"]; ?>"><button type="button" class="btn btn-icon btn-primary btn-danger"><i class="fe fe-trash"></i></button></a>
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
											<div class="panel-heading" role="tab" id="headingThwo">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

														Appointment / Inquiry Pending <span class="badge badge-danger"><?= $statuspending; ?></span>
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												<div class="panel-body">
													<div class="row">
														<div class="table-responsive">
																<table id="example5" class="table table-striped table-bordered" style="width:100%">
																	<thead>
																		<tr>
																			<th class="wd-15p">Detail</th>
																			<th class="wd-15p">Status</th>
																			<th class="wd-15p">Message</th>
																			<th class="wd-15p">Remark</th>
																			<th class="wd-15p">Action</th>		
																		</tr>
																	</thead>
																	<?php 
								                                        $statement = $conn->prepare("SELECT * FROM inquiry WHERE branch IN ('Shah Alam', '1') AND status = 'Pending' ");
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
										<div class="panel panel-default mt-2">
											<div class="panel-heading" role="tab" id="headingThree">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

														Appointment / Inquiry Close
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
												<div class="panel-body">
													<div class="row">
														<div class="table-responsive">
																<table id="example6" class="table table-striped table-bordered" style="width:100%">
																	<thead>
																		<tr>
																			<th class="wd-15p">Detail</th>
																			<th class="wd-15p">Status</th>
																			<th class="wd-15p">Message</th>
																			<th class="wd-15p">Remark</th>	
																		</tr>
																	</thead>
																	<?php 
								                                        $statement = $conn->prepare("SELECT * FROM inquiry WHERE branch IN ('Shah Alam', '1') AND status = 'Close' ");
								                                        $statement->execute();

								                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
								                                       {
								                                       	extract($data);			                                        
								                                    ?>

																	<tbody>
																		<tr>
																			<td>
																				<span style="font-weight: 8px;"><?php echo $name; ?></span><br>
																				<span><a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope-open-text"></i> &nbsp;<?php echo $email; ?></a></span><br>
																				<a href="https://web.whatsapp.com/send?phone=6<?php echo $contact; ?>"><span><i class="fa fa-phone-volume"></i> &nbsp;&nbsp;<?php echo $contact; ?></span></a><br>
																				<span><?php echo $respond_date; ?></span>
																			</td>
																			<td>
																				<span class="tag tag-red"><?php echo $status; ?></span>
																			</td>
																			<td><span><?php echo $message; ?></span></td>
																			<td><span><?php echo $remark; ?></span></td>
																			
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
					<?php }}?>
					</div>
				</div>
<?php 
include('system-footer.php');
?>