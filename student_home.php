<?php
session_start();
 include 'dbconnect.php';
 mysqli_select_db($conn,$db_name);
 if(!isset($_SESSION['student_logged_in'])){
  header("Location:index.php");
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="css/student/student_page_Home.css">
  
</head>
<body>
<!-- SIDEBAR CONTAINER -->
    <div class="container">
        <div class="sidebar-container" id="sidebar">
            <nav>
                <div class="logo">
                    <img src="images/mmuicon.png" width="80px" height="80px" alt="No internet Connection">
                    <h1 style="color: white; font-weight:bolder; font-size:34px;">MMU</h1>
                </div>

                <ul class="side-bar-itmes">
                        <a href="#home">
                            <li class="list">
                           <span class="icon"><img src="icons/dashboard.png" width="25px" height="25px" alt=""></span>
                           <span class="title">Dashboard</span>
                          </li>
                        </a>
                        <a href="#request-clearance">
                            <li class="list active">
                           <span class="icon"><img src="icons/request4.png" width="25px" height="25px" alt=""></span>
                           <span class="title">Request Clearance</span>
                        </li>
                        </a>
                </ul>
            </nav>
        </div>
<!-- MAIN HOME CONTAINER -->
        <div class="main-home" id="main-home">
            <div class="top-container">
                <div class="menu-icon" style="margin-left: 10px;">
                    <img src="icons/menu.png" class="openCloseIcon" alt="" width="40px" height="40px" onclick="toggleMenu()">
                    <div class="smallScreen-Menu-icon">
                      <img src="icons/menu.png" width="40px" height="40px" alt="" onclick="toggleMenuSmallScreen()">
                    </div>
                </div>
                <div class="top-title" style="display: flex; align-items:center; justify-content:center; flex-direction:column;">
                    <h1>Multimedia University of Kenya</h1>
                    <p><strong>Students online clearance system- Student</strong></p>
                </div>
                <div class="profile-cont">
                <img src="<?php echo $_SESSION['profile_picture']; ?>" alt="" width="60px" height="60px">
                    <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn"><?php echo $_SESSION ['u_name'];?>&#9660;</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="#" onclick="profilePopup()">View profile</a>
                        <a href="#" onclick="changepwPopup()">Change password</a>
                        <a href="logout.php">Logout</a>
                      </div>
                    </div>
                </div>
            </div>
<!-- NOLTIFICATION CONTAINER -->
         <div class="overflow-container">
             <a name="home">
          <div class="main-notifications-container">
            <div class="notifications-container">
              <h3 style="
              color:red;
              padding:5px;
              width:96%;
              margin-left:10px;
              margin-bottom:10px;
              box-shadow:2px 2px 2px 2px gray;
              justify-content: center;
              ">
               Notifications
               <img src="icons/red_bell.png" width="20px" height="20px" alt="">
             </h3>
<!-- LIBRARY NOTIFICATION -->
                <div class="notifications">
                    <div class="notify n-text">
                      <h3><b style="font-weight:bold; font-size:20px;">LIBRARY</b> Clearance Request Status </h3>
                      <?php
                   $green_msg="";
                   $red_msg="";
                  $sql="SELECT * FROM library_record WHERE student_id='".$_SESSION['u_name']."' ";
                  $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  $sql_approve="SELECT * FROM library_final_approve_reject WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_approve=mysqli_query($conn,$sql_approve) or die( mysqli_error($conn));
                  $rows_approve=mysqli_num_rows($res_approve);
                  $sql_reject="SELECT * FROM library_rejected_requests WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_reject=mysqli_query($conn,$sql_reject) or die( mysqli_error($conn));
                  $rows_reject=mysqli_num_rows($res_reject);
                  $sql_request_list="SELECT * FROM requests WHERE id='".$_SESSION['u_name']."' ";
                  $res_request_list=mysqli_query($conn,$sql_request_list) or die( mysqli_error($conn));
                  $rows_request_list=mysqli_num_rows($res_request_list);
                  if($rows>0 && !$rows_request_list){
                    $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if($rows > 0){
                  while ($rows=mysqli_fetch_assoc($res)){
                    $material=$rows["material_name"];
                    $red_msg="you have not returned property($material)!";

                  }
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/ex.png width=30px height=30px>";
                  echo  $red_msg;
                  echo "</p> ";
                }
                else if($rows_approve > 0){
                  $green_msg="Successfully approved...☑️";
                  echo "<p style=color:green; font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                else if($rows_reject > 0){
                  $red_msg="Clearance Rejected!!";
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if(!$rows_request_list> 0){
                  $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else{
                  $green_msg="Pending Request...";
                  echo "<p style=color:purple;font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                  
                ?>
                    </div>
                </div>
<!-- FACULTY NOTIFICATION -->
                <div class="notifications">
                    <div class="notify n-text">
                      <h3><b style="font-weight:bold; font-size:20px;">FACULTY</b> Clearance Request Status</h3>
                      <?php
                   $green_msg="";
                   $red_msg="";
                   $status_msg="";
                   $sql="SELECT * FROM faculty_record WHERE student_id='".$_SESSION['u_name']."' ";
                  $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  $sql_faculty_approve="SELECT * FROM faculty_final_approve_reject WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_faculty_approve=mysqli_query($conn,$sql_faculty_approve) or die( mysqli_error($conn));
                  $rows_faculty_approve=mysqli_num_rows($res_faculty_approve);
                  $sql_faculty_reject="SELECT * FROM faculty_rejected_requests WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_faculty_reject=mysqli_query($conn,$sql_faculty_reject) or die( mysqli_error($conn));
                  $rows_faculty_reject=mysqli_num_rows($res_faculty_reject);
                  $sql_faculty_request_list="SELECT * FROM requests WHERE id='".$_SESSION['u_name']."' ";
                  $res_faculty_request_list=mysqli_query($conn,$sql_faculty_request_list) or die( mysqli_error($conn));
                  $rows_faculty_request_list=mysqli_num_rows($res_faculty_request_list);
                  if($rows>0 && !$rows_faculty_request_list){
                    $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if($rows > 0){
                  while ($rows=mysqli_fetch_assoc($res)){
                    $property=$rows["property_name"];
                    $red_msg="you have not returned property($property)!";
                  }
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/ex.png width=30px height=30px>";
                  echo  $red_msg;
                  echo "</p> ";
                }
                else if($rows_faculty_approve > 0){
                  $green_msg="Successfully approved...☑️";
                  echo "<p style=color:green; font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                else if($rows_faculty_reject > 0){
                  $red_msg="Clearance Rejected!!";
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if(!$rows_faculty_request_list> 0){
                  $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else{
                  $green_msg="Pending Request...";
                  echo "<p style=color:purple;font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                ?>
                    </div>
                </div>
<!-- LAB NOTIFICATION -->
                <div class="notifications">
                    <div class="notify n-text">
                      <h3><b style="font-weight:bold; font-size:20px;">LABORATORY</b> Clearance Request Status</h3>
                      <?php
                   $green_msg="";
                   $red_msg="";
                   $status_msg="";
                   $sql="SELECT * FROM lab_record WHERE student_id='".$_SESSION['u_name']."' ";
                  $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  $sql_lab_approve="SELECT * FROM lab_final_approve_reject WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_lab_approve=mysqli_query($conn,$sql_lab_approve) or die( mysqli_error($conn));
                  $rows_lab_approve=mysqli_num_rows($res_lab_approve);
                  $sql_lab_reject="SELECT * FROM lab_rejected_requests WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_lab_reject=mysqli_query($conn,$sql_lab_reject) or die( mysqli_error($conn));
                  $rows_lab_reject=mysqli_num_rows($res_lab_reject);
                  $sql_lab_request_list="SELECT * FROM requests WHERE id='".$_SESSION['u_name']."' ";
                  $res_lab_request_list=mysqli_query($conn,$sql_lab_request_list) or die( mysqli_error($conn));
                  $rows_lab_request_list=mysqli_num_rows($res_lab_request_list);
                  if($rows>0 && !$rows_lab_request_list > 0){
                    $red_msg="You have not sent request !!";
                    echo "<p style=color:blue; font-weight:bold;>";
                    echo "<img src=icons/error.png width=30px height=30px>";
                    echo $red_msg;
                    echo "</p> ";
                }
                else if($rows > 0){
                  while ($rows=mysqli_fetch_assoc($res)){
                    $material=$rows["material_name"];
                    $red_msg="you have not returned property($material)!";
                  }
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/ex.png width=30px height=30px>";
                  echo  $red_msg;
                  echo "</p> ";
                }
                else if($rows_lab_approve > 0){
                  $green_msg="Successfully approved...☑️";
                  echo "<p style=color:green; font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                else if($rows_lab_reject > 0){
                  $red_msg="Clearance Rejected!!";
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if(!$rows_lab_request_list> 0){
                  $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else{
                  $green_msg="Pending Request...";
                  echo "<p style=color:purple;font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                ?>
                    </div>
                </div>
<!-- DISPENSARY NOTIFICATION -->
                <div class="notifications">
                    <div class="notify n-text">
                      <h3><b style="font-weight:bold; font-size:20px;">DISPENSARY</b> Clearance Request Status</h3>
                      <?php
                   $green_msg="";
                   $red_msg="";
                   $status_msg="";
                   $sql="SELECT * FROM dispensary_record WHERE student_id='".$_SESSION['u_name']."' ";
                  $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  $sql_dispensary_approve="SELECT * FROM dispensary_final_approve_reject WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_dispensary_approve=mysqli_query($conn,$sql_dispensary_approve) or die( mysqli_error($conn));
                  $rows_dispensary_approve=mysqli_num_rows($res_dispensary_approve);
                  $sql_dispensary_reject="SELECT * FROM dispensary_rejected_requests WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_dispensary_reject=mysqli_query($conn,$sql_dispensary_reject) or die( mysqli_error($conn));
                  $rows_dispensary_reject=mysqli_num_rows($res_dispensary_reject);
                  $sql_dispensary_request_list="SELECT * FROM requests WHERE id='".$_SESSION['u_name']."' ";
                  $res_dispensary_request_list=mysqli_query($conn,$sql_dispensary_request_list) or die( mysqli_error($conn));
                  $rows_dispensary_request_list=mysqli_num_rows($res_dispensary_request_list);
                  if($rows>0 && !$rows_dispensary_request_list > 0) {
                    $red_msg="You have not sent request !!";
                    echo "<p style=color:blue; font-weight:bold;>";
                    echo "<img src=icons/error.png width=30px height=30px>";
                    echo $red_msg;
                    echo "</p> ";
                }
                else if($rows > 0){
                  while ($rows=mysqli_fetch_assoc($res)){
                    $property_name=$rows["material_name"];
                    $red_msg="you have not returned property($property_name)!";
                  }
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/ex.png width=30px height=30px>";
                  echo  $red_msg;
                  echo "</p> ";
                }
                else if($rows_dispensary_approve > 0){
                  $green_msg="Successfully approved...☑️";
                  echo "<p style=color:green; font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                else if($rows_dispensary_reject > 0){
                  $red_msg="Clearance Rejected!!";
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if(!$rows_dispensary_request_list> 0){
                  $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else{
                  $green_msg="Pending Request...";
                  echo "<p style=color:purple;font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                ?>
                    </div>
                </div>
<!-- HOSTEL NOTIFICATION -->
                <div class="notifications">
                    <div class="notify n-text">
                      <h3><b style="font-weight:bold; font-size:20px;">HOSTEL'S</b> Clearance Request Status</h3>
                      <?php
                   $green_msg="";
                   $red_msg="";
                   $status_msg="";
                   $sql="SELECT * FROM hostel_record WHERE student_id='".$_SESSION['u_name']."' ";
                  $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  $sql_hostel_approve="SELECT * FROM hostel_final_approve_reject WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_hostel_approve=mysqli_query($conn,$sql_hostel_approve) or die( mysqli_error($conn));
                  $rows_hostel_approve=mysqli_num_rows($res_hostel_approve);
                  $sql_hostel_reject="SELECT * FROM hostel_rejected_requests WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_hostel_reject=mysqli_query($conn,$sql_hostel_reject) or die( mysqli_error($conn));
                  $rows_hostel_reject=mysqli_num_rows($res_hostel_reject);
                  $sql_hostel_request_list="SELECT * FROM requests WHERE id='".$_SESSION['u_name']."' ";
                  $res_hostel_request_list=mysqli_query($conn,$sql_hostel_request_list) or die( mysqli_error($conn));
                  $rows_hostel_request_list=mysqli_num_rows($res_hostel_request_list);
                  if($rows>0 && !$rows_hostel_request_list > 0){
                    $red_msg="You have not sent request !!";
                    echo "<p style=color:blue; font-weight:bold;>";
                    echo "<img src=icons/error.png width=30px height=30px>";
                    echo $red_msg;
                    echo "</p> ";
                }
                else if($rows > 0){
                  while ($rows=mysqli_fetch_assoc($res)){
                    $property=$rows["property_name"];
                    $red_msg="you have not returned property($property)!";
                  }
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/ex.png width=30px height=30px>";
                  echo  $red_msg;
                  echo "</p> ";
                }
                else if($rows_hostel_approve > 0){
                  $green_msg="Successfully approved...☑️";
                  echo "<p style=color:green; font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                else if($rows_hostel_reject > 0){
                  $red_msg="Clearance Rejected!!";
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if(!$rows_hostel_request_list> 0){
                  $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else{
                  $green_msg="Pending Request...";
                  echo "<p style=color:purple;font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                ?>
                    </div>
                </div>
<!-- REGISTRAR NOTIFICATION -->
                <div class="notifications">
                    <div class="notify n-text">
                      <h3><b style="font-weight:bold; font-size:20px;">REGISTRAR</b> Clearance Request Status</h3>
                      <?php
                   $green_msg="";
                   $red_msg="";
                   $status_msg="";
                   $sql="SELECT * FROM registrar_final_approve WHERE student_id='".$_SESSION['u_name']."' ";
                  $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  $sql_reg_reject="SELECT * FROM registrar_final_rejected WHERE student_id='".$_SESSION['u_name']."' ";
                  $res_reg_reject=mysqli_query($conn,$sql_reg_reject) or die( mysqli_error($conn));
                  $rows_reg_reject=mysqli_num_rows($res_reg_reject);
                  $sql_reg_request_list="SELECT * FROM requests WHERE id='".$_SESSION['u_name']."' ";
                  $res_reg_request_list=mysqli_query($conn,$sql_reg_request_list) or die( mysqli_error($conn));
                  $rows_reg_request_list=mysqli_num_rows($res_reg_request_list);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($res)){
                      $green_msg="YOUR REQUEST IS FULLY APPROVED☑️";
                    }
                    echo "<p style=color:green; font-weight:bold;>";
                    echo "<img src=icons/right.png width=30px height=30px>";
                    echo  $green_msg;
                    echo "</p> ";
                }
                else if($rows_reg_reject > 0){
                  $red_msg="Clearance Rejected!!";
                  echo "<p style=color:red; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else if(!$rows_reg_request_list> 0){
                  $red_msg="You have not sent request !!";
                  echo "<p style=color:blue; font-weight:bold;>";
                  echo "<img src=icons/error.png width=30px height=30px>";
                  echo $red_msg;
                  echo "</p> ";
                }
                else{
                  $green_msg="Pending Request...";
                  echo "<p style=color:purple;font-weight:bold;>";
                  echo "<img src=icons/right.png width=30px height=30px>";
                  echo $green_msg;
                  echo "</p> ";
                }
                ?>
                    </div>
                </div>
            </div>
        </div>
<!-- REQUEST CLEARANCE -->
            <a name="request-clearance">
            <div class="request-clearance" id="request-clearance-container" >
                <div class="top-titile-cont" style="background-color: white;">
                    <h1 style="text-align: center;">Clearance Request Form</h1>
                </div>
                <div class="withdraw-form">
                  <form method="POST" enctype="multipart/form-data">
                    <label for="idNo" style="margin:10px; font-weight:bold;">RegNo<sup></label>
                        <input type="text" name="stid" name="stid" value="<?php echo $_SESSION['u_name']; ?>" style="padding: 10px; font-size:16px; width:30%; margin:10px;">
                        <br>
                        <hr>
                    <label for="reason" style="margin:10px; font-weight:bold;">Reason for Clearance</label>
                    <select name="withdrawal-reason" id="withdrawal-reason" style="padding: 10px; width:60%;
                    font-size:20px;
                    margin: 10px;" >
                       <option value="Graduation">Graduation</option>
                    </select>
                    <div class="appr-buttons">
                        <input type="submit" name="sendRequest" value="Send">
                        <?php
                  if(isset($_POST["sendRequest"])) {
                      $student_id=$_POST["stid"];
                      $reason=$_POST["withdrawal-reason"];
                      $date = date('Y-m-d H:i:s');
                          $sql2=mysqli_query($conn,"INSERT INTO requests(id,reason,date)
                          VALUES ('$student_id','$reason','$date')") or die(mysqli_error($conn));
                          $sql3=mysqli_query($conn,"INSERT INTO lab_request(id,reason,date)
                          VALUES ('$student_id','$reason','$date')") or die(mysqli_error($conn));
                          $sql4=mysqli_query($conn,"INSERT INTO library_request(id,reason,date)
                          VALUES ('$student_id','$reason','$date')") or die(mysqli_error($conn));
                          $sql5=mysqli_query($conn,"INSERT INTO faculty_request(id,reason,date)
                          VALUES ('$student_id','$reason','$date')") or die(mysqli_error($conn));
                          $sql6=mysqli_query($conn,"INSERT INTO dispensary_request(id,reason,date)
                          VALUES ('$student_id','$reason','$date')") or die(mysqli_error($conn));
                          $sql7=mysqli_query($conn,"INSERT INTO hostel_request(id,reason,date)
                          VALUES ('$student_id','$reason','$date')") or die(mysqli_error($conn));
                          if($sql2 && $sql3 && $sql4 && $sql5 && $sql6 && $sql7)

                          {
                              echo "<i style='color:green'> Request Successfully sent! </i>";
                          }
                          else{
                              echo "<i style='color:red'> Unable to send Request! </i>";
                          }
                    }

                
                ?>
                        <input type="reset" name="reset">         
                  </div>
                </div>
                <div class="other">

                </div>
            </form>

            </div>
        </div>
        </div>
    </div>
<!-- STUDENT PROFILE CONTAINER -->
    <div class="popup-profile-container" id="popup-profile">
        <div class="profile-container">
        <div class="profile-detail">
          <h1 style="text-align: center;">Student Profile</h1>
          <hr>
          <div class="detail">
            <label for="firstnm">Full name :</label>
          <p  id="firstnm"><?php echo $_SESSION['full_name']; ?></p>
          </div>
          <hr>
          <div class="detail" >
            <label for="firstnm">ID :</label>
          <p id="firstnm"><?php echo $_SESSION['st_id']; ?></p>
          </div>
          <hr>
          <div class="detail">
            <label for="age">Age :</label>
            <p id="age"><?php echo $_SESSION['ag'];?></p>
          </div>
          <hr>
          <div class="detail">
            <label for="sex">Sex :</label>
            <p id="sex"><?php echo $_SESSION['sx'];?></p>
          </div>
          <hr>
          <div class="detail">
            <label for="faculty">Faculty :</label>
            <p  id="faculty"><?php echo $_SESSION['faculty'];?></p>
          </div>
          <hr>
        </div>
        <div class="profile-picture-container">
            <div class="profile-picture-bg">
            <?php
             $sql="SELECT * FROM student WHERE id='".$_SESSION['u_name']."' ";
              $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
              $rows=mysqli_num_rows($res);
              if($rows>0){
                while ($rows=mysqli_fetch_assoc($res)){
                  $image=$rows["st_image"];
               ?>

                <img src="<?php echo $image; ?>" alt="no profile picture "><br>
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
            <p style="font-size:20px; margin-top:10px;">Profile picture</p>
        </div>
    </div>
        <div class="buttons">
            <button
            style="border: none;
            padding: 10pt;
            border-radius: 10px;
            color: black;
            background-color: lightgreen;"
            onclick="profilePopupClose()" >Close</button>
        </div>
    </div>
<!-- CHANGE PASSWORD -->
    <div class="popup-change-password-container" id="changepw">
        <div class="cp-title-above">
            <h1>Change Password</h1>
        </div>
        <div class="change-pw-form-container">
          <form method="POST" enctype="multipart/form-data">
            <label for="oldpw" style="margin-top:20px;">Current Password</label>
            <input type="password" name="old_pw" id="oldpw" placeholder="current password"><br>
            <label for="newpw">New Password</label>
            <input type="password" name="new_pw" id="newpw" placeholder="new password"><br>
            <label for="confirmpw">Confirm new Password</label>
            <input type="password" name="confirmpw" id="confirmpw" placeholder="confirm new password"><br>
             <div class="changepw-buttons">
                <input type="submit" name="change_pword" id="submit" value="Change" style="background-color: green;">
                <?php
                  if(isset($_POST["change_pword"])){
                    $old_password=md5($_POST["old_pw"]);
                    $new_password=md5($_POST["new_pw"]);
                    $confirm_password=md5($_POST["confirmpw"]);
                    $sql_change_password=mysqli_query($conn,"SELECT * FROM login WHERE username='".$_SESSION['u_name']."'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_change_password);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($sql_change_password)){
                          $old_pw=$rows["password"];
                        if($new_password==$confirm_password && $old_password == $old_pw){
                          $sql_change=mysqli_query($conn,"UPDATE login SET password='$new_password' WHERE username='".$_SESSION['u_name']."' ") or die(mysqli_error($conn));
                          echo "<i style=color:green;>password changed successfully.....</i>";
                        }
                      else{
                        echo "<i style=color:red;>Password does not match!!</i>";
                      }
                    }
                  }
                }
                  ?>
               <input type="button" name="cancel" value="Cancel" onclick="changepwPopupClose()" style="background-color: red;">
               </form>
              </div>
        </div>
    </div>
<!-- INSERT FOOTER -->
    <div class="footer-container">
        <footer>
           Copyright ©2024 OCMS
         </footer>
    </div>
    <script>
     var sideBar=document.getElementById("sidebar");
     var mainHome=document.getElementById("main-home");
     sideBar.style.maxWidth="20%";

     function toggleMenu(){
       if(sideBar.style.maxWidth=="20%"){
        sideBar.style.maxWidth="0px";

       }else{
        sideBar.style.maxWidth="20%";
        sideBar.style.display="flex";
       }
     }
     function toggleMenuSmallScreen(){
       if(sideBar.style.maxHeight=="0px"){
        sideBar.style.maxHeight="100%";
        sideBar.style.maxWidth="100%";
        sideBar.style.display="flex";

       }else{
        sideBar.style.maxHeight="0px";
       }
     }

   </script>

   <script type="text/javascript">
     function profilePopup(){
    var popupProfile=document.getElementById("popup-profile");
      if(popupProfile.style.display="none"){
        popupProfile.style.display="flex";
      }
     }
     function changepwPopup(){
    var popupProfile=document.getElementById("changepw");
      if(popupProfile.style.display="none"){
        popupProfile.style.display="flex";
      }
     }
     function profilePopupClose(){
         document.getElementById("popup-profile").style.display="none";
     }
     function changepwPopupClose(){
       document.getElementById("changepw").style.display="none";
     }

    </script>
    <script src="js/top_dropdown.js"></script>
</body>
</html>

  <style>
       .appr-buttons input{
           width: 120px;
           padding: 10px;
           margin: 20px;
           font-size: 18px;
           border: 1px solid black;
       }
       .appr-buttons input:hover{
           transform: scale(1.10);
           transition: all 1.1s ease;
       }
       footer{
         background: #1a162b;
         color: white;
         padding: 10px;
         text-align: center;
       }
        .menu-icon img:hover{
        background-color: rgb(219, 210, 210);
        cursor: pointer;
        transition:.5s;
        padding: 5px; 
        border-radius:50%;
        }
        .side-bar-itmes img{
          margin-left:10px;
        }
        .top-title p{
          font-size:22px;
        }
        @media only screen and (max-width:912px){
          .top-title h1{
            font-size:16px;
            margin-left:20px;
          }
          .top-title p{
            font-size:12px;
          }
        }
        .dropbtn {
  background-color: #3498DB;
  background-color: white;
  font-size: 16px;
  border: none;
  padding: 5pt;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  cursor: pointer;background-color: #ddd;

}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}
.show {display: block;}
.notifications{
  padding-top:10px;
  padding-bottom:10px;
}
    </style>
