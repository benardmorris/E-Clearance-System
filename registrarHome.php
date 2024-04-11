<?php
 session_start();
 include 'dbconnect.php';
 mysqli_select_db($conn,$db_name);
 if(!isset($_SESSION['admin_logged_in'])){
  header("Location:index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="css/registrar_sidebar.css">
    <link rel="stylesheet" href="css/registrarHome.css">
    
</head>
<body>
<!-- SIDEBAR CONTAINER -->
    <div class="container">
        <div class="sidebar-container" id="sidebar">
            <nav>
                <div class="logo">
                    <img src="images/mmuicon.png" width="80px" height="80px" alt="MMU logo">
                    <h1 style="color: white; font-weight:bolder; font-size:34px;">MMU</h1>
                </div>

                <ul class="side-bar-itmes">
                        <li class="list">
                          <a href="#home">
                             <span class="icon"> <img src="icons/dashboard.png" width="20px" height="20px" alt=""> </span>
                             <span class="title">Dashboard</span>
                          </a>
                       </li>
                       <li class="list active">
                          <a href="#viewRequest">
                            <span class="icon"> <img src="icons/view1.png" width="20px" height="20px" alt=""> </span>
                             <span class="title">View Request</span>
                          </a>
                       </li>
                       <li>
                        <span class="icon"> <img src="icons/manage(copy).png" width="20px" height="20px" alt=""> </span>
                         <button type="button" class="dropdown-button" >Users
                          <span class="icon"> <img src="icons/dropdown.png" width="18px" height="18px" alt=""> </span>
                         </button>
                         <div class="dropdown-container" id="dropdown-cont" style="flex-direction:column;">
                            <a href="#createAccount">Create user account</a>                      
                         </div>
                       </li>
                       <li class="list active">
                        <a href="#student-profile">
                          <span class="icon"> <img src="icons/student.png" width="20px" height="20px" alt=""> </span>
                           <span class="title">Students</span>
                        </a>
                     </li>
                     <li class="list active">
                      <a href="#staff-profile">
                        <span class="icon"> <img src="icons/users.png" width="20px" height="20px" alt=""> </span>
                         <span class="title">Staffs</span>
                      </a>
                   </li>
                </ul>
            </nav>
        </div>
<!-- MAIN HOME CONTENTS -->
        <div class="main-home" id="main-home">
            <div class="top-container">
                <div class="menu-icon" style="margin-left: 10px;">
                  <label for="close" id="lbl" class="openCloseIcon" onclick="toggleMenu()">
                    <img src="icons/menu.png" width="40px" height="40px" alt="">
                  </label>
                    <div class="smallScreen-Menu-icon">
                      <img src="icons/menu.png" width="40px" height="40px" alt="" onclick="toggleMenuSmallScreen()">
                    </div>
                </div>
                <div class="top-title" style="display: flex; flex-direction: column; align-items:center; justify-content:center;">
                    <h1>Multimedia University of Kenya</h1>
                    <p><strong>Students online clearance system - REGISTRAR</strong></p>
                </div>
                <div class="profile-cont">
                    <img src="images/avatar.jpg" alt="" width="60px" height="60px">
                    <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn"><?php echo $_SESSION['admin_u_name'];?>&#9660;</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="#" onclick="profilePopup()">View profile</a>
                        <a href="#" onclick="changepwPopup()">Change password</a>
                        <a href="logout.php">Logout</a>
                      </div>
                    </div>
                </div>
            </div>
<!-- HOME DETAILS -->
            <div class="homeDetails-container">
              <a name="home">
                <div class="registrar-dashboard-container">
                    <div class="registrar-dashboard">
                      <img src="icons/student.png" width="40px" height="40px" alt="">
                      <h4>Total Students Registered</h4>
                      <?php
                  $stmt="SELECT id FROM student ORDER BY id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    <hr>
                    <div class="registrar-dashboard">
                      <img src="icons/request4.png" width="40px" height="40px" alt="">
                      <h4>Total Requests</h4>
                      <?php
                  $stmt="SELECT id FROM requests ORDER BY id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p><?php echo $row ?></p>
                    </div>
                    <hr>
                    <?php
                    $table_name="registrar_final_approve";
                    ?>
                    <a href="approved_requests.php?tn=<?php echo $table_name; ?>">
                    <div class="registrar-dashboard">
                      <img src="icons/approveds.png" width="40px" height="40px" alt="">
                      <h4>Total Cleared Students</h4>
                      <?php
                $stmt="SELECT student_id FROM registrar_final_approve ORDER BY student_id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    </a>
                    <hr>
                    <div class="registrar-dashboard">
                      <img src="icons/rejcteduser.png" width="40px" height="40px" alt="">
                      <h4>Total rejected Students </h4>
                      <?php
                  $stmt="SELECT student_id FROM registrar_final_rejected ORDER BY student_id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    <hr>
                    <div class="registrar-dashboard">
                      <img src="icons/users.png" width="40px" height="40px" alt="">
                      <h4>Total staffs </h4>
                      <?php
                $stmt="SELECT username FROM staff ORDER BY username";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    <hr>
                </div>
<!-- REGISTRAR VIEW-REQUEST CONTAINER-->
                <a name="viewRequest">
                <div class="registrar-view-request-container">
                  <div class="view-request-top-title">
                    <h3 style="margin-left: 10px;">Clearance requests</h3>
                    <hr>
                 </div>
                 <?php
                 $sql="SELECT * FROM requests INNER JOIN student ON requests.id = student.id";
                     $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                     $rows=mysqli_num_rows($res);
                     if($rows>0){
                       while ($rows=mysqli_fetch_assoc($res)){
                        $student_id=$rows["id"];
                        $reason=$rows["reason"];
                        $fullName=$rows["fullName"];
                        $ag=$rows["age"];
                        $sx=$rows["sex"];
                        $faculty=$rows["faculty"];
                        $class_year=$rows["class_year"];
                        $semester=$rows["semester"];
                        $date=$rows["date"];

                      ?>
                      <hr>
                 <div class="requests">
                   <img src="icons/requests.png" width="40px" height="40px" alt="">
                   <p style="color:blue;"><?php echo $date; ?></p>
                   <p>ID: <?php echo $student_id; ?></p>
                   <p style="font-weight:bold;"><?php echo $fullName; ?></p>
                   <p style="color:green;">sent clearance request...</p>
                   <button>
                     <a href="registrar_approval.php?manageid=<?php echo $student_id; ?>&fullName=<?php echo $fullName; ?>&reason=<?php echo $reason; ?>&ag=<?php echo $ag; ?>&sx=<?php echo $sx; ?>&faculty=<?php echo $faculty; ?>&cly=<?php echo $class_year; ?>&sem=<?php echo $semester; ?>">Manage</a>
                   </button>
                </div>
                <hr>
                <?php
                       }
                       ?>
                       <?php
                   }
                   else{
                    echo "<h3 style=color:red;>No request found!</h3>";
                   }
                   ?>
                </div>
<!-- CREATE USER ACCOUNT-->
                <a name="createAccount">
                <div class="create-user-account-container">
                   <div class="top-container-registrar">
                    <h1>Create user account</h1>
                   </div>
                   <div class="create-account-dashboard-container">
                    <div class="create-account-dashboard">
                       <img src="icons/approve.png" width="30px" height="30px" alt="">
                       <h4>Total Students</h4>
                       <?php
                       $stmt="SELECT id FROM student ORDER BY id";
                        $res_stdnt=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                        $row_stdnt=mysqli_num_rows($res_stdnt);
                        ?>
                  <p> <?php echo $row_stdnt; ?> </p>
                    </div>
                    <hr>
                    <div class="create-account-dashboard">
                      <img src="icons/approve.png" width="30px" height="30px" alt="">
                       <h4>Total Staff</h4>
                      <?php
                       $stmt="SELECT username FROM staff ORDER BY username";
                        $staff_res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                        $row_staff=mysqli_num_rows($staff_res);
                        ?>
                  <p> <?php echo $row_staff; ?> </p>
                    </div>
                    <hr>
                    <div class="create-account-dashboard">
                      <img src="icons/approve.png" width="30px" height="30px" alt="">
                       <h4>Total Users</h4>
                       <?php
                        $row=$row_stdnt + $row_staff;
                        ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                   </div>
                   <h2 style="margin-left: 10px;">Please select user to create account</h2>
                   <div class="user-account-select">
                    <label for="account">Select user</label>
                    <select name="account" id="account" onchange="createAccountForm()">
                      <option value="00">Select</option>
                      <option value="01">Student Registration</option>
                      <option value="02">Create Staff Account</option>
                    </select>
                   </div>
<!-- CREATE STUDENT ACCOUNT -->
                   <div class="student-account" id="studentAccount">
                    <p>Create student account</p>           
                     <form method="POST" enctype="multipart/form-data">
                      <div class="student-account-side">
                        <label for="fName">Full Name</label>
                        <input type="text" name="fullName" id="fName" required><br>
                        <label for="st_id">RegNo</label>
                        <input type="text" name="student_id" id="st_id" required><br>
                        <label for="ag">Age</label>
                        <input type="text" name="age" id="ag" required><br>
                        <label for="sx">Sex</label>
                        <select name="sex" id="sx" style="margin-bottom:20px;">
                          <option value="select sex">Select sex</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <label for="faculty">Faculty</label>
                        <select name="faculty" id="faculty">
                          <option value="select">Select</option>
                          <option value="CIT">CIT</option>
                          <option value="Engineering and Technology">Engineering and Technology</option>
                          <option value="Media and Communication">Media and Communication</option>
                          <option value="Bussiness and Economics">Bussiness and Economics</option>
                          <option value="Science and Technology">Science and Technology</option>
                          <option value="Social sciences and Technology">Social sciences and Technology</option>
                        </select><br>
                      </div>
                      <hr>
                      <div class="student-account-side">
                      <label for="cls_year">Class year</label>
                        <input type="year" name="class_year" id="cls_year" required><br>
                        <label for="sem">Semester</label>
                         <select name="semester" id="sem" style="margin-bottom:20px;">
                          <option value="select">Select semester</option>
                          <option value="I">I</option>
                          <option value="II">II</option>
                         </select>
                        <label for="password">Password</label>
                        <input type="password" name="pword" id="password" required><br>
                        <label for="image">Image</label>
                         <div class="profile-pic" style="display: flex;">
                          <input type="file" name="pimage" id="upload_button">
                          <img src="images/avatar.jpg" id="chosen_image" width="80px" height="80px">
                         </div>
                        <input type="submit" name="registerStudent" value="Register">
                         <?php
                         if(isset($_POST["registerStudent"])) {
                          $fullName=$_POST["fullName"];
                          $id_number=$_POST["student_id"];
                          $age=$_POST["age"];
                          $sex=$_POST["sex"];
                          $faculty=$_POST["faculty"];
                          $class_year=$_POST["class_year"];
                          $semester=$_POST["semester"];
                          $password=md5($_POST["pword"]);
                          $role="student";
//session variables

                          
                          if(isset($_FILES['pimage'])){
                          $photo_name = $_FILES["pimage"]["name"];
                          $photo_loc = $_FILES["pimage"]["tmp_name"];
                          $profile="uploads/".basename($photo_name);
                          if(move_uploaded_file($photo_loc,$profile)){
                          $sql2=mysqli_query($conn,"INSERT INTO student(fullName,id,age,sex,faculty,class_year,semester,pass_word,st_image)
                          VALUES ('$fullName','$id_number','$age','$sex','$faculty','$class_year','$semester','$password','$profile')") or die(mysqli_error($conn));
                          $sql3=mysqli_query($conn,"INSERT INTO login(username,password,role) VALUES('$id_number','$password','$role')");
                         if($sql2 && $sql3) {
                              echo "<i style=color:green; font-weight:bold;> Successfully Registered! </i>";

                          }
                          else{
                              echo "<i style='color:red'> Unable to register! </i>";
                          }
                        }
                        else{
                          echo "<i style='color:red'> Unable to upload image! </i>";
                        }
                    }else{
                      echo "<p style=color:red;>image not found!</p>";
                     }
                    }
                          ?>
                      </div>
                     </form>
                   </div>
<!-- CREATE STAFF ACCOUNT -->
                   <div class="staff-account" id="staffAccount">
                    <p>Create staff account</p>
                    <form method="POST" enctype="multipart/form-data">
                      <div class="staff-account-side">
                      <label for="fullName">Full Name</label>
                        <input type="text" name="fullName" id="fullName" required><br>
                        <label for="age">Age</label>
                        <input type="text" name="age" id="ag" required><br>
                        <label for="sex">Sex</label>
                         <select name="sex" id="sx" required>
                           <option value="select sex">Select</option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                         </select>
                      </div>
                      <hr>
                      <div class="staff-account-side">
                        <label for="position">Position</label>
                         <select name="position" id="pos" required>
                           <option value="Not selected">select</option>
                           <option value="faculty head">Head of Faculty</option>
                           <option value="Librarian">Librarian</option>
                           <option value="Lab assistant">Lab Assistant</option>
                           <option value="dispensary head">Head of Dispensary</option>
                           <option value="hostel">Hostels Manager</option>
                         </select><br><br>
                         <label for="uname">Staff ID</label>
                         <input type="text" name="username" id="username" required><br>
                        <label for="pword">Password</label>
                        <input type="password" name="password" id="pword" required><br>
                        <label for="staff_image">Image</label>
                         <div class="profile-pic" style="display: flex;">
                          <input type="file" name="pimage" id="upload_btn">
                          <img src="images/avatar.jpg" id="chosen_img" width="80px" height="80px">
                         </div>
                        <input type="submit" name="staffRegister" value="Create" onclick="openSuccessPopup()">
                        <?php
                        if(isset($_POST["staffRegister"])) {
                          $fullName=$_POST["fullName"];
                          $age=$_POST["age"];
                          $sex=$_POST["sex"];
                          $position=$_POST["position"];
                          $username=$_POST["username"];
                          $password=md5($_POST["password"]);
                     
                            if(isset($_FILES['pimage'])){
                          $photo_name = $_FILES["pimage"]["name"];
                          $photo_loc = $_FILES["pimage"]["tmp_name"];
                          $profile="uploads/".basename($photo_name);
                          if(move_uploaded_file($photo_loc,$profile)){
                              $sql2=mysqli_query($conn,"INSERT INTO staff(fullName,age,sex,position,username,pass_word,im_age)
                              VALUES ('$fullName','$age','$sex','$position','$username','$password','$profile')") or die(mysqli_error($conn));
                             $sql3=mysqli_query($conn,"INSERT INTO login(username,password,role) VALUES('$username','$password','$position')");
                             if($sql2 && $sql3){
                                  echo "<p style=color:green;>Successfully registered...</p>";
                                  echo "<script>";
                                  echo "openSuccessPopup()";
                                  echo "</script>";
                              }
                              else{
                                echo "<i style=color:red;>Unable to register!!</i>";
                              }
                        }else{
                          echo "<i style=color:red;>There is some problem in image upload!!!</i>";
                         }
                        }
                        else{
                          echo "<i style='color:red'> image not found! </i>";
                        }
                       }
                         ?>
                      </div>
                     </form>
                  </div>
                </div>
<!-- VIEW STUDENTS CINTAINER -->
                <a name="student-profile">
                  <div class="view-student-profile-container">
                    <h3 style="margin: 10px;">Students profile</h3>
                    <div class="search-bar-container">
                      <form method="GET">
                      <input type="search" name="search" placeholder="search">
                       <button type="submit" name="search_btn">Search</button>
                       </form>
                    </div>
                    <div class="view-student-profile-tables-container">
                      <div class="student-table-container">
                         <table border="1">
                          <th>Full name</th>
                          <th>RegNo/ID</th>
                          <th>Age</th>
                          <th>Sex</th>
                          <th>faculty</th>
                          <th>Actions</th>
                          <?php
                          if(isset($_GET['search_btn'])){
                            $filterValues=$_GET["search"];
                            $query=mysqli_query($conn,"SELECT * FROM student WHERE CONCAT(fullName,id) LIKE '%$filterValues%'") or die(mysqli_error($conn));
                            $rows_srch=mysqli_num_rows($query);
                            if($rows_srch>0){
                              while ($rows_srch=mysqli_fetch_assoc($query)){
                                $fN=$rows_srch["fullName"];
                                $st_id=$rows_srch["id"];
                                $age=$rows_srch["age"];
                                $sex=$rows_srch["sex"];
                                $faculty=$rows_srch["faculty"];
                                $class_year=$rows_srch["class_year"];

                                ?>
                                <tr>
                            <td><?php echo $rows_srch["fullName"]; ?></td>
                            <td><?php echo $rows_srch["id"]; ?></td>
                            <td><?php echo $rows_srch["age"]; ?></td>
                            <td><?php echo $rows_srch["sex"]; ?></td>
                            <td><?php echo $rows_srch["faculty"]; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_student_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&faculty=<?php echo $faculty; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);">
                              <a href="view_student_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&faculty=<?php echo $faculty; ?>&sx=<?php echo $sex; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                               <form action="delete_record.php" method="post" style="display: inline;">
                                <input type="hidden" name="student_id" value="<?php echo $st_id; ?>">
                                <button style="background-color: red;" type="submit">delete</button>
                              </form>
                            </td>
                          </tr>
                          <?php
                              }
                              ?>
                              
                         <?php
                            }
                            else{
                              echo "<p>record not found! </p>";
                            }
                          }
                          else{
                          ?>
                          <?php
                        $sql="SELECT * FROM student ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows>0){
                      while ($rows=mysqli_fetch_assoc($res)){
                        $fullName=$rows["fullName"];
                        $id_number=$rows["id"];
                        $sex=$rows["sex"];
                        $age=$rows["age"];
                        $faculty=$rows["faculty"];
                        $class_year=$rows["class_year"];
                       ?>

                          <tr>
                            <td><?php echo $fullName; ?></td>
                            <td><?php echo $id_number; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $sex; ?></td>
                            <td><?php echo $faculty; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_student_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&faculty=<?php echo $faculty; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);">
                              <a href="view_student_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&faculty=<?php echo $faculty; ?>&sx=<?php echo $sex; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                              
                                <button style="background-color: red;">delete</button></form>

                            </td>
                          </tr>
                          <?php
                          }
                          ?>
                          <?php
                      }
                      else{
                          echo "No record found!";
                      }
                      ?>
                      <?php }
                      ?>
                         </table>
                      </div>
                    </div>
                  </div>
<!-- VIEW STAFF CONTAINER -->
                  <a name="staff-profile">
                  <div class="view-staff-profile-container">
                    <h3 style="margin: 10px;">Staffs profile</h3>
                    <div class="search-bar-container">
                      <form method="GET">
                      <input type="search" name="search" placeholder="search">
                      <button type="submit" name="staff_search_btn">Search</button>
                      </form>
                    </div>
                    <div class="view-staff-profile-tables-container">
                      <div class="staff-table-container">
                         <table border="1">
                          <th>Full name</th>
                          <th>ID</th>
                          <th>Age</th>
                          <th>Sex</th>
                          <th>Position</th>
                          <th>Actions</th>
                          <?php
                          if(isset($_GET['staff_search_btn'])){
                            $filterValues=$_GET["search"];
                            $stf_query=mysqli_query($conn,"SELECT * FROM staff WHERE CONCAT(fullName,username) LIKE '%$filterValues%'") or die(mysqli_error($conn));
                            $rows_stf_srch=mysqli_num_rows($stf_query);
                            if($rows_stf_srch>0){
                              while ($rows_stf_srch=mysqli_fetch_assoc($stf_query)){
                                $fN=$rows_stf_srch["fullName"];
                                $st_id=$rows_stf_srch["username"];
                                $age=$rows_stf_srch["age"];
                                $sex=$rows_stf_srch["sex"];
                                $posn=$rows_stf_srch["position"];

                                ?>
                                <tr>
                            <td><?php echo $fN; ?></td>
                            <td><?php echo $st_id; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $sex; ?></td>
                            <td><?php echo $posn; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_staff_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&ql=<?php echo $qualn; ?>&ps=<?php echo $posn; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);">
                              <a href="view_staff_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&ql=<?php echo $qualn; ?>&sx=<?php echo $sex; ?>&ps=<?php echo $posn; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                        <button style="background-color: red;>delete
                        </button>
                        </a>
                            </td>
                          </tr>
                          <?php
                              }
                              ?>
                              
                         <?php
                            }
                            else{
                              echo "<p>record not found! </p>";
                            }
                          }
                          else{
                          ?>

                          <?php
                        $sql="SELECT * FROM staff ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows>0){
                      while ($rows=mysqli_fetch_assoc($res)){
                        $fullName=$rows["fullName"];
                        $id_number=$rows["username"];
                        $sex=$rows["sex"];
                        $age=$rows["age"];
                        $position=$rows["position"];
                       ?>

                          <tr>
                          <td><?php echo $fullName; ?></td>
                            <td><?php echo $id_number; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $sex; ?></td>
                            <td><?php echo $position; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_staff_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&ps=<?php echo $position; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);" onclick="viewStaffProfile()">
                              <a href="view_staff_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&ps=<?php echo $position; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                              <button style="background-color: red;">delete</button>
                            </td>
                          </tr>
                          <?php
                         }
                        ?>
                       <?php
                }
                else{
                    echo "No record found!";
                }
                ?>
                <?php
                 }
                ?>
                         </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
