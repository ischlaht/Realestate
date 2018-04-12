<?php
include_once('config.php');
// if(isset($_GET['InsertListing'])){


    //Listing Dirtectory globals set in Config file.
$listingFolder = $GLOBALS['listingDir'];
$imageFolder = $GLOBALS['listingImagesDir'];
    //Allowed Extentions global set in Config file.
$allowedEXT = $GLOBALS['allowedEXT'];
    //Custom error handler
$uploadError = array();

if(isset($_POST['listingSubmit'])){
    if($_FILES['listingImage']['size'] > 2){
        $file = $_FILES['listingImage'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type= $file['type'];
        $new_name = $_POST['listingName'];
        
        
        $info = pathinfo($file_name);
        $ext = $info['extension']; // get the extension of the file.
        $extText = explode('.', $file_name);//another versoin of file extention.
        
        $file_name_check = $listingDir.basename($listingDir.$new_name.".".$ext);
        $ListingI = $_FILES['listingImage'];
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
                        if(move_uploaded_file($file_tmp, $imageFolder.$new_name.".".$ext)){
                            $obj = new stdClass();
                            $obj->image = $new_name.".".$ext;
                            $obj->name = $listingName;
                            $obj->type = $listingType;
                            $myobj = json_encode($obj);

                                $writer = fopen($listingFolder.$listingName.".json", "w");
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


// $obj = '{"ListingImage": $_POST['listingImage'], "name": "isaac", "age": "24"}';










// if(empty($listingImage)){
        //     array_push($uploadError, "Empty file.");
        //     echo "<script>alert('Please select a file to upload.')</script>";
        // }
?>