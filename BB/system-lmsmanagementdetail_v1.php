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
					<?php
                            if(isset($_GET["id"]))
                            {
                                $id_taskdepartment = $_GET["id"];
                                $moduledepartment_id = $_GET["module"];
                                $sql =  "SELECT * FROM taskdepartment where id_taskdepartment = :id_taskdepartment";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":id_taskdepartment", $id_taskdepartment);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $id_taskdepartment = $dt["id_taskdepartment"];
                                    $module = $dt["module"];
                                    $description = $dt["description"];
                                    $image = $dt["image"];
                                    $document = $dt["document"];
                                    $thumbnail = $dt["thumbnail"];                               
                                    $video = $dt["video"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b;"><?= $module; ?></h4> 
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Module</a></li>
								<li class="breadcrumb-item active" aria-current="page">LMS</li>
							</ol>
						</div>						
						<div class="modal fade" id="edittaskmodule" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form id="modal" class="form-horizontal" method="POST" action="system-edittaskmodulecode.php" enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title" id="example-Modal3">Update Specific Module / Task</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Title/Module:</label>
													<input type="text" class="form-control" id="module" name="module">
													<input type="text" class="form-control" id="moduledepartment_id" name="moduledepartment_id" value="<?php echo $_GET["id"]; ?>" hidden>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="form-control-label">Description:</label>
													<textarea class="form-control" rows="10" name="description" id="description" ></textarea>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Image Module:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="image" id="image">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Document:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="document" id="document">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">Thumbnail Image:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
	                                                    <label class="custom-file-label">Choose file</label>
		                                            </div>
												</div>
												<div class="form-group">
													<label for="message-text" class="form-control-label">video:</label>
													<div class="custom-file">
	                                                    <input type="file" class="custom-file-input" name="video" id="video">
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
							<div class="col-md-12">
								<div class="card b-1 hover-shadow mb-20">
									<div class="media card-body p-0">
										<div class="product-content product-wrap w-100 clearfix">
											<div class="row">
													<div class="col-md-5 col-sm-12 col-xs-12">
														<?php
			                                            if ($thumbnail == "" && $video == ""){
			                                            ?>
															
															<div class="col-sm-12 col-md-12">
				                                                <div class="form-group">
																		<img src="department/no-video.png" alt="Image" style="width: auto; height: auto;">
				                                                </div>
			                                            	</div>
														<?php 
			                                            } else { ?>
			                                            	<div class="product-image">
																<div class="media card-body">
	                                                        <video
	                                                            id="my-video"
	                                                            class="video-js"
	                                                            controls
	                                                            preload="auto"
	                                                            width="640"
	                                                            height="400"
	                                                            poster="department/video/<?php echo $thumbnail; ?>"
	                                                            data-setup="{}"
	                                                          >
	                                                            <source src="department/video/<?php echo $video; ?>" type="video/mp4" readonly />
	                                                          </video>
	                                                        </div>
															</div>
			                                            <?php
			                                            }			                                            
			                                            ?>
													</div>
													<div class="col-md-7 col-sm-12 col-xs-12">
													<div class="product-deatil">
														<h5 class="name">
															<a href="#">
																<?= $module; ?> <!-- <span class="text-muted">Category</span> -->
															</a>
															<?php 
															if($roles == "1"  || $roles == "2" || $roles == "3"  || $roles == "4" || $roles == "6"  || $roles == "11" || $roles == "16"  || $roles == "23" || $roles == "24" || $roles == "28")
															{
															?>
															<span class="float-right">
																<a href="#" class="btn btn-danger btn-xs tip" title="Delete">
																	<i class="fas fa-trash"></i>
																</a>				
																<a href="#" class="btn btn-info btn-xs tip" title="Update" data-toggle="modal" data-target="#edittaskmodule"		
																	data-id_taskdepartment="<?php echo $id_taskdepartment; ?>"
															        data-module="<?php echo $module;?>" 
															        data-description="<?php echo $description;?>"
															        data-image="<?php echo $image;?>"
															        data-document="<?php echo $document;?>"
															        data-thumbnail="<?php echo $thumbnail;?>"
															        data-video="<?php echo $video;?>">
																   <i class="fas fa-refresh"></i>
																</a>
															</span>
														<?php } else{} ?>
														</h5>

														<span class="tag1"></span>

													</div>
													<div class="description">
														<p style="text-align: justify;"><?= $description; ?> </p><br>
														<?php
			                                            if ($document != null){
			                                            ?>
			                                            <div class="row">
				                                            <div class="col-sm-12 col-md-12">
				                                                <div class="form-group">
				                                                    <!-- <label class="form-label">Attachment File</label> -->
				                                                    <a href="department/<?php echo $document; ?>" target="_blank"><i class="fa fa-file-pdf-o" style="font-size:100px;color:red"></i></a><br>
				                                                </div>
				                                            </div>
				                                            <br>
				                                            <br>
				                                            <br>
				                                            <br>
				                                            <br>
				                                            <br> 
				                                            
			                                        	</div>
			                                            <?php 
			                                            } else { }			                                            
			                                            ?>

													</div>
												</div>
											</div>
											<center>
											<div class="col-sm-12 col-md-12">
                                            	<a class="btn text-white center-block bg-gradient-primary" href="system-checklist.php?id=<?php echo $id_taskdepartment; ?>&user=<?php echo $user;?>&module=<?php echo $moduledepartment_id; ?>&title=<?php echo $module ?>">Complete <i class="fas fa-check"></i></a>
                                            </div></center>
                                            <br><br>
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