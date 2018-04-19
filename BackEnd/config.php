<?php

//This is our config file for all php operations.
//This is a one place changes all Config file.

//Database controlls
    //Database connection
    $DataBaseConnection = mysqli_connect('localhost', 'root', '', 'myrealestatedb');
    //Tables in database listed above
    $DataBaseTableUsers = "users";
    //Database values (The values stored in the table of the database initialised above);
    $DatabaseUserID = "userid";
    $DataBaseUsername = "userName";
    $DataBasePassword = "password";

    //Encrypted"SHA1" value to be stored in Database if not already initialised(DB.Init.php is the init file that excecutes these values for the first server start-up...). SELF INITIALIZING :)
    // $UsernameValue = 

   //Cookie Configuration
$CookieConfig = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;

    //Listing folders configuration
$listingDir = "../Listings/Listingsjson/";
$listingImagesDir = "../Listings/Images/";
$allowedEXT = array("jpg", "jpeg", "gif", "png", "tiff");


//Logging System-----------------------------------------------
class Logger{
    public function Logg($LogThis){
        date_default_timezone_set("America/Denver");

            if(isset($_COOKIE['UserName'])){
                $userName = $_COOKIE['UserName'];
            }
            elseif(isset($_POST['UserName'])){
                $userName = $_POST['UserName'];
            }
            else{
                $userName = "Unknown Username";
            }
                $LogFileAppend = fopen("../currentLogFile.txt", "a+");
                fwrite($LogFileAppend, "--->". $userName. "::: " .$LogThis. " Date: ". date("Y/m/d")." Time: ". date("h:i:sa")."\n");
                fclose($LogFileAppend);
    }
}
$Logger = new Logger($LogThis);
//Loggin system END------------------------------------------




//Error Handeling
if($DataBaseConnection == false){
    echo "<script> console.log('Could not Connect to database'); alert('Could NOT Connect to DataBase')</script>";
    $Logger->Logg("Failed to connect to database. Connection ERROR::"+$mysqli->connect_error);
}

?>