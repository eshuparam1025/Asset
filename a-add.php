<?php
    //Start the Session.
    session_start();
    if(!isset($_SESSION['user'])) header('Location: AMS.php');
   $_SESSION['table'] = 'assets';                                        // Asset database 
   $user = $_SESSION['user'];


    $user = $_SESSION['user'];
   // $asset = $_SESSION['asset'];
   $assets = include('database/show-assets.php');

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
                <?php include('Partials/app-topnav.php') ?>
                <div class="dashboard_content">
                    <div class="dashboard_content_main">             
                    <div class="row">
                        <div class="column column-5">

                            <h1 class="head"><i class="fa fa-plus"></i> Insert Asset</h1>
                            <div id="userAddFormContainer">

                        <form action="database/adds.php" method="POST" class="appForm" > 
                                                      
                                <div class="appFormInputContainer">
                                    <label for="Asset_id">Asset_ID</label>
                                    <input type="number" class="appFormInput" name="Asset_id" id="Asset_id" placeholder="Asset_ID" />
                                </div>
                                <div class="appFormInputContainer">
                                    <label for="Location">Location</label>
                                    <input type="text" class="appFormInput" name="Location" id="Location" placeholder="Location" />
                                </div>
                                <div class="appFormInputContainer">
                                    <label for="Date_of_Allocation">Date_of_Allocation</label>
                                    <input type="date" class="appFormInput" name="Date_of_Allocation" id="Date_of_Allocation" placeholder="Date_of_Allocation" />
                                </div>
                                <div class="appFormInputContainer">
                                    <label for="Date_of_release">Date_of_release</label>
                                    <input type="date" class="appFormInput" name="Date_of_release" id="Date_of_release" placeholder="Date_of_release" />
                                </div>

                                <div class="appFormInputContainer">
                                    <label for="Asset_Type">Asset_Type</label>
                                    <input type="text" class="appFormInput" name="Asset_Type" id="Asset_Type" placeholder="Asset_Type" />
                                </div>
                                <div class="appFormInputContainer">
                                    <label for="Asset_Description">Asset_Description</label>
                                    <input type="text" class="appFormInput" name="Asset_Description" id="Asset_Description" placeholder="Asset_Description" />
                                </div>


                                <div class="appFormInputContainer">
                                    <label for="Asset_Transfer_From">Asset_Transfer_From</label>
                                    <input type="text" class="appFormInput" name="Asset_Transfer_From" id="Asset_Transfer_From" placeholder="Asset_Transfer_From" />
                                </div>
                                <div class="appFormInputContainer">
                                    <label for="Asset_Transfer_To">Asset_Transfer_To</label>
                                    <input type="text" class="appFormInput" name="Asset_Transfer_To" id="Asset_Transfer_To" placeholder="Asset_Transfer_To" />
                                </div>

                                <div class="appFormInputContainer">
                                    <label for="Transfer_Date">Transfer_Date</label>
                                    <input type="date" class="appFormInput" name="Transfer_Date" id="Transfer_Date" placeholder="Transfer_Date" />
                                </div>


                                <div class="appFormInputContainer">
                                    <label for="STO_Number">STO_Number</label>
                                    <input type="number" class="appFormInput" name="STO_Number" id="STO_Number" placeholder="STO_Number" />
                                </div>
                                <div class="appFormInputContainer">
                                    <label for="Sales_Invoice_Number">Sales_Invoice_Number</label>
                                    <input type="number" class="appFormInput" name="Sales_Invoice_Number" id="Sales_Invoice_Number" placeholder="Sales_Invoice_Number" />
                                </div>
                               
                                 
                                <button type="submit" class="appBtn"><i class="fa fa-plus"></i> Add Asset</button>
                            </form>
                            <?php 
                                if(isset($_SESSION['response'])) { 
                                    $response_message = $_SESSION['response']['message'];
                                    $is_success = $_SESSION['response']['success'];
                            ?>
                                <div class="responseMessage">
                                    <p class="responseMessage <?= $is_success ? 'responseMessage_success' : 'responseMessage_error' ?>">
                                        <?= $response_message?>
                                    </p>
                                </div>
                            <?php unset($_SESSION['response']); } ?>

                    </div>
                            
                            
                        </div>
                        <div class="column column-7">
                            <h1 class="head"><i class="fa fa-list"></i>  List Of Assets</h1>
                            <div class="section_content">
                                <div class="users">
                                    
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ASSET ID</th>
                                                <th>LOCATION</th>
                                                <th>DATE OF ALLOCATION</th>
                                                <th>DATE OF RELEASE</th>
                                                <th>ASSET TYPE</th>
                                                <th>ASSET DESCRIPTION</th>
                                                <th>ASSET TRANSFER FROM</th>
                                                <th>ASSET TRANSFER TO</th>
                                                <th>TRANSFER DATE</th>
                                                <th>STO NUMBER</th>
                                                <th>SALES INVOICE NUMBER</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($assets as $index => $asset) { ?>                    
                                                <tr>
                                                    <td><?= $index +1 ?></td>
                                                    <td><?= $asset['Asset_id'] ?></td>
                                                    <td><?= $asset['Location'] ?></td>
                                                    <td><?= $asset['Date_of_Allocation'] ?></td>
                                                   <td><?= $asset['Date_of_Release'] ?></td>
                                                    <td><?= $asset['Asset_Type'] ?></td>
                                                    <td><?= $asset['Asset_Description'] ?></td>
                                                    <td><?= $asset['Asset_Transfer_From'] ?></td>
                                                   <td><?= $asset['Asset_Transfer_To'] ?></td>
                                                    <td><?= $asset['Transfer_Date'] ?></td>
                                                    <td><?= $asset['STO_Number'] ?></td>
                                                    <td><?= $asset['Sales_Invoice_Number'] ?></td>
                                                  
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <p class="assetCount"><?= count($assets) ?> Assets</p>                           
                                </div>
                            </div>


                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/script.js"></script>
    </body>
</html>