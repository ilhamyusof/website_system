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
        
       
				<div class="my-3 my-md-5 app-content">
					<div class="side-app">
						<div class="page-header">
							<ol class="breadcrumb1">
											<li class="breadcrumb-item1 active">Career Management</li>
											<li class="breadcrumb-item1 active">Register Career </li>
							</ol>
							
						</div>
                         <?php
                            if(isset($_GET["id"]))
                            {
                                $job_id = $_GET["id"];
                                $sql =  "SELECT * FROM job where job_id = :job_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":job_id", $job_id);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $job_id = $dt["job_id"];
                                    $title = $dt["title"];
                                    $type_job = $dt["type_job"];
                                    $salary = $dt["salary"];
                                    $location = $dt["location"];
                                    $description = $dt["description"];
                                    $requirement = $dt["requirement"];
                                    $benefit = $dt["benefit"];
                                    $company = $dt["company"];
                                    $status = $dt["status"];
                                    $created_date = $dt["created_date"];
                                    $category = $dt["category"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-updatecareer.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Register Career</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-12">
												<div class="form-group">
													<label class="form-label">Title Position Offer</label>
													<input type="text" class="form-control" name="title" id="title" value="<?php echo $title;?>" >
                                                    <input type="text" class="form-control" name="job_id" id="job_id" value="<?php  echo $job_id; ?>" hidden="">
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Type Job Offer</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="type_job" id="type_job">
                                                            <option value="" <?php if($type_job == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Full-Time" <?php if($type_job == "Full-Time"){ echo "selected"; }else{} ?>>Full-Time</option>
                                                            <option value="Part-Time" <?php if($type_job == "Part-Time"){ echo "selected"; }else{} ?>>Part-Time</option>
                                                            <option value="Temporary" <?php if($type_job == "Temporary"){ echo "selected"; }else{} ?>>Temporary</option>  
                                                            <option value="Contract" <?php if($type_job == "Contract"){ echo "selected"; }else{} ?>>Contract</option> 
                                                            <option value="Internship" <?php if($type_job == "Internship"){ echo "selected"; }else{} ?>>Internship</option> 
                                                     </select>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Status Job Offer</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                            <option value="" <?php if($status == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Open" <?php if($status == "Open"){ echo "selected"; }else{} ?>>Open</option>
                                                            <option value="Close" <?php if($status == "Close"){ echo "selected"; }else{} ?>>Close</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Range Salary</label>
													<input type="text" class="form-control" name="salary" id="salary" value="<?php echo $salary;?>" >
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Category</label>
													<select class="form-control select2 custom-select" data-placeholder="Choose one" name="category" id="category">
                                                            <option value="" <?php if($category == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Intern" <?php if($category == "Intern"){ echo "selected"; }else{} ?>>Intern</option>
                                                            <option value="Corporate" <?php if($category == "Corporate"){ echo "selected"; }else{} ?>>Corporate Executive</option>
                                                            <option value="IT" <?php if($category == "IT"){ echo "selected"; }else{} ?>>IT Executive</option>  
                                                            <option value="Operation" <?php if($category == "Operation"){ echo "selected"; }else{} ?>>Operation</option> 
                                                            <option value="Creative" <?php if($category == "Creative"){ echo "selected"; }else{} ?>>Creative</option>
                                                            <option value="Others" <?php if($category == "Others"){ echo "selected"; }else{} ?>>Others</option>
                                                     </select>
												</div>
											</div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Job Description</label>                                                   
                                                <div class="card-body">
                                                    <textarea class="content" name="description" id="description"><?php echo $description; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Job Requirement</label>                                                   
                                                <div class="card-body">
                                                    <textarea class="content2" name="requirement" id="requirement"><?php echo $requirement; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Perks & Benefit</label>                                                   
                                                <div class="card-body">
                                                    <textarea class="form-control" name="benefit" id="benefit" cols="6" rows="6"><?php echo $benefit; ?></textarea>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Company Overview</label>                                                   
                                                <div class="card-body">
                                                    <textarea class="form-control" name="company" id="company" cols="6" rows="6"><?php echo $company; ?></textarea>
                                                   
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="update" id="update" class="btn btn-primary" >Update Career</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

