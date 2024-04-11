<?php
session_start();
include 'dbconnect.php';
mysqli_select_db($conn,$db_name);
?>
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online student clearance system Homepage</title>
    <link rel="stylesheet" href="css/indexLogin.css">
    <link rel="stylesheet" href="css/login_page.css">
</head>
<body style="background-image:url('images/mmu.jpg')">
    <nav>
        <div class="logo">
            <img src="images/mmuicon.png" alt="mmu logo">
        </div>
        <div class="top-texts">
            <h1>Multimedia University of Kenya</h1>
<p>STUDENTS ONLINE CLEARANCE SYSTEM</p>
        </div>
        <ul>
            <li><a href="#" onclick="openLoginForm()">Login</a></li>
        </ul>
       
    </nav>
 <div class="main-container">
    <div class="mission-container">
        <h1>MMU Mission</h1>
        <p>To provide quality training, nurture a culture of research,<br>
             innovation and extension to meet the aspirations<br>
              of a dynamic society
        </p>
    </div>
    <div class="vision-container">
        <h1>MMU Vision</h1>
        <p>To be the University of Choice in training, research,<br>
              innovation and extension
        </p>
    </div>

 <div class="motto-container">
        <h1>MMU Motto</h1>
        <p>Riding on Technology,<br>
               Inspiring Innovation
        </p>
    </div>




 </div>
 <!-- LOGON FORM -->
 <div class="form" id="login">
       <div class="close-btn">
        <label for="close" onclick="close_me()" style="font-size: 30px;">&CircleTimes;</label>
        </div>

        <br>
        
    <div class="head">
        
        
    <p><strong>Login to CMS</strong></p>
   
</div>
    <form method="post" autocomplete="on">
       
        <div class="element">
            <label for="username" id="uname-lbl">RegNo/ID No</label><br><br>
            <img src="icons/user.png" width="25px" height="25px" alt="">
            <input type="text" class="uname-txt" name="username" placeholder="RegNo/ID Number " required>
            <br>
            <label for="password" id="password-lbl">Password</label> <br><br>
            <img src="icons/lock.png" width="25px" height="25px" alt="">
            
            <input type="password" name="password" class="password-txt" placeholder="password " required>
            <input type="submit" name="login" class="login-btn" value="Login">
            <?php

// LOGIN DIRECTION
            if(isset($_POST['login'])){
                $uname=$_POST["username"];
                $pword=md5($_POST["password"]);
                $sql=mysqli_query($conn,"SELECT * FROM login WHERE username='$uname' AND password='$pword'") or die( mysqli_error($conn));
                $result=mysqli_num_rows($sql);
                if($result > 0){
                    $row=mysqli_fetch_assoc($sql);
// STUDENT
                    
                    if($row["username"]===$uname && $row["password"]==$pword && $row["role"]=="student"){
                        header("Location:student_home.php");
                     $_SESSION['u_name']=$uname;
                     $_SESSION['student_logged_in']=$uname;
                   $sql="SELECT * FROM student WHERE id='$uname' ";
                    $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                    $rows=mysqli_num_rows($res);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($res)){
                    $st_id=$rows["id"];
                    $fullName=$rows["fullName"];
                    $age=$rows["age"];
                    $sex=$rows["sex"];
                    $faculty=$rows["faculty"];
                    $class_year=$rows["class_year"];
                    $semester=$rows["semester"];
                    $profile_pic=$rows['st_image'];
                        }
                        $_SESSION['st_id']=$st_id;
                        $_SESSION['full_name']=$fullName;
                        $_SESSION['ag']=$age;
                        $_SESSION['sx']=$sex;
                        $_SESSION['faculty']=$faculty;
                        $_SESSION['class_year']=$class_year;
                        $_SESSION['semester']=$semester;
                        $_SESSION['profile_picture']=$profile_pic;
                    }
// ADMIN DIRECTION
                    }
                    else if($row["username"]===$uname && $row["password"]==$pword && $row["role"]=="Admin"){
                        header("Location:registrarHome.php");
                        $_SESSION['admin_u_name']=$uname;  
                        $_SESSION['admin_logged_in']=$uname;

                    }
// LIBRARIAN
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="Librarian"){
                        header("Location:library.php");
                        $_SESSION['library_u_name']=$uname;
                        $_SESSION['library_logged_in']=$uname;
                $sql="SELECT * FROM staff WHERE username='$uname' ";
                    $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                    $rows=mysqli_num_rows($res);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($res)){
                    $library_id=$rows["username"];
                    $library_fullName=$rows["fullName"];
                    $library_age=$rows["age"];
                    $library_sex=$rows["sex"];
                    $library_position=$rows["position"];
                    $library_image=$rows["im_age"];
                        }
                        $_SESSION['full_name']=$library_fullName;
                        $_SESSION['staff_id']=$library_id;
                        $_SESSION['ag']=$library_age;
                        $_SESSION['sx']=$library_sex;
                        $_SESSION['position']=$library_position;
                        $_SESSION['librarian_image']=$library_image;
                    }
                    }
// LAB ASSISTANT
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="Lab assistant"){
                        header("Location:lab.php");
                        $_SESSION['lab_u_name']=$uname;
                        $_SESSION['lab_logged_in']=$uname;
                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                    $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                    $rows=mysqli_num_rows($res);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($res)){
                    $lab_id=$rows["username"];
                    $lab_fullName=$rows["fullName"];
                    $lab_age=$rows["age"];
                    $lab_sex=$rows["sex"];
                    $lab_position=$rows["position"];
                    $lab_image=$rows["im_age"];
                        }
                        $_SESSION['lab_full_name']=$lab_fullName;
                        $_SESSION['lab_id']=$lab_id;
                        $_SESSION['lab_ag']=$lab_age;
                        $_SESSION['lab_sx']=$lab_sex;
                        $_SESSION['lab_position']=$lab_position;
                        $_SESSION['lab_image']=$lab_image;
                    }
                    }
// FACULTY HEAD
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="faculty head"){
                        header("Location:faculty.php");
                        $_SESSION['faculty_u_name']=$uname;
                        $_SESSION['faculty_logged_in']=$uname;

                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows == 1){
                        while ($rows=mysqli_fetch_assoc($res)){
                        $faculty_id=$rows["username"];
                        $faculty_fullName=$rows["fullName"];
                        $faculty_age=$rows["age"];
                        $faculty_sex=$rows["sex"];
                        $faculty_position=$rows["position"];
                        $faculty_image=$rows["im_age"];
                            }
                            $_SESSION['faculty_full_name']=$faculty_fullName;
                            $_SESSION['faculty_id']=$faculty_id;
                            $_SESSION['faculty_ag']=$faculty_age;
                            $_SESSION['faculty_sx']=$faculty_sex;
                            $_SESSION['faculty_position']=$faculty_position;
                            $_SESSION['faculty_image']=$faculty_image;
                        }
                    }
// DISPENSARY HEAD
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="dispensary head"){
                        header("Location:dispensary.php");
                        $_SESSION['dispensary_u_name']=$uname;
                        $_SESSION['dispensary_logged_in']=$uname;

                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows == 1){
                        while ($rows=mysqli_fetch_assoc($res)){
                        $dispensary_id=$rows["username"];
                        $dispensary_fullName=$rows["fullName"];
                        $dispensary_age=$rows["age"];
                        $dispensary_sex=$rows["sex"];
                        $dispensary_position=$rows["position"];
                        $dispensary_image=$rows["im_age"];
                            }
                            $_SESSION['dispensary_full_name']=$dispensary_fullName;
                            $_SESSION['dispensary_id']=$dispensary_id;
                            $_SESSION['dispensary_ag']=$dispensary_age;
                            $_SESSION['dispensary_sx']=$dispensary_sex;
                            $_SESSION['dispensary_position']=$dispensary_position;
                            $_SESSION['dispensary_image']=$dispensary_image;
                        }
                    }
// HOSTEL
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="hostel"){
                        header("Location:hostel.php");
                        $_SESSION['hostel_u_name']=$uname;
                        $_SESSION['hostel_logged_in']=$uname;

                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $hostel_rows=mysqli_num_rows($res);
                        if($hostel_rows == 1){
                        while ($hostel_rows=mysqli_fetch_assoc($res)){
                        $hostel_fullName=$hostel_rows["fullName"];
                        $hostel_age=$hostel_rows["age"];
                        $hostel_sex=$hostel_rows["sex"];
                        $hostel_position=$hostel_rows["position"];
                        $hostel_id=$hostel_rows["username"];
                        $hostel_image=$hostel_rows["im_age"];
                            }
                            $_SESSION['hostel_id']=$hostel_id;
                            $_SESSION['hostel_ag']=$hostel_age;
                            $_SESSION['hostel_sx']=$hostel_sex;
                            $_SESSION['hostel_position']=$hostel_position;
                            $_SESSION['hostel_full_name']=$hostel_fullName;
                            $_SESSION['hostel_image']=$hostel_image;
                        }
                    }
                    else{
                       
                    }
                }
// WRONG LOGIN DETAILS
                else{

                    echo "<script>alert('Username or password incorrect!!')</script>";
                }
                
             }
            ?>
        </div>
<!-- FORGOT PASSWORD -->
        <div class="forget">
            <a href="mailto:benardmorris2002@gmail.com?subject=Request%20for%20eClearance%20System%20Password&body=Dear%20Administrator%2C%0A%0AI%20am%20requesting%20the%20password%20to%20log%20in%20to%20the%20eClearance%20system%20for%20Multimedia%20University.%20My%20Registration%20Number%20/%20ID%20is%20STD%2F____.%0A%0APlease%20provide%20me%20with%20the%20necessary%20credentials%20at%20your%20earliest%20convenience.%0A%0AThank%20you.%0A">
  Forgot Password?
</a>

            
        </div>
    </form>
</div>   
    <footer>
     Copyright ©2024 OCMS
    </footer>

    <script src="js/login.js"></script>

</body>
</html>