<?php
// Connecting to the database
ob_start();
//Start session
    session_start();
include("connection.php");
include("session.php");

$message = "";
  if (!isset($_SESSION['session'])) {
        header('Location: system-login.php');
        session_destroy();
    }

        echo $_POST["id_taskdepartment"]."<br>";
        echo $_POST["module"]."<br>";
        echo $_POST["description"]."<br>";
       
       

        $id_taskdepartment = $_POST["id_taskdepartment"];
        $module = $_POST["module"];
        $description = $_POST["description"];
        $image1 = $_FILES['image']['name'];
        $image =  $image1;
        $documen1 = $_FILES['document']['name'];
        $document =  $documen1;
        $thumbnail1 = $_FILES['thumbnail']['name'];
        $thumbnail =  $thumbnail1;
        $video1 = $_FILES['video']['name'];
        $video =  $video1;

   if($image1 == ''){  
   move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
   move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
   move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', document = '$document', thumbnail = '$thumbnail', video = '$video'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without image A</div>");    
        exit();

} else if($documen1 == ''){
   move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
   move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
   move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', image = '$image', thumbnail = '$thumbnail', video = '$video'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document B</div>");
    exit();
} else if ($thumbnail1 == ''){
   move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
   move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
   move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', image = '$image', document = '$document', video = '$video'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document C</div>");
exit();
} else if ($video1 == ''){
   move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
   move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
   move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', image = '$image', document = '$document', thumbnail = '$thumbnail'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document D</div>");
exit();
}
else if ($image1 == '' && $documen1 == '' ){   
   move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);
   move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      // move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      // move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      // move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      // move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', thumbnail = '$thumbnail', video = '$video'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document E</div>");
       exit();

} else if($image1 == '' && $thumbnail1 == ''){
   // move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);
   // move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', video = '$video', document = '$document'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document F</div>");
       exit();
} else if ($image1 == '' && $video1 == ''){
   // move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
   // move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', thumbnail = '$thumbnail', document = '$document'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document G</div>");
       exit();

} else if($documen1 == '' && $thumbnail1 == ''){
   // move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
   // move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', image = '$image', video = '$video'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document H</div>");
       exit();
}
else if ($documen1 == '' && $video1 == '' ){
   // move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
   // move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', image = '$image', thumbnail = '$thumbnail'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }

       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document I</div>");
       exit();
}
else if ($thumbnail1 == '' && $video1 == ''){
   // move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
   // move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', document = '$document', image = '$image'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }

       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without documen J</div>");
       exit();
}
else if ($image1 == '' && $documen1 == '' && $thumbnail1 == ''){

   move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);
      // move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      // move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      // move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      // move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', video = '$video'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document K</div>");
       exit();
}
else if ($image1 == '' && $documen1 == '' && $video1 == ''){

   // move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', thumbnail = '$thumbnail'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document L</div>");
       exit();
       
} else if ($documen1 == '' && $thumbnail1 == '' && $video1 == ''){

  // move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', image = '$image'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document M</div>");
       exit();
}
else if ($image1 == '' && $thumbnail1 == '' && $video1 == ''){

  // move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
  move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', document = '$document'  WHERE id_taskdepartment = '$id_taskdepartment'";
      
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }


       header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success without document N</div>");
       exit();
} else if ($image1 == '' && $document1 == ''  && $thumbnail1 == '' && $video1 == ''){

   $sql = "UPDATE taskdepartment SET module = '$module', description = '$description' WHERE id_taskdepartment = '$id_taskdepartment'";

      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }
    header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success</div>");
    exit();
}
else{
    
      move_uploaded_file($_FILES['image']['tmp_name'], "department/".$image);
      move_uploaded_file($_FILES['document']['tmp_name'], "department/".$document);
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "department/video/".$thumbnail);
      move_uploaded_file($_FILES['video']['tmp_name'], "department/video/".$video);

      $sql = "UPDATE taskdepartment SET module = '$module', description = '$description', image = '$image', document = '$document', thumbnail = '$thumbnail', video = '$video'  WHERE id_taskdepartment = '$id_taskdepartment'";
       
      $query = $conn->prepare( $sql );
      if ($query == false) {
       print_r($conn->errorInfo());
       die ('Error Prepare');
      }
      $sth = $query->execute();
      if ($sth == false) {
       print_r($query->errorInfo());
       die ('Error Execute');
      }

    header("location:system-lmspanel.php?message=<div class='alert alert-success'>update Success O</div>");
    exit();
}
?>