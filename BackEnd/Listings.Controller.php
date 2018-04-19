<?php
include_once('config.php');

    //Listing Dirtectory globals set in Config file.
$listingFolder = $GLOBALS['listingDir'];
$imageFolder = $GLOBALS['listingImagesDir'];
    //Allowed Extentions global set in Config file.
$allowedEXT = $GLOBALS['allowedEXT'];
    //Custom error handler
$uploadError = array();
    //Start of uplaod
if(isset($_POST['listingSubmit'])){
    if($_FILES['listingImage']['size'] > 2){//Checks if image has been selected.
            //Image information variables
        $file = $_FILES['listingImage'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type= $file['type'];
            //The new name of the image.
        $new_name = $_POST['listingName'];
        
            //Extension controls.
        $info = pathinfo($file_name);//Path info in order to get extension info.
        $ext = $info['extension']; //Get the extension of the file.
        $extText = explode('.', $file_name);//Another versoin of file extention.
            //Conversion of listingName into filepath to check if file exists already.
        $file_name_check = $listingDir.basename($listingDir.$new_name.".".$ext);
    //END OF FILE CONFIG
            //Variables of listing info to store in json file.   
        $listingName = $_POST['listingName'];
        $listingType = $_POST['listingType'];

            if(isset($_COOKIE['Admin']) || isset($_SESSION['Admin'])){
                if($_COOKIE['Admin'] == "TRUE" || $_SESSION['Admin'] == "TRUE"){
                    if($file_size > 1073741824*3){
                        array_push($uploadError, "File to large.");
                        echo "<script>alert('Photo size must be smaller then 3 GB!')</script>";
                    }
                    elseif(empty($_POST['listingName'])){
                        array_push($uploadError, "File needs a name.");
                        echo "<script>alert('Please insert photo name.')</script>";
                    }
                    elseif(file_exists($file_name_check)){
                        array_push($uploadError, "Filename already exists.");
                        echo "<script>alert('File name already exists. Please choose another.')</script>";
                    }
                    elseif(!in_array(strtolower(end($extText)), $allowedEXT)){
                        array_push($uploadError, "File type not allowed");
                        echo "<script>alert('File type not allowed')</script>"; 
                    }
                    elseif(count($uploadError) == 0){
                            //Moving image to folder.
                        if(move_uploaded_file($file_tmp, $imageFolder.$new_name.".".$ext)){
                                //Creating json onject.
                            $obj = new stdClass();
                            $obj->image = $new_name.".".$ext;
                            $obj->name = $listingName;
                            $obj->type = $listingType;
                            $myobj = json_encode($obj);
                                    //Insert json object into folder with json file.
                                $writer = fopen($listingFolder.$listingName.".json", "w+");
                                fwrite($writer, $myobj);
                                echo $myobj;
                            echo "<script>alert('File inserted')</script>"; 
                        }
                        else{
                            echo "<script>alert('Failed to upload photo.')</script>";
                        }
                    }
                }
                else{
                    echo "<script>alert('Must be an admin!')</script>";        
                }
            }
            else{
                echo "<script>alert('Must be an admin!')</script>";
                
            }
    }
    else{
        echo "<script>alert('Please choose a cover photo.')</script>";
        
    } 
}





if(isset($_GET['getListings'])){
    $ListingContents = scandir($listingFolder);
        foreach($ListingContents as $Listing){
            $List = @file_get_contents($listingFolder.$Listing, true);
            $Data = json_decode($List, true);
            $Img = $Data['image'];
            $name = $Data['name'];
            $send = array('image'=>$Img, 'name'=>$name);
            $newdata[] = $send;
            
        }
    echo json_encode($newdata);
}






// if(empty($listingImage)){
        //     array_push($uploadError, "Empty file.");
        //     echo "<script>alert('Please select a file to upload.')</script>";
        // }
?>