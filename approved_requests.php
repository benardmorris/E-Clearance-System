<?php      
    session_start();
    include 'dbconnect.php';
    mysqli_select_db($conn,$db_name);

    // Check if 'tn' parameter is set and not empty
    $table_name = isset($_GET['tn']) ? $_GET['tn'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved requests</title>
    <link rel="stylesheet" href="css/approved_requests/approved_request.css">
</head>
<body>
    <h3 style="color: black;">Lists of approved requests</h3>
    <hr>
    <div class="search-bar-container">
        <form method="GET">
        <input type="search" name="search" placeholder="search approved requests">
        <button type="submit">Search</button>
        </form>
    </div>
    <div class="approved-requests">
        <?php 
        // Only proceed if $table_name is not empty
        if(!empty($table_name)) {
            $sql_approve_requests = mysqli_query($conn, "SELECT * FROM $table_name INNER JOIN student ON $table_name.student_id = student.id") or die(mysqli_error($conn));
            $rows_approve = mysqli_num_rows($sql_approve_requests);
            if($rows_approve > 0){
                while($rows_approve = mysqli_fetch_assoc($sql_approve_requests)){
                    $stdnt_id = $rows_approve["id"];
                    $f_name = $rows_approve["fullName"];
        ?>
        <p><?php echo $stdnt_id;  ?>   <?php echo $f_name;  ?></p>

        <?php
            }
        } else {
            echo "<p style=color:red;>No approved request!</p>";
        }
        } 
        ?>
    </div>
    
</body>
</html>
