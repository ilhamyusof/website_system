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
          if($roles == "3" || $roles == "1" || $roles == "2" || $roles == "19" || $roles == "18")
        {
        ?>
        <div class="app-content my-3 my-md-5">
                <div class="side-app">
                    <?php
                        if(isset($_GET["id"]))
                        {
                            $user_id = $_GET["id"];
                            // $sale_id = $_GET["operation"];
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
                                <h3 style="text-decoration: underline; text-align: center;"><span style="text-transform: uppercase;">sales lead tracker summary </span> </h3><br>
                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;"><?= $branch; ?></p>
                                <p></p>
                                <div class=" text-dark">
                                    <table border="0" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: left; text-transform: uppercase; font-weight: bold;">Date : <span><?= $date = date('d M Y', strtotime($now)); ?></span></p>
                                            </td>
                                            <td>
                                                <p style="text-align: right; text-transform: uppercase; font-weight: bold;">Sales person :  <span><?= $name;?></span></p>
                                            </td>     
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                           
                            <div class=" text-dark">
                                <br>
                               
                                <form class="card" method="POST"  enctype="multipart/form-data">

                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                    <input type="text" class="form-control" name="centers_id" id="centers_id" value="<?php echo $centers_id; ?>" hidden >
                                    <input type="text" class="form-control" name="sale_id" id="sale_id" value="<?php echo $sale_id; ?>" hidden >
                                    <input type="text" class="form-control" name="reviewby" id="reviewby" value="<?php echo  $_SESSION['user_id']; ?>" hidden >
                                    <?php 
                                    $user_id = $_GET["id"];
                                    $centers_id = $_GET["branch"];
                                    // SELECT (COUNT(status)*100 /(Select COUNT(*) From inquiry)) AS ctn1 From inquiry WHERE status = 'Pending'
                                    $statement = $conn->prepare("SELECT COUNT(*) AS totalleads FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND user_id = '$user_id'");
                                    $statement->execute();
                            
                                    $statement1 = $conn->prepare("SELECT COUNT(*) AS totalclose FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND user_id = '$user_id'");
                                    $statement1->execute();
                            
                                    $statement2 = $conn->prepare("SELECT COUNT(*) AS totalpending FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND user_id = '$user_id'");
                                    $statement2->execute();
                                    
                                    $statement3 = $conn->prepare("SELECT COUNT(*) AS totalnotclose FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Not Close' AND user_id = '$user_id'");
                                    $statement3->execute();
                                    
                                    while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                    {
                                    $totalleads = $row["totalleads"]; 
                                        while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $totalclose = $row["totalclose"]; 
                                                while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $totalpending = $row["totalpending"]; 
                                                    while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                        $totalnotclose = $row["totalnotclose"]; 
                                                         

                                                                                                        
                                ?>
                                    
                                    <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Summary Lead By Person</p>
                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td><p style="text-align: left; text-transform: uppercase; font-weight: bold;">Total Leads</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Total Close</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;"> Total Not Close</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Total Pending</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Closing Rate</p></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><?= $totalleads; ?></td>
                                            <td style="text-align: center;"><?= $totalclose; ?></td>
                                            <td style="text-align: center;"><?= $totalpending; ?></td>
                                            <td style="text-align: center;"><?= $totalnotclose; ?></td>
                                            <td style="text-align: center;"><?= $closerate = ($totalleads / $totalclose); ?></td>
                                            
                                        </tr>
                                    </table>
                                    
                                    <?php }}}}?>
                                    <br>
                                    
                                    
                                    <?php 
                                    $user_id = $_GET["id"];
                                    $centers_id = $_GET["branch"];
                                    // SELECT (COUNT(status)*100 /(Select COUNT(*) From inquiry)) AS ctn1 From inquiry WHERE status = 'Pending'
                                    $statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '1' AND user_id = '$user_id'");
                                    $statement->execute();
                            
                                    $statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '2' AND user_id = '$user_id'");
                                    $statement1->execute();
                            
                                    $statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '3' AND user_id = '$user_id'");
                                    $statement2->execute();
                                    
                                    $statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '4'AND user_id = '$user_id'");
                                    $statement3->execute();
                                    
                                    $statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '5' AND user_id = '$user_id'");
                                    $statement4->execute();
                                    
                                    $statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '6' AND user_id = '$user_id'");
                                    $statement5->execute();
                                    
                                    $statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '7' AND user_id = '$user_id'");
                                    $statement6->execute();
                                    
                                    $statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '8' AND user_id = '$user_id'");
                                    $statement7->execute();

                                    $statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '9' AND user_id = '$user_id'");
                                    $statement8->execute();

                                    $statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '10' AND user_id = '$user_id'");
                                    $statement9->execute();
                                    
                                    $statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '11' AND user_id = '$user_id'");
                                    $statement10->execute();
                                    
                                    $statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '12' AND user_id = '$user_id'");
                                    $statement11->execute();
                                    
                                    $statement12 = $conn->prepare("SELECT COUNT(*) AS ctn12 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '13' AND user_id = '$user_id'");
                                    $statement12->execute();
                                    
                                    $statement13 = $conn->prepare("SELECT COUNT(*) AS ctn13 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '14' AND user_id = '$user_id'");
                                    $statement13->execute();
                                    
                                    $statement14 = $conn->prepare("SELECT COUNT(*) AS ctn14 FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND centers_id = '15' AND user_id = '$user_id'");
                                    $statement14->execute();

                                    
                                    while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                    {
                                    $shahalam = $row["ctn"]; 
                                        while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $addaheight = $row["ctn1"]; 
                                                while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $wangsamelawati = $row["ctn2"]; 
                                                    while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                        $kotadamansara = $row["ctn3"]; 
                                                            while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                                    $bandarputeribangi = $row["ctn4"];
                                                                        while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                            {
                                                                                $kualaselangor = $row["ctn5"];
                                                                                while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                                    {
                                                                                        $housecall = $row["ctn6"];
                                                                                        while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                            {
                                                                                                $hq = $row["ctn7"];

                                                                                                while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                                    {
                                                                                                        $bandarbarubangi = $row["ctn8"];
                                                                                                         while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                                        {
                                                                                                            $krubong = $row["ctn9"];
                                                                                                            while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        {
                                                                                                            $null = $row["ctn10"];
                                                                                                            while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        {
                                                                                                            $botanik = $row["ctn11"];
                                                                                                            while($row = $statement12->fetch(PDO::FETCH_ASSOC))
                                                                                                        {
                                                                                                            $eco = $row["ctn12"];
                                                                                                            while($row = $statement13->fetch(PDO::FETCH_ASSOC))
                                                                                                        {
                                                                                                            $btho = $row["ctn13"];
                                                                                                            while($row = $statement14->fetch(PDO::FETCH_ASSOC))
                                                                                                        {
                                                                                                            $serikembangan = $row["ctn14"];

                                                                                                        
                                ?>
                                    <p style="text-align: center; text-transform: uppercase; font-weight: bold;">out closing</p>
                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td><p style="text-align: left; text-transform: uppercase; font-weight: bold;">shah alam</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">kota damansara</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">wangsa melawati</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">johor bharu</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">bandar baru bangi</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">bandar puteri bangi</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">kuala selangor</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">housecall</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">HQ</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Krubong melaka</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Eco Ardence</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Botanik</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">BTHO</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Seri Kembangan</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Null</p></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><?= $shahalam; ?></td>
                                            <td style="text-align: center;"><?= $kotadamansara; ?></td>
                                            <td style="text-align: center;"><?= $wangsamelawati; ?></td>
                                            <td style="text-align: center;"><?= $addaheight; ?></td>
                                            <td style="text-align: center;"><?= $bandarbarubangi; ?></td>
                                            <td style="text-align: center;"><?= $bandarputeribangi; ?></td>
                                            <td style="text-align: center;"><?= $kualaselangor; ?></td>
                                            <td style="text-align: center;"><?= $housecall; ?></td>
                                            <td style="text-align: center;"><?= $hq; ?></td>
                                            <td style="text-align: center;"><?= $krubong; ?></td>
                                            <td style="text-align: center;"><?= $eco; ?></td>
                                            <td style="text-align: center;"><?= $botanik; ?></td>
                                            <td style="text-align: center;"><?= $btho; ?></td>
                                            <td style="text-align: center;"><?= $serikembangan; ?></td>
                                            <td style="text-align: center;"><?= $null; ?></td>
                                        </tr>
                                    </table>
                                    <?php }}}}}}}}}}}}}}}?>
                                    <br>
                                    <?php 
                                $user_id = $_GET["id"];
                                $centers_id = $_GET["branch"];
                            
                                    $statement = $conn->prepare("SELECT COUNT(*) AS ss FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '1' AND user_id = '$user_id'");
                                    $statement->execute();
                            
                                    $statement1 = $conn->prepare("SELECT COUNT(*) AS prs FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '2' AND user_id = '$user_id'");
                                    $statement1->execute();
                            
                                    $statement2 = $conn->prepare("SELECT COUNT(*) AS psa FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '3' AND user_id = '$user_id'");
                                    $statement2->execute();
                                    
                                    $statement3 = $conn->prepare("SELECT COUNT(*) AS psb FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '4'AND user_id = '$user_id'");
                                    $statement3->execute();
                                    
                                    $statement4 = $conn->prepare("SELECT COUNT(*) AS psc FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '5' AND user_id = '$user_id'");
                                    $statement4->execute();
                                    
                                    $statement5 = $conn->prepare("SELECT COUNT(*) AS psd FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '6' AND user_id = '$user_id'");
                                    $statement5->execute();

                                    $statement6 = $conn->prepare("SELECT COUNT(*) AS pca FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '7' AND user_id = '$user_id'");
                                    $statement6->execute();
                                    
                                    $statement7 = $conn->prepare("SELECT COUNT(*) AS pcb FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '8' AND user_id = '$user_id'");
                                    $statement7->execute();
                                    
                                    $statement8 = $conn->prepare("SELECT COUNT(*) AS pcc FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '9' AND user_id = '$user_id'");
                                    $statement8->execute();

                                    $statement9 = $conn->prepare("SELECT COUNT(*) AS pmcare FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '10' AND user_id = '$user_id'");
                                    $statement9->execute();

                                    $statement10 = $conn->prepare("SELECT COUNT(*) AS ephysio FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '11' AND user_id = '$user_id'");
                                    $statement10->execute();

                                    $statement11 = $conn->prepare("SELECT COUNT(*) AS other FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '12' AND user_id = '$user_id'");
                                    $statement11->execute();
                                    
                                    $statement12 = $conn->prepare("SELECT COUNT(*) AS peadss FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '13' AND user_id = '$user_id'");
                                    $statement12->execute();
                                    
                                    $statement13 = $conn->prepare("SELECT COUNT(*) AS peadpsa FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '14' AND user_id = '$user_id'");
                                    $statement13->execute();
                                    
                                    $statement14 = $conn->prepare("SELECT COUNT(*) AS PEADSpsb FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '15' AND user_id = '$user_id'");
                                    $statement14->execute();
                                    
                                    $statement15 = $conn->prepare("SELECT COUNT(*) AS peadpsc FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND package_id = '16' AND user_id = '$user_id'");
                                    $statement15->execute();

                                    
                                    while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                    {
                                    $ss = $row["ss"]; 
                                        while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $prs = $row["prs"]; 
                                                while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $psa = $row["psa"]; 
                                                    while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                        $psb = $row["psb"]; 
                                                            while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                                    $psc = $row["psc"];
                                                                        while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                            {
                                                                                $psd = $row["psd"];

                                                                                 while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                                    {
                                                                                        $pca = $row["pca"];

                                                                                        while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                            {
                                                                                                $pcb = $row["pcb"];

                                                                                                while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                                    {
                                                                                                        $pcc = $row["pcc"];
                                                                                                        while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                                            {
                                                                                                                $pmcare = $row["pmcare"];
                                                                                                                 while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                                {
                                                                                                                    $ephysio = $row["ephysio"];
                                                                                                                    
                                                                                                                    while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                                        {
                                                                                                                            $other = $row["other"];
                                                                                                                            
                                                                                                                            while($row = $statement12->fetch(PDO::FETCH_ASSOC))
                                                                                                                            {
                                                                                                                            $peadss = $row["peadss"];
                                                                                                                            
                                                                                                                                while($row = $statement13->fetch(PDO::FETCH_ASSOC))
                                                                                                                                 {
                                                                                                                                $peadpsa = $row["peadpsa"];
                                                                                                                                
                                                                                                                                    while($row = $statement14->fetch(PDO::FETCH_ASSOC))
                                                                                                                                     {
                                                                                                                                    $PEADSpsb = $row["PEADSpsb"];
                                                                                                                                    
                                                                                                                                        while($row = $statement15->fetch(PDO::FETCH_ASSOC))
                                                                                                                                            {
                                                                                                                                                $peadpsc = $row["peadpsc"];

                                                                                                        
                                ?>
                                    <p style="text-align: center; text-transform: uppercase; font-weight: bold;">Package</p>
                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">ss</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">prs</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">psa</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">psb</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">psc</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">psd</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">peads ss</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">peads psa</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">peads psb</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">peads psc</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">pca</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">pcb</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">pcc</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">pm care</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">e-physio</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">null</p></td>
                                            
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><?= $ss; ?></td>
                                            <td style="text-align: center;"><?= $prs; ?></td>
                                            <td style="text-align: center;"><?= $psa; ?></td>
                                            <td style="text-align: center;"><?= $psb; ?></td>
                                            <td style="text-align: center;"><?= $psc; ?></td>
                                            <td style="text-align: center;"><?= $psd; ?></td>
                                            <td style="text-align: center;"><?= $peadss; ?></td>
                                            <td style="text-align: center;"><?= $peadpsa; ?></td>
                                            <td style="text-align: center;"><?= $PEADSpsb; ?></td>
                                            <td style="text-align: center;"><?= $peadpsc; ?></td>
                                            <td style="text-align: center;"><?= $pca; ?></td>
                                            <td style="text-align: center;"><?= $pcb; ?></td>
                                            <td style="text-align: center;"><?= $pcc; ?></td>
                                            <td style="text-align: center;"><?= $pmcare; ?></td>
                                            <td style="text-align: center;"><?= $ephysio; ?></td>
                                            <td style="text-align: center;"><?= $other; ?></td>
                                        </tr>
                                    </table>
                                    <?php }}}}}}}}}}}}}}}}?>
                                    <br>
                                    <?php 
                                $user_id = $_GET["id"];
                                $centers_id = $_GET["branch"];
                                    // SELECT (COUNT(status)*100 /(Select COUNT(*) From inquiry)) AS ctn1 From inquiry WHERE status = 'Pending'
                                    $statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '1' AND user_id = '$user_id'");
                                    $statement->execute();
                            
                                    $statement1 = $conn->prepare("SELECT COUNT(*) AS whatsapp FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '2' AND user_id = '$user_id'");
                                    $statement1->execute();
                            
                                    $statement2 = $conn->prepare("SELECT COUNT(*) AS facebook FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '3' AND user_id = '$user_id'");
                                    $statement2->execute();

                                    $statement3 = $conn->prepare("SELECT COUNT(*) AS website FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '4' AND user_id = '$user_id'");
                                    $statement3->execute();

                                    $statement4 = $conn->prepare("SELECT COUNT(*) AS instagram FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '5'AND user_id = '$user_id'");
                                    $statement4->execute();
                                    
                                    $statement5 = $conn->prepare("SELECT COUNT(*) AS twitter FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '6' AND user_id = '$user_id'");
                                    $statement5->execute();
                                    
                                    $statement6 = $conn->prepare("SELECT COUNT(*) AS youtube FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '7' AND user_id = '$user_id'");
                                    $statement6->execute();
                                    
                                    $statement7 = $conn->prepare("SELECT COUNT(*) AS email FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '8' AND user_id = '$user_id'");
                                    $statement7->execute();
                                    
                                    $statement8 = $conn->prepare("SELECT COUNT(*) AS walkin FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '9' AND user_id = '$user_id'");
                                    $statement8->execute();

                                    $statement9 = $conn->prepare("SELECT COUNT(*) AS referal FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND engagement_id = '10' AND user_id = '$user_id'");
                                    $statement9->execute();
                                    
                                    $statement10 = $conn->prepare("SELECT COUNT(*) AS tawk FROM tracker WHERE (created_date BETWEEN '2021-09-29' AND '2021-10-28') AND engagement_id = '11' AND user_id = '$user_id'");
                                    $statement10->execute();

                                    
                                    while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                    {
                                    $call = $row["ctn"]; 
                                        while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $whatsapp = $row["whatsapp"]; 
                                                while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $facebook = $row["facebook"]; 
                                                while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                        $website = $row["website"];
                                                    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                        $instagram = $row["instagram"]; 
                                                            while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                                    $twitter = $row["twitter"];
                                                                        while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                            {
                                                                                $youtube = $row["youtube"];
                                                                                while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                    {
                                                                                        $email = $row["email"];
                                                                                        while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                            {
                                                                                                $walkin = $row["walkin"];

                                                                                                while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                                    {
                                                                                                        $referal = $row["referal"];
                                                                                                    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                    {
                                                                                                        $tawk = $row["tawk"];
                                                                                                        

                                                                                                        
                                ?>
                                    <p style="text-align: center; text-transform: uppercase; font-weight: bold;">sources</p>
                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">facebook</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">website</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">instagram</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">twitter</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">youtube</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">email</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">walk in</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">referal</p></td> 
                                        </tr>
                                        <tr>
                                           
                                            <td style="text-align: center;"><?= $facebook; ?></td>
                                            <td style="text-align: center;"><?= $website; ?></td>
                                            <td style="text-align: center;"><?= $instagram; ?></td>
                                            <td style="text-align: center;"><?= $twitter; ?></td>
                                            <td style="text-align: center;"><?= $youtube; ?></td>
                                            <td style="text-align: center;"><?= $email; ?></td>
                                            <td style="text-align: center;"><?= $walkin; ?></td>
                                            <td style="text-align: center;"><?= $referal; ?></td>
                                            
                                        </tr>
                                    </table>
                                <?php }}}}}}}}}}}?>
                                    <br>
                                    <p style="text-align: center; text-transform: uppercase; font-weight: bold;">type of pain</p>
                                 <?php 
                                $user_id = $_GET["id"];
                                $centers_id = $_GET["branch"];
                                    
                                    $statement = $conn->prepare("SELECT COUNT(*) AS backpain FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '1' AND user_id = '$user_id'");
                                    $statement->execute();
                            
                                    $statement1 = $conn->prepare("SELECT COUNT(*) AS slipdics FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '2' AND user_id = '$user_id'");
                                    $statement1->execute();
                            
                                    $statement2 = $conn->prepare("SELECT COUNT(*) AS stroke FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '3' AND user_id = '$user_id'");
                                    $statement2->execute();

                                    $statement3 = $conn->prepare("SELECT COUNT(*) AS kneepain FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '4' AND user_id = '$user_id'");
                                    $statement3->execute();

                                    $statement4 = $conn->prepare("SELECT COUNT(*) AS neckpain FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '5'AND user_id = '$user_id'");
                                    $statement4->execute();
                                    
                                    $statement5 = $conn->prepare("SELECT COUNT(*) AS shoulderpain FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '6' AND user_id = '$user_id'");
                                    $statement5->execute();
                                    
                                    $statement6 = $conn->prepare("SELECT COUNT(*) AS elbowpain FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '7' AND user_id = '$user_id'");
                                    $statement6->execute();
                                    
                                    $statement7 = $conn->prepare("SELECT COUNT(*) AS sciantica FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '8' AND user_id = '$user_id'");
                                    $statement7->execute();
                                    
                                    $statement8 = $conn->prepare("SELECT COUNT(*) AS anklepain FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '9' AND user_id = '$user_id'");
                                    $statement8->execute();
                                    
                                    $statement9 = $conn->prepare("SELECT COUNT(*) AS scoliosis FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '11' AND user_id = '$user_id'");
                                    $statement9->execute();
                                    
                                    $statement10 = $conn->prepare("SELECT COUNT(*) AS others FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '12' AND user_id = '$user_id'");
                                    $statement10->execute();
                                    
                                    $statement11 = $conn->prepare("SELECT COUNT(*) AS nulls FROM tracker WHERE (created_date BETWEEN '2022-04-29' AND '2022-05-28') AND pain_id = '10' AND user_id = '$user_id'");
                                    $statement11->execute();

                                    

                                    
                                    while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                    {
                                    $backpain = $row["backpain"]; 
                                    
                                        while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $slipdics = $row["slipdics"]; 
                                                while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $stroke = $row["stroke"]; 
                                                while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                        $kneepain = $row["kneepain"];
                                                    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                        $neckpain = $row["neckpain"]; 
                                                            while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                                    $shoulderpain = $row["shoulderpain"];
                                                                        while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                            {
                                                                                $elbowpain = $row["elbowpain"];
                                                                                while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                    {
                                                                                        $sciantica = $row["sciantica"];
                                                                                        while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                            {
                                                                                                $anklepain = $row["anklepain"];
                                                                                            while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                            {
                                                                                                $scoliosis = $row["scoliosis"];
                                                                                                while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                            {
                                                                                                $others = $row["others"];
                                                                                                while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                            {
                                                                                                $nulls = $row["nulls"];

                                                                                               
                                                                                                        

                                                                                                        
                                ?>
                                    <table border="1" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;">back pain</p>
                                            </td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">slip disc</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">stroke</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">knee pain</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">neck pain</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">shoulder pain</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">elbow pain</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">sciatica</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">ankle pain</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">scoliosis</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">others</p></td>
                                            <td><p style="text-align: center; text-transform: uppercase; font-weight: bold;">Null</p></td>
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><?= $backpain; ?></td>
                                            <td style="text-align: center;"><?= $slipdics; ?></td>
                                            <td style="text-align: center;"><?= $stroke; ?></td>
                                            <td style="text-align: center;"><?= $kneepain; ?></td>
                                            <td style="text-align: center;"><?= $neckpain; ?></td>
                                            <td style="text-align: center;"><?= $shoulderpain; ?></td>
                                            <td style="text-align: center;"><?= $elbowpain; ?></td>
                                            <td style="text-align: center;"><?= $sciantica; ?></td>
                                            <td style="text-align: center;"><?= $anklepain; ?></td>
                                            <td style="text-align: center;"><?= $scoliosis; ?></td>
                                            <td style="text-align: center;"><?= $others; ?></td>
                                            <td style="text-align: center;"><?= $nulls; ?></td>
                                        </tr>
                                    </table>
                                <?php }}}}}}}}}}}}?>
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