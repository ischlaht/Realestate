

<?php 
include('../BackEnd/Login.Controller.php');
include('../BackEnd/DB.init.php');
include('../BackEnd/functions.php');
?>


<!Doctype html>
<html lang="en">


<head>
    <title>Real Estate</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="../Lib/Bootstrap/node_modules/bootstrap/dist/css/bootstrap.css"/>
            <!-- Bootstrap JS -->
            <link href="../Lib/Bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"/>    
            <!-- jQuery-->
            <script src="../Lib/JQuery/JMain/node_modules/jquery/dist/jquery.js"></script> 
            <!-- Anguular Main-->
            <script src="../Lib/Angular/Ng-Main/node_modules/angular/angular.js"></script>
            <!-- Anguilar Sanatize-->
            <script src="../Lib/Angular/Ng-Sanitize/node_modules/angular-sanitize/angular-sanitize.js" type="text/javascript"></script>  
            <!-- Angular Animate -->
            <script src="../Lib/Angular/Ng-Animate/node_modules/angular-animate/angular-animate.js"></script>
            
        <!-- Linking css files -->
        <link href="main.css" rel="stylesheet">
</head>



<body>

        <!-- Login System -->
    <form action="index.php" enctype="multipart/form-data" method="POST">
    <input type="button" id="loginShowBTN" value="Admin Login"/>
        <div id="loginPanel">
            <ul><label>Username :</label>
            <input type="text" id="loginUsername" name="LoginUsername"/></ul>
            <ul><label>Password :</label>
            <input type="text" id="loginPassword" name="LoginPassword"/></ul>

            <input type="submit" id="loginUser" name="LoginAdmin"/>
            <input type="checkbox" id="rememberMe" name="RememberMe" value="true"/>
        <input type="button" id="DBInitBTN" name="DBInit" value="Initialise Database"/>
        </div>
    </form>


        <!-- New Listing System -->
    <div id="ListingsAPP"><!-- //Bootstrapped NG-APP -->
        <form method="POST" action="index.php" enctype="multipart/form-data" ng-Controller="ListingInsert">
            <div id="preview"><center>Choose Cover Photo</center></div>

    <input type="submit" name="listingSubmit" ng-click="insertNewListing()" id="listingSubmit"/>
    <div id="uploadMessage" style="color: black"></div>
                <input type="file" name="listingImage" id="listingImage" hidden/>
                    <label>Listing Name</label>
                        <input type="text" name="listingName" id="listingName" class="form-control"/>
                    <label>Listing Type (House, Apartment, etc)</label>
                        <input type="text" name="listingType" id="listingType" class="form-control"/>                
                    <label>Number of Bedrooms</label>
                        <input type="text" name="listingBedrooms" id="listingBedrooms" class="form-control"/>    
                    <label>Number of Bathrooms</label>    
                        <input type="text" name="listingBathrooms" id="listingBathrooms" class="form-control"/> 
                    <label>Home Size in Square Feet</label>   
                        <input type="text" name="listingSize" id="listingSize" class="form-control"/>  
                    <label>Lot Size</label> 
                        <input type="text" name="listingLotSize" id="listingLotSize" class="form-control"/>                             
                    <label>Heating (Electric, Gas, Fireplace, Wood Stove, etc)</label>
                        <textarea name="listingHeating" id="listingHeating" class="form-control" cols="auto" rows="2"></textarea>  
                    <label>Cooling</label>  
                        <textarea name="listingCooling" id="listingCooling" class="form-control" cols="auto" rows="2"></textarea>                          
                    <label>Included Appliances</label>
                        <textarea name="listingAppliances" id="listingAppliances" class="form-control" cols="auto" rows="3"></textarea>                  
                    <label>Yard Description</label>                   
                        <textarea name="listingYard" id="listingYard" class="form-control" cols="auto" rows="2"></textarea>
                    <label>Garage and Shed Description</label>
                        <textarea name="listingGarageShed" id="listingGarageShed" class="form-control" cols="auto" rows="2"></textarea>                
                    <label>Address</label>
                        <textarea name="listingAddress" id="listingAddress" class="form-control" rows="3" cols="auto"></textarea>
                    <label>Price</label>
                        <input type="text" name="listingPrice" id="listingPrice" class="form-control"/>
                    <label>Ready Date</label>       
                        <input type="text" name="listingReadyDate" id="listingReadyDate" class="form-control"/>              
                    <label>Date Built</label>
                        <input type="text" name="listingDateBuilt" id="listingDateBuilt" class="form-control"/>           
                    <label>Extra Description</label>			
                        <textarea name="listingDescription" id="listingDescription" class="form-control" rows="4" cols="auto"></textarea>
                    <label for="This is just for a border"></label>
            </div>
        </form>

<script src="JS.controller.js"></script>


</body>


</html>