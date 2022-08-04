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
				<div class="my-3 my-md-5 app-content">
					<div class="side-app">
						<div class="page-header">
							<ol class="breadcrumb1">
											<li class="breadcrumb-item1 active">Ticket</li>
											<li class="breadcrumb-item1 active">Create New Ticket</li>
							</ol>
							
						</div>
                         <?php
                                    if(isset($_SESSION["session"]))
                                    {
                                        $email = $_SESSION["session"];
                                        $sql = "SELECT * FROM user WHERE email = :email";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindParam(":email", $email);
                                        $stmt->execute();

                                        if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $user_id = $dt["user_id"];
                                            $name = $dt["name"];
                                            $email = $dt["email"];
                                            $phone = $dt["phone"];                                           
                                            // $centers = $dt["centers_id"]; 
                                        }
                                    }
                                    else
                                    {
                                        echo "Data is not found!";
                                    }   


                                    ?>
                                    <?php 
                                    // $statement = "SELECT * FROM user INNER JOIN centers ON user.centers_id = centers.centers_id";
                                    // $statement->execute();
                                    // while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                    //    {
                                    //        $name1 = $data["name"];
                                    //    }                                    
                                    // if(isset($_SESSION["centers"]))
                                    // {
                                    //     $centers_id = $_SESSION["centers"];
                                    //     $sql = "SELECT * FROM user INNER JOIN centers ON user.centers_id = centers.centers_id";
                                    //     $stmt = $conn->prepare($sql);
                                    //     $stmt->bindParam(":centers_id", $centers_id);
                                    //     $stmt->execute();

                                    //     if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                    //     {
                                    //        $user_id = $dt["user_id"];
                                    //         $name = $dt["name"];
                                    //         $email = $dt["email"];
                                    //         $phone = $dt["phone"];                                         
                                    //         $centers = $dt["centers_id"]; 
                                    //     }
                                    // }
                                    // else
                                    // {
                                    //     echo "Data is not found!";
                                    // }  
                                    ?>
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-addticket.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Create New Ticket</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Name Creater</label>
													<input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" readonly >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly >
                                                    <input type="text" class="form-control" name="created_by" id="created_by" value="<?php echo $email; ?>" hidden >
                                                </div>
                                            </div>
                                           <!--  <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?php //echo $centers; ?>" readonly >
                                                </div>
                                            </div> -->
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Refer Department</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="department" id="department">
                                                            <option label="Choose one"></option>
                                                            <option value="Operation">Operation</option>
                                                            <option value="IT">Information Technology</option>
                                                            <option value="CS">Customer Service</option>
                                                            <option value="Marketing">Marketing</option>
                                                            <option value="Sale">Sales</option>
                                                            <option value="HR">Human Resources</option>
                                                            <option value="Account">Account</option>
                                                            <option value="Training">Training</option>
                                                            <option value="Admin">Admin & Procurement</option>
                                                            <option value="BD">Business Development</option>
                                                            <option value="senior_creative">Senior Creative</option>
                                                            <option value="junior_creative">Junior Creative</option>
                                                            <option value="videographer">Videographer</option>
                                                     </select>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Due Date</label>
													<input type="date" class="form-control" name="duedate" id="duedate" >
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Prioritize</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="prioritize" id="prioritize">
                                                            <option label="Choose one"></option>
                                                            <option value="Urgent">Urgent</option>
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Title / Type Of Content</label>
                                                    <input type="text" class="form-control" name="type" id="type">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Your Message / Related Issue</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="description" id="description"></textarea>
                                                    <!-- <textarea name="description" class="form-control" cols="6" rows="6" id="description"></textarea> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                              <label class="form-label">File Related</label>
                                              <span>Please attach all the file related or others example (Document,image,Video) if applicable</span><br>                                                
                                              <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="document" id="document">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                            </div>
                                            
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit Ticket</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