<!-- REGISTRAR PROFILE CONTAINER -->
    <div class="popup-profile-container" id="popup-profile">
        <div class="profile-detail">
          <h1 style="text-align: center;">My Profile</h1>
          <hr>
          <div class="detail">
            <label for="firstnm">Username :</label>
          <p style="background-color: white;" id="firstnm"><?php echo $_SESSION['admin_u_name']; ?></p>
          </div>
          <hr>
    </div>
        <div class="buttons">
            <button
            style="border: none;
            padding: 10pt;
            background-color: green;
            border-radius: 10px;"
            onclick="profilePopupClose()" >Close</button>
        </div>
    </div>
<!-- CHANGE PASSWORD CONTAINER -->
    <div class="popup-change-password-container" id="changepw">
        <div class="cp-title-above">
            <h1>Change Password</h1>
        </div>
        <div class="change-pw-form-container">
          <form method="POST" enctype="multipart/form-data">
            <label for="oldpw">Current Password</label>
            <input type="password" name="old_pw" id="oldpw" required><br>
            <label for="newpw">New Password</label>
            <input type="password" name="new_pw" id="newpw" required><br>
            <label for="confirmpw">Confirm new Password</label>
            <input type="password" name="confirmpw" id="confirmpw" required><br>
             <div class="changepw-buttons">
                <input type="submit" name="change_pw" id="submit" value="Change" style="background-color: rgb(15, 150, 15);">
                  <?php
                  if(isset($_POST["change_pw"])){
                    $old_password=md5($_POST["old_pw"]);
                    $new_password=md5($_POST["new_pw"]);
                    $confirm_password=md5($_POST["confirmpw"]);
                    $sql_change_password=mysqli_query($conn,"SELECT * FROM login WHERE username='".$_SESSION['admin_u_name']."'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_change_password);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($sql_change_password)){
                          $old_pw=$rows["password"];
                        if($new_password==$confirm_password && $old_password == $old_pw){
                          $sql_change=mysqli_query($conn,"UPDATE login SET password='$new_password' WHERE username='".$_SESSION['admin_u_name']."' ") or die(mysqli_error($conn));
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

<!-- Success popup container-->
     <div class="success-popup-container" id="success-popup">
       <img src="icons/right.png" width="100px" height="100px" alt="">
       <p>User successfully registered...</p>
       <input type="submit" name="ok" value="Ok" onclick="closeSuccessPopup()">
     </div>

    <div class="footer-container">
        <footer>
            Copyright ©2024 OCMS
        </footer>
    </div>

    <script src="js/image_review.js"></script>
    <script src="js/top_dropdown.js"></script>
    <script src="js/staff_image_preview.js"></script>
    <script>
      var dropdown = document.getElementsByClassName("dropdown-button");
      var i;
      
      for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "flex") {
            dropdownContent.style.display = "none";
          } else {
            dropdownContent.style.display = "flex";
          }
        });
      }
      </script>
    <script>
     var sideBar=document.getElementById("sidebar");
     var mainHome=document.getElementById("main-home");
     sideBar.style.maxWidth ="20%";
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
        sideBar.style.display="block";

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
    
     function createAccountForm(){
      var accountType=document.getElementById("account").value;
      switch(accountType){
        case "00":
        document.getElementById("studentAccount").style.display="none";
          document.getElementById("staffAccount").style.display="none";
          break;
          case "01":
          document.getElementById("studentAccount").style.display="block";
          document.getElementById("staffAccount").style.display="none";
          break;
          case "02":
          document.getElementById("staffAccount").style.display="block";
          document.getElementById("studentAccount").style.display="none";
          break;
          default:
            break;
      }
     }
    </script>
    <script src="js/edit_profile.js"></script>
    <script src="js/view_profile.js"></script>
    <script>
      var successPopupOpen=document.getElementById("success-popup");
      function openSuccessPopup(){
        successPopupOpen.classList.add('open-popup');
      }
      function closeSuccessPopup(){
      successPopupOpen.classList.remove('open-popup');
      }
    </script>
