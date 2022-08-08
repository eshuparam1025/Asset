<?php

//Start the session.
session_start();
if(isset($_SESSION['user'])) header('Location: dashboard.php');

$error_message = "";

    if($_POST){
        include('database/connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE users.email = '$username' AND users.password = '$password'";
        $stmt = $conn->prepare($query);
        $stmt->execute();


        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user  = $stmt->fetchAll()[0];
        $_SESSION['user'] = $user;

        header('Location: dashboard.php');
        }else $error_message = 'Please make sure that username and password are correct.';
        
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>AMS Login-Asset Management Sysytem</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body id="loginbody">
        <!-- error below -->
        <?php if(!empty($error_message)) { ?>
        <div id="errorMessage">
            <strong>ERROR:</strong> <?= $error_message ?></p>
        </div>
        <?php } ?>
        <div class="container">
            <div class="loginHeader">
                <h1>GAMS</h1>
                <p><i>GAIL-Asset Management System</i></p>
            </div>
            <div class="loginBody">
                <form action="AMS.php" method="POST">
                    <div>
                        <label for="loginInputsContainer" ><b>Username</b></label><br>
                        <input type="'text" placeholder="Username" name="username" required/>
                    </div>
                    <div>
                        <label for="loginInputsContainer" ><b>Password</b></label><br>
                        <input type="password"/ placeholder="Password" name="password" required>
                    </div>
                    <div class="loginButtonContainer">
                        <button>Login</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>