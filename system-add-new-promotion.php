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
								<li class="breadcrumb-item1 active">Promotion Management</li>
								<li class="breadcrumb-item1 active">Register Promotion </li>
							</ol>
							
						</div>
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-addpromotion.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Register Promotion</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-12">
												<div class="form-group">
													<label class="form-label">Title Promotion</label>
													<input type="text" class="form-control" name="title" id="title" >
												</div>
											</div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Promotion Description</label>                                                   
                                                <!--<textarea class="form-control" rows="6" name="description" id="description" placeholder="text here.."></textarea>-->
                                                <textarea class="content" name="description" id="description"></textarea>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                               <label class="form-label">Start Date Promotion</label>                                                   
                                               <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="start_date" id="start_date">
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                               <label class="form-label">End Date Promotion</label>                                                   
                                               <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="end_date" id="end_date">
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                              <label class="form-label">Image Promotion</label>
                                            <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image" id="image">
                                                        <label class="custom-file-label">Choose file</label>
                                            </div>
                                            </div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Register Promotion</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

