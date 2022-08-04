 <?php 
 session_start();
 include("session.php"); 

        // Set Default Time Zone for Asia/Kuala_Lumpur
        date_default_timezone_set("Asia/Kuala_Lumpur");

        // Check, if username session is NOT set then this page will jump to login page
        if (!isset($_SESSION['session']) && !isset($_SESSION['roles']) ) {
            header('Location: system-login.php');
            //session_destroy();
        }
        $job = $_SESSION["job"];
        $session = $_SESSION['session'];
        $roles = $_SESSION['roles'];
        $centers = $_SESSION['centers'];
        $user_id = $_SESSION["user_id"];
        
    

?>
<!doctype html>
<html lang="en" dir="ltr">
    
<!-- Mirrored from spruko.com/demo/ren/Blue-animated/LeftMenu/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 05:53:19 GMT -->
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-TileColor" content="#0670f0">
        <meta name="theme-color" content="#1643a3">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
       
        <link rel="icon" href="icon.png" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="icon.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />

        <!-- Title -->
        <title>PhysioMobile Malaysia - Pusat Fisioterapi Panel PM Care</title>

        <!--Font Awesome-->
        <link href="assets-system/plugins/fontawesome-free/css/all.css" rel="stylesheet">
        
        <!-- Font Family -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">

        <!-- Dashboard Css -->
        <link href="assets-system/css/dashboard.css" rel="stylesheet" />

        <!-- Custom scroll bar css-->
        <link href="assets-system/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

        <!-- Sidemenu Css -->
        <link href="assets-system/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">

        <!-- c3.js Charts Plugin -->
        <link href="assets-system/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

        <!-- Data table css -->
        <link href="assets-system/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

        <!-- Slect2 css -->
        <link href="assets-system/plugins/select2/select2.min.css" rel="stylesheet" />
        <!-- WYSIWYG Editor css -->
        <link href="assets-system/plugins/wysiwyag/richtext.min.css" rel="stylesheet" />

        <!---Font icons-->
        <link href="assets-system/plugins/iconfonts/plugin.css" rel="stylesheet" />
        <style>
            .canvas {
              display: block;
              max-width: 100px;
              margin: 60px auto;
            }
        </style>

    </head>
    
    <body class="app sidebar-mini rtl">
        <div id="global-loader" ><div class="showbox"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div></div>
        <div class="page">
            <div class="page-main">
                <!-- Navbar-->
                <header class="app-header header">

                    <!-- Header Background Animation-->
                    <div id="canvas" class="gradient"></div>

                    <!-- Navbar Right Menu-->
                    <div class="container-fluid">
                        <div class="d-flex">
                            <a class="header-brand" href="dashboard.php">
                                <img alt="ren logo" class="header-brand-img" src="assets/img/all-image-website/logo-white.png" width="50%" height="auto" >
                                <!-- <img alt="ren logo" class="header-brand-img" src="../assets/img/all-image-website/logo-white-1.png"> -->
                            </a>
                            <!-- Sidebar toggle button-->
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                            <div class="d-flex order-lg-2 ml-auto">
                                <?php 
                                if($roles == "1"  || $roles == "4" )
                                {
                                ?>
                                        <div class="dropdown d-none d-md-flex">
                                        <?php 
                                        $counter = 1;
                                        if ($roles == "1"  || $roles == "4")
                                        {
                                            $statement = $conn->prepare("SELECT (select COUNT(*) from career WHERE status = 'New') + (select count(*) from inquiry WHERE status = 'New') + (select count(*) from contactus WHERE status = 'New') AS ctn");
                                        }
                                        else{
                                        }

                                        $statement->execute();
                                        while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                        {
                                        ?>
                                        <?php
                                        $cnt = $row["ctn"]; 
                                        ?>

                                            <a class="nav-link icon" data-toggle="dropdown"><i class="fas fa-bell"></i> <span class="badge badge-danger badge-pill"> <?php echo $cnt; ?></span></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item text-center text-dark" href="#"><?php echo $cnt; ?> New Messages</a>
                                         <?php
                                        }
                                         ?>
                                        <?php
                                        $counter = 1;
                                           $statement = $conn->prepare("SELECT * FROM career WHERE status IN ('New') ORDER BY career_id DESC Limit 5");
                                           $statement->execute();

                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                           {
                                               $name = $data["name"];
                                               $email = $data["email"];
                                               $status = $data["status"];
                                               $position = $data["position"];
                                                
                                          
                                            ?>

                                           <div class="dropdown-divider"></div>
                                                <a class="dropdown-item d-flex pb-3" href="#">
                                                    <span class="avatar brround mr-3 align-self-center" style="background-image: url(assets-system/images/faces/male/41.jpg)"></span>
                                                    <div>
                                                        <strong><?php echo $name; ?></strong>

                                                        <?php if($status == "New"){ ?>
                                                        <div class="badge badge-info badge-md"><?php echo $status; ?></div>
                                                        <?php } else {?>
                                                        <div class="badge badge-warning badge-md"><?php echo $status; ?></div>
                                                        <?php } ?>
                                                       
                                                        <br>
                                                        I' am client from package <span class="text-success"><?php echo $position; ?></span>
                                                        <div class="small text-muted">
                                                          2021-09-01
                                                        </div>
                                                    </div>
                                                </a>     <?php } ?>                                  
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-center text-muted-dark" href="#">See all Messages </a>
                                            </div>
                                        </div>
                                        <?php   
                                }

                                else if ($roles == "12"  || $roles == "13")
                                {
                                 ?>  
                                 <div class="dropdown d-none d-md-flex">
                                        <?php 
                                        $counter = 1;
                                        if ($roles == "12"  || $roles == "13")
                                        {
                                             $statement = $conn->prepare("SELECT (select count(*) from inquiry WHERE status = 'New') AS ctn");
                                        }
                                        else{
                                        }

                                        $statement->execute();
                                        while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                        {
                                        ?>
                                        <?php
                                        $cnt = $row["ctn"]; 
                                        ?>

                                            <a class="nav-link icon" data-toggle="dropdown"><i class="fas fa-bell"></i> <span class="badge badge-danger badge-pill"> <?php echo $cnt; ?></span></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item text-center text-dark" href="#"><?php echo $cnt; ?> New Messages</a>
                                         <?php
                                        }
                                         ?>
                                        <?php
                                        $counter = 1;
                                           $statement = $conn->prepare("SELECT * FROM inquiry WHERE status IN ('New','Pending') ORDER BY inquiry_id DESC Limit 5");
                                           $statement->execute();

                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                           {
                                               $name = $data["name"];
                                               $email = $data["email"];
                                               $status = $data["status"];
                                               $message = $data["message"];
                                               $branch = $data["branch"];
                                              
                                          
                                            ?>

                                           <div class="dropdown-divider"></div>
                                                <a class="dropdown-item d-flex pb-3" href="#">
                                                    <span class="avatar brround mr-3 align-self-center" style="background-image: url(assets-system/images/faces/male/41.jpg)"></span>
                                                    <div>
                                                        <strong><?php echo $name; ?></strong>

                                                        <?php if($status == "New"){ ?>
                                                        <div class="badge badge-info badge-md"><?php echo $status; ?></div>
                                                        <?php } else {?>
                                                        <div class="badge badge-warning badge-md"><?php echo $status; ?></div>
                                                        <?php } ?>
                                                       
                                                        <br>
                                                        I' am client from branch <span class="text-success"><?php echo $branch; ?></span>
                                                        <div class="small text-muted">
                                                           2021-09-01
                                                        </div>
                                                    </div>
                                                </a>     <?php } ?>                                  
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-center text-muted-dark" href="#">See all Messages </a>
                                            </div>
                                        </div>
                                        <?php   
                                }
                                else if ($roles == "16"  || $roles == "17")
                                {
                                 ?>  
                                 <div class="dropdown d-none d-md-flex">
                                        <?php 
                                        $counter = 1;
                                        if ($roles == "16"  || $roles == "17")
                                        {
                                             $statement = $conn->prepare("SELECT (select count(*) from inquiry WHERE status = 'New') AS ctn");
                                        }
                                        else{
                                        }

                                        $statement->execute();
                                        while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                        {
                                        ?>
                                        <?php
                                        $cnt = $row["ctn"]; 
                                        ?>

                                            <a class="nav-link icon" data-toggle="dropdown"><i class="fas fa-bell"></i> <span class="badge badge-danger badge-pill"> <?php echo $cnt; ?></span></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item text-center text-dark" href="#"><?php echo $cnt; ?> New Messages</a>
                                         <?php
                                        }
                                         ?>
                                        <?php
                                        $counter = 1;
                                           $statement = $conn->prepare("SELECT * FROM inquiry WHERE status IN ('New','Pending') ORDER BY inquiry_id DESC Limit 5");
                                           $statement->execute();

                                           while($data = $statement->fetch(PDO::FETCH_ASSOC))
                                           {
                                               $name = $data["name"];
                                               $email = $data["email"];
                                               $status = $data["status"];
                                               $message = $data["message"];
                                               $branch = $data["branch"];
                                              
                                          
                                            ?>

                                           <div class="dropdown-divider"></div>
                                                <a class="dropdown-item d-flex pb-3" href="#">
                                                    <span class="avatar brround mr-3 align-self-center" style="background-image: url(assets-system/images/faces/male/41.jpg)"></span>
                                                    <div>
                                                        <strong><?php echo $name; ?></strong>

                                                        <?php if($status == "New"){ ?>
                                                        <div class="badge badge-info badge-md"><?php echo $status; ?></div>
                                                        <?php } else {?>
                                                        <div class="badge badge-warning badge-md"><?php echo $status; ?></div>
                                                        <?php } ?>
                                                       
                                                        <br>
                                                        I' am client from branch <span class="text-success"><?php echo $branch; ?></span>
                                                        <div class="small text-muted">
                                                          2021-09-01
                                                        </div>
                                                    </div>
                                                </a>     <?php } ?>                                  
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-center text-muted-dark" href="#">See all Messages </a>
                                            </div>
                                        </div>
                                        <?php   
                                }
                                else { ?>

                               <?php
                                } 
                                ?>

                                 <?php
                                    if(isset($_SESSION["session"]))
                                    {
                                        $email = $_SESSION["session"];
                                        $sql = "SELECT * FROM user WHERE email = :email";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindParam(":email", $email);
                                        $stmt->execute();

                                        if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $name = $dt["name"];
                                            $image = $dt["image"];
                                            $user_id = $dt["user_id"];
                                        }
                                    }
                                    else
                                    {
                                        echo "Data is not found!";
                                    }   
                                    ?>

                                <div class="dropdown">
                                    <a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
                                        <span class="avatar avatar-md brround" style="background-image: url(img/<?php echo $image; ?>)"></span>
                                        <span class="ml-2 d-none d-lg-block">
                                            <span class="text-white"><?php echo $name; ?></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="system-profile.php"><i class="dropdown-icon mdi mdi-account-outline"></i> Profile</a>
                                        <a class="dropdown-item" href="system-logout.php"><i class="dropdown-icon mdi mdi-logout-variant"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar">
                  <?php 
                      if($roles == "1")
                  {
                  ?>
                        <ul class="side-menu">
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="system-dashboard.php">Career Opportunities</a></li>
                                <li><a class="slide-item" href="system-dashboard.php">Inquiry</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <!--<li><a class="slide-item" href="system-index4.html">Home 4</a></li>-->
                            </ul>
                        </li>
                        <li>
                            <a class="side-menu__item" href="system-career.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Career</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="system-contactus.php"><i class="side-menu__icon fas fa-map-marker"></i><span class="side-menu__label">Contact Us</span></a>
                        </li>
                        <!-- <li>
                            <a class="side-menu__item" href="appointment.php"><i class="side-menu__icon ffas fa-images"></i><span class="side-menu__label">Appointment</span></a>
                        </li> -->
                        <li class="slide">
                            	<?php 
                            		// SELECT (COUNT(status)*100 /(Select COUNT(*) From inquiry)) AS ctn1 From inquiry WHERE status = 'Pending'
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12','Bandar Botanik Klang')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Tun Hussein Onn','14')");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Seri kembangan','15')");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $btho = $row["ctn10"];
                                                                                    				    while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                    <a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                    <a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                        <li>
                            <a class="side-menu__item" href="system-promotion.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Promotion</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-lmspanel.php" class="slide-item">LMS Panel</a>
                                </li>
                                <li>
                                    <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                </li>
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-users"></i><span class="side-menu__label">User Panel</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-usermanagement.php" class="slide-item">User Management</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Traning Event</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-training.php" class="slide-item">Traning Event Management</a>
                                    </li>
                                </ul>
                            </li>
                        <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                       <li>
                            <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                        </li>
                    </ul>
                    <?php 
                    }else if ($roles == "2"){ ?>
                         <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                               
                                <li><a class="slide-item" href="system-dashboard-appointment.php">Inquiry</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>                                
                            </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                           <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php }
                    else if($roles == "3"){
                    ?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                               
                                <li><a class="slide-item" href="system-dashboard-appointment.php">Inquiry</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <li><a class="slide-item" href="system-reportticket.php">Report Ticket</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>                            
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-promotion.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Promotion</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-clipboard"></i><span class="side-menu__label">Sale Management</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-operation.php" class="slide-item">Sale</a>
                                    </li>
                                    <li>
                                        <a href="system-evaluation.php" class="slide-item">Evalution</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            
                           <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if ($roles == "28"){ ?>
                        <ul class="side-menu">
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <!--<li><a class="slide-item" href="system-dashboard.php">Career Opportunities</a></li>-->
                                <li><a class="slide-item" href="system-dashboard.php">Inquiry</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <!--<li><a class="slide-item" href="system-index4.html">Home 4</a></li>-->
                            </ul>
                        </li>
                        <li class="slide">
                            	<?php 
                            		// SELECT (COUNT(status)*100 /(Select COUNT(*) From inquiry)) AS ctn1 From inquiry WHERE status = 'Pending'
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12','Bandar Botanik Klang')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Tun Hussein Onn','14')");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Seri kembangan','15')");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $btho = $row["ctn10"];
                                                                                    				    while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                    <a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                    <a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                        <li>
                            <a class="side-menu__item" href="system-promotion.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Promotion</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                </li>
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-users"></i><span class="side-menu__label">User Panel</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-usermanagement.php" class="slide-item">User Management</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                       <li>
                            <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                        </li>
                    </ul>
                    <?php } else if ($roles == "4"){?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                               
                                 <li><a class="slide-item" href="system-dashboard.php">Career Opportunities</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <li><a class="slide-item" href="system-reportticket.php">Report Ticket</a></li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-career.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Career</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-users"></i><span class="side-menu__label">e-Profilling</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li>
                                        <a href="system-management.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lincesee.php" class="slide-item">Licensee</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-users"></i><span class="side-menu__label">User Panel</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li>
                                        <a href="system-usermanagement.php" class="slide-item">User Management</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if($roles == "6"){?>
                        <ul class="side-menu">   
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                               
                                     <li><a class="slide-item" href="system-dashboard.php">Career Opportunities</a></li>
                                    <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                    <li><a class="slide-item" href="system-reportticket.php">Report Ticket</a></li>
                                </ul>
                            </li>                        
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">     
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>                           
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            
                           <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if($roles == "11"){?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                               
                                <li><a class="slide-item" href="system-dashboard-appointment.php">Inquiry</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <li><a class="slide-item" href="system-reportticket.php">Report Ticket</a></li>
                            </ul>
                            </li> 
                             <li class="slide">
                            	<?php 
                            	    $statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            </li>                           
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-clipboard"></i><span class="side-menu__label">Operation Management</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-operation.php" class="slide-item">Operation</a>
                                    </li>
                                    <li>
                                        <a href="system-evaluation.php" class="slide-item">Evalution</a>
                                    </li>
                                </ul>
                            </li>
                                                                                    
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-sign-out-alt"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if($roles == "16") { ?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                               
                                <li><a class="slide-item" href="system-dashboard-appointment.php">Inquiry</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <li><a class="slide-item" href="system-reportticket.php">Report Ticket</a></li>
                            </ul>
                            </li> 
                            <li>
                                <a class="side-menu__item" href="system-contactus.php"><i class="side-menu__icon fas fa-map-marker"></i><span class="side-menu__label">Contact Us</span></a>
                            </li>
                             <li class="slide">
                            	<?php 
                            	    $statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                    	{
                                                                                                    	$btho = $row["ctn10"];
                                                                                                    	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                    		{
                                                                                                    		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-clipboard"></i><span class="side-menu__label">Evaluate</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-operation.php" class="slide-item">Customer Services</a>
                                    </li>
                                    <li>
                                        <a href="system-evaluation.php" class="slide-item">Evalution</a>
                                    </li>
                                    <li>
                                        <a href="system-inspection.php" class="slide-item">Inspection Form</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>                                                        
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if($roles == "23"){ ?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                               
                                <li><a class="slide-item" href="system-dashboard-appointment.php">Inquiry</a></li>
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <li><a class="slide-item" href="system-reportticket.php">Report Ticket</a></li>
                            </ul>
                            </li> 
                             <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                    	{
                                                                                                    	$btho = $row["ctn10"];
                                                                                                    	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                    		{
                                                                                                    		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            </li>                           
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Traning Event</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-training.php" class="slide-item">Traning Event Management</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-clipboard"></i><span class="side-menu__label">Operation Management</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-operation.php" class="slide-item">Operation</a>
                                    </li>
                                    <li>
                                        <a href="system-evaluation.php" class="slide-item">Evalution</a>
                                    </li>
                                </ul>
                            </li> -->
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>                                                        
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if($roles == "24") { ?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                     
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                                <li><a class="slide-item" href="system-reportticket.php">Report Ticket</a></li>
                            </ul>
                            </li> 
                            <li>
                            <ul class="slide-menu">
                                	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                    			{
                                                                                    				$botanik = $row["ctn8"];
                                                                                    				 while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                    	{
                                                                                                    	$btho = $row["ctn10"];
                                                                                                    	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                    		{
                                                                                                    		$sk = $row["ctn11"];
                                ?>
                                ?>
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            </li>                           
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-lmspanel_v1.php" class="slide-item">LMS Panel Department</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-clipboard"></i><span class="side-menu__label">Admin Evaluate</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-operation.php" class="slide-item">Administration</a>
                                    </li>
                                    <li>
                                        <a href="system-evaluation.php" class="slide-item">Evalution</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>                                                        
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if($roles == "9" || $roles == "15" || $roles == "21") { ?>
                        <ul class="side-menu"> 
                            <li class="slide">
                                 <?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                    	{
                                                                                                    	$btho = $row["ctn10"];
                                                                                                    	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                    		{
                                                                                                    		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                
                                    <li>
                                        <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                    </li>
                                    <li>
                                        <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                    </li>
                                    <li>
                                        <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-lead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Lead Tracking</span></a>
                            </li>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-evaluation.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Evaluate Branch</span></a>
                            </li>
                           <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if($roles == "13" || $roles == "20") { ?>
                        <ul class="side-menu"> 
                        <li class="slide">
                            <?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                    	{
                                                                                                    	$btho = $row["ctn10"];
                                                                                                    	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                    		{
                                                                                                    		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                        <li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                        </li>
                       <li>
                                <a class="side-menu__item" href="system-lead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Lead Tracking</span></a>
                            </li>
                       <li>
                            <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                        </li>
                    </ul>
                    <?php } else if($roles == "25" || $roles == "26" || $roles == "27") { ?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard-ticket.php">Ticket</a></li>
                            </ul>
                            </li>
                            
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Traning Event</span><i class="angle fas fa-angle-right"></i></a>
                                <ul class="slide-menu">                                    
                                    <li>
                                        <a href="system-training.php" class="slide-item">Traning Event Management</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul> 
                    <?php } else if( ($roles == "19" && $centers == "1") || ($roles == "18"  && $centers == "1")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "2") || ($roles == "18"  && $centers == "2")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "3") || ($roles == "18"  && $centers == "3")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "4") || ($roles == "18"  && $centers == "4")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "5") || ($roles == "18"  && $centers == "5")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "6") || ($roles == "18"  && $centers == "6")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "9") || ($roles == "18"  && $centers == "9")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "10") || ($roles == "18"  && $centers == "10")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "12") || ($roles == "18"  && $centers == "12")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "13") || ($roles == "18"  && $centers == "13")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "14") || ($roles == "18"  && $centers == "14")) { ?>
                    <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php } else if( ($roles == "19" && $centers == "15") || ($roles == "18"  && $centers == "15")) { ?>
                        <ul class="side-menu">
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">   
                                <li><a class="slide-item" href="system-dashboard.php">Dashboard Inquiry</a></li>
                            </ul>
                            </li>
                            <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '14'");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch = '15'");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                        	{
                                                                                                        	$btho = $row["ctn10"];
                                                                                                        	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                        		{
                                                                                                        		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                            <li>
                            <li>
                                <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                            </li>
                            <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-managelead.php"><i class="side-menu__icon fas fa-file"></i><span class="side-menu__label">Manage Lead Tracking</span></a>
                            </li>
                            <li>
                                <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                            </li>
                        </ul>
                    <?php 
                    } else {
                    ?>
                       <ul class="side-menu">                        
                        <!-- <li>
                            <a class="side-menu__item" href="appointment.php"><i class="side-menu__icon ffas fa-images"></i><span class="side-menu__label">Appointment</span></a>
                        </li> -->
                         <li class="slide">
                            	<?php 
                            		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Shah Alam','1')");
                            		$statement->execute();
                            
                            		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kota Damansara','4')");
                            		$statement1->execute();
                            
                            		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Kuala Selangor','6')");
                            		$statement2->execute();
                            		
                            		$statement3 = $conn->prepare("SELECT COUNT(*) AS ctn3 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Wangsa Melawati','3')");
                            		$statement3->execute();
                            		
                            		$statement4 = $conn->prepare("SELECT COUNT(*) AS ctn4 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Puteri Bangi','5')");
                            		$statement4->execute();
                            		
                            		$statement5 = $conn->prepare("SELECT COUNT(*) AS ctn5 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Baru Bangi','9')");
                            		$statement5->execute();
                            		
                            		$statement6 = $conn->prepare("SELECT COUNT(*) AS ctn6 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Krubong Melaka','10')");
                            		$statement6->execute();
                            		
                            		$statement7 = $conn->prepare("SELECT COUNT(*) AS ctn7 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Johor Bharu','2')");
                            		$statement7->execute();
                            		
                            		$statement8 = $conn->prepare("SELECT COUNT(*) AS ctn8 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Botanik','12')");
                            		$statement8->execute();
                            		
                            		$statement9 = $conn->prepare("SELECT COUNT(*) AS ctn9 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Eco Ardence','13')");
                            		$statement9->execute();
                            		
                            		$statement10 = $conn->prepare("SELECT COUNT(*) AS ctn10 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Bandar Tun Hussein Onn', '14')");
                            		$statement10->execute();
                            		
                            		$statement11 = $conn->prepare("SELECT COUNT(*) AS ctn11 FROM inquiry  WHERE status IN ('New','Pending') AND branch IN ('Seri kembangan','15')");
                            		$statement11->execute();
                            		
                            		while($row = $statement->fetch(PDO::FETCH_ASSOC))
                            		{
                            		$shahalam = $row["ctn"]; 
                            			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
                            			{
                            				$kotadamansara = $row["ctn1"]; 
                                				while($row = $statement2->fetch(PDO::FETCH_ASSOC))
                                			{
                                				$kualaselangor = $row["ctn2"]; 
                                					while($row = $statement3->fetch(PDO::FETCH_ASSOC))
                                						{
                                						$wangsamelawati = $row["ctn3"]; 
                                						    while($row = $statement4->fetch(PDO::FETCH_ASSOC))
                                                    			{
                                                    				$bandarputeribangi = $row["ctn4"];
                                                    				    while($row = $statement5->fetch(PDO::FETCH_ASSOC))
                                                                			{
                                                                				$bandarbarubangi = $row["ctn5"];
                                                                				while($row = $statement6->fetch(PDO::FETCH_ASSOC))
                                                                        			{
                                                                        				$krubong = $row["ctn6"];
                                                                        				while($row = $statement7->fetch(PDO::FETCH_ASSOC))
                                                                                			{
                                                                                				$addaheight = $row["ctn7"];
                                                                                				
                                                                                				while($row = $statement8->fetch(PDO::FETCH_ASSOC))
                                                                                			        {
                                                                                				    $botanik = $row["ctn8"];
                                                                                				    while($row = $statement9->fetch(PDO::FETCH_ASSOC))
                                                                                    			        {
                                                                                    				    $eco = $row["ctn9"];
                                                                                    				    while($row = $statement10->fetch(PDO::FETCH_ASSOC))
                                                                                                    	{
                                                                                                    	$btho = $row["ctn10"];
                                                                                                    	while($row = $statement11->fetch(PDO::FETCH_ASSOC))
                                                                                                    		{
                                                                                                    		$sk = $row["ctn11"];
                                ?>
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">Inquiry</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <li>
                                    <a href="system-appointment_v1.php" class="slide-item"><span class="badge badge-danger"><?= $shahalam; ?></span>&nbsp;&nbsp;&nbsp;SHAH ALAM </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v2.php" class="slide-item"> <span class="badge badge-danger"><?= $kotadamansara; ?></span>&nbsp;&nbsp;&nbsp;KOTA DAMANSARA  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v3.php" class="slide-item"> <span class="badge badge-danger"><?= $kualaselangor; ?></span>&nbsp;&nbsp;&nbsp;KUALA SELANGOR  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v4.php" class="slide-item"> <span class="badge badge-danger"><?= $wangsamelawati; ?></span>&nbsp;&nbsp;&nbsp;WANGSA MELAWATI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v5.php" class="slide-item"><span class="badge badge-danger"><?= $bandarputeribangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR PUTERI BANGI  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v6.php" class="slide-item"><span class="badge badge-danger"><?= $bandarbarubangi; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BARU BANGI </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v7.php" class="slide-item"><span class="badge badge-danger"><?= $krubong; ?></span>&nbsp;&nbsp;&nbsp;KRUBONG MELAKA </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v8.php" class="slide-item"><span class="badge badge-danger"><?= $addaheight; ?></span>&nbsp;&nbsp;&nbsp;ADDA HEIGHTS  </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v9.php" class="slide-item"><span class="badge badge-danger"><?= $botanik; ?></span>&nbsp;&nbsp;&nbsp;BANDAR BOTANIK </a>
                                </li>
                                <li>
                                    <a href="system-appointment_v10.php" class="slide-item"><span class="badge badge-danger"><?= $eco; ?></span>&nbsp;&nbsp;&nbsp;ECO ARDENCE</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v11.php" class="slide-item"><span class="badge badge-danger"><?= $btho; ?></span>&nbsp;&nbsp;&nbsp;BANDAR TUN HUSSEIN ONN</a>
                                </li>
                                <li>
                                	<a href="system-appointment_v12.php" class="slide-item"><span class="badge badge-danger"><?= $sk; ?></span>&nbsp;&nbsp;&nbsp;SERI KEMBANGAN</a>
                                </li>
                            </ul>
                            <?php }}}}}}}}}}}}?>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-table"></i><span class="side-menu__label">LMS</span><i class="angle fas fa-angle-right"></i></a>
                            <ul class="slide-menu">                                
                                <li>
                                    <a href="system-lmsmanagement.php" class="slide-item">Management</a>
                                </li>
                                <li>
                                    <a href="system-lmstherapist.php" class="slide-item">Therapist</a>
                                </li>
                                <li>
                                    <a href="system-lmsadministrative.php" class="slide-item">Administrative</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="side-menu__item" href="system-e-ticket.php"><i class="side-menu__icon fas fa-images"></i><span class="side-menu__label">e-Ticket</span></a>
                        </li>
                        
                       <li>
                            <a class="side-menu__item" href="system-logout.php"><i class="side-menu__icon fas fa-window-restore"></i><span class="side-menu__label">Logout</span></a>
                        </li>
                    </ul>
                  <?php } ?>
                </aside>
           