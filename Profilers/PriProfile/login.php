<?php
session_start();
if (isset($_SESSION["priusername"])) {
    // Session is set, user is logged in
} else {
    header("location: index.php");
    exit; // Important: Stop further execution after redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Principal - Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    </head>
<body>
<div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
            <div class="square"></div>
            <?php
            $Welcome = "Welcome";
            echo "<h1>" . $Welcome . "<br>" . $_SESSION['priusername'] . "</h1>";
            ?>
        </header>
        <div class="profile-photo-container">
            <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">
            <div class="profile-photo-overlay"></div>
        </div>
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
                <li><a href="login.php" class="active"><i class="fa fa-home fa-fw" class="active"></i>Dashboard</a></li>
                <li><a href="Students Eligibility.php"><i class="fa fa-bar-chart fa-fw"></i>Check Students Eligibility</a></li>
                <li><a href="queries.php"><i class="fa fa-database fa-fw"></i>Queries</a></li>
                <li><a href="manage-users.php"><i class="fa fa-users fa-fw"></i>Student Details</a></li>
                <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
            </ul>
        </nav>
    </div>
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
            <div class="templatemo-flex-row flex-content-row">
                <div class="templatemo-content-widget white-bg col-2">
                    <i class="fa fa-times"></i>
                    <div class="square"></div>
                    <h2 class="templatemo-inline-block">Welcome to CIT-PMS</h2>
                    <hr>
                    <p>There is a worth for everything so do logging in here. The Use of this is, You can View Student details, Check their Eligibility Criteria and U cvan look up drive details</p>
                    <p><a href="Students Eligibility.php">Check Students Eligibility</a></p>

                    <p><a href="manage-users.php">Student Details</a></p>
                    <p><a href="queries.php">Search any Details about Drives, Company and a Student</a></p>
                </div>
                <div class="templatemo-content-widget white-bg col-1 text-center">
                    <i class="fa fa-times"></i>
                    <h2 class="text-uppercase">Best Project</h2>
                    <h3 class="text-uppercase margin-bottom-10">Design Project</h3>
                    <img src="images/bicycle.jpg" alt="Bicycle" class="img-circle img-thumbnail">
                </div>
                <div class="templatemo-content-widget white-bg col-1">
                    <i class="fa fa-times"></i>
                    <h2 class="text-uppercase">Progress Bar</h2>
                    <h3 class="text-uppercase">Progress</h3>
                    <hr>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                    </div>
                </div>
            </div>
            <div class="templatemo-flex-row flex-content-row">
                <div class="col-1">
                    <div class="templatemo-content-widget orange-bg">
                        <i class="fa fa-times"></i>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                                </a>
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading text-uppercase">Updates</h2>
                                <p>Get the Latest Update about Placement News

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="templatemo-content-widget white-bg">
                        <i class="fa fa-times"></i>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                                </a>
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading text-uppercase">Drive Results</h2>
                                <p>Latest Drive Result Overview</p>
                                <?php
                                $connect = mysqli_connect('localhost', 'root', 'root');
                                mysqli_select_db($connect, 'details');

                                $RESULT = mysqli_query($connect, "SELECT DISTINCT count(CompanyName) from addpdrive where PVenue LIKE '%CIT%' AND YEAR(Date)=YEAR(NOW())");
                                $data = mysqli_fetch_assoc($RESULT);
                                echo "<br><br><h3>Companies In Our Campus In This Year&nbsp:&nbsp";
                                echo $data['count(CompanyName)'];

                                $RESULT = mysqli_query($connect, "SELECT count(Attendence) from updatedrive where Attendence=1 AND YEAR(Date)=YEAR(NOW())");
                                $data = mysqli_fetch_assoc($RESULT);
                                echo "<br><BR>Number of Students Attended In This Year&nbsp:&nbsp";
                                echo $data['count(Attendence)'];

                                $RESULT = mysqli_query($connect, "SELECT count(Placed) from updatedrive where Placed=1 AND YEAR(Date)=YEAR(NOW())");
                                $data = mysqli_fetch_assoc($RESULT);
                                echo "<BR><br>Number of Students Placed In This Year&nbsp:&nbsp";
                                echo $data['count(Placed)'];
                                echo "</h3>";
                                mysqli_close($connect);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                        <i class="fa fa-times"></i>
                        <div class="panel-heading templatemo-position-relative">
                            <h2 class="text-uppercase">HOD List</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Username</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>John</td>
                                    <td>Smith</td>
                                    <td>@jS</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Bill</td>
                                    <td>Jones</td>
                                    <td>@bJ</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Mary</td>
                                    <td>James</td>
                                    <td>@mJ</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Steve</td>
                                    <td>Bride</td>
                                    <td>@sB</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Paul</td>
                                    <td>Richard</td>
                                    <td>@pR</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <footer class="text-right">
                <p>Copyright &copy; 2015 CIT-PMS | Developed by
                    <a href="http://znumerique.azurewebsites.net" target="_parent">ZNumerique Technologies</a>
                </p>
            </footer>
        </div>
    </div>
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="https://www.google.com/jsapi"></script>

<script type="text/javascript" src="js/templatemo-script.js"></script>

</body>
</html>