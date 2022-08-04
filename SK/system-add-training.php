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
                                    
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-add-training-v1.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Create New Training</h3>
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
                                                    <input type="text" class="form-control" name="createdby" id="createdby" value="<?php echo $email; ?>" readonly >
                                                    
                                                </div>
                                            </div>
                                            <div class="ccol-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Organizer / Company</label>
                                                    <input type="text" class="form-control" id="organizer" name="organizer">
                                                </div>
                                            </div>
                                            <div class="ccol-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Trainer</label>
                                                <span style="color: black;">Please state the trainer involved the training event.</span>
                                                <div class="card-body">
                                                    <textarea class="content2" name="trainer" id="trainer"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Start Date</label>
                                                    <input type="date" class="form-control" name="startdate" id="startdate" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">End Date</label>
													<input type="date" class="form-control" name="enddate" id="enddate" >
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Start Time</label>
                                                    <input type="Time" class="form-control" name="starttime" id="starttime" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">End Time</label>
                                                    <input type="Time" class="form-control" name="endtime" id="endtime" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Objective Training</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="objective" id="objective"></textarea>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit Training</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

