<?php
require_once('/config.php');

    //Database connection
$DBConn = $GLOBALS['DataBaseConnection'];
    //Cookie configuration to work on both private and live servers(Supposedly)
$CookieConfig = $GLOBALS['CookieConfig'];
    //DstaBase Globals
$DBTableUsers =   $GLOBALS['DataBaseTableUsers'];
$DBUsername =   $GLOBALS['DataBaseUsername'];
$DBPassword =   $GLOBALS['DataBasePassword'];

$Account = "Admin";
$Password = "real";


    $AdminSetup = "SELECT * FROM $DBTableUsers WHERE $DBUsername = ?";
if($Setupstmt = $DBConn->prepare($AdminSetup)){
    $Setupstmt->bind_param('s', $Account);
    $Setupstmt->execute();
    $Setupstmt->store_result();
    $rows = $Setupstmt->num_rows;

        if($rows != 0){
            return;
        }
        else{
                $AdminInsert = "Insert INTO $DBTableUsers($DBUsername, $DBPassword) VALUES(?, ?)";
            if($Insertstmt = $DBConn->prepare($AdminInsert)){
                $Insertstmt->bind_param('ss', $Account, $Password);
                $Insertstmt->execute();
                echo "<script>window.alert('Database Initialised</script>";
            }
        } 
}
    



?>