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
            $email = $_SESSION["session"];
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
                            $user_id = $_GET["id"];
                            $operation_id = $_GET["operation"];
                            $centers_id = $_GET["branch"];
                            // $sql = "SELECT * FROM user WHERE email = :email";
                            $sql = "SELECT user.user_id, user.name, user.roles_id, user.centers_id, centers.centers_id, centers.name as branch
                                FROM user
                                JOIN centers
                                  ON user.centers_id = centers.centers_id
                                where user.user_id = :user_id
                                 ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":user_id", $user_id);
                            $stmt->execute();

                            if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $user_id = $dt["user_id"];
                                $name = $dt["name"];                                           
                                $branch = $dt["branch"]; 
                                $centers_id = $dt["centers_id"];
                            }
                        }
                        else
                        {
                            echo "Data is not found!";
                        }   
                    ?>

                    <div class="card">
                        <div class="card-status bg-success br-tr-3 br-tl-3"></div>
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <br><br><br>
                            <div class=" text-dark">
                                <h3 style="text-decoration: underline; text-align: center;"><span style="text-transform: uppercase;"></span> BRANCH MONTHLY EVALUATION </h3><br>
                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"><?= $branch; ?></p>
                                <p></p>
                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Date : <span><?= $date = date('d M Y', strtotime($now)); ?></span></p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Employee :  <span><?= $name;?></span></p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Review by :  <span><?= $_SESSION["session"]; ?></span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"> 0 = not applicable</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1 = needs</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2 = average</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3 = above average</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4 = exceptional</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <div class=" text-dark">
                                <br>
                                <form class="card" method="POST" action="system-add-evaluation.php"  enctype="multipart/form-data">

                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                    <input type="text" class="form-control" name="centers_id" id="centers_id" value="<?php echo $centers_id; ?>" hidden >
                                    <input type="text" class="form-control" name="operation_id" id="operation_id" value="<?php echo $operation_id; ?>" hidden >
                                    <input type="text" class="form-control" name="reviewby" id="reviewby" value="<?php echo  $_SESSION['user_id']; ?>" hidden >


                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> please rate your intern in the following areas using the scale above.</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> human relations</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> is friendly and courtenous</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q1" id="q1" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q1" id="q1" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> contributes to the team effort</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q2" id="q2" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q2" id="q2" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> accepts feedback and responds appropriately</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q3" id="q3" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q3" id="q3" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">able to communicate with a varienty of people </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q4" id="q4" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q4" id="q4" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">professionalism</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">arrives prepared for work </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q5" id="q5" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q5" id="q5" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">attends work regularly and punctual </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q6" id="q6" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q6" id="q6" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">professional in appearance and attitude</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q7" id="q7" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q7" id="q7" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">work habits</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">look for way to improve and shows initiative</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q8" id="q8" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q8" id="q8" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">seeks clarification when necessary</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q9" id="q9" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q9" id="q9" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">is able to problem-solve</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q10" id="q10" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q10" id="q10" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">works well independently</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q11" id="q11" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1"name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q11" id="q11" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">meets goals and deadlines</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q12" id="q12" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q12" id="q12" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">select and applies appropriates technology to the task</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q13" id="q13" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q13" id="q13" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">quality of work</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">deals with routine tasks efficiently</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q14" id="q14" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q14" id="q14" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">is accurate and thorough</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q15" id="q15" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q15" id="q15" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">uses creativity in task management</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q16" id="q16" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q16" id="q16" required /></center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="form-label">Write Feedback</label>
                                        <div class="card-body">
                                            <textarea class="content" name="feedback" id="feedback"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit Evaluation</button>
                                </div>
                                </form>
                            </div>
                            <br>                           
                        </div>
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
                            $user_id = $_GET["id"];
                            $sale_id = $_GET["operation"];
                            $centers_id = $_GET["branch"];
                            // $sql = "SELECT * FROM user WHERE email = :email";
                            $sql = "SELECT user.user_id, user.name, user.roles_id, user.centers_id, centers.centers_id, centers.name as branch
                                FROM user
                                JOIN centers
                                  ON user.centers_id = centers.centers_id
                                where user.user_id = :user_id
                                 ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":user_id", $user_id);
                            $stmt->execute();

                            if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $user_id = $dt["user_id"];
                                $name = $dt["name"];                                           
                                $branch = $dt["branch"]; 
                                $centers_id = $dt["centers_id"];
                            }
                        }
                        else
                        {
                            echo "Data is not found!";
                        }   
                    ?>

                    <div class="card">
                        <div class="card-status bg-success br-tr-3 br-tl-3"></div>
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <br><br><br>
                            <div class=" text-dark">
                                <h3 style="text-decoration: underline; text-align: center;"><span style="text-transform: uppercase;"></span> BRANCH MONTHLY EVALUATION </h3><br>
                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"><?= $branch; ?></p>
                                <p></p>
                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Date : <span><?= $date = date('d M Y', strtotime($now)); ?></span></p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Employee :  <span><?= $name;?></span></p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Review by :  <span><?= $_SESSION["session"]; ?></span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"> 0 = not applicable</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1 = needs</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2 = average</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3 = above average</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4 = exceptional</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <div class=" text-dark">
                                <br>
                                <form class="card" method="POST" action="system-add-evaluation.php"  enctype="multipart/form-data">

                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                    <input type="text" class="form-control" name="centers_id" id="centers_id" value="<?php echo $centers_id; ?>" hidden >
                                    <input type="text" class="form-control" name="sale_id" id="sale_id" value="<?php echo $sale_id; ?>" hidden >
                                    <input type="text" class="form-control" name="reviewby" id="reviewby" value="<?php echo  $_SESSION['user_id']; ?>" hidden >


                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> please rate your intern in the following areas using the scale above.</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> human relations</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> is friendly and courtenous</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q1" id="q1" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q1" id="q1" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> contributes to the team effort</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q2" id="q2" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q2" id="q2" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> accepts feedback and responds appropriately</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q3" id="q3" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q3" id="q3" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">able to communicate with a varienty of people </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q4" id="q4" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q4" id="q4" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">professionalism</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">arrives prepared for work </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q5" id="q5" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q5" id="q5" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">attends work regularly and punctual </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q6" id="q6" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q6" id="q6" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">professional in appearance and attitude</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q7" id="q7" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q7" id="q7" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">work habits</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">look for way to improve and shows initiative</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q8" id="q8" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q8" id="q8" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">seeks clarification when necessary</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q9" id="q9" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q9" id="q9" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">is able to problem-solve</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q10" id="q10" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q10" id="q10" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">works well independently</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q11" id="q11" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1"name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q11" id="q11" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">meets goals and deadlines</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q12" id="q12" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q12" id="q12" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">select and applies appropriates technology to the task</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q13" id="q13" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q13" id="q13" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">quality of work</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">deals with routine tasks efficiently</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q14" id="q14" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q14" id="q14" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">is accurate and thorough</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q15" id="q15" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q15" id="q15" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">uses creativity in task management</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q16" id="q16" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q16" id="q16" required /></center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="form-label">Write Feedback</label>
                                        <div class="card-body">
                                            <textarea class="content" name="feedback" id="feedback"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="submit" name="sale" id="sale" class="btn btn-primary" >Submit Evaluation</button>
                                </div>
                                </form>
                            </div>
                            <br>                           
                        </div>
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
                            $user_id = $_GET["id"];
                            $administration_id = $_GET["operation"];
                            $centers_id = $_GET["branch"];
                            // $sql = "SELECT * FROM user WHERE email = :email";
                            $sql = "SELECT user.user_id, user.name, user.roles_id, user.centers_id, centers.centers_id, centers.name as branch
                                FROM user
                                JOIN centers
                                  ON user.centers_id = centers.centers_id
                                where user.user_id = :user_id
                                 ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":user_id", $user_id);
                            $stmt->execute();

                            if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $user_id = $dt["user_id"];
                                $name = $dt["name"];                                           
                                $branch = $dt["branch"]; 
                                $centers_id = $dt["centers_id"];
                            }
                        }
                        else
                        {
                            echo "Data is not found!";
                        }   
                    ?>

                    <div class="card">
                        <div class="card-status bg-success br-tr-3 br-tl-3"></div>
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <br><br><br>
                            <div class=" text-dark">
                                <h3 style="text-decoration: underline; text-align: center;"><span style="text-transform: uppercase;"></span> BRANCH MONTHLY EVALUATION </h3><br>
                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"><?= $branch; ?></p>
                                <p></p>
                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Date : <span><?= $date = date('d M Y', strtotime($now)); ?></span></p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Employee :  <span><?= $name;?></span></p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Review by :  <span><?= $_SESSION["session"]; ?></span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"> 0 = not applicable</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1 = needs</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2 = average</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3 = above average</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4 = exceptional</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <div class=" text-dark">
                                <br>
                                <form class="card" method="POST" action="system-add-evaluation.php"  enctype="multipart/form-data">

                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                    <input type="text" class="form-control" name="centers_id" id="centers_id" value="<?php echo $centers_id; ?>" hidden >
                                    <input type="text" class="form-control" name="administration_id" id="administration_id" value="<?php echo $administration_id; ?>" hidden >
                                    <input type="text" class="form-control" name="reviewby" id="reviewby" value="<?php echo  $_SESSION['user_id']; ?>" hidden >


                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> please rate your intern in the following areas using the scale above.</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> human relations</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> is friendly and courtenous</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q1" id="q1" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q1" id="q1" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> contributes to the team effort</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q2" id="q2" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q2" id="q2" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;"> accepts feedback and responds appropriately</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q3" id="q3" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q3" id="q3" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">able to communicate with a varienty of people </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q4" id="q4" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q4" id="q4" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">professionalism</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">arrives prepared for work </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q5" id="q5" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q5" id="q5" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">attends work regularly and punctual </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q6" id="q6" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q6" id="q6" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">professional in appearance and attitude</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q7" id="q7" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q7" id="q7" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">work habits</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">look for way to improve and shows initiative</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q8" id="q8" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q8" id="q8" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">seeks clarification when necessary</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q9" id="q9" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q9" id="q9" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">is able to problem-solve</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q10" id="q10" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q10" id="q10" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">works well independently</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q11" id="q11" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1"name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q11" id="q11" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">meets goals and deadlines</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q12" id="q12" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q12" id="q12" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">select and applies appropriates technology to the task</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q13" id="q13" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q13" id="q13" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">quality of work</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">deals with routine tasks efficiently</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q14" id="q14" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q14" id="q14" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">is accurate and thorough</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q15" id="q15" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q15" id="q15" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">uses creativity in task management</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="4" name="q16" id="q16" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="3" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="0" name="q16" id="q16" required /></center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="form-label">Write Feedback</label>
                                        <div class="card-body">
                                            <textarea class="content" name="feedback" id="feedback"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="submit" name="administration" id="administration" class="btn btn-primary" >Submit Evaluation</button>
                                </div>
                                </form>
                            </div>
                            <br>                           
                        </div>
                    </div>
                </div>
            </div>
        <?php } else if ($roles == "16"){ ?>
            <div class="app-content my-3 my-md-5">
                <div class="side-app">
                    <?php
                        if(isset($_GET["id"]))
                        {
                            $user_id = $_GET["id"];
                            $customerservices_id = $_GET["customerservices_id"];
                            $centers_id = $_GET["branch"];
                            // $sql = "SELECT * FROM user WHERE email = :email";
                            $sql = "SELECT user.user_id, user.name, user.roles_id, user.centers_id, centers.centers_id, centers.name as branch
                                FROM user
                                JOIN centers
                                  ON user.centers_id = centers.centers_id
                                where user.user_id = :user_id
                                 ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":user_id", $user_id);
                            $stmt->execute();

                            if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $user_id = $dt["user_id"];
                                $name = $dt["name"];                                           
                                $branch = $dt["branch"]; 
                                $centers_id = $dt["centers_id"];
                            }
                        }
                        else
                        {
                            echo "Data is not found!";
                        }   
                    ?>

                    <div class="card">
                        <div class="card-status bg-success br-tr-3 br-tl-3"></div>
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <br><br><br>
                            <div class=" text-dark">
                                <h3 style="text-decoration: underline; text-align: center;"><span style="text-transform: uppercase;"></span> BRANCH MONTHLY EVALUATION </h3><br>
                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"><?= $branch; ?></p>
                                <p></p>
                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Date : <span><?= $date = date('d M Y', strtotime($now)); ?></span></p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Employee :  <span><?= $name;?></span></p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Review by :  <span><?= $_SESSION["session"]; ?></span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1 = TIDAK MEMUASKAN</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2 = SEDERHANA</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3 = BAIK</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4 = MEMUASKAN</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">5 = SANGAT MEMUASKAN</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <div class=" text-dark">
                                <br>
                                <form class="card" method="POST" action="system-add-evaluation.php"  enctype="multipart/form-data">

                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                    <input type="text" class="form-control" name="centers_id" id="centers_id" value="<?php echo $centers_id; ?>" hidden >
                                    <input type="text" class="form-control" name="customerservices_id" id="customerservices_id" value="<?php echo $customerservices_id; ?>" hidden >
                                    <input type="text" class="form-control" name="reviewby" id="reviewby" value="<?php echo  $_SESSION['user_id']; ?>" hidden >


                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> please rate your intern in the following areas using the scale above.</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">5</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">ruangan menunggu</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perabot dalam keadaan yang tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q1" id="q1" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q1" id="q1" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perabot dalam keadaan bersih dan tidak berhabuk</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q2" id="q2" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q2" id="q2" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah/bahan yang tidak diperlukan di ruangan menunggu</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q3" id="q3" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q3" id="q3" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">karpet dalam keadaan tersusun dan bersih </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q4" id="q4" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q4" id="q4" required /></center> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">siling bersih dan tidak bersawang</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q5" id="q5" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q5" id="q5" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">kaunter</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">ruangan di kaunter dalam keadaan bersih dan tersusun </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q6" id="q6" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q6" id="q6" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">ruangan atas kaunter tiada sampah dan bahan / barangan tidak diperlukan berada di atas meja</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q7" id="q7" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q7" id="q7" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">teknik susunan di ruangan kaunter yang efisien</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q8" id="q8" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q8" id="q8" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">pengunaan label di ruangan admin</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q9" id="q9" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q9" id="q9" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">barangan di ruangan kaunter dalam kedaan baik dan berfungsi</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q10" id="q10" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q10" id="q10" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">ruangan senaman</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">kebersihan ruangan senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q11" id="q11" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q11" id="q11" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan ruangan senaman dalam keadaan tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q12" id="q12" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q12" id="q12" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan di ruang tamu lengkap ( perlatan senaman , tangga , paraller bar, wall bar, quad bench, excersice mat )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q13" id="q13" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q13" id="q13" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah/bahan yang tidak diperlukan berada di ruangan senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q14" id="q14" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2"name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q14" id="q14" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memaparkan tanda/label alat senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q15" id="q15" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q15" id="q15" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan alatan senaman dalam keadaan baik dan tidak rosak</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q16" id="q16" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q16" id="q16" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">bilik rawatan</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">keadaan bilik rawatan dalam keadaan kemas dan dibersih kan ( sanitize )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q17" id="q17" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q17" id="q17" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q17" id="q17" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q17" id="q17" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q17" id="q17" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">teknik susunan yang efisien ( mudah diambil & lihat kemas )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q18" id="q18" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q18" id="q18" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q18" id="q18" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q18" id="q18" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q18" id="q18" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">bilik rawatan dalam keadaan bersih dan tidak berhabuk</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q19" id="q19" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q19" id="q19" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q19" id="q19" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q19" id="q19" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q19" id="q19" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">peralatan di dalam bilik rawatan dalam keadaan baik dan tidak rosak</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q20" id="q20" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q20" id="q20" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q20" id="q20" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q20" id="q20" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q20" id="q20" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">bilik terapis</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">kebersihan di dalam bilik ahli terapis dalam keadaan baik</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q21" id="q21" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q21" id="q21" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q21" id="q21" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q21" id="q21" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q21" id="q21" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">keadaan di dalam bilik terapis dalam keadaan tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q22" id="q22" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q22" id="q22" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q22" id="q22" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q22" id="q22" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q22" id="q22" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">tandas</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan tandas berfungsi dengan baik</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q23" id="q23" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q23" id="q23" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q23" id="q23" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q23" id="q23" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q23" id="q23" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan keadaan tandas dalam keadaan bersih dan wangi</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q24" id="q24" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q24" id="q24" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q24" id="q24" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q24" id="q24" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q24" id="q24" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">pengunaan tanda / label yang seragam, jelas dan sesuai</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q25" id="q25" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q25" id="q25" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q25" id="q25" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q25" id="q25" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q25" id="q25" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan lantai dan kawasan tandas bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q26" id="q26" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q26" id="q26" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q26" id="q26" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q26" id="q26" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q26" id="q26" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">pantri</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah / sisa di dalam singki</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q27" id="q27" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q27" id="q27" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q27" id="q27" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q27" id="q27" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q27" id="q27" required /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">sampah sarap tidak melebihi kuantiti tong sampah</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q28" id="q28" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q28" id="q28" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q28" id="q28" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q28" id="q28" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q28" id="q28" required /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan dan kemudahan pantri dalam keadaan baik dan bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q29" id="q29" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q29" id="q29" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q29" id="q29" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q29" id="q29" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q29" id="q29" required /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan lantai dan kawasan pantri dalam keadaan bersih dan tidak berhabuk atau kotor</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q30" id="q30" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q30" id="q30" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q30" id="q30" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q30" id="q30" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q30" id="q30" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">surau</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">keadaan surau kemas dan bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q31" id="q31" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q31" id="q31" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q31" id="q31" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q31" id="q31" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q31" id="q31" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">barangan solat di dalam surau di susun dengan kemas</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q32" id="q32" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q32" id="q32" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q32" id="q32" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q32" id="q32" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q32" id="q32" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">karpet dalam keadaan bersih dan tidak berdebu</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q33" id="q33" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q33" id="q33" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q33" id="q33" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q33" id="q33" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q33" id="q33" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">ruang hot pack dan cold pack</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">hot pack dan cold pack dalam keadaan bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q34" id="q34" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q34" id="q34" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q34" id="q34" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q34" id="q34" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q34" id="q34" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">mesin hotpack berada dalam suhu yang sesuai</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q35" id="q35" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q35" id="q35" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q35" id="q35" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q35" id="q35" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q35" id="q35" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">hot pack dan cold pack tidak koyak atau bocor</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q36" id="q36" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q36" id="q36" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q36" id="q36" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q36" id="q36" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q36" id="q36" required /></center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="form-label">Write Feedback</label>
                                        <div class="card-body">
                                            <textarea class="content" name="feedback" id="feedback"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="submit" name="customerservice" id="customerservice" class="btn btn-primary" >Submit Evaluation</button>
                                </div>
                                </form>
                            </div>
                            <br>                           
                        </div>
                    </div>
                </div>
            </div>
        <?php } else if ($roles == "15" || $roles == "9" || $roles == "21" ) { ?>
        <div class="app-content my-3 my-md-5">
                <div class="side-app">
                    <?php
                        if(isset($_GET["id"]))
                        {
                            $user_id = $_GET["id"];
                            $customerservices_id = $_GET["customerservices_id"];
                            $centers_id = $_GET["branch"];
                            // $sql = "SELECT * FROM user WHERE email = :email";
                            $sql = "SELECT user.user_id, user.name, user.roles_id, user.centers_id, centers.centers_id, centers.name as branch
                                FROM user
                                JOIN centers
                                  ON user.centers_id = centers.centers_id
                                where user.centers_id = :centers_id
                                 ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":centers_id", $centers_id);
                            $stmt->execute();

                            if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $user_id = $dt["user_id"];
                                $name = $dt["name"];                                           
                                $branch = $dt["branch"]; 
                                $centers_id = $dt["centers_id"];
                            }
                        }
                        else
                        {
                            echo "Data is not found!";
                        }   
                    ?>

                    <div class="card">
                        <div class="card-status bg-success br-tr-3 br-tl-3"></div>
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <br><br><br>
                            <div class=" text-dark">
                                <h3 style="text-decoration: underline; text-align: center;"><span style="text-transform: uppercase;"></span> BRANCH MONTHLY EVALUATION</h3><br>
                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"><?= $branch; ?></p>
                                <p></p>
                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Date : <span><?= $date = date('d M Y', strtotime($now)); ?></span></p>
                                            </td>                                   
                                            <td>
                                                <p style="text-align: right; text-transform: uppercase; font-weight: bold;">Review by :  <span><?= $_SESSION["session"]; ?></span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1 = TIDAK MEMUASKAN</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2 = SEDERHANA</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3 = BAIK</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4 = MEMUASKAN</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">5 = SANGAT MEMUASKAN</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <div class=" text-dark">
                                <br>
                                <form class="card" method="POST" action="system-add-evaluation.php"  enctype="multipart/form-data">

                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                    <input type="text" class="form-control" name="centers_id" id="centers_id" value="<?php echo $centers_id; ?>" hidden >
                                    <input type="text" class="form-control" name="customerservices_id" id="customerservices_id" value="<?php echo $customerservices_id; ?>" hidden >
                                    <input type="text" class="form-control" name="reviewby" id="reviewby" value="<?php echo  $_SESSION['user_id']; ?>" hidden >


                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;"> please rate your intern in the following areas using the scale above.</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">5</p>
                                            </td>                                           
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">4</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">3</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">2</p>
                                            </td>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">1</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">ruangan menunggu</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perabot dalam keadaan yang tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q1" id="q1" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q1" id="q1" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q1" id="q1" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perabot dalam keadaan bersih dan tidak berhabuk</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q2" id="q2" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q2" id="q2" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q2" id="q2" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah/bahan yang tidak diperlukan di ruangan menunggu</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q3" id="q3" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q3" id="q3" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q3" id="q3" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">karpet dalam keadaan tersusun dan bersih </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q4" id="q4" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q4" id="q4" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q4" id="q4" required /></center> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">siling bersih dan tidak bersawang</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q5" id="q5" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q5" id="q5" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q5" id="q5" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">kaunter</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">ruangan di kaunter dalam keadaan bersih dan tersusun </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q6" id="q6" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q6" id="q6" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q6" id="q6" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">ruangan atas kaunter tiada sampah dan bahan / barangan tidak diperlukan berada di atas meja</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q7" id="q7" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q7" id="q7" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q7" id="q7" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">teknik susunan di ruangan kaunter yang efisien</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q8" id="q8" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q8" id="q8" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q8" id="q8" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">pengunaan label di ruangan admin</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q9" id="q9" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q9" id="q9" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q9" id="q9" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">barangan di ruangan kaunter dalam kedaan baik dan berfungsi</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q10" id="q10" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q10" id="q10" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q10" id="q10" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">ruangan senaman</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">kebersihan ruangan senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q11" id="q11" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q11" id="q11" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q11" id="q11" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan ruangan senaman dalam keadaan tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q12" id="q12" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q12" id="q12" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q12" id="q12" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan di ruang tamu lengkap ( perlatan senaman , tangga , paraller bar, wall bar, quad bench, excersice mat )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q13" id="q13" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q13" id="q13" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q13" id="q13" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah/bahan yang tidak diperlukan berada di ruangan senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q14" id="q14" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2"name="q14" id="q14" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q14" id="q14" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memaparkan tanda/label alat senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q15" id="q15" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q15" id="q15" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q15" id="q15" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan alatan senaman dalam keadaan baik dan tidak rosak</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q16" id="q16" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q16" id="q16" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q16" id="q16" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">bilik rawatan</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">keadaan bilik rawatan dalam keadaan kemas dan dibersih kan ( sanitize )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q17" id="q17" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q17" id="q17" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q17" id="q17" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q17" id="q17" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q17" id="q17" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">teknik susunan yang efisien ( mudah diambil & lihat kemas )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q18" id="q18" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q18" id="q18" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q18" id="q18" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q18" id="q18" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q18" id="q18" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">bilik rawatan dalam keadaan bersih dan tidak berhabuk</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q19" id="q19" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q19" id="q19" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q19" id="q19" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q19" id="q19" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q19" id="q19" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">peralatan di dalam bilik rawatan dalam keadaan baik dan tidak rosak</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q20" id="q20" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q20" id="q20" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q20" id="q20" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q20" id="q20" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q20" id="q20" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">bilik terapis</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">kebersihan di dalam bilik ahli terapis dalam keadaan baik</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q21" id="q21" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q21" id="q21" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q21" id="q21" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q21" id="q21" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q21" id="q21" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">keadaan di dalam bilik terapis dalam keadaan tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q22" id="q22" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q22" id="q22" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q22" id="q22" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q22" id="q22" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q22" id="q22" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">tandas</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan tandas berfungsi dengan baik</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q23" id="q23" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q23" id="q23" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q23" id="q23" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q23" id="q23" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q23" id="q23" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan keadaan tandas dalam keadaan bersih dan wangi</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q24" id="q24" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q24" id="q24" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q24" id="q24" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q24" id="q24" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q24" id="q24" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">pengunaan tanda / label yang seragam, jelas dan sesuai</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q25" id="q25" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q25" id="q25" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q25" id="q25" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q25" id="q25" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q25" id="q25" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan lantai dan kawasan tandas bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q26" id="q26" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q26" id="q26" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q26" id="q26" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q26" id="q26" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q26" id="q26" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">pantri</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah / sisa di dalam singki</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q27" id="q27" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q27" id="q27" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q27" id="q27" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q27" id="q27" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q27" id="q27" required /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">sampah sarap tidak melebihi kuantiti tong sampah</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q28" id="q28" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q28" id="q28" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q28" id="q28" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q28" id="q28" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q28" id="q28" required /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan dan kemudahan pantri dalam keadaan baik dan bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q29" id="q29" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q29" id="q29" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q29" id="q29" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q29" id="q29" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q29" id="q29" required /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan lantai dan kawasan pantri dalam keadaan bersih dan tidak berhabuk atau kotor</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q30" id="q30" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q30" id="q30" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q30" id="q30" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q30" id="q30" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q30" id="q30" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">surau</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">keadaan surau kemas dan bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q31" id="q31" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q31" id="q31" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q31" id="q31" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q31" id="q31" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q31" id="q31" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">barangan solat di dalam surau di susun dengan kemas</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q32" id="q32" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q32" id="q32" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q32" id="q32" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q32" id="q32" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q32" id="q32" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">karpet dalam keadaan bersih dan tidak berdebu</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q33" id="q33" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q33" id="q33" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q33" id="q33" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q33" id="q33" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q33" id="q33" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">ruang hot pack dan cold pack</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">hot pack dan cold pack dalam keadaan bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q34" id="q34" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q34" id="q34" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q34" id="q34" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q34" id="q34" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q34" id="q34" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">mesin hotpack berada dalam suhu yang sesuai</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q35" id="q35" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q35" id="q35" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q35" id="q35" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q35" id="q35" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q35" id="q35" required /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">hot pack dan cold pack tidak koyak atau bocor</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q36" id="q36" required /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q36" id="q36" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q36" id="q36" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q36" id="q36" required /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q36" id="q36" required /></center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="form-label">Write Feedback</label>
                                        <div class="card-body">
                                            <textarea class="content" name="feedback" id="feedback"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="submit" name="evaluate" id="evaluate" class="btn btn-primary" >Submit Evaluation</button>
                                </div>
                                </form>
                            </div>
                            <br>                           
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
                else {}
            ?>
<?php
    
    include('system-footer.php');
?>