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
                   $user_id1 = $data["user_id"];
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
                                <form class="card" method="POST" action=""  enctype="multipart/form-data">
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
                                                
                                            </center>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>" readonly>
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $user_id1; ?>" hidden>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                     <input type="text" class="form-control" name="statusstatus" id="status" value="<?= $maritial; ?>" readonly>
                                                    <!-- <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status" readonly>
                                                            <option value="" <?php if($maritial == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Single" <?php if($maritial == "Single"){ echo "selected"; }else{} ?>>Single</option>
                                                            <option value="Married" <?php if($maritial == "Married"){ echo "selected"; }else{} ?>>Married</option>
                                                            <option value="Widowed" <?php if($maritial == "Widowed"){ echo "selected"; }else{} ?>>Widowed</option>
                                                            <option value="Divorced" <?php if($maritial == "Divorced"){ echo "selected"; }else{} ?>>Divorced</option>
                                                     </select> -->
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
                                            <div class="col-sm-2 col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label">Birthday Date</label>
                                                    <input type="text" class="form-control" name="bod" id="bod"  value="<?= $bod; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label">Age</label>
                                                    <input type="text" class="form-control" name="bod" id="bod"  value="<?= $age; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?= $email; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                     <textarea name="address" class="form-control" cols="6" rows="6" id="address" readonly><?= $address;?></textarea>
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
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="department" id="department" readonly>
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
                                                     <input type="text" class="form-control" name="status" id="status" value="<?= $status;?>"readonly>
                                                    <!--<select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">-->
                                                    <!--        <option value="" <?php if($status == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>-->
                                                    <!--        <option value="Active" <?php if($status == "Active"){ echo "selected"; }else{} ?>>Active</option>-->
                                                    <!--        <option value="Inactive" <?php if($status == "Inactive"){ echo "selected"; }else{} ?>>Inactive</option>-->
                                                    <!-- </select>-->
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Current Salary</label>
                                                    <input type="text" class="form-control" name="salary" id="salary" value="<?= $salary;?>"readonly>
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
                                    </form>
                                    <!-- <div class="card-footer text-right">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary" >Update User</button>
                                    </div> -->
                                <div class="card">
                                    <div class="card-body p-6">
                                        <div class="panel panel-primary">
                                            <div class=" tab-menu-heading">
                                                <div class="tabs-menu1 ">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs">
                                                        <li class=""><a href="#tab5" class="active" data-toggle="tab">EMPLOYEE STATUS</a></li>
                                                        <li><a href="#tab6" data-toggle="tab">TRAINING</a></li>
                                                        <li><a href="#tab7" data-toggle="tab">PERFORMANCE</a></li>
                                                        <li><a href="#tab8" data-toggle="tab">ACHIEVEMENTS</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active " id="tab5">
                                                        <div class="table-responsive">
                                                                <div class="btn-list text-right">
                                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#statusemployee">Add New Status</button>
                                                                </div>
                                                                <div class="modal fade" id="statusemployee" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">

                                                                            <form id="modal" class="form-horizontal" method="POST" action="system-profiling-add.php" enctype="multipart/form-data">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="example-Modal3">EMPLOYEE DETAILS:</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Date Asigned</label>
                                                                                            <input type="date" class="form-control" name="asigned" id="asigned" >
                                                                                            <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id1; ?>" hidden="">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Until Asigned</label>
                                                                                            <input type="date" class="form-control" name="endasigned" id="endasigned" >
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Designation:</label>
                                                                                            <select class="form-control select2 custom-select" data-placeholder="Choose one" name="designation" id="designation">
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
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Status</label>
                                                                                            <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                                                                    <option label="Choose one"></option>
                                                                                                    <option value="Traning">Traning</option>
                                                                                                    <option value="Probation">Probation</option>
                                                                                                    <option value="Contract">Contract</option>
                                                                                                    <option value="Current">Current</option>
                                                                                             </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Basic (RM):</label>
                                                                                            <input type="text" class="form-control" id="basic" name="basic">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Allowance (RM):</label>
                                                                                            <input type="text" class="form-control" id="allowance" name="allowance">
                                                                                        </div>
                                                                                        <!-- <div class="form-group">
                                                                                            <label for="message-text" class="form-control-label">Image:</label>
                                                                                            <div class="custom-file">
                                                                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                                                                <label class="custom-file-label">Choose file</label>
                                                                                            </div>
                                                                                        </div> -->
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="editstatusemployee" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form id="modal" class="form-horizontal" method="POST" action="system-editstatusemployee.php " enctype="multipart/form-data">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="example-Modal3">Update Module</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Date Asigned:</label>
                                                                                            <input type="date" class="form-control" id="asigned" name="asigned">
                                                                                            <input type="text" class="form-control" id="employee_status_id" name="employee_status_id" hidden="">
                                                                                            <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id1; ?>" hidden="">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Until Asigned:</label>
                                                                                            <input type="date" class="form-control" id="endasigned" name="endasigned">    
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Designation:</label>   
                                                                                            <select name="designation" id="designation" required="required" class="form-control input-sm" required>
                                                                                                <option value="">-- Choose --</option>
                                                                                                <option value="1">Super Administrator</option>
                                                                                                <option value="2">Admin Manager</option>
                                                                                                <option value="3">Admin Sales</option>
                                                                                                <option value="4">Admin HR</option>
                                                                                                <option value="5">Employee</option>
                                                                                                <option value="6">Admin Account</option>
                                                                                                <option value="7">Branch Manager</option>
                                                                                                <option value="8">Physiotherapist</option>
                                                                                                <option value="9">Receptionist</option>
                                                                                                <option value="10">Branch Counter</option>
                                                                                                <option value="11">Hq Operation Manager</option>
                                                                                                <option value="12">Hq Sales Lead</option>
                                                                                                <option value="13">Hq Sales Agent</option>
                                                                                                <option value="14">Hq Admin Lead</option>
                                                                                                <option value="15">Hq Admin Agent</option>
                                                                                                <option value="16">Hq Cs Lead</option>
                                                                                                <option value="17">Hq Cs Agent</option>
                                                                                                <option value="18">Branch Owner</option>
                                                                                                <option value="19">Branch Manager</option>
                                                                                                <option value="20">Branch Sales</option>
                                                                                                <option value="21">Branch Admin</option>
                                                                                                <option value="22">Branch Cs</option>
                                                                                                <option value="23">Training Lead</option>
                                                                                                <option value="24">Admin Procurement</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Status</label>
                                                                                            <select name="status" id="status" required="required" class="form-control input-sm" required>
                                                                                                <option value="">-- Choose --</option>
                                                                                                <option value="Traning">Traning</option>
                                                                                                <option value="Probation">Probation</option>
                                                                                                <option value="Contract">Contract</option>
                                                                                                <option value="Current">Current</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Basic (RM):</label>
                                                                                            <input type="text" class="form-control" id="basic" name="basic">    
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Allowance (RM):</label>
                                                                                            <input type="text" class="form-control" id="allowance" name="allowance">    
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="wd-15p">DATE ASIGNED</th>
                                                                            <th class="wd-15p">END ASIGNED</th>
                                                                            <th class="wd-20p">DeSIGNATION</th>
                                                                            <th class="wd-20p">STATUS</th>
                                                                            <th class="wd-15p">DURATION</th>
                                                                            <th class="wd-15p">BASIC (RM) </th>
                                                                            <th class="wd-15p">ALLOWANCE (RM) </th>
                                                                            <th class="wd-15p">Action</th>                                             
                                                                        </tr>
                                                                    </thead>
                                                                   
                                                                    <?php 
                                                                    $user_id = $_GET["id"];
                                                                    // $statement = $conn->prepare("SELECT * FROM employee_status WHERE user_id = '$user_id'");

                                                                    $statement = $conn->prepare("SELECT employee_status.employee_status_id, employee_status.asigned, employee_status.endasigned, employee_status.duration, employee_status.roles_id, employee_status.user_id, employee_status.status, employee_status.basic, employee_status.allowance, roles.roles_id, roles.display_name FROM employee_status INNER JOIN roles ON employee_status.roles_id = roles.roles_id WHERE employee_status.user_id = '$user_id'");

                                                                        $statement->execute();

                                                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                       {
                                                                        extract($data);                                                 
                                                                    ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span><?= $asigned; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $endasigned; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $display_name; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $status; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <?php if($status == "Current"){?>
                                                                                    <span>N/A</span>
                                                                                <?php } else{ ?>
                                                                                    <span><?php 

                                                                                    $days = (strtotime($endasigned) - strtotime($asigned)) / (60 * 60 * 24);
                                                                                    $label = "";
                                                                                    $hr = 0;

                                                                                        if ($days){
                                                                                                if ($days >= 365) { // over a year
                                                                                                    $years = floor($days / 365);
                                                                                                    $label .= $years . ' Year';
                                                                                                    $days -= 365 * $years;
                                                                                                }

                                                                                                if ($days) {
                                                                                                    $months = floor( $days / 30 );
                                                                                                    $label .= ' ' . $months . ' Month';
                                                                                                    $days -= 30 * $months;
                                                                                                }

                                                                                                if ($days) {
                                                                                                    $label .= ' ' . $days . ' day';
                                                                                                }
                                                                                            } else {
                                                                                                $label = $days;
                                                                                            }

                                                                                            echo $label;


                                                                                     ?></span>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $basic; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $allowance; ?></span>
                                                                            </td>
                                                                            <td style="text-align: center;">
                                                                                <a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editstatusemployee"     
                                                                                data-employee_status_id="<?php echo $employee_status_id; ?>"
                                                                                data-user_id="<?php echo $user_id; ?>"
                                                                                data-asigned="<?php echo $asigned; ?>"
                                                                                data-endasigned="<?php echo $endasigned; ?>"
                                                                                data-designation="<?php echo $roles_id; ?>"
                                                                                data-status="<?php echo $status; ?>"
                                                                                data-basic="<?php echo $basic;?>" 
                                                                                data-allowance="<?php echo $allowance;?>" 
                                                                                >
                                                                               <i class="fas fa-refresh"></i>
                                                                            </a>
                                                                           <!--  <a href="system-editstatusemployee.php?id=<?php echo $employee_status_id; ?>" class="btn btn-danger btn-xs tip" title="Update">
                                                                               <i class="fas fa-trash"></i>
                                                                            </a> -->
                                                                            
                                                                            <a href="system-generate.php?user=<?php echo $user_id; ?>"><button type="button" class="btn btn-warning btn-xs tip"><i class="fas fa-print"></i></button></a>

                                                                            <a href="system-deletestatusemployee.php?id=<?php echo $employee_status_id; ?>&user=<?php echo $user_id; ?>"><button type="button" class="btn btn-danger btn-xs tip"><i class="fe fe-trash"></i></button></a>


                                                                            </td>
                                                                            
                                                                        </tr>
                                                                     <?php
                                                                      // $counter++;
                                                                        }
                                                                      ?>
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane " id="tab6">
                                                        <div class="table-responsive">

                                                                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="wd-15p">training attended</th>
                                                                            <th class="wd-15p">Date</th>
                                                                            <th class="wd-15p">Organizer</th>
                                                                            
                                                                            <!-- <th class="wd-15p">Action</th>  -->                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <?php 
                                                                    $user_id = $_GET["id"];

                                                                    $statement = $conn->prepare("SELECT training_event.training_event_id, training_event.user_id, training_event.training_id, training_event.centers_id, user.user_id, user.name, user.centers_id, training.training_id, training.subject, training.trainer, training.startdate, training.enddate, training.starttime, training.endtime, training.objective, training.organizer, training.status, training.user_id

                                                                        FROM user
                                                                        JOIN training_event
                                                                        ON user.user_id = training_event.user_id
                                                                        JOIN training
                                                                        ON training.training_id = training_event.training_id 
                                                                        WHERE training_event.user_id = '$user_id'");

                                                                        $statement->execute();

                                                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                       {
                                                                        extract($data);                                                 
                                                                    ?>

                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span><?= $subject; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $date = date('d M Y', strtotime($startdate)); ?> - <?= $date1 = date('d M Y', strtotime($enddate)); ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $organizer; ?></span>
                                                                            </td>                                                                            
                                                                        </tr>
                                                                     <?php
                                                                      // $counter++;
                                                                        }
                                                                      ?>
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane " id="tab7">
                                                        <div class="table-responsive">
                                                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="wd-15p">Date</th>
                                                                            <th class="wd-15p">performance review</th>
                                                                            <th class="wd-20p">review</th>
                                                                            <th class="wd-15p">marks comment</th>
                                                                            <th class="wd-15p">result</th>
                                                                            <!-- <th class="wd-15p">Action</th>  -->                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <?php 
                                                                       $user_id = $_GET["id"];

                                                                    $statement = $conn->prepare("SELECT evaluation.evaluation_id, evaluation.q1, evaluation.q2, evaluation.q3, evaluation.q4, evaluation.q5, evaluation.q6, evaluation.q7, evaluation.q8, evaluation.q9, evaluation.q10, evaluation.q11, evaluation.q12, evaluation.q13, evaluation.q14, evaluation.q15, evaluation.q16, evaluation.feedback, evaluation.user_id, evaluation.centers_id, evaluation.operation_id, evaluation.reviewby,evaluation.created_date, operation.operation_id, operation.subject, user.user_id, user.name
                                                                        FROM evaluation
                                                                        JOIN operation
                                                                          ON operation.operation_id = evaluation.operation_id
                                                                          JOIN user
                                                                          ON user.user_id = evaluation.user_id 
                                                                        WHERE user.user_id = '$user_id'");

                                                                        $statement->execute();

                                                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                       {
                                                                        extract($data);                                               
                                                                    ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span><?= $created_date; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span><?= $subject; ?></span>
                                                                            </td>
                                                                            <td></td>
                                                                            <td>
                                                                                <span><?php echo $feedback; ?></span>
                                                                            </td>
                                                                            <td><span><?php echo $result = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16; ?></span></td>
                                                                            
                                                                            
                                                                        </tr>
                                                                     <?php
                                                                      // $counter++;
                                                                        }
                                                                      ?>
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane " id="tab8">
                                                        <div class="table-responsive">
                                                            <div class="btn-list text-right">
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Rewards">Add New Rewards</button>
                                                            </div>

                                                            <div class="modal fade" id="Rewards" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form id="modal" class="form-horizontal" method="POST" action="system-rewards-add.php" enctype="multipart/form-data">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="example-Modal3">EMPLOYEE ACHIEVEMENTS:</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Type Achievement</label>
                                                                                            <input type="text" class="form-control" name="achievement" id="achievement" >
                                                                                              <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id1; ?>" hidden="">
                                                                                              
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Date</label>
                                                                                            <input type="date" class="form-control" name="dateachievement" id="dateachievement" >
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Description:</label>
                                                                                            <textarea class="form-control" cols="6" name="description" id="description"></textarea>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal fade" id="editRewards" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <form id="modal" class="form-horizontal" method="POST" action="system-rewards-edit.php" enctype="multipart/form-data">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="example-Modal3">UPDATE EMPLOYEE ACHIEVEMENTS:</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Type Achievement</label>
                                                                                            <input type="text" class="form-control" name="achievement" id="achievement" >
                                                                                            <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id1; ?>" hidden="">
                                                                                            <input type="text" class="form-control" id="rewards_id" name="rewards_id" hidden="">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Date</label>
                                                                                            <input type="date" class="form-control" name="dateachievement" id="dateachievement" >
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="form-control-label">Description:</label>
                                                                                            <textarea class="form-control" cols="6" name="description" id="description"></textarea>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                            </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br><br>




                                                                <table id="example2" class="table card-table table-vcenter text-nowrap  table-secondary" style="width:100%">
                                                                    <thead  class="bg-primary text-white">
                                                                        <tr>
                                                                            <th class="wd-15p">Detail Achievement</th>
                                                                            <th class="wd-15p">Date</th>
                                                                            <th class="wd-20p">Description</th>
                                                                            <th class="wd-15p">Action</th>                                             
                                                                        </tr>
                                                                    </thead>
                                                                    <?php 
                                                                        $user_id = $_GET["id"];

                                                                        $statement = $conn->prepare("SELECT rewards.rewards_id, rewards.achievement, rewards.dateachievement, rewards.description, rewards.description, rewards.user_id, user.user_id, user.name
                                                                            FROM rewards
                                                                            JOIN user
                                                                              ON user.user_id = rewards.user_id 
                                                                            WHERE user.user_id = '$user_id'");

                                                                            $statement->execute();

                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                            extract($data);                                                
                                                                    ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            
                                                                            <td><span><?= $achievement; ?></span></td>
                                                                            <td><span><?= $date = date('d M Y', strtotime($dateachievement)); ?></span></td>
                                                                            <td><span><?= $description; ?></span></td>
                                                                            <td style="text-align: center;">
                                                                                <a href="#" class="btn btn-info btn-xs tip" title="Update"data-toggle="modal" data-target="#editRewards"     
                                                                                data-rewards_id="<?php echo $rewards_id; ?>"
                                                                                data-user_id="<?php echo $user_id; ?>"
                                                                                data-achievement="<?php echo $achievement; ?>"
                                                                                data-dateachievement="<?php echo $dateachievement; ?>"
                                                                                data-description="<?php echo $description; ?>"
                                                                                ><i class="fas fa-refresh"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                     <?php
                                                                      // $counter++;
                                                                        }
                                                                      ?>
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
<?php
    
    include('system-footer.php');
?>

