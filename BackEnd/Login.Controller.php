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

    //Creating error upon validation 
$error = array();

//Start of Login Operation
    if(isset($_POST['LoginAdmin'])){
            //Post value Variables
        $userName = $_POST['LoginUsername'];
        $password = $_POST['LoginPassword'];
        
                $LoginQuery = "SELECT * FROM $DBTableUsers WHERE $DBUsername = ? && $DBPassword = ?";
            if($Loginstmt = $DBConn->prepare($LoginQuery)){
                $Loginstmt->bind_param('ss', $userName, $password);
                $Loginstmt->execute();
                $Loginstmt->store_result();
                $rows = $Loginstmt->num_rows;

                        if(empty($userName) OR empty($password)){
                            array_push($error, 'All fields are required ,');
                            echo 'Enter Username and Password.';
                        }
                        elseif($rows == 0){
                            array_push($error, 'No record found ,');                        
                            echo "Wrong Username/Password Combination";                        
                        }
                        elseif($rows != 0 && count($error) == 0){
                                //LOGIN IF NO ERROR--------------------------------------------------------------------------
                            if(!empty($_POST['RememberMe'])){
                                setcookie('Session',       'TRUELY',           time()+3600*24*60, '/', $CookieFix, false);
                                setcookie('Logged-In',     'Logged-In',        time()+3600*24*60, '/', $CookieFix, false);
                                setcookie('User',          $userName,           time()+3600*24*60, '/', $CookieFix, false);
                            }
                            else{
                                $_SESSION['Session']    = 'TRUELY';
                                $_SESSION['Logged-In']  = 'Logged-In';
                                $_SESSION['User']       = $userName;
                            }
                        }
                        
                        
            }
            else{

            }
    }






// $DataBaseConnection = mysqli_connect('localhost', 'root', '', 'myrealestatedb');
// //Tables in database listed above
// $DataBaseTableUsers = "users";
// //Database values (The values stored in the table of the database initialised above);
// $DatabaseUserID = "userid";
// $DataBaseUserName = "userName";
// $DataBasePassword = "password";

?>