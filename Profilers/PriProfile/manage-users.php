<?php
  session_start();
  if(isset($_SESSION["priusername"])){
    echo "Welcome, ".$_SESSION['priusername']."!";
  }
   else {
     header("location: index.php");
     exit; // Added exit after redirect for security
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Principal - Student Details</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
         <?php
          $Welcome = "Welcome";
          echo "<h1>" . $Welcome . "<br>". $_SESSION['priusername']. "</h1>";
          ?>
        </header>
        <div class="profile-photo-container">
          <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
          <ul>
         <li><a href="index.php" ><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
            <li><a href="Students Eligibility.php"><i class="fa fa-bar-chart fa-fw"></i>Check Students Eligibility</a></li>
            <li><a href="queries.php"><i class="fa fa-database fa-fw"></i>Queries</a></li>
            <li><a href="manage-users.php" class="active" ><i class="fa fa-users fa-fw"></i>Student Details</a></li>
            
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                  <li>
                  <a href="../../Homepage/index.php">Home CIT-PMS</a>
                </li>
                <li>
                  <a href="../../Drives/index.php">Drives Homepage</a>
                </li>
                <li>
                   <a href="Notif.php">Notification</a>
                </li>
                <li>
                  <a href="Change Password.php">Change Password</a>
                  </li>
              </ul>  
            </nav> 
          </div>
        </div>
         <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>
                   
                    <td><a href="" class="white-text templatemo-sort-by">First Name <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Last Name <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">USN <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Mobile<span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Email <span class="caret"></span></a></td>
                     <td><a href="" class="white-text templatemo-sort-by">DOB<span class="caret"></span></a></td>
                      <td><a href="" class="white-text templatemo-sort-by">Sem<span class="caret"></span></a></td>
                       <td><a href="" class="white-text templatemo-sort-by">Branch<span class="caret"></span></a></td>
                        <td><a href="" class="white-text templatemo-sort-by">SSLC<span class="caret"></span></a></td>
                         <td><a href="" class="white-text templatemo-sort-by">PU/Dip <span class="caret"></span></a></td>
                          <td><a href="" class="white-text templatemo-sort-by">BE<span class="caret"></span></a></td>
                           <td><a href="" class="white-text templatemo-sort-by">Current Backlogs <span class="caret"></span></a></td>
                            <td><a href="" class="white-text templatemo-sort-by">History of Backlogs <span class="caret"></span></a></td>
                             <td><a href="" class="white-text templatemo-sort-by">Detain years <span class="caret"></span></a></td>
                    
                  </tr>
                </thead>
                <tbody>
<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', 'root', 'details');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$num_rec_per_page = 15;

// Check if the page parameter exists
if (isset($_GET["page"])) { 
    $page = $_GET["page"]; 
} else { 
    $page = 1; 
}

$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM basicdetails WHERE Approve='1' ORDER BY ApprovalDate DESC LIMIT $start_from, $num_rec_per_page"; 
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Loop through results
while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>"; 
    echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['LastName']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['USN']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['Mobile']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['Email']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['DOB']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['Sem']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['Branch']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['SSLC']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['PU/Dip']) . "</td>"; 
    echo "<td>" . htmlspecialchars($row['BE']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Backlogs']) . "</td>";
    echo "<td>" . htmlspecialchars($row['HofBacklogs']) . "</td>";
    echo "<td>" . htmlspecialchars($row['DetainYears']) . "</td>";
    echo "</tr>"; 
}
?> 
                </tbody>
              </table>  
            </div>
          </div>
        </div>
             
        <div class="pagination-wrap">
          <ul class="pagination">
<?php 
// Calculate total pages
$sql = "SELECT COUNT(*) AS total FROM basicdetails WHERE Approve='1'"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$totalpage = ceil($total_records / $num_rec_per_page); 

$currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);

if ($currentpage >= 1 && $currentpage <= $totalpage) {
    // Previous page link
    if ($currentpage > 1 && $currentpage <= $totalpage) {
        $prev = $currentpage - 1;
        echo "<li><a href='manage-users.php?page=" . $prev . "'><</a></li>";
    }
    
    // Page numbers
    if ($totalpage > 1) {
        $prev = $currentpage - 1;
        for ($i = $prev + 1; $i <= min($currentpage + 2, $totalpage); $i++) {
            $active = ($i == $currentpage) ? " class='active'" : "";
            echo "<li" . $active . "><a href='manage-users.php?page=" . $i . "'>" . $i . "</a></li>";
        }
    }
    
    // Next page link
    if ($totalpage > $currentpage) {
        $nxt = $currentpage + 1;
        echo "<li><a href='manage-users.php?page=" . $nxt . "'>></a></li>";
    }

    echo "<li><a>Total Pages: " . $totalpage . "</a></li>";
}

// Close the database connection
mysqli_close($conn);
?> 
          </ul>
        </div>
          <footer class="text-right">
            <p>Copyright &copy; 2015 CIT-PMS | Developed by
              <a href="http://znumerique.azurewebsites.net" target="_parent">ZNumerique Technologies</a></p>
          </footer>      
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script>
      $(document).ready(function(){
        // Content widget with background image
        var imageUrl = $('img.content-bg-img').attr('src');
        $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
        $('img.content-bg-img').hide();        
      });
    </script>
  </body>
</html>