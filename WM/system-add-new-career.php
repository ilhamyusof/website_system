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
											<li class="breadcrumb-item1 active">Career Management</li>
											<li class="breadcrumb-item1 active">Register Career 2 </li>
							</ol>
							
						</div>
                        
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-addcareer.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Register Career</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-12">
												<div class="form-group">
													<label class="form-label">Title Position Offer</label>
													<input type="text" class="form-control" name="title" id="title" >
												</div>
											</div>
                                            <div class="col-sm-4 col-md-4">
												<div class="form-group">
													<label class="form-label">Type Job Offer</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="type_job" id="type_job">
                                                            <option label="Choose one"></option>
                                                            <option value="Full-Time">Full-Time</option>
                                                            <option value="Part-Time">Part-Time</option>
                                                            <option value="Temporary">Temporary</option>
                                                            <option value="Contract">Contract</option>
                                                            <option value="Internship">Internship</option>
                                                     </select>
												</div>
											</div>
                                            <div class="col-sm-4 col-md-4">
												<div class="form-group">
													<label class="form-label">Range Salary</label>
													<input type="text" class="form-control" name="salary" id="salary" >
												</div>
											</div>
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="category" id="category">
                                                            <option label="Choose one"></option>
                                                            <option value="Intern">Intern</option>
                                                            <option value="Corporate">Corporate Executive</option>
                                                            <option value="IT">IT Executive</option>
                                                            <option value="Operation">Operation</option>
                                                            <option value="Creative">Creative</option>
                                                            <option value="Other">Others</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Job Description</label>                                                   
                                                <div class="card-body">
                                                     <textarea class="content" name="description" id="description"></textarea> 
                                                    <!--<textarea name="description" class="form-control" cols="6" rows="6" id="description"></textarea>-->
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Job Requirement</label>                                                   
                                                <div class="card-body">
                                                     <textarea class="content2" name="requirement" id="requirement"></textarea> 
                                                    <!--<textarea class="form-control" cols="6" rows="6" name="requirement" id="requirement"></textarea>-->
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Perks & Benefit</label>                                                   
                                                <div class="card-body">
                                                    <!-- <textarea class="content3" name="benefit" id="benefit"></textarea> -->
                                                    <textarea class="form-control" cols="6" rows="6" name="benefit" id="benefit"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Company Overview</label>                                                   
                                                <div class="card-body">
                                                    <!-- <textarea class="content4" name="company" id="company"></textarea> -->
                                                    <textarea class="form-control" cols="6" rows="6" name="company" id="company"></textarea>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Register Career</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

