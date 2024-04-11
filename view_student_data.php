<?php
session_start();
include 'dbconnect.php';
mysqli_select_db($conn,$db_name);

$fn=$_GET["fn"];
$id=$_GET['idn'];
$cy=$_GET['cy'];
$ag=$_GET['ag'];
$sx=$_GET['sx'];
$faculty=$_GET['faculty'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View student profile</title>
    <link rel="stylesheet" href="css/view_student_profile/view_student_profile.css">
    <link rel="stylesheet" href="css/view_student_profile/view_student_profile_smallScreen.css">
</head>
<body>
    <div class="student-profile-view-container" id="view-student-profile">
       <div class="profile-container">
        <div class="profile-detail">
          <h2 style="text-align:center;"><?php echo $fn; ?>'s profile</h2>
          <hr>
          <p style="background-color: white;"><strong>Full name:</strong> <?php echo $fn; ?> </p>
          <p style="background-color: white;"><strong>RegNo/ID :</strong> <?php echo $id; ?></p>
          <p style="background-color: white;"><strong>Faculty :</strong> <?php echo $faculty; ?></p>
          <p style="background-color: white;"><strong>Age :</strong> <?php echo $ag; ?></p>
          <p style="background-color: white;"><strong>sex :</strong> <?php echo $sx; ?></p>
          <p style="background-color: white;"><strong>Admission Year :</strong> <?php echo $cy; ?></p>
        </div>
        <div class="profile-picture-container">
            <div class="profile-picture-bg">
            <?php
             $sql="SELECT * FROM student WHERE id='$id'";
              $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
              $rows=mysqli_num_rows($res);
              if($rows>0){
                while ($rows=mysqli_fetch_assoc($res)){
                  $image=$rows["st_image"];
               ?>
               <img src="<?php echo $image; ?>" alt="No Profile Image"><br>
              <?php
        }
           ?>
          <?php
      }
      else{
          echo "Image not found!";
      }
      ?>
            </div>
            <p style="background-color: white;"><strong>Profile picture</strong></p>
            
        </div>
    </div>
    </div>

    <footer>Copyright ©2024 OCMS</footer>
</body>
</html>