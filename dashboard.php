<?php
    //Start the Session.
    session_start();
    if(!isset($_SESSION['user'])) header('Location: AMS.php');
   
    $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard-Asset Management Sysytem</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script src="https://kit.fontawesome.com/f211259177.js"></script>
    </head>
    <body>
        <div class="dashboardMainContainer">
            <?php include('Partials/app-sidebar.php') ?>
           
            <div class="dashboard_content_container" id="dashboard_content_container">
                
                <div class="dashboard_topNav">
                    <a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
                    <a href="database/logout.php" id="logoutBtn"><i class="fa fa-power-off"></i> Log-out</a>
                </div>
                <div class="dashboard_content">
                    <div class="dashboard_content_main">

                    </div>
                </div>
            </div>
        </div>

        <script src="js/script.js"></script>
    </body>
</html>