<?php
// Connecting to the database
ob_start();
//Start session
    session_start();
include("connection.php");
include("session.php");


  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["module"]."<br>";
        echo $_POST["department"]."<br>";
        echo $_POST["description"]."<br>";
        $moduledepartment_id = $_POST["department"];  
           

if(isset($_POST["submit"])){

        
        $module = $_POST["module"];
        $moduledepartment_id = $_POST["department"];
        $description = $_POST["description"];

        $thumbnail = $_FILES['thumbnail']['name'];
        $ext = pathinfo($thumbnail, PATHINFO_EXTENSION);
        $thumbnail1 = time(). 'thumbnailimage'.'.'.$ext;

        $video = $_FILES['video']['name'];
        $ext1 = pathinfo($video, PATHINFO_EXTENSION);
        $video1 = time(). 'video'.'.'.$ext1;
        
        $image1 = $_FILES['image']['name'];
        $image =  $image1;

        $document1 = $_FILES['document']['name'];
        $document =  $document1;

        $progress = 'incomplete';


       
      try
      {
         move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
         move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
         move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail1);
         move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video1);
        
        $stmt = $conn->prepare("INSERT INTO taskdepartment (module, description, image, document,thumbnail,video,  moduledepartment_id, progress) VALUES  (:module, :description, :image, :document, :thumbnail, :video, :moduledepartment_id, :progress)"); 

        
        $stmt->bindParam(':module', $module);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':moduledepartment_id', $moduledepartment_id);
        $stmt->bindParam(':progress', $progress);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':document', $document);
        $stmt->bindParam(':thumbnail', $thumbnail1);
        $stmt->bindParam(':video', $video1);
		$stmt->execute();
      } catch(PDOException $e){
        $message = "ERROR : ".$e->getMessage();  
      }

}
 
// header('Location: lmspanel.php');
header('Location: system-lmsmanagementdetail_v2.php?id='.$moduledepartment_id);
exit();
?>