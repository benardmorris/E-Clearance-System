  <?php      
    session_start();
    include 'dbconnect.php';
    mysqli_select_db($conn,$db_name);
    if(!isset($_SESSION['admin_logged_in'])){
      header("Location:index.php");
     }
    $manage_id=$_GET['manageid'];
    $reason=$_GET['reason'];
    $fullName=$_GET["fullName"];
    $ag=$_GET["ag"];
    $sx=$_GET["sx"];
    $faculty=$_GET["faculty"];
    $cly=$_GET["cly"];
    $sem=$_GET["sem"];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
    <link rel="stylesheet" href="css/approval_form/registrar_approval.css">
   
</head>
<body>
    <nav>
        <div class="logo-container">
            <img src="images/mmuicon.png" width="80px" height="80px" alt="MMU logo">
        </div>
        <div class="texts-container">
            <h1>Multimedia University of Kenya</h1>
            <p style="color: white;">Registrar Clearance approval process</p>
        </div>
        <div class="date-time-container"
         style="border: 2px solid white;">
        <p><span id='date-time'></span>.</p>
        </div>
    </nav>
    <div class="main-container">
        <div class="left-side-container">
          <div class="approval-details-container">
            <div class="detail">
                <label for="st_name">Student name:</label>
                <p><?php echo $fullName; ?></p>
            </div>
            <div class="detail">
                <label for="id_num">RegNo:</label>
                <p><?php echo $manage_id; ?></p>
            </div>
            <div class="detail">
                <label for="id_num">Reason :</label>
                <p><?php echo $reason; ?></p>
            </div>





            <h3 style="background-color: white;">Approval Details</h3>
            <div class="detail allApprove">
<!-- FACULTY APPROVED -->
                <label for="id_num">Faculty:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM faculty_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
<!-- LIBRARY APPROVED -->
                <label for="id_num">Library:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
<!-- LAB APPROVED -->
                <label for="id_num">Laboratory:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM lab_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
<!-- HOSTEL APPROVED -->
                <label for="id_num">Hostel:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM hostel_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
<!-- DISPENSARY APPROVED -->
                <label for="id_num">Dispensary:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM dispensary_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
          </div>
          <div class="approve-reject-buttons-container">
            <form method="POST" enctype="multipart/form-data">
            <input type="submit" name="regapprove" value="Approve">
             <?php
               if(isset($_POST["regapprove"])){
                $status_msg="Approved";
                $reg_query=mysqli_query($conn,"SELECT * FROM registrar_final_approve WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                $rows=mysqli_num_rows($reg_query);
                  $library_sql="SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id'";
                  $library_res=mysqli_query($conn,$library_sql) or die( mysqli_error($conn));
                  $library_rows=mysqli_num_rows($library_res);
                 
                  $lab_sql="SELECT * FROM lab_final_approve_reject WHERE student_id='$manage_id'";
                  $lab_res=mysqli_query($conn,$lab_sql) or die( mysqli_error($conn));
                  $lab_rows=mysqli_num_rows($lab_res);
                 
                  $hostel_sql="SELECT * FROM hostel_final_approve_reject WHERE student_id='$manage_id' ";
                  $hostel_res=mysqli_query($conn,$hostel_sql) or die( mysqli_error($conn));
                  $hostel_rows=mysqli_num_rows($hostel_res);
                 
                  $faculty_sql="SELECT * FROM faculty_final_approve_reject WHERE student_id='$manage_id' ";
                  $faculty_res=mysqli_query($conn,$faculty_sql) or die( mysqli_error($conn));
                  $faculty_rows=mysqli_num_rows($faculty_res);
                 
                  $dispensary_sql="SELECT * FROM dispensary_final_approve_reject WHERE student_id='$manage_id' ";
                  $dispensary_res=mysqli_query($conn,$dispensary_sql) or die( mysqli_error($conn));
                  $dispensary_rows=mysqli_num_rows($dispensary_res);
                  if($rows>0){
                    echo "<p style=color:red;>Already approved...</p>"; 
                  }
                  else if(( !$dispensary_rows>0 && !$library_rows>0 && !$lab_rows>0 && !$hostel_rows>0 && !$faculty_rows>0 && !$dispensary_rows>0)){
                    echo "<p style=color:red;>The student has not been cleared by all staffs!!</p>"; 
                  }
                  else if(!$library_rows>0){
                    echo "<p style=color:red;>The student has not been cleared with library!!</p>"; 
                  }
                  else if(!$lab_rows>0){
                    echo "<p style=color:red;>The student has not been cleared with laboratory!!</p>"; 
                  }
                  else if(!$hostel_rows>0){
                    echo "<p style=color:red;>The student has not been cleared with Hostel!!</p>"; 
                  }
                  else if(!$faculty_rows>0){
                    echo "<p style=color:red;>The student has not been cleared with faculty!!</p>"; 
                  }
                  else if(!$dispensary_rows>0){
                    echo "<p style=color:red;>The student has not been cleared with dispensary faculty!!</p>"; 
                  }
                  else{
                    $date = date('Y-m-d H:i:s');
                    $sql_regapprove=mysqli_query($conn,"INSERT INTO registrar_final_approve (student_id,status,date) VALUES('$manage_id','$status_msg','$date')") or die(mysqli_error($conn));
                    $sql_delete_request=mysqli_query($conn,"DELETE FROM requests WHERE id='$manage_id'") or die(mysqli_error($conn));
                    echo "<p style=color:green;>Clearance approved successfully...</p>";
                  }
                  
                } 
             ?>
            <input type="submit" name="regreject" value="reject" style="background-color: red;">
            <?php
               if(isset($_POST["regreject"])){
                $status_msg="Rejected";
                $sql_regapprove=mysqli_query($conn,"INSERT INTO registrar_final_rejected (student_id,status) VALUES('$manage_id','$status_msg')") or die(mysqli_error($conn));
                if($sql_regapprove){
                  echo "<p style=color:Registrar Clearance approval process;>Clearance rejected successfully...</p>";
                  
                } 
                else{
                  echo "<p style=color:red;>Clearance Not approved !!</p>";
                }
              }
             ?>
            </form>
          </div>
        </div>
<!-- APPROVAL FORM -->
        <div class="right-side-container">
            <div class="approval-form" id="approve">
               <img src="images/mmuicon.png" width="100px" height="100px" alt="">
               <h3>MULTIMEDIA UNIVERSITY OF KENYA</h3>
               <h3>STUDENT CLEARANCE CERTIFICATE</h3>
               <div class="personal-informations">
                 <h4>PART I: PERSONAL INFORMATIONS</h4>
                  <div class="infos">
                    <label for="fullname">Full name</label>
                    <p id="fullname" ><?php echo $fullName; ?></p>
                  </div>
                  <div class="infos">
                    <label for="institute">Institution</label>
                    <p id="institute" >Multimedia University of Kenya</p>
                  </div>
                  <div class="infos">
                    <label for="faculty">Faculty</label>
                    <p id="faculty" ><?php echo $faculty; ?></p>
                  </div>
                  <div class="infos">
                    <label for="classYear">Class year</label>
                    <p id="classYear" ><?php echo $cly; ?></p>
                  </div>
                  <div class="infos">
                    <label for="semester">Semester</label>
                    <p><?php echo $sem; ?></p>
                  </div>
                  <div class="infos">
                  </div>
                  <div class="infos">
                    <label for="reason">Reason for Clearance:</label>
                    <p><?php echo $reason; ?></p>
                  </div>
               </div>
               <div class="concerned-bodies">
                 <h4>PART II: CONCERNED BODIES</h4>
                 <h4>Faculty</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Faith Joy</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_faculty_app=mysqli_query($conn,"SELECT * FROM faculty_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_faculty_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_faculty_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!";
                    }
                    ?>
                 </div>
                 <h4>LIBRARY</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Leonard Ronaldo</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_faculty_app=mysqli_query($conn,"SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_faculty_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_faculty_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!";
                    }
                    ?>
                 </div>
                 <h4>LABORATORY</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Morris Kyl</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_faculty_app=mysqli_query($conn,"SELECT * FROM lab_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_faculty_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_faculty_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="80px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!!";
                    }
                    ?>
                 </div>
                 <h4>Hostel</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Ben Sila</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_faculty_app=mysqli_query($conn,"SELECT * FROM hostel_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_faculty_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_faculty_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet";
                    }
                    ?>
                 </div>
                 <h4>Dispensary</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Fridar Leonard</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_faculty_app=mysqli_query($conn,"SELECT * FROM dispensary_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_faculty_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_faculty_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!";
                    }
                    ?>
                 </div>
                 <h4>Registrar</h4>
                 <p style="font-size:12px; font-weight:bold; color: red;">NB: only VALID if all concerned bodies have successfully Approved</p>
               </div>
            </div>
            <div class="print-buttons">
              <button id="print" onclick="window.print();">Print</button>
              <button id="cancel">cancel</button>
          </div>
        </div>
    </div>

    <script src="js/approve.js"></script>
    <script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>

</body>
</html>

 <style>
      .main-container .right-side-container{
        width:100%;
        margin-top:0;
      }
      .infos label{
    margin-left: 10px;
    font-weight: bolder;
    font-size:12px;
     }
     .approval-form h3{
      text-align:center;
      font-size:14px;
     }
     .concerned-bodies h4{
    margin: 0px 0px 0px 0px;
    font-size:12px;
    background-color: white;
  }
  .personal-informations h4{
    font-size:12px;
  }
     .infos p{
    margin: 0px 0px 0px 0px;
    backface-visibility: unset;
    padding: 0px;
}
      .right-side-container .approval-form{
        display:flex;
        width:100%;
        border:none;
        margin-top:0;
      }
      @media print{
        body *{
          visibility:hidden;
        }
        .left-side-container{
          display:none;
        }
        .approval-form, .approval-form *{
          width: 100%;
          margin:0;
          visibility:visible;
        }
        .approval-form img{
          width: 80px;
          height:80px;
        }
      }
      .infos p{
    margin: 0px;
    padding: 0;
    font-size:12px;
}
.main-container{
}

    </style>