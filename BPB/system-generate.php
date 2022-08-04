<?php 
session_start();
include('system-header.php'); ?>
        
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
             if(isset($_GET["user"]))
                {
                    
                    $user_id = $_GET["user"];

                    // $sql =  "SELECT * FROM training where training_id = :training_id";
                    $sql =  "SELECT user.user_id, user.name, user.email,user.phone, user.address, user.roles_id, user.centers_id, user.salary, user.resignation, employee_status.employee_status_id, employee_status.asigned, employee_status.endasigned, employee_status.user_id, employee_status.status, employee_status.basic, employee_status.allowance, centers.centers_id, centers.name AS branch, centers.address_1, centers.address_2, centers.state, centers.city, centers.postcode, centers.phone, centers.email 

                        FROM user
                        JOIN centers
                          ON centers.centers_id = user.centers_id
                        JOIN employee_status
                          ON user.user_id = employee_status.user_id WHERE user.user_id = :user_id";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":user_id", $user_id);
                    $stmt->execute();

                    if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                       
                        $name = $dt["name"];
                        $user_id = $dt["user_id"];                                       
                        $asigned = $dt["asigned"];
                        $asigned1 = date('d M Y', strtotime($asigned));

                        $endasigned = $dt["endasigned"];
                        $allowance = $dt["allowance"];
                        $basic = $dt["basic"];
                        $asigned = $dt["asigned"];
                        $status = $dt["status"];
                        $office = $dt["phone"];
                        $branch = $dt["branch"];
                        $address_1 = $dt["address_1"];                                       
                        $address_2 = $dt["address_2"];
                        $state = $dt["state"];
                        $city = $dt["city"];
                        $postcode = $dt["postcode"];
                        $email = $dt["email"];
                        $address = $dt["address"];
                    }
                }
                else
                {
                    echo " Data is not found!";
                }
        ?>
           <div class="app-content my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <center><button type="button" class="btn btn-purple" onClick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button></center>
                        </div>

                        <div class="card">
                            <div class="card-status bg-success br-tr-3 br-tl-3"></div>
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>

                            <div class="card-body">
                                    <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td></td>
                                            <td style="text-align: right;">Tel</td>
                                            <td style="text-align: right;"><?= $office; ?></td>
                                           
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: right;">Email</td>
                                            <td style="text-align: right;"><?= $email; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: right; width: 80%; height: auto;">Alamat</td>
                                            <td style="text-align: right; width: 50%;"><?= $address_1; ?><br><?= $address_2; ?><br><?= $postcode; ?><?= $state; ?><br><?= $city; ?></td>
                                            
                                        </tr>
                                    </table>
                                </div>
                                <br>
                                <br>
                             
                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                               <p style="text-transform: uppercase;"><?= $name;?></p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><p><?= $address;?></p></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>950815-06-5083</td>
                                            <td></td>
                                            <td style="text-align: right;"><?= $asigned1 = date('d M Y', strtotime($now));?></td>
                                        </tr>
                                    </table>
                                </div>
                                <br><br><br>
                                <div class=" text-dark">
                                    <h3 style="text-decoration: underline; text-align: center;"><span style="text-transform: uppercase;"><?= $status;?></span> SUCCESSFUL</h3><br>

                                    <span style="text-align: justify;">Congratulations! We are pleased to confirm your ongoing employment due to your outstanding performance in the previous probation period. We take this opportunity to congratulate you and express our appreciation for your valuable contribution in achieving company objectives. We are confident that you will continue the good work in the same spirit of commitment and sincerity, thus grow with our organization.</span><br><br>
                                         

                                    <p style="text-align: justify;">
                                        Consequent to the review of your performance during the previous employment period, we take great pleasure in sharing your newly revised remuneration package and your ongoing employment effective on
                                        <span style="font-weight: bold;"><?= $asigned1;?></span> as detailed below
                                    </p>
                                </div>

                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: left; padding: 8px;">&nbsp; &nbsp;&nbsp;&nbsp;</p>
                                            </td>
                                            <td>
                                                <p style="text-align: left; padding: 8px;">CURRENT BASIC REMUNERATION : <span>RM <?= $basic;?></span></p>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><p style="text-align: left; padding: 8px;">INCREMENT : <span>RM <?= $allowance;?></span></p></td>
                                            
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><p style="text-align: left; padding: 8px;">NEW REMUNERATION : <span>RM <?php $total = $basic + $allowance; echo $total; ?>.00</span></p></td>
                                            
                                        </tr>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <div class=" text-dark">
                                    <span style="text-align: justify;">The terms and conditions of employment set out in your original contract will continue to apply on your ongoing position. 
                                    We look forward to your valuable contribution and wish you all the best for your rewarding year ahead.</span><br><br>
                                         

                                    <p">
                                        <p>Best regards, </p>
                                        <img src="img/signHR.jpeg" style="width: 150px" alt=""><br>
                                        <span>Zainur Ikmal Zaidon<span><br><span>Human Resources Officer</span>
                                    </p>
                                </div>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
<?php
    
    include('system-footer.php');
?>