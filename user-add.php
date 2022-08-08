<?php
    //Start the Session.
    session_start();
    if(!isset($_SESSION['user'])) header('Location: AMS.php');
   $_SESSION['table'] = 'users';
   $user = $_SESSION['user'];
   $users = include('database/show-users.php');

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

                            <h1 class="head"><i class="fa fa-plus"></i> Insert User</h1>
                            <div id="userAddFormContainer">
                             <form action="database/add.php" method="POST" class="appForm" >                            
                                    <div class="appFormInputContainer">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="appFormInput" name="first_name" id="first_name" placeholder="First Name" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="appFormInput" name="last_name" id="last_name" placeholder="Last Name" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="email">Email</label>
                                        <input type="text" class="appFormInput" name="email" id="email" placeholder="Email" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="password">Password</label>
                                        <input type="password" class="appFormInput" name="password" id="password" placeholder="Password" />
                                    </div>
                                                
                                    <button type="submit" class="appBtn"><i class="fa fa-plus"></i> Add User</button>
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
                            <h1 class="head"><i class="fa fa-list"></i>  List Of Users</h1>
                            <div class="section_content">
                                <div class="users">
                                    
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($users as $index => $user) { ?>
                                                <tr>
                                                    <td><?= $index +1 ?></td>
                                                    <td><?= $user['First_Name'] ?></td>
                                                    <td><?= $user['Last_Name'] ?></td>
                                                    <td><?= $user['Email'] ?></td>
                                                    <td><?= $user['Created_at'] ?></td>
                                                    <td><?= $user['Updated_at'] ?></td>
                                                    <!-- <td>
                                                        <a href=""><i class="fa fa-edit"></i>Edit</a>
                                                        <a href="" class="deleteUser" data-userid ="<?= $user['id']?>" data-fname ="<?= $user['First_Name']?>" data-lname ="<?= $user['Last_Name']?>"><i class="fa fa-trash"></i>Delete</a>
                                                    </td> -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <p class="userCount"><?= count($users) ?> Users</p>
                                </div>
                            </div>


                        </div>
                    </div>
                        
                    </div>
                    

                   
                </div>
            </div>
        </div>

        <script src="js/script.js"></script>
        <!-- <script>
            function script(){

                this.initialize = function(){
                    this.registerEvents();
                },

                this.registerEvents = function(){
                    document.addEventListener('click', function(e){
                        targetElement = e.target;
                        classList = e.target.classList;

                        if(classList.contains('deleteUser')){
                            e.preventDefault();
                            userId = targetElemenet.dataset.userid;
                            fname = targetElement.dataset.fname;
                            lname = targetElement.dataset.lname;
                            fullNname = fname + ' ' + lname;

                            if(window.confirm('Are you sure to delete ' + fullNname +'?')){
                            }

                            }else{
                                console.log('will not delete');
                            }
                        }
                    });
                }
            }
            var script = new script;
            script.initialize();
        </script> -->
    </body>
</html>