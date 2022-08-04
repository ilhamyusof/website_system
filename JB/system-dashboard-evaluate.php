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
            <div class="app-content my-3 my-md-5">
                <div class="side-app">
                    <?php
                        if(isset($_GET["id"]))
                            {
                                echo $operation_id;
                                $operation_id = $_GET["id"];
                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                $sql =  "SELECT * FROM operation where operation_id = :operation_id";

                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":operation_id", $operation_id);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $operation_id = $dt["operation_id"];
                                    $subject = $dt["subject"];
                                    $user_id = $dt["user_id"];
                                    $objective = $dt["objective"];
                                }
                            }
                        else
                            {
                                echo " Data is not found!";
                            }
                    ?>
                    <div class="page-header">
                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Training</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                        </ol>
                    </div>
                    
                    <div class="row">
                        
                            <div class="card">
                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                <div class="card-header">
                                    <h3 class="card-title">LIST PHYSIOTHERAPIST</h3>
                                </div>
                                <div class="panel-body">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-15p">Detail</th>
                                                                <th class="wd-15p">Branch</th>
                                                                <th class="wd-15p">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <?php 
                                                            $statement = $conn->prepare("SELECT
                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                FROM user
                                                                JOIN roles
                                                                  ON user.roles_id = roles.roles_id
                                                                JOIN centers
                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id = '8'");

                                                            $statement->execute();

                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                           {
                                                            extract($data);                                                 
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                        <span><?php echo $email; ?></span><br>
                                                                        <span><?php echo $phone; ?></span>
                                                                        
                                                                </td>
                                                                <td>
                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                    
                                                                </td>
                                                                
                                                                <td style="text-align: center;">
                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&operation=<?= $operation_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                    <!-- <div class="row">
                        <div class="card">
                        <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                        
                        <div class="card-body">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default active">
                                    <div class="panel-heading " role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
                                                Physiotherapist
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-15p">Detail</th>
                                                                <th class="wd-15p">Branch</th>
                                                                <th class="wd-15p">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <?php 
                                                            $statement = $conn->prepare("SELECT
                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                FROM user
                                                                JOIN roles
                                                                  ON user.roles_id = roles.roles_id
                                                                JOIN centers
                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id = '8'");

                                                            $statement->execute();

                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                           {
                                                            extract($data);                                                 
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                        <span><?php echo $email; ?></span><br>
                                                                        <span><?php echo $phone; ?></span>
                                                                        
                                                                </td>
                                                                <td>
                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                    
                                                                </td>
                                                                
                                                                <td style="text-align: center;">
                                                                    <a href="system-join-training-v1.php?id=<?= $user_id ?> &training=<?= $training_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
                                                                    
                                                                    

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
                    </div> -->
                        <!-- /Boxes de Acoes -->
                    </div>

                </div>
            </div>
        <?php }
            else if($roles == "3"){
        ?>
            <div class="app-content my-3 my-md-5">
                    <div class="side-app">
                        <?php
                            if(isset($_GET["id"]))
                                {
                                    
                                    $sale_id = $_GET["id"];
                                    // $sql =  "SELECT * FROM training where training_id = :training_id";
                                    $sql =  "SELECT * FROM sale where sale_id = :sale_id";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(":sale_id", $sale_id);
                                    $stmt->execute();

                                    if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $sale_id = $dt["sale_id"];
                                        $subject = $dt["subject"];
                                        $user_id = $dt["user_id"];
                                        $objective = $dt["objective"];
                                    }
                                }
                            else
                                {
                                    echo " Data is not found!";
                                }
                        ?>
                        <div class="page-header">
                            <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Training</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                            </ol>
                        </div>
                        
                        <div class="row">
                            
                                <div class="card">
                                    <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                    <div class="card-header">
                                        <h3 class="card-title">LIST PHYSIOTHERAPIST</h3>
                                    </div>
                                    <div class="panel-body">
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-15p">Detail</th>
                                                                    <th class="wd-15p">Branch</th>
                                                                    <th class="wd-15p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <?php 
                                                                $statement = $conn->prepare("SELECT
                                                                     user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                    FROM user
                                                                    JOIN roles
                                                                      ON user.roles_id = roles.roles_id
                                                                    JOIN centers
                                                                      ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('13','20')");

                                                                $statement->execute();

                                                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                               {
                                                                extract($data);                                                 
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                            <span><?php echo $email; ?></span><br>
                                                                            <span><?php echo $phone; ?></span>
                                                                            
                                                                    </td>
                                                                    <td>
                                                                        <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                        
                                                                    </td>
                                                                    
                                                                    <td style="text-align: center;">
                                                                        <a href="system-operation-evaluation.php?id=<?= $user_id ?>&operation=<?= $sale_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                        <!-- <div class="row">
                            <div class="card">
                            <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                            
                            <div class="card-body">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default active">
                                        <div class="panel-heading " role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
                                                    Physiotherapist
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-15p">Detail</th>
                                                                    <th class="wd-15p">Branch</th>
                                                                    <th class="wd-15p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <?php 
                                                                $statement = $conn->prepare("SELECT
                                                                     user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                    FROM user
                                                                    JOIN roles
                                                                      ON user.roles_id = roles.roles_id
                                                                    JOIN centers
                                                                      ON centers.centers_id = user.centers_id WHERE user.roles_id = '8'");

                                                                $statement->execute();

                                                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                               {
                                                                extract($data);                                                 
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                            <span><?php echo $email; ?></span><br>
                                                                            <span><?php echo $phone; ?></span>
                                                                            
                                                                    </td>
                                                                    <td>
                                                                        <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                        
                                                                    </td>
                                                                    
                                                                    <td style="text-align: center;">
                                                                        <a href="system-join-training-v1.php?id=<?= $user_id ?> &training=<?= $training_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
                                                                        
                                                                        

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
                        </div> -->
                            <!-- /Boxes de Acoes -->
                        </div>

                    </div>
                </div>
        <?php }
            else if($roles == "24"){
        ?>
            <div class="app-content my-3 my-md-5">
                    <div class="side-app">
                        <?php
                            if(isset($_GET["id"]))
                                {
                                    
                                    $administration_id = $_GET["id"];
                                    // $sql =  "SELECT * FROM training where training_id = :training_id";
                                    $sql =  "SELECT * FROM administration where administration_id = :administration_id";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(":administration_id", $administration_id);
                                    $stmt->execute();

                                    if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $administration_id = $dt["administration_id"];
                                        $subject = $dt["subject"];
                                        $user_id = $dt["user_id"];
                                        $objective = $dt["objective"];
                                    }
                                }
                            else
                                {
                                    echo " Data is not found!";
                                }
                        ?>
                        <div class="page-header">
                            <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Training</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                            </ol>
                        </div>
                        
                        <div class="row">
                            
                                <div class="card">
                                    <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                    <div class="card-header">
                                        <h3 class="card-title">LIST PHYSIOTHERAPIST</h3>
                                    </div>
                                    <div class="panel-body">
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-15p">Detail</th>
                                                                    <th class="wd-15p">Branch</th>
                                                                    <th class="wd-15p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <?php 
                                                                $statement = $conn->prepare("SELECT
                                                                     user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                    FROM user
                                                                    JOIN roles
                                                                      ON user.roles_id = roles.roles_id
                                                                    JOIN centers
                                                                      ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                $statement->execute();

                                                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                               {
                                                                extract($data);                                                 
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                            <span><?php echo $email; ?></span><br>
                                                                            <span><?php echo $phone; ?></span>
                                                                            
                                                                    </td>
                                                                    <td>
                                                                        <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                        
                                                                    </td>
                                                                    
                                                                    <td style="text-align: center;">
                                                                        <a href="system-operation-evaluation.php?id=<?= $user_id ?>&operation=<?= $administration_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
        <?php } else if ($roles == "16") { ?>
            <div class="app-content my-3 my-md-5">
                    <div class="side-app">
                        <?php
                            if(isset($_GET["id"]))
                                {
                                    
                                    $customerservices_id = $_GET["id"];
                                  
                                    // $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";
                                    $sql =  "SELECT evaluation.evaluation_id, evaluation.q1, evaluation.q2, evaluation.q3, evaluation.q4, evaluation.q5, evaluation.q6, evaluation.q7, evaluation.q8, evaluation.q9, evaluation.q10, evaluation.q11, evaluation.q12,evaluation.q13, evaluation.q14,evaluation.q15, evaluation.q16, evaluation.q17, evaluation.q18,evaluation.q19, evaluation.q20, evaluation.q21, evaluation.q22, evaluation.q23, evaluation.q24, evaluation.q25, evaluation.q26, evaluation.q27, evaluation.q28, evaluation.q29, evaluation.q30, evaluation.q31, evaluation.q32, evaluation.q33, evaluation.q34, evaluation.q35, evaluation.q36, evaluation.feedback, evaluation.user_id, evaluation.centers_id, evaluation.customerservices_id, evaluation.reviewby, evaluation.created_date, centers.centers_id, centers.name, customerservices.customerservices_id, customerservices.subject, customerservices.objective
                                        FROM evaluation
                                        JOIN centers
                                        ON evaluation.centers_id = centers.centers_id
                                        JOIN user
                                        ON user.centers_id = centers.centers_id
                                        JOIN customerservices
                                        ON customerservices.customerservices_id = evaluation.customerservices_id where evaluation.customerservices_id = :customerservices_id";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(":customerservices_id", $customerservices_id);
                                    $stmt->execute();

                                    if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $customerservices_id = $dt["customerservices_id"];
                                        $subject = $dt["subject"];
                                        $user_id = $dt["user_id"];
                                        $objective = $dt["objective"];
                                    }
                                }
                            else
                                {
                                    echo " Data is not found!";
                                }
                        ?>
                        <div class="page-header">
                            <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                            </ol>
                        </div>
                        
                        <div class="row">
                            
                                <div class="card">
                                    <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                    <div class="card-header">
                                        <h3 class="card-title">LIST BRANCH</h3>
                                    </div>
                                    <div class="panel-body">
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-15p">Detail Branch</th>
                                                                    <th class="wd-15p">Inspection Form Result</th>
                                                                    <th class="wd-15p">Review By</th>
                                                                    <th class="wd-15p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <?php 
                                                            $customerservices_id = $_GET["id"];

                                                                $sql = ("SELECT evaluation.evaluation_id, evaluation.q1, evaluation.q2, evaluation.q3, evaluation.q4, evaluation.q5, evaluation.q6, evaluation.q7, evaluation.q8, evaluation.q9, evaluation.q10, evaluation.q11, evaluation.q12,evaluation.q13, evaluation.q14,evaluation.q15, evaluation.q16, evaluation.q17, evaluation.q18,evaluation.q19, evaluation.q20, evaluation.q21, evaluation.q22, evaluation.q23, evaluation.q24, evaluation.q25, evaluation.q26, evaluation.q27, evaluation.q28, evaluation.q29, evaluation.q30, evaluation.q31, evaluation.q32, evaluation.q33, evaluation.q34, evaluation.q35, evaluation.q36, evaluation.feedback, evaluation.user_id, evaluation.centers_id, evaluation.customerservices_id, evaluation.reviewby, evaluation.created_date, centers.centers_id, centers.name AS branch, user.user_id, user.name AS employee
                                                                    FROM evaluation
                                                                    JOIN centers
                                                                    ON evaluation.centers_id = centers.centers_id
                                                                    JOIN user
                                                                    ON user.user_id = evaluation.user_id
                                                                    where evaluation.customerservices_id = :customerservices_id");

                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                                $stmt->execute();
                                                                

                                                               while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                               {
                                                                extract($data);                                                 
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $subject; ?></span></a><br>
                                                                        <span style="font-weight: 8px; font-weight: bold;"><?php echo $branch; ?></span></a><br>
                                                                        <span><?php echo $created_date; ?></span><br>
                                                                    </td>
                                                                    <td>
                                                                       
                                                                     <span><?php 

                                                                     $result = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19 + $q20 + $q21 + $q22 + $q23 + $q24 + $q25 + $q26 + $q27 + $q28 + $q29 + $q30 + $q31 + $q32 + $q33 + $q34 + $q35 + $q36;

                                                                     if( $result >= "160"){
                                                                        echo "Sangat Memuaskan"." - ";
                                                                        echo $result." Point";
                                                                     }else if ($result >= "144" && $result < "160"){
                                                                        echo "Memuaskan" ." - ";
                                                                        echo $result." Point";
                                                                     }else if ($result >= "110" && $result < "144"){
                                                                        echo "Baik" ." - ";
                                                                        echo $result." Point";
                                                                     } else if ($result >= "50" && $result < "110") {
                                                                        echo "Sederhana" ." - ";
                                                                        echo $result." Point";
                                                                     } else {
                                                                        echo "Tidak Memuaskan" ." - ";
                                                                        echo $result." Point";
                                                                     } ?>

                                                                         </span>
                                                                    </td>
                                                                    <td>
                                                                        <span style="font-weight: bold;"><?php echo $employee; ?></span><br><br>
                                                                        
                                                                    </td>
                                                                    
                                                                    <td style="text-align: center;">
                                                                        <a href="system-operation-evaluation-v1.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>&evaluation=<?= $evaluation_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                    <?php } else if ($roles == "15" || $roles == "9" || $roles == "21" ) { ?>
                        <!-- branch shah alam -->
                        <?php if($centers == "1") { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">LIST BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Detail</th>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT
                                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                                FROM user
                                                                                JOIN roles
                                                                                  ON user.roles_id = roles.roles_id
                                                                                JOIN centers
                                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                                        <span><?php echo $email; ?></span><br>
                                                                                        <span><?php echo $phone; ?></span>
                                                                                        
                                                                                </td>
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                        <!-- branch johor  -->
                        <?php } else if($centers == "2") { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT * FROM centers WHERE centers_id = '2'");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $name; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                            <!-- branch wangsa melawati -->
                        <?php } else if($centers == "3") { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">LIST BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Detail</th>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT
                                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                                FROM user
                                                                                JOIN roles
                                                                                  ON user.roles_id = roles.roles_id
                                                                                JOIN centers
                                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                                        <span><?php echo $email; ?></span><br>
                                                                                        <span><?php echo $phone; ?></span>
                                                                                        
                                                                                </td>
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                            <!-- branch kota damansara -->
                        <?php } else if ($centers == "4") { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">LIST BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Detail</th>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT
                                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                                FROM user
                                                                                JOIN roles
                                                                                  ON user.roles_id = roles.roles_id
                                                                                JOIN centers
                                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                                        <span><?php echo $email; ?></span><br>
                                                                                        <span><?php echo $phone; ?></span>
                                                                                        
                                                                                </td>
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                            <!-- branch bandar puteri bangi -->
                        <?php } else if ($centers == "5") { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">LIST BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Detail</th>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT
                                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                                FROM user
                                                                                JOIN roles
                                                                                  ON user.roles_id = roles.roles_id
                                                                                JOIN centers
                                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                                        <span><?php echo $email; ?></span><br>
                                                                                        <span><?php echo $phone; ?></span>
                                                                                        
                                                                                </td>
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                            <!-- branch kuala selangor -->
                        <?php } else if ($centers == "6")  { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">LIST BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Detail</th>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT
                                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                                FROM user
                                                                                JOIN roles
                                                                                  ON user.roles_id = roles.roles_id
                                                                                JOIN centers
                                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                                        <span><?php echo $email; ?></span><br>
                                                                                        <span><?php echo $phone; ?></span>
                                                                                        
                                                                                </td>
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                            <!-- branch bandar baru bangi -->
                        <?php } else if ($centers == "9")  { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">LIST BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Detail</th>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT
                                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                                FROM user
                                                                                JOIN roles
                                                                                  ON user.roles_id = roles.roles_id
                                                                                JOIN centers
                                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                                        <span><?php echo $email; ?></span><br>
                                                                                        <span><?php echo $phone; ?></span>
                                                                                        
                                                                                </td>
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                            <!-- branch krubong melaka -->
                        <?php } else if ($centers == "10")  { ?>
                            <div class="app-content my-3 my-md-5">
                                <div class="side-app">
                                    <?php
                                        if(isset($_GET["id"]))
                                            {
                                                
                                                $customerservices_id = $_GET["id"];
                                                // $sql =  "SELECT * FROM training where training_id = :training_id";
                                                $sql =  "SELECT * FROM customerservices where customerservices_id = :customerservices_id";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":customerservices_id", $customerservices_id);
                                                $stmt->execute();

                                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $customerservices_id = $dt["customerservices_id"];
                                                    $subject = $dt["subject"];
                                                    $user_id = $dt["user_id"];
                                                    $objective = $dt["objective"];
                                                }
                                            }
                                        else
                                            {
                                                echo " Data is not found!";
                                            }
                                    ?>
                                    <div class="page-header">
                                        <h4 class="page-title" style="color: #94171b; text-transform: uppercase;">evaluation : <?= $subject; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">ADMINISTRATION <?= $customerservices_id; ?></a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
                                        </ol>
                                    </div>
                                    
                                    <div class="row">
                                        
                                            <div class="card">
                                                <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                                                <div class="card-header">
                                                    <h3 class="card-title">LIST BRANCH</h3>
                                                </div>
                                                <div class="panel-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p">Detail</th>
                                                                                <th class="wd-15p">Branch</th>
                                                                                <th class="wd-15p">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php 
                                                                            $statement = $conn->prepare("SELECT
                                                                                 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
                                                                                FROM user
                                                                                JOIN roles
                                                                                  ON user.roles_id = roles.roles_id
                                                                                JOIN centers
                                                                                  ON centers.centers_id = user.centers_id WHERE user.roles_id IN ('9','15','21')");

                                                                           $statement->execute();
                                                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                                                           {
                                                                           extract($data);                                                  
                                                                        ?>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
                                                                                        <span><?php echo $email; ?></span><br>
                                                                                        <span><?php echo $phone; ?></span>
                                                                                        
                                                                                </td>
                                                                                <td>
                                                                                    <span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td style="text-align: center;">
                                                                                    <a href="system-operation-evaluation.php?id=<?= $user_id ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
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
                        <?php } else {} ?>
        <?php } 
            else {}
        ?>
<?php 
include('system-footer.php');
?>