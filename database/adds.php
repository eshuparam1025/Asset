<?php
    //Start the Session.
    session_start();
    
    $table_name = $_SESSION['table'];

    $Asset_id = $_POST['Asset_id'];
    $Location = $_POST['Location'];
    $Date_of_Allocation = $_POST['Date_of_Allocation'];
    $Date_of_release = $_POST['Date_of_release'];
    $Asset_Type = $_POST['Asset_Type'];
    $Asset_Description = $_POST['Asset_Description'];
    $Asset_Transfer_From = $_POST['Asset_Transfer_From'];
    $Asset_Transfer_To = $_POST['Asset_Transfer_To'];
    $Transfer_Date = $_POST['Transfer_Date'];
    $STO_Number = $_POST['STO_Number'];
    $Sales_Invoice_Number = $_POST['Sales_Invoice_Number'];
    

   // $sql = "SELECT * FROM `asset`;";

    try{
        $command = "INSERT INTO 
                            $table_name (Asset_id, Location, Date_of_Allocation, Date_of_Release, Asset_type, Asset_Description, Asset_Transfer_From, Asset_Transfer_To, Transfer_Date, STO_Number, Sales_Invoice_Number)
                        VALUES 
                            ('".$Asset_id."', '".$Location."', '".$Date_of_Allocation."', '".$Date_of_release."', '".$Asset_Type."', '".$Asset_Description."', '".$Asset_Transfer_From."', '".$Asset_Transfer_To."', '".$Transfer_Date."', '".$STO_Number."', '".$Sales_Invoice_Number."')";


    include('connections.php');
    $conn->exec($command);
    $response = [
        'success' => true,
        'message' => $Asset_id.' '.$Asset_Type.' has been added to the database.'
    ];
    }catch(PDOException $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }

    $_SESSION['response'] = $response;
    header('Location: ../a-add.php');
    
?>