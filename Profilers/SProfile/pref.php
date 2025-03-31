<?php
  session_start();
  if($_SESSION["username"]){
    echo "Welcome, ".$_SESSION['username']."!";
  } else {
    header("location: index.php");
    exit; // Added exit after redirect
  }
?>

<?php
// First section - INSERT operation
if(isset($_POST['submit'])) { 
  $fname = $_POST['Fname'];
  $lname = $_POST['Lname'];
  $USN = $_POST['USN'];
  $sun = $_SESSION["username"];
  $phno = $_POST['Num'];
  $email = $_POST['Email'];
  $date = $_POST['DOB'];
  $cursem = $_POST['Cursem'];
  $branch = $_POST['Branch'];
  $per = $_POST['Percentage'];
  $puagg = $_POST['Puagg'];
  $beaggregate = $_POST['Beagg'];
  $back = $_POST['Backlogs'];
  $hisofbk = $_POST['History']; 
  $detyear = $_POST['Dety'];
  
  if($USN !='' || $email !='') {
    if($USN == $sun) {
      // Create connection using MySQLi
      $connect = mysqli_connect("localhost", "root", "root", "details");
      
      // Check connection
      if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      // Using prepared statement to prevent SQL injection
      $stmt = mysqli_prepare($connect, "INSERT INTO `basicdetails` (`FirstName`, `LastName`, `USN`, `Mobile`, `Email`, `DOB`, `Sem`, `Branch`, `SSLC`, `PU/Dip`, `BE`, `Backlogs`, `HofBacklogs`, `DetainYears`, `Approve`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0')");
      
      mysqli_stmt_bind_param($stmt, "ssssssssssssss", $fname, $lname, $USN, $phno, $email, $date, $cursem, $branch, $per, $puagg, $beaggregate, $back, $hisofbk, $detyear);
      
      if(mysqli_stmt_execute($stmt)) {
        echo "<center>Details has been received successfully...!!</center>";
      } else {
        echo "<center>FAILED: " . mysqli_error($connect) . "</center>";
      }
      
      mysqli_stmt_close($stmt);
      mysqli_close($connect);
    } else {
      echo "<center>Enter your USN only...!!</center>";
    }
  }
}
?>

<?php
// Second section - UPDATE operation
if(isset($_POST['update'])) { 
  $fname = $_POST['Fname'];
  $lname = $_POST['Lname'];
  $USN = $_POST['USN'];
  $sun = $_SESSION["username"];
  $phno = $_POST['Num'];
  $email = $_POST['Email'];
  $date = $_POST['DOB'];
  $cursem = $_POST['Cursem'];
  $branch = $_POST['Branch'];
  $per = $_POST['Percentage'];
  $puagg = $_POST['Puagg'];
  $beaggregate = $_POST['Beagg'];
  $back = $_POST['Backlogs'];
  $hisofbk = $_POST['History']; 
  $detyear = $_POST['Dety'];
  
  if($USN !='' || $email !='') {
    if($USN == $sun) {
      // Create connection using MySQLi
      $connect = mysqli_connect("localhost", "root", "root", "details");
      
      // Check connection
      if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      // Check if record exists
      $check_stmt = mysqli_prepare($connect, "SELECT * FROM `basicdetails` WHERE `USN`=?");
      mysqli_stmt_bind_param($check_stmt, "s", $USN);
      mysqli_stmt_execute($check_stmt);
      mysqli_stmt_store_result($check_stmt);
      
      if(mysqli_stmt_num_rows($check_stmt) == 1) {
        mysqli_stmt_close($check_stmt);
        
        // Update the record
        $update_stmt = mysqli_prepare($connect, "UPDATE `basicdetails` SET `FirstName`=?, `LastName`=?, `Mobile`=?, `Email`=?, `DOB`=?, `Sem`=?, `Branch`=?, `SSLC`=?, `PU/Dip`=?, `BE`=?, `Backlogs`=?, `HofBacklogs`=?, `DetainYears`=?, `Approve`='0' WHERE `USN`=?");
        
        mysqli_stmt_bind_param($update_stmt, "ssssssssssssss", $fname, $lname, $phno, $email, $date, $cursem, $branch, $per, $puagg, $beaggregate, $back, $hisofbk, $detyear, $USN);
        
        if(mysqli_stmt_execute($update_stmt)) {
          echo "<center>Data Updated successfully...!!</center>";
        } else {
          echo "<center>FAILED: " . mysqli_error($connect) . "</center>";
        }
        
        mysqli_stmt_close($update_stmt);
      } else {
        echo "<center>NO record found for update</center>";
        mysqli_stmt_close($check_stmt);
      }
      
      mysqli_close($connect);
    } else {
      echo "<center>Enter your USN only</center>";
    }
  }
}
?>