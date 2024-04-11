<?php
 session_start();
 include 'dbconnect.php';
 mysqli_select_db($conn,$db_name);
 if(!isset($_SESSION['library_logged_in'])){
  header("Location:index.php");
 }
 $manage_id=$_GET['manageid'];
 $reason=$_GET['reason'];
 $fullName=$_GET["fullName"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
    <link rel="stylesheet" href="css/Staff_approval/staff_approval.css">
    <link rel="stylesheet" href="css/signature.css">

  
</head>
<body>
    <nav>
        <div class="logo-container">
            <img src="images/mmuicon.png" width="80px" height="80px" alt="mmu logo">
        </div>
        <div class="texts-container">
            <h1>Multimedia University of Kenya</h1>
            <p style="color: white;">library Clearance approval process</p>
        </div>
        <div class="date-time-container"
        <p><span id='date-time'></span>.</p>
        </div>
    </nav>
    <div class="main-container">
        <div class="left-side-container">
          <div class="approval-details-container">
            <div class="detail">
                <libraryel for="st_name">Student name:</libraryel>
                <p><?php echo $fullName; ?></p>
            </div>
            <div class="detail">
                <libraryel for="id_num">RegNo:</libraryel>
                <p> <?php echo $manage_id; ?> </p>
            </div>
            <div class="detail">
                <libraryel for="id_num">Request Reason:</libraryel>
                <p> <?php echo $reason; ?> </p>
            </div>


            <div class="status-detail" style="display: flex;">
                <h3 style="background-color: white">Approval details</h3>
                <h3 style="background-color: white">Approval status</h3>
            </div>
<!-- PROPERTY MANAGEMENT -->
            <div class="detail allApprove">
            <?php
              $msg="";
              $status_msg="";
                $sql="SELECT * FROM library_record WHERE student_id='$manage_id'";
                $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($res)){
                      $msg=$rows["material_name"];
                      $status_msg="Property not returned , reject the clearance!!!!";
                    }
                }
                else{
                    $msg="No property taken";
                    $status_msg="No property taken, approve the clearance...";
                }
                ?>
                <libraryel for="id_num">Property taken:</libraryel>
                <p><?php echo $msg; ?> &radic;</p>
            </div>
            <div class="detail allApprove">
                <libraryel for="id_num">Draw Signature:</libraryel>
                <form class="signature-pad-form" method="POST" enctype="multipart/form-data">
                  <canvas height="100" width="300" class="signature-pad" id="the_canvas"></canvas>
                   <input type="hidden" name="signature" class="signature" id="signature" name="signature">
                  <p>
                      <a href="#" class="clear-button">Clear signature</a>
                  </p>
                  <input class="submit-button" type="submit" name="submit" value="Approve" style="background-color:green;">
                <?php
                  if(isset($_POST["submit"])){
                  $status_msg="Approved";
                  $sig_string=$_POST['signature'];
                  $file_name="signature/signature_" .date("his") .".png";
                  file_put_contents($file_name,file_get_contents($sig_string));
                  $reg_query=mysqli_query($conn,"SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($reg_query);
                  if($rows>0){
                    echo "<p style=color:red;>Already approved...!!</p>"; 
                  }else{
                    $date = date('Y-m-d H:i:s');
                  $sql = mysqli_query($conn,"INSERT INTO library_final_approve_reject (student_id,status,signature,staff_name,date) VALUES('$manage_id','$status_msg','$file_name','".$_SESSION['full_name']."','$date')") or die(mysqli_error($conn));
                    $sql_delete_request=mysqli_query($conn,"DELETE FROM library_request WHERE id='$manage_id'") or die(mysqli_error($conn));
                    $sql_delete_request=mysqli_query($conn,"DELETE FROM library_rejected_requests WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    echo "<h4 style=color:green;margin-top:20px;>Clearance approved successfully...</p>";
                    $_SESSION['library_approved']=$status_msg;
                  }
                }
                  ?>
                  <input class="submit-button" type="submit" name="reject" value="Reject" style="background-color:red;">
                  <?php
                  if(isset($_POST["reject"])){
                  $status_msg="Rejected";
                  $sql = mysqli_query($conn,"INSERT INTO library_rejected_requests (student_id,status,staff_username) VALUES('$manage_id','$status_msg','".$_SESSION['full_name']."')") or die(mysqli_error($conn));
                  $_SESSION['approved']=$manage_id;
                  if($sql){
                    echo "<h4 style=color:red;margin-top:20px;>Rejected successfully...</p>";
                  }
                  else {
                    echo "not saved";
                  }
                  }
                  ?>
              </form>
            </div>
          </div>
        </div>
    </div>
<!-- INSERT FOOTER -->
    <footer>
        Copyright ©2024 OCMS
        </footer>

    <script src="js/approve.js"></script>
    <script src="js/signature.js"></script>

    <script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>


</body>
</html>

  <style>
        footer{
        position: relative;
        bottom:0;
      }
      .allApprove p{
        margin-left:0;
      }
      .allApprove form{
        width:100%;
        margin-left:0;
      }
      .submit-button{
        float:left;
        padding:10pt;
        border-radius:10px;
      }
      .submit-button:hover{
        transform:scale(1.08);
        transition:1s;
      }
      .signature-pad{
    cursor: url(pen.png) 1 26, 
    pointer;
    border: 2px solid;
    border-radius: 4px;
    </style>