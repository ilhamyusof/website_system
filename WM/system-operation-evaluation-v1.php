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
                            $evaluation_id = $_GET["evaluation"];
                            // $sql = "SELECT * FROM user WHERE email = :email";
                            $sql = "SELECT evaluation.evaluation_id, evaluation.q1, evaluation.q2, evaluation.q3, evaluation.q4, evaluation.q5, evaluation.q6, evaluation.q7, evaluation.q8, evaluation.q9, evaluation.q10, evaluation.q11, evaluation.q12,evaluation.q13, evaluation.q14,evaluation.q15, evaluation.q16, evaluation.q17, evaluation.q18,evaluation.q19, evaluation.q20, evaluation.q21, evaluation.q22, evaluation.q23, evaluation.q24, evaluation.q25, evaluation.q26, evaluation.q27, evaluation.q28, evaluation.q29, evaluation.q30, evaluation.q31, evaluation.q32, evaluation.q33, evaluation.q34, evaluation.q35, evaluation.q36, evaluation.feedback,evaluation.user_id,  evaluation.centers_id, evaluation.operation_id, evaluation.sale_id, evaluation.administration_id,evaluation.customerservices_id, evaluation.reviewby, evaluation.created_date, user.user_id, user.name AS Employee, centers.centers_id, centers.name
                            FROM evaluation
                            JOIN user
                              ON user.user_id = evaluation.user_id
                            JOIN centers
                              ON centers.centers_id = evaluation.centers_id WHERE evaluation.evaluation_id = :evaluation_id
                                 ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":evaluation_id", $evaluation_id);
                            $stmt->execute();

                            if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $user_id = $dt["user_id"];
                                $name = $dt["name"];                                           
                                $created_date = $dt["created_date"]; 
                                $centers_id = $dt["centers_id"];
                                $Employee = $dt["Employee"];
                                $q1 = $dt["q1"];
                                $q2 = $dt["q2"];
                                $q3 = $dt["q3"];
                                $q4 = $dt["q4"];
                                $q5 = $dt["q5"];
                                $q6 = $dt["q6"];
                                $q7 = $dt["q7"];
                                $q8 = $dt["q8"];
                                $q9 = $dt["q9"];
                                $q10 = $dt["q10"];
                                $q11 = $dt["q11"];
                                $q12 = $dt["q12"];
                                $q13 = $dt["q13"];
                                $q14 = $dt["q14"];
                                $q15 = $dt["q15"];
                                $q16 = $dt["q16"];
                                $q17 = $dt["q17"];
                                $q18 = $dt["q18"];
                                $q19 = $dt["q19"];
                                $q20 = $dt["q20"];
                                $q21 = $dt["q21"];
                                $q22 = $dt["q22"];
                                $q23 = $dt["q23"];
                                $q24 = $dt["q24"];
                                $q25 = $dt["q25"];
                                $q26 = $dt["q26"];
                                $q27 = $dt["q27"];
                                $q28 = $dt["q28"];
                                $q29 = $dt["q29"];
                                $q30 = $dt["q30"];
                                $q31 = $dt["q31"];
                                $q32 = $dt["q32"];
                                $q33 = $dt["q33"];
                                $q34 = $dt["q34"];
                                $q35 = $dt["q35"];
                                $q36 = $dt["q36"];
                                $feedback = $dt["feedback"];
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
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Date : <span><?= $date = date('d M Y', strtotime($created_date)); ?></span></p>
                                            </td>
                                                                                       
                                            <td>
                                                <p style="text-align: right; text-transform: uppercase; font-weight: bold;">Review by :  <span><?= $Employee; ?></span></p>
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
                                                <center><input type="radio" value="5" name="q1" id="q1" <?php if($q1 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q1" id="q1" <?php if($q1 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q1" id="q1" <?php if($q1 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q1" id="q1" <?php if($q1 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q1" id="q1"<?php if($q1 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perabot dalam keadaan bersih dan tidak berhabuk</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q2" id="q2" <?php if($q2 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q2" id="q2" <?php if($q2 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q2" id="q2" <?php if($q2 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q2" id="q2" <?php if($q2 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q2" id="q2" <?php if($q2 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah/bahan yang tidak diperlukan di ruangan menunggu</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q3" id="q3" <?php if($q3 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q3" id="q3" <?php if($q3 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q3" id="q3" <?php if($q3 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q3" id="q3" <?php if($q3 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q3" id="q3" <?php if($q3 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">karpet dalam keadaan tersusun dan bersih </p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q4" id="q4" <?php if($q4 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q4" id="q4"  <?php if($q4 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q4" id="q4"  <?php if($q4 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q4" id="q4"  <?php if($q4 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q4" id="q4"  <?php if($q4 == "1"){ echo "checked"; }else{} ?> readonly /></center> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">siling bersih dan tidak bersawang</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q5" id="q5"  <?php if($q5 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q5" id="q5" <?php if($q5 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q5" id="q5" <?php if($q5 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q5" id="q5" <?php if($q5 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q5" id="q5" <?php if($q5 == "1"){ echo "checked"; }else{} ?> readonly /></center>
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
                                                <center><input type="radio" value="5" name="q6" id="q6" <?php if($q6 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q6" id="q6" <?php if($q6 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q6" id="q6" <?php if($q6 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q6" id="q6" <?php if($q6 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q6" id="q6" <?php if($q6 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">ruangan atas kaunter tiada sampah dan bahan / barangan tidak diperlukan berada di atas meja</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q7" id="q7" <?php if($q7 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q7" id="q7" <?php if($q7 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q7" id="q7" <?php if($q7 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q7" id="q7" <?php if($q7 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q7" id="q7" <?php if($q7 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">teknik susunan di ruangan kaunter yang efisien</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q8" id="q8" <?php if($q8 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q8" id="q8" <?php if($q8 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q8" id="q8" <?php if($q8 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q8" id="q8" <?php if($q8 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q8" id="q8" <?php if($q8 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">pengunaan label di ruangan admin</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q9" id="q9" <?php if($q9 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q9" id="q9" <?php if($q9 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q9" id="q9" <?php if($q9 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q9" id="q9" <?php if($q9 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q9" id="q9" <?php if($q9 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">barangan di ruangan kaunter dalam kedaan baik dan berfungsi</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q10" id="q10" <?php if($q10 == "5"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q10" id="q10" <?php if($q10 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q10" id="q10" <?php if($q10 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q10" id="q10" <?php if($q10 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q10" id="q10" <?php if($q10 == "1"){ echo "checked"; }else{} ?> readonly /></center>
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
                                                <center><input type="radio" value="5" name="q11" id="q11" <?php if($q11 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q11" id="q11" <?php if($q11 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q11" id="q11" <?php if($q11 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q11" id="q11" <?php if($q11 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q11" id="q11" <?php if($q11 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan ruangan senaman dalam keadaan tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q12" id="q12" <?php if($q12 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q12" id="q12" <?php if($q12 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q12" id="q12" <?php if($q12 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q12" id="q12" <?php if($q12 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q12" id="q12" <?php if($q12 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan di ruang tamu lengkap ( perlatan senaman , tangga , paraller bar, wall bar, quad bench, excersice mat )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q13" id="q13" <?php if($q13 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q13" id="q13"  <?php if($q13 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q13" id="q13"  <?php if($q13 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q13" id="q13"  <?php if($q13 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q13" id="q13"  <?php if($q13 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">tidak terdapat sampah/bahan yang tidak diperlukan berada di ruangan senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q14" id="q14" <?php if($q14 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q14" id="q14" <?php if($q14 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q14" id="q14" <?php if($q14 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2"name="q14" id="q14" <?php if($q14 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q14" id="q14" <?php if($q14 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memaparkan tanda/label alat senaman</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q15" id="q15" <?php if($q15 == "5"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q15" id="q15" <?php if($q15 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q15" id="q15" <?php if($q15 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q15" id="q15" <?php if($q15 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q15" id="q15" <?php if($q15 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan alatan senaman dalam keadaan baik dan tidak rosak</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q16" id="q16" <?php if($q16 == "5"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q16" id="q16" <?php if($q16 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q16" id="q16" <?php if($q16 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q16" id="q16" <?php if($q16 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q16" id="q16" <?php if($q16 == "1"){ echo "checked"; }else{} ?> readonly /></center>
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
                                                <center><input type="radio" value="5" name="q17" id="q17" <?php if($q17 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q17" id="q17" <?php if($q17 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q17" id="q17" <?php if($q17 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q17" id="q17" <?php if($q17 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q17" id="q17" <?php if($q17 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">teknik susunan yang efisien ( mudah diambil & lihat kemas )</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q18" id="q18" <?php if($q18 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q18" id="q18" <?php if($q18 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q18" id="q18" <?php if($q18 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q18" id="q18" <?php if($q18 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q18" id="q18" <?php if($q18 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">bilik rawatan dalam keadaan bersih dan tidak berhabuk</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q19" id="q19" <?php if($q19 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q19" id="q19" <?php if($q19 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q19" id="q19" <?php if($q19 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q19" id="q19" <?php if($q19 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q19" id="q19" <?php if($q19 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">peralatan di dalam bilik rawatan dalam keadaan baik dan tidak rosak</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q20" id="q20" <?php if($q20 == "5"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q20" id="q20" <?php if($q20 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q20" id="q20" <?php if($q20 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q20" id="q20" <?php if($q20 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q20" id="q20" <?php if($q20 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
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
                                                <center><input type="radio" value="5" name="q21" id="q21" <?php if($q21 == "5"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q21" id="q21" <?php if($q21 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q21" id="q21" <?php if($q21 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q21" id="q21" <?php if($q21 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q21" id="q21" <?php if($q21 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">keadaan di dalam bilik terapis dalam keadaan tersusun</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q22" id="q22" <?php if($q22 == "5"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q22" id="q22"  <?php if($q22 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q22" id="q22"  <?php if($q22 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q22" id="q22"  <?php if($q22 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q22" id="q22"  <?php if($q22 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
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
                                                <center><input type="radio" value="5" name="q23" id="q23"  <?php if($q23 == "5"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q23" id="q23" <?php if($q23 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q23" id="q23" <?php if($q23 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q23" id="q23" <?php if($q23 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q23" id="q23" <?php if($q23 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan keadaan tandas dalam keadaan bersih dan wangi</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q24" id="q24" <?php if($q24 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q24" id="q24" <?php if($q24 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q24" id="q24" <?php if($q24 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q24" id="q24" <?php if($q24 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q24" id="q24" <?php if($q24 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">pengunaan tanda / label yang seragam, jelas dan sesuai</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q25" id="q25" <?php if($q25 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q25" id="q25" <?php if($q25 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q25" id="q25" <?php if($q25 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q25" id="q25" <?php if($q25 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q25" id="q25" <?php if($q25 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan lantai dan kawasan tandas bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q26" id="q26" <?php if($q26 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q26" id="q26" <?php if($q26 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q26" id="q26" <?php if($q26 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q26" id="q26" <?php if($q26 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q26" id="q26" <?php if($q26 == "1"){ echo "checked"; }else{} ?> readonly /></center>
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
                                                <center><input type="radio" value="5" name="q27" id="q27" <?php if($q27 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q27" id="q27" <?php if($q27 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q27" id="q27" <?php if($q27 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q27" id="q27" <?php if($q27 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q27" id="q27" <?php if($q27 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">sampah sarap tidak melebihi kuantiti tong sampah</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q28" id="q28" <?php if($q28 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q28" id="q28" <?php if($q28 == "4"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q28" id="q28" <?php if($q28 == "3"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q28" id="q28" <?php if($q28 == "2"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q28" id="q28" <?php if($q28 == "1"){ echo "checked"; }else{} ?> readonly  /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">perlatan dan kemudahan pantri dalam keadaan baik dan bersih</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q29" id="q29" <?php if($q29 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q29" id="q29" <?php if($q29 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q29" id="q29" <?php if($q29 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q29" id="q29" <?php if($q29 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q29" id="q29" <?php if($q29 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">memastikan lantai dan kawasan pantri dalam keadaan bersih dan tidak berhabuk atau kotor</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q30" id="q30" <?php if($q30 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q30" id="q30" <?php if($q30 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q30" id="q30" <?php if($q30 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q30" id="q30" <?php if($q30 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q30" id="q30" <?php if($q30 == "1"){ echo "checked"; }else{} ?> readonly /></center>
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
                                                <center><input type="radio" value="5" name="q31" id="q31" <?php if($q31 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q31" id="q31" <?php if($q31 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q31" id="q31" <?php if($q31 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q31" id="q31" <?php if($q31 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q31" id="q31" <?php if($q31 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">barangan solat di dalam surau di susun dengan kemas</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q32" id="q32" <?php if($q32 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q32" id="q32" <?php if($q32 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q32" id="q32" <?php if($q32 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q32" id="q32" <?php if($q32 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q32" id="q32" <?php if($q32 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">karpet dalam keadaan bersih dan tidak berdebu</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q33" id="q33" <?php if($q33 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q33" id="q33" <?php if($q33 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q33" id="q33" <?php if($q33 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q33" id="q33" <?php if($q33 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q33" id="q33" <?php if($q33 == "1"){ echo "checked"; }else{} ?> readonly /></center>
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
                                                <center><input type="radio" value="5" name="q34" id="q34" <?php if($q34 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q34" id="q34" <?php if($q34 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q34" id="q34" <?php if($q34 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q34" id="q34" <?php if($q34 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q34" id="q34" <?php if($q34 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">mesin hotpack berada dalam suhu yang sesuai</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q35" id="q35" <?php if($q35 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q35" id="q35" <?php if($q35 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q35" id="q35" <?php if($q35 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q35" id="q35" <?php if($q35 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q35" id="q35" <?php if($q35 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase;">hot pack dan cold pack tidak koyak atau bocor</p>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="5" name="q36" id="q36" <?php if($q36 == "5"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>                                           
                                            <td>
                                                <center><input type="radio" value="4" name="q36" id="q36" <?php if($q36 == "4"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="3" name="q36" id="q36" <?php if($q36 == "3"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="2" name="q36" id="q36" <?php if($q36 == "2"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                            <td>
                                                <center><input type="radio" value="1" name="q36" id="q36" <?php if($q36 == "1"){ echo "checked"; }else{} ?> readonly /></center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="form-label">Write Feedback</label>
                                        <div class="card-body">
                                            <textarea class="content" name="feedback" id="feedback"><?php echo $feedback;?></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    
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