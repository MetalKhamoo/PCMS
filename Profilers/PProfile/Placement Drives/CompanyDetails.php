<?php
  session_start();
  if (!isset($_SESSION['pusername'])){
    header("location: index.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="../favicon.ico" type="image/icon">
        <link rel="icon" href="../favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Company Details</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/templatemo-style.css" rel="stylesheet">
    
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
          echo "<h1>" . $Welcome . "<br>". $_SESSION['pusername']. "</h1>";
          echo "<br>";
          ?>
        </header>
        <div class="profile-photo-container">
          <img src="../images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
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
             <li><a href="../login.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li> 
            <li><a href="../Placement Drives.php" class="active"><i class="fa fa-home fa-fw"></i>Placement Drives</a></li>           
            <li><a href="../manage-users.php"><i class="fa fa-users fa-fw"></i>View Students</a></li>
            <li><a href="../queries.php"><i class="fa fa-users fa-fw"></i>Queries</a></li>
            <li><a href="../Students Eligibility.php"><i class="fa fa-sliders fa-fw"></i>Students Eligibility Status</a></li>
            <li><a href="../logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
               <li><a href="../../Homepage/index.php">Home CIT-PMS</a></li>
                <li><a href="">Drives Home</a></li>
                <li><a href="Notif.php">Notifications</a></li>
                <li><a href="Change Password.php">Change Password</a></li>
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
                    <td><a class="white-text templatemo-sort-by">Company Name </a></td>
                    <td><a class="white-text templatemo-sort-by">Date </a></td>
                    <td><a class="white-text templatemo-sort-by">C/P</a></td>
                    <td><a class="white-text templatemo-sort-by">PVenue</a></td>
                    <td><a class="white-text templatemo-sort-by">SSLC</a></td>
                    <td><a class="white-text templatemo-sort-by">PU/Dip </a></td>
                    <td><a class="white-text templatemo-sort-by">BE</a></td>               
                    <td><a class="white-text templatemo-sort-by">Backlogs</a></td>
                    <td><a class="white-text templatemo-sort-by">History of Backlogs</a></td>
                    <td><a class="white-text templatemo-sort-by">Detain years</a></td>
                    <td><a class="white-text templatemo-sort-by">Others details </a></td>
                  </tr>
                </thead>
                <tbody>
                <?php
                $num_rec_per_page = 15;
                $conn = mysqli_connect('localhost', 'root', 'root', 'details');
                
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                if (isset($_GET["page"])) { 
                    $page = $_GET["page"]; 
                } else { 
                    $page = 1; 
                }
                
                $start_from = ($page-1) * $num_rec_per_page; 
                $sql = "SELECT * FROM addpdrive ORDER BY Date DESC LIMIT $start_from, $num_rec_per_page"; 
                $rs_result = mysqli_query($conn, $sql);
                
                if (!$rs_result) {
                    die("Query failed: " . mysqli_error($conn));
                }
                
                while ($row = mysqli_fetch_assoc($rs_result)) { 
                    echo "<tr>"; 
                    echo "<td>" . $row['CompanyName'] . "</td>"; 
                    echo "<td>" . $row['Date'] . "</td>"; 
                    // Fix for undefined array keys by checking if they exist
                    echo "<td>" . (isset($row['C/P']) ? $row['C/P'] : (isset($row['CP']) ? $row['CP'] : '')) . "</td>"; 
                    echo "<td>" . $row['PVenue'] . "</td>"; 
                    echo "<td>" . $row['SSLC'] . "</td>"; 
                    // Fix for undefined array key PU/Dip
                    echo "<td>" . (isset($row['PU/Dip']) ? $row['PU/Dip'] : (isset($row['PUDip']) ? $row['PUDip'] : '')) . "</td>"; 
                    echo "<td>" . $row['BE'] . "</td>";
                    echo "<td>" . $row['Backlogs'] . "</td>";
                    echo "<td>" . $row['HofBacklogs'] . "</td>";
                    echo "<td>" . $row['DetainYears'] . "</td>";
                    echo "<td>" . $row['ODetails'] . "</td>";
                    echo "</tr>"; 
                }
                ?>
                </tbody>
              </table>  
            </div>
          </div>

          <div class="pagination-wrap">
            <ul class="pagination">
            <?php 
            $sql = "SELECT * FROM addpdrive ORDER BY Date DESC"; 
            $rs_result = mysqli_query($conn, $sql);
            
            if (!$rs_result) {
                die("Query failed: " . mysqli_error($conn));
            }
            
            $total_records = mysqli_num_rows($rs_result);
            $totalpage = ceil($total_records / $num_rec_per_page); 

            $currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);
            
            if($currentpage == 0) {
                // Do nothing
            } else if($currentpage >= 1 && $currentpage <= $totalpage) {
                if($currentpage > 1 && $currentpage <= $totalpage) {
                    $prev = $currentpage - 1;
                    echo "<li><a href='CompanyDetails.php?page=".$prev."'><</a></li>";
                }
                
                if($totalpage > 1) {
                    $prev = $currentpage - 1;
                    for ($i = $prev + 1; $i <= $currentpage + 2 && $i <= $totalpage; $i++) {
                        echo "<li><a href='CompanyDetails.php?page=".$i."'>".$i."</a></li>";
                    }
                }
                
                if($totalpage > $currentpage) {
                    $nxt = $currentpage + 1;
                    echo "<li><a href='CompanyDetails.php?page=".$nxt."'>></a></li>";
                }

                echo "<li><a>Total Pages: ".$totalpage."</a></li>";
            }
            
            mysqli_close($conn);
            ?> 
            </ul>
          </div>

          <div class="templatemo-flex-row flex-content-row">                      
          
          </div>        
          <footer class="text-right">
            <p>Copyright &copy; 2015 CIT-PMS | Developed by
              <a href="http://znumerique.azurewebsites.net" target="_parent">ZNumerique Technologies</a>
            </p>
          </footer>         
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script src="../js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="../js/templatemo-script.js"></script>      <!-- Templatemo Script -->
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