</body>
</html>





<style>
       .appr-buttons input{
           width: 120px;
           padding: 10px;
           margin: 20px;
           font-size: 18px;
           background-color: white;
           border: 1px solid black;
       }
       .appr-buttons input:hover{
           transform: scale(1.18);
           transition: all 1.1s ease;
       }
       .footer-container footer{
         background: #312F3A;
         color: white;
         text-align: center;
         padding-top: 20px;
         padding-bottom: 20px;         bottom: 0;
         
       }
       td, th {
      border: 2px solid #ddd;
      padding: 8px;
    }
    th{
      background: white;
      color: black;
    }
    .create-account-dashboard-container hr{
      width: 10px;
      height: 120px;
      color: red;
      background-color:lightgray;
      margin-top: 30px;
    }
    .success-popup-container{
      position: absolute;
      top: 0;
      left: 50%;
      z-index: 99;
      width: 40%;
      background-color: rgb(238, 215, 235);
      box-shadow: 1px 1px 1px 1px gray;
      margin: auto;
      flex-direction: column;
      visibility: hidden;
      transition: transform 0.4s, top 0.4s;
      padding: 20px;
      text-align: center;
      transform: translate(-50%, -50%) scale(0.1);
    }
    .open-popup{
      visibility: visible;
      top: 50%;
     transform: translate(-50%, -50%) scale(1);
  }
    .success-popup-container p{
      font-size: 18px;
      margin-bottom: 10px;
    }
    .success-popup-container input{
      width: 60%;
      margin: auto;
      padding: 8pt;
      font-size: 18px;
      border: none;
      color: white;
      border-radius: 10px;
      background-color: blue;
    }
    input,select{
      border: 1px solid rgb(206, 207, 207);
      padding:6pt;
    }
    hr{
      border: 1px solid rgb(206, 207, 207);
    }
    .search-bar-container button{
      border:none;
      padding:6pt;
      margin:0;
      background-color:blue;
      color:white;
      font-size:16px;
      border-radius:5px;
    }
    .search-bar-container button:hover{
      transform:scale(1.08);
      cursor:pointer;
      transition:1s;
    }
    .staff-account-side input[type="submit"]{
      border :1px solid black;
      font-size:16px;
      font-weight:bold;
      border-radius:5px; 
    }
    .staff-account-side input[type="submit"]:hover{
      background-color:black;
      color:white;
      transition:1s;
      cursor:pointer;
    }
    .change-pw-form-container input{
      border: 1px solid rgb(206, 207, 207);
      padding:6pt;
      border-radius:5px;
      background-color:white;
    }
    .registrar-dashboard-container .registrar-dashboard:hover{
      background-color:gray;
      color:white;
      cursor: pointer;
    }
    .requests button:hover{
    background-color: green;
    transform: scale(1.18);
    color: white;
    cursor: pointer;
  }
    </style>