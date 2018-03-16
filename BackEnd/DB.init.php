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



//     $AdminSetup = "SELECT * FROM $DBTableUsers WHERE $DBUsername = ?";
// if($Setupstmt = $DBConn->prepare($AdminSetup)){
//     $Setupstmt->bind_param('s', 'Admin');
//     $Setupstmt->execute();
//     $Setupstmt->store_result();
//     $rows = $Setupstmt->num_rows;

//         if($rows != 0){
//             echo "rows exist";
//         }
//         else{
//                 $AdminInsert = "SELECT * FROM $DBTableUsers WHERE $DBUsername = ?";
//             if($Insertstmt = $DBConn->prepare($AdminInsert)){
//                 $Insertstmt->bind_param('ss', 'Admin', 'primere');
//                 $Insertstmt->execute();
//                 echo "rows created";
//             }
//         }
// }
    



?>