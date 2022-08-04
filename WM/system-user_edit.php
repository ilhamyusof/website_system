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
        <?php
            if(isset($_GET["id"]))
            {
                $user_id = $_GET["id"];
                $sql =  "SELECT * FROM user where user_id = :user_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":user_id", $user_id);
                $stmt->execute();

                if($data = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                   $user_id = $data["user_id"];
                   $maritial = $data["maritial"];
                   $bod = $data["bod"];
                   $name = $data["name"];
                   $email = $data["email"];
                   $phone = $data["phone"];
                   $address = $data["address"];
                   $position = $data["position"];
                   $password = $data["password"];
                   $status = $data["status"];
                   $created_date = $data["created_date"];
                   $roles_id = $data["roles_id"];
                   $centers_id = $data["centers_id"];
                   $last_login = $data["last_login"];
                   $salary = $data["salary"];
                   $resignation = $data["resignation"];
                   $image = $data["image"];
                   $department = $data["department"];



                }
            }
            else
            {
                echo " Data is not found!";
            }
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
								<form class="card" method="POST" action="system-edituser.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Register User</h3>
									</div>
									<div class="card-body">
                                        
                                            <?php 
                                                    if ($image == ""){

                                            ?>
                                            <center><div>
                                                <div class="form-group">
                                                    <img src="department/no-video.png" alt="Image" style="width: auto; height: auto;">
                                                </div>
                                                </div>
                                            </center>
                                        <?php } else {?>
                                            <center><div>
                                                <div class="form-group">
                                                    <img src="img/<?php echo $image;?>" alt="Image" style="width: 20%; height: auto;">
                                                </div>
                                                </div>
                                            </center>
                                        <?php } ?>
										<div class="row">
                                            <div class="col-sm-4 col-md-4">
												<div class="form-group">
													<label class="form-label">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>" >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $user_id; ?>" hidden>
												</div>
											</div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Maritial</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="maritial" id="maritial">
                                                            <option value="" <?php if($maritial == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Single" <?php if($maritial == "Single"){ echo "selected"; }else{} ?>>Single</option>
                                                            <option value="Married" <?php if($maritial == "Married"){ echo "selected"; }else{} ?>>Married</option>
                                                            <option value="Widowed" <?php if($maritial == "Widowed"){ echo "selected"; }else{} ?>>Widowed</option>
                                                            <option value="Divorced" <?php if($maritial == "Divorced"){ echo "selected"; }else{} ?>>Divorced</option>
                                                     </select>
                                                </div>
                                            </div>
                                             <?php 
                                                 $birthDate = $bod;   
                                                 // $birthDate = "08/17/1983";
                                                  //explode the date to get month, day and year
                                                  $birthDate = explode("-", $birthDate);
                                                  //get age from date or birthdate
                                                  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                                    ? ((date("Y") - $birthDate[0]) - 1)
                                                    : (date("Y") - $birthDate[0]));
                                                    
                                                   
                                                
                                            ?>
                                           <?php  
                                                   // $bod = "08-27-1992"; // $created_date = date("Y/m/d");
                                                   // $newDate = date("Y/m/d", strtotime($bod));  
                                                    // echo "New date format is: ".$newDate. " (MM-DD-YYYY)";  
                                                ?>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Birth Day Date </label>
                                                    <input type="date" class="form-control" name="bod" id="bod"  value="<?= $bod; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label">Age</label>
                                                    <input type="text" class="form-control" name="age" id="age"  value="<?= $age; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?= $email; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                     <textarea name="address" class="form-control" cols="6" rows="6" id="address"><?= $address;?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-3">
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
                                                             

                                                            <option value="<?php echo $read["roles_id"]; ?>" <?php if($roles_id == $read["roles_id"]){ echo "selected"; } ?>>
                                                            <?php echo $read["display_name"]; ?>
                                                            </option>

                                                            <?php
                                                            }
                                                            ?>

                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
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
                                                              <option value="<?php echo $read["centers_id"]; ?>" <?php if($centers_id == $read["centers_id"]){ echo "selected"; } ?>>
                                                            <?php echo $read["name"]; ?>
                                                            </option>

                                                            <?php
                                                            }
                                                            ?>

                                                      </select>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Refer Department</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="department" id="department">
                                                            <option value="" <?php if($department == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Operation" <?php if($department == "Operation"){ echo "selected"; }else{} ?>>Operation</option>
                                                            <option value="IT" <?php if($department == "IT"){ echo "selected"; }else{} ?>>Information Technology</option>
                                                            <option value="CS" <?php if($department == "CS"){ echo "selected"; }else{} ?>>Customer Service</option>
                                                            <option value="Marketing" <?php if($department == "Marketing"){ echo "selected"; }else{} ?>>Marketing & Sales</option>
                                                            <option value="HR" <?php if($department == "HR"){ echo "selected"; }else{} ?>>Human Resources</option>
                                                            <option value="Account" <?php if($department == "Account"){ echo "selected"; }else{} ?>>Account</option>
                                                            <option value="Training" <?php if($department == "Training"){ echo "selected"; }else{} ?>>Training</option>
                                                            <option value="Admin" <?php if($department == "Admin"){ echo "selected"; }else{} ?>>Admin & Procurement</option>
                                                            <option value="BD" <?php if($department == "BD"){ echo "selected"; }else{} ?>>Business Development</option>
                                                            
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                            <option value="" <?php if($status == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Active" <?php if($status == "Active"){ echo "selected"; }else{} ?>>Active</option>
                                                            <option value="Inactive" <?php if($status == "Inactive"){ echo "selected"; }else{} ?>>Inactive</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Current Salary</label>
                                                    <input type="text" class="form-control" name="salary" id="salary" value="<?= $salary;?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Resignation Date</label>
                                                    <input type="date" class="form-control" name="resignation" id="resignation" value="<?= $resignation; ?>">
                                                </div>
                                            </div>                                            
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Update User</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

