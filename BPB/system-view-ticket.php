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
											<li class="breadcrumb-item1 active">Ticket</li>
											<li class="breadcrumb-item1 active">Create New Ticket</li>
							</ol>
							
						</div>
                        <?php
                            if(isset($_GET["id"]))
                            {
                                $ticket_id = $_GET["id"];
                                $sql =  "SELECT * FROM ticket where ticket_id = :ticket_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":ticket_id", $ticket_id);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $ticket_id = $dt["ticket_id"];
                                    $department = $dt["department"];
                                    $duedate = $dt["duedate"];
                                    $prioritize = $dt["prioritize"];
                                    $type = $dt["type"];
                                    $description = $dt["description"];
                                    $document = $dt["document"];   
                                    $status = $dt["status"];
                                    $remarks = $dt["remarks"]; 
                                    $user_id = $dt["user_id"]; 
                                    $created_by = $dt["created_by"]; 
                                    $created_date = $dt["created_date"];                               
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>

                            <?php 
                                if($roles == "1"  || $roles == "2" || $roles == "3"  || $roles == "4" || $roles == "6"  || $roles == "11" || $roles == "16" || $roles == "23" || $roles == "24")
                                {
                                ?>
                                <div class="col-lg-12">
                                <form class="card" method="POST" action="system-updateticket.php"  enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h3 class="card-title">View Ticket</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Name Creater</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" readonly >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                                    <input type="text" class="form-control" name="ticket_id" id="ticket_id" value="<?php echo $ticket_id; ?>" hidden >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Refer Department</label>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="Department" id="Department" value="<?php echo $department; ?>" readonly >
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Due Date</label>
                                                    <input type="text" class="form-control" name="duedate" id="duedate" value="<?= $duedate ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Prioritize</label>
                                                    <input type="text" class="form-control" name="Department" id="Department" value="<?php echo $prioritize; ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Title / Type Of Content</label>
                                                    <input type="text" class="form-control" name="type" id="type" value="<?= $type;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Your Message / Related Issue</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="description" id="description" readonly ><?= $description; ?></textarea>
                                                    <!-- <textarea name="description" class="form-control" cols="6" rows="6" id="description"></textarea> -->
                                                </div>
                                            </div>
                                            <?php
                                            if ($document != null){

                                            ?>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Attachment File</label>
                                                    <center><a href="ticket/<?php echo $document; ?>" target="_blank" download><i class="fa fa-file-pdf-o" style="font-size:200px;color:red"></i></a><br></center>
                                                </div>
                                            </div>
                                            <?php 
                                            } else {
                                            }

                                            ?>
                                            
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Remark</label>
                                                <span style="color: black;">Please write all the remarks about your task here for our others references.</span>
                                                <div class="card-body">
                                                    <textarea class="content2" name="remarks" id="remarks" required=""><?= $remarks; ?></textarea>
                                                    <!-- <textarea name="description" class="form-control" cols="6" rows="6" id="description"></textarea> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                              <label class="form-label">File Related</label>
                                              <span>Please attach all the file related or others example (Document,image,Video) if applicable</span><br>                                                
                                              <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="documentreply" id="documentreply">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit Ticket</button>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                                <div class="col-lg-12">
                                <form class="card" method="POST" action=""  enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h3 class="card-title">View Ticket</h3>
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
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Refer Department</label>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="Department" id="Department" value="<?php echo $department; ?>" readonly >
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Due Date</label>
                                                    <input type="text" class="form-control" name="duedate" id="duedate" value="<?= $duedate ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Prioritize</label>
                                                    <input type="text" class="form-control" name="Department" id="Department" value="<?php echo $prioritize; ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Title / Type Of Content</label>
                                                    <input type="text" class="form-control" name="type" id="type" value="<?= $type;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Write Your Message / Related Issue</label>
                                                <span style="color: black;">Please write all the details about your request here for our references.</span>
                                                <div class="card-body">
                                                    <textarea class="content" name="description" id="description" readonly ><?= $description; ?></textarea>
                                                    <!-- <textarea name="description" class="form-control" cols="6" rows="6" id="description"></textarea> -->
                                                </div>
                                            </div>
                                            <?php
                                            if ($document != null){

                                            ?>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Attachment File</label>
                                                    <center><a href="ticket/<?php echo $document; ?>" target="_blank" download><i class="fa fa-file-pdf-o" style="font-size:200px;color:red"></i></a><br></center>
                                                </div>
                                            </div>
                                            <?php 
                                            } else {
                                            }
                                            ?>
                                            <div class="col-sm-12 col-md-12">
                                                <label class="form-label">Remark</label>
                                                <span style="color: black;">Please write all the remarks about your task here for our others references.</span>
                                                <div class="card-body">
                                                    <textarea class="content2" name="remarks" id="remarks" required=""></textarea>
                                                    <!-- <textarea name="description" class="form-control" cols="6" rows="6" id="description"></textarea> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
							<?php } ?>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

