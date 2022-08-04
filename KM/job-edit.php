
<?php
            // Connection database
            //include("connection.php");
            // Check, for session 'user_session'
            include("session.php");

            // Set Default Time Zone for Asia/Kuala_Lumpur
            date_default_timezone_set("Asia/Kuala_Lumpur");

            // Check, if username session is NOT set then this page will jump to login page
            if (!isset($_SESSION['session']) && !isset($_SESSION['job'])) {
                header('Location: login.php');
                session_destroy();
            }

            $job = $_SESSION["job"];
            $now = date("Y-m-d");
        ?>

<?php 
	include('header1.php');
?>
<div class="page-banner-area bg-2">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-content">
<h2>Career</h2>
<ul>
<li><a href="index.php">Home</a></li>
<li>Career</li>
</ul>
</div>
</div>
</div>
</div>
</div>


	<div class="appointment-area  ptb-100">
		<div class="container">
			<div class="section-title-one">
				<!-- <span>Our services</span> -->
				<h2>Register Career</h2>
				</div>
			<div class="row">
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
                                    $type = $dt["type"];
                                    $salary = $dt["salary"];
                                    $location = $dt["location"];
                                    $description = $dt["description"];
                                    $requirement = $dt["requirement"];
                                    $benefit = $dt["benefit"];
                                    $company = $dt["company"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>

				<div class="col-lg-12">
								<form method="POST" action="update-insert-career.php" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Job Title</label>
												<input type="text" class="form-control" id="title" name="title" value="<?php echo $title;?>" >
												<input type="text" class="form-control" name="job_id" id="job_id" value="<?php  echo $job_id; ?>" hidden="">
											</div>
										</div>								
										<div class="col-lg-6">
											<div class="form-group">	
												<label>Type Job</label>
												<input type="text" class="form-control" id="type" name="type" placeholder="Parmanent/Contract/Intership" value="<?php echo $type;?>" >
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Range Salary</label>
												<input type="text" class="form-control" id="salary" name="salary" placeholder="RM 3000 - RM 3500" value="<?php echo $salary;?>" >
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Location / Branch</label>
												<input type="text" class="form-control" id="location" name="location" value="<?php echo $location;?>" >
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Job Description</label>
												<textarea class="form-control" rows="6" cols="6" placeholder="Write job description" name="description" id="description"><?php echo $description; ?></textarea>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Job Requirement</label>
												<textarea class="form-control" rows="6" cols="6" placeholder="Write job requirement" name="requirement" id="requirement"><?php echo $requirement; ?></textarea>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Perks & Benefits</label>
												<textarea class="form-control" rows="6" cols="6" placeholder="Write benefit" name="benefit" id="benefit"><?php echo $benefit; ?></textarea>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Company Overview</label>
												<textarea class="form-control" rows="6" cols="6" placeholder="Write company overview" name="company" id="company"><?php echo $company; ?></textarea>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="text-right">
												<button type="submit" name="submit" id="submit" class="btn btn-info btn-sm"> Submit New Job  <span></span></button>
												<!-- <p class="account-decs">Not a member? <a href="sign-up.html">Sign Up</a></p> -->
											</div>
									</div>
								</form>

				</div>
		</div>
	</div>
</div>
<br>
<br>
		



<?php
	include('footer.php');
 ?>