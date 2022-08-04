
<?php
            // Connection database
            //include("connection.php");
            // Check, for session 'user_session'
            include("session.php");

            // Set Default Time Zone for Asia/Kuala_Lumpur
            date_default_timezone_set("Asia/Kuala_Lumpur");

            // Check, if username session is NOT set then this page will jump to login page
            if (!isset($_SESSION['session']) && !isset($_SESSION['job'])) {
                header('Location: login.php');
                session_destroy();
            }

            $job = $_SESSION["job"];
            $now = date("Y-m-d");
        ?>

<?php 
    include('header1.php');
?>
<div class="page-banner-area bg-2">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="page-content">
<h2>Career</h2>
<ul>
<li><a href="index1.php">Home</a></li>
<li>Career</li>
</ul>
</div>
</div>
</div>
</div>
</div>


    <div class="appointment-area  ptb-100">
        <div class="container">
            <div class="section-title-one">
                <!-- <span>Our services</span> -->
                <h2>Record Blog</h2>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: right;">
                        <a href="insert-career.php" class="default-btn">
                        Add New Blog
                        <span></span>
                        </a>
                    </div>
                    <br><br>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title Blog</th>
                <th>Type Job</th>
                <th>Salary Range</th>
                <th>Location</th>                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $counter = 1;
                 
                if($job == "Admin"){
                $statement = $conn->prepare("SELECT * FROM job ");
                }
                $statement->execute();
                while($data = $statement->fetch(PDO::FETCH_ASSOC))
                {
                 extract($data); 
                ?>
            <tr>
                <td><?php echo $title; ?></td>
                <td><?php echo $type; ?></td>
                <td><?php echo $salary; ?></td>
                <td><?php echo $location; ?></td>                
                <td>
                    <a href="job-edit.php?id=<?php echo $data["job_id"]; ?>">
                        <button type="submit" name="update" id="update" class="btn btn-info btn-sm">
                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;Update  </button>
                    </a>
                    <a href="delete-job.php?id=<?= $job_id; ?>">
                        <button type="submit" name="delete" id="delete" class="btn btn-danger btn-sm">
                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;Delete  </button>
                    </a>
                </td>
            </tr>
            <?php
            $counter++;
            }
            ?>
        </tbody>
       <!--  <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
    </table>
                </div>
        </div>
    </div>
</div>
<br>
<br>
        



<?php
    include('footer.php');
 ?>