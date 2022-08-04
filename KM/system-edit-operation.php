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
            <?php 
              if($roles == "11")
            {
            ?>
				<div class="my-3 my-md-5 app-content">
					<div class="side-app">
						<div class="page-header">
							<ol class="breadcrumb1">
											<li class="breadcrumb-item1 active">Operation</li>
											<li class="breadcrumb-item1 active">Operation Evaluate</li>
							</ol>
							
						</div>
                         <?php
                            if(isset($_GET["id"]))
                            {
                                $operation_id = $_GET["id"];
                                $sql =  "SELECT operation.operation_id, operation.subject, operation.objective, operation.created_date, operation.user_id, user.user_id, user.name, user.email
                                    FROM operation
                                    JOIN user
                                      ON user.user_id = operation.user_id WHERE operation.operation_id = :operation_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":operation_id", $operation_id);
                                $stmt->execute();

                                if($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                   $operation_id = $data["operation_id"];
                                   $subject = $data["subject"];
                                   $objective = $data["objective"];
                                   $fulluser_id = $data["user_id"];
                                   $fullname = $data["name"];
                                   $fullemail = $data["email"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
                                    
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-edit-operation-v1.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Operation Evaluate</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Name Creater</label>
													<input type="text" class="form-control" name="name" id="name" value="<?php echo $fullname; ?>" readonly >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $fulluser_id; ?>" hidden >
                                                    <input type="text" class="form-control" name="operation_id" id="operation_id" value="<?php echo $operation_id; ?>" hidden >
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="createdby" id="createdby" value="<?php echo $fullemail; ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="ccol-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Subject / Title </label>
                                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= $subject; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Objective Training</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="objective" id="objective"><?= $objective; ?></textarea>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit Operation</button>
									</div>
								</form>
							</div>
						</div>
				</div>
            <?php }
                else if($roles == "3"){
            ?>
                <div class="my-3 my-md-5 app-content">
                    <div class="side-app">
                        <div class="page-header">
                             <ol class="breadcrumb1">
                                <li class="breadcrumb-item1 active" style="text-transform: uppercase;">evaluation</li>
                                <li class="breadcrumb-item1 active" style="text-transform: uppercase;">management</li>
                            </ol>
                            
                        </div>
                         <?php
                            if(isset($_GET["id"]))
                            {
                                $sale_id = $_GET["id"];
                                $sql =  "SELECT sale.sale_id, sale.subject, sale.objective, sale.created_date, sale.user_id, user.user_id, user.name, user.email
                                    FROM sale
                                    JOIN user
                                      ON user.user_id = sale.user_id WHERE sale.sale_id = :sale_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":sale_id", $sale_id);
                                $stmt->execute();

                                if($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                   $sale_id = $data["sale_id"];
                                   $subject = $data["subject"];
                                   $objective = $data["objective"];
                                   $fulluser_id = $data["user_id"];
                                   $fullname = $data["name"];
                                   $fullemail = $data["email"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
                                    
                            <div class="col-lg-12">
                                <form class="card" method="POST" action="system-edit-operation-v1.php"  enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Evaluation</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name Creater</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $fullname; ?>" readonly >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $fulluser_id; ?>" hidden >
                                                    <input type="text" class="form-control" name="sale_id" id="sale_id" value="<?php echo $sale_id; ?>" hidden >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="createdby" id="createdby" value="<?php echo $fullemail; ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="ccol-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Subject / Title </label>
                                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= $subject; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Objective Training</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="objective" id="objective"><?= $objective; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" name="sale" id="sale" class="btn btn-primary" >Submit Operation</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            <?php }
                else if($roles == "24"){
            ?>
                <div class="my-3 my-md-5 app-content">
                    <div class="side-app">
                        <div class="page-header">
                            <ol class="breadcrumb1">
                                <li class="breadcrumb-item1 active" style="text-transform: uppercase;">evaluation</li>
                                <li class="breadcrumb-item1 active" style="text-transform: uppercase;">management</li>
                            </ol>
                            
                        </div>
                         <?php
                            if(isset($_GET["id"]))
                            {
                                $administration_id = $_GET["id"];
                                $sql =  "SELECT administration.administration_id, administration.subject, administration.objective, administration.created_date, administration.user_id, user.user_id, user.name, user.email
                                    FROM administration
                                    JOIN user
                                      ON user.user_id = administration.user_id WHERE administration.administration_id = :administration_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":administration_id", $administration_id);
                                $stmt->execute();

                                if($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                   $administration_id = $data["administration_id"];
                                   $subject = $data["subject"];
                                   $objective = $data["objective"];
                                   $fulluser_id = $data["user_id"];
                                   $fullname = $data["name"];
                                   $fullemail = $data["email"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
                                    
                            <div class="col-lg-12">
                                <form class="card" method="POST" action="system-edit-operation-v1.php"  enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h3 class="card-title">Create New Evaluation</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name Creater</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $fullname; ?>" readonly >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $fulluser_id; ?>" hidden >
                                                    <input type="text" class="form-control" name="administration_id" id="administration_id" value="<?php echo $administration_id; ?>" hidden >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="createdby" id="createdby" value="<?php echo $fullemail; ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="ccol-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Subject / Title </label>
                                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= $subject; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Objective Training</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="objective" id="objective"><?= $objective; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" name="admin" id="admin" class="btn btn-primary" >Submit Operation</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            <?php }
                else if($roles == "16"){
            ?>
                <div class="my-3 my-md-5 app-content">
                    <div class="side-app">
                        <div class="page-header">
                            <ol class="breadcrumb1">
                                <li class="breadcrumb-item1 active" style="text-transform: uppercase;">evaluation</li>
                                <li class="breadcrumb-item1 active" style="text-transform: uppercase;">management</li>
                            </ol>
                            
                        </div>
                         <?php
                            if(isset($_GET["id"]))
                            {
                                $customerservices_id = $_GET["id"];
                                $sql =  "SELECT customerservices.customerservices_id, customerservices.subject, customerservices.objective, customerservices.created_date, customerservices.user_id, user.user_id, user.name, user.email
                                    FROM customerservices
                                    JOIN user
                                      ON user.user_id = customerservices.user_id WHERE customerservices.customerservices_id = :customerservices_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                $stmt->execute();

                                if($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                   $customerservices_id = $data["customerservices_id"];
                                   $subject = $data["subject"];
                                   $objective = $data["objective"];
                                   $fulluser_id = $data["user_id"];
                                   $fullname = $data["name"];
                                   $fullemail = $data["email"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
                                    
                            <div class="col-lg-12">
                                <form class="card" method="POST" action="system-edit-operation-v1.php"  enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h3 class="card-title">Create New Evaluation</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name Creater</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $fullname; ?>" readonly >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $fulluser_id; ?>" hidden >
                                                    <input type="text" class="form-control" name="customerservices_id" id="customerservices_id" value="<?php echo $customerservices_id; ?>" hidden >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="createdby" id="createdby" value="<?php echo $fullemail; ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="ccol-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Subject / Title </label>
                                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= $subject; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Objective Training</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="objective" id="objective"><?= $objective; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" name="customerservices" id="customerservices" class="btn btn-primary" >Submit Operation</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            <?php } 
                else {}
            ?>
<?php
    
    include('system-footer.php');
?>

