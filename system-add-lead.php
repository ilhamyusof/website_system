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
       
				<div class="my-3 my-md-5 app-content">
					<div class="side-app">
						<div class="page-header">
							<ol class="breadcrumb1">
											<li class="breadcrumb-item1 active">Management</li>
											<li class="breadcrumb-item1 active">Clinic Assistant Report</li>
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
								<form class="card" method="POST" action="system-addlead.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Create New Lead</h3>
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
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Lead/Name</label>
                                                    <input type="text" class="form-control" name="lead" id="lead">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="gender" id="gender" required>
                                                            <option label="Choose one"></option>
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Type of Pain</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="pain" id="pain" required >
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM pain");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                              <option value="<?php echo $read["pain_id"]; ?>">
                                                                <?php echo $read["type_pain"]; ?>
                                                              </option>
                                                            <?php
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Source on Inquiry or Engagement</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="engagement" id="engagement" required>
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM engagement");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                              <option value="<?php echo $read["engagement_id"]; ?>">
                                                                <?php echo $read["engagement_name"]; ?>
                                                              </option>
                                                            <?php
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Lead Status</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status"  required >
                                                            <option label="Choose one"></option>
                                                            <option value="Close">Close</option>
                                                            <option value="Not Close">Not Close</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="branch" id="branch" required>
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM centers WHERE centers_id !='11' AND centers_id !='8' AND centers_id !='7'");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                              <option value="<?php echo $read["centers_id"]; ?>">
                                                                <?php echo $read["name"]; ?>
                                                              </option>
                                                            <?php
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                              <label class="form-label">Payment Receipt</label>
                                              <!--<span>Please attach all the file related or others example (Payment Receipt) if applicable</span><br>                                                -->
                                              <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="payment" id="payment"/>
                                                    <label class="custom-file-label">Choose file</label>
                                              </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Notes:</label>
    													<!--<span>Please</span><br> -->
    													<textarea class="form-control" rows="1" name="notes" id="notes" ></textarea>
    											</div>
    										</div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

