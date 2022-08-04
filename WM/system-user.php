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
            $email = $_SESSION["session"];
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
											<li class="breadcrumb-item1 active">User Panel</li>
                                            <li class="breadcrumb-item1 active">Register user</li>
							</ol>
						</div>
                        
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-adduser.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Register User</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-4 col-md-4">
												<div class="form-group">
													<label class="form-label">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" >
												</div>
											</div>
                                            
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Maritial Status</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="maritial" id="maritial">
                                                            <option label="Choose one"></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Divorced">Divorced</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Birth Day Date</label>
                                                    <input type="date" class="form-control" name="bod" id="bod" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                     <textarea name="address" class="form-control" cols="6" rows="6" id="address"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Roles</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="role" id="role">
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM roles");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                              <option value="<?php echo $read["roles_id"]; ?>">
                                                                <?php echo $read["display_name"]; ?>
                                                              </option>
                                                            <?php
                                                            }
                                                            ?>

                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4">
												<div class="form-group">
													<label class="form-label">Branch</label>
                                                      <select class="form-control select2 custom-select" data-placeholder="Choose one" name="branch" id="branch">
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM centers");
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
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Refer Department</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="department" id="department">
                                                            <option label="Choose one"></option>
                                                            <option value="Operation">Operation</option>
                                                            <option value="IT">Information Technology</option>
                                                            <option value="CS">Customer Service</option>
                                                            <option value="Marketing">Marketing & Sales</option>
                                                            <option value="HR">Human Resources</option>
                                                            <option value="Account">Account</option>
                                                            <option value="Training">Training</option>
                                                            <option value="Admin">Admin & Procurement</option>
                                                            <option value="BD">Business Development</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Current Salary</label>
                                                    <input type="text" class="form-control" name="salary" id="salary" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Resignation Date</label>
                                                    <input type="date" class="form-control" name="resignation" id="resignation" >
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Employee Status</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                            <option label="Choose one"></option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                     </select>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-4 col-md-4">
                                                <label class="form-label">Image Employee</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image" id="image">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>                                           
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Register User</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

