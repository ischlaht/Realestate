<?php 
include('../BackEnd/Login.Controller.php');
include('../BackEnd/DB.init.php');
include('../BackEnd/Listings.Controller.php');
?>

<!Doctype html>
<html lang="en">


<head>
    <title>Real Estate</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- jQuery-->
            <script src="../Lib/Bootstrap/node_modules/jquery/dist/jquery.js"></script> 
            <!-- Bootstrap tether for bootstrp 4 requirements -->
            <script src="../Lib/Bootstrap/node_modules/tether/dist/js/tether.js"></script>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="../Lib/Bootstrap/node_modules/bootstrap/dist/css/bootstrap.css"/>
            <!-- Bootstrap JS -->
            <script src="../Lib/Bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>  
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


            <!-- <div id="uploadMessage" style="color: black"></div> -->
        <!-- New Listing System -->
<button type="button" id="showNewListingBTN" class="btn btn-primary btn-md" data-toggle="collapse" data-target="#ListingsAPP">New Listing</button>
    <div id="ListingsAPP" class="panel-collapse collapse"><!-- //Bootstrapped NG-APP -->
        <form method="POST" action="index.php" enctype="multipart/form-data">
            <ul>Upload New Listing</ul>
            <div id="preview" data-toggle="tooltip" title="Click to select cover photo"><center>*Choose Cover Photo</center></div>
                <input type="file" name="listingImage" id="listingImage" hidden/>
                    <label style="margin-top: 20px;">* Listing Name</label>
                        <input type="text" name="listingName" id="listingName" class="form-control" placeholder="Name/Title of listing" value="<?php if(isset($_POST['listingName'])){echo $_POST['listingName'];}?>"/>
                    <label>*Listing Type</label>
                        <input type="text" name="listingType" id="listingType" class="form-control" placeholder="House/Apartment/Town-House/etc" value="<?php if(isset($_POST['listingType'])){echo $_POST['listingType'];}?>"/>                
                    <label>Home Size</label>   
                        <input type="text" name="listingSize" id="listingSize" class="form-control" placeholder="Size of the inside" value="<?php if(isset($_POST['listingSize'])){echo $_POST['listingSize'];}?>"/>  
                        <input type="text" name="listingLotSize" id="listingLotSize" class="form-control" placeholder="Size of the lot/property" value="<?php if(isset($_POST['listingLotSize'])){echo $_POST['listingLotSize'];}?>" style="margin-top: 5px; margin-bottom: 5px;"/>                             
                        <input type="text" name="listingBedrooms" id="listingBedrooms" class="form-control" placeholder="How many bedrooms" value="<?php if(isset($_POST['listingBedrooms'])){echo $_POST['listingBedrooms'];}?>" style="margin-top: 5px; margin-bottom: 5px;"/>    
                        <input type="text" name="listingBathrooms" id="listingBathrooms" class="form-control" placeholder="How many bathrooms" value="<?php if(isset($_POST['listingBathrooms'])){echo $_POST['listingBathrooms'];}?>"/> 
                    <label>Heating</label>
                        <textarea name="listingHeating" id="listingHeating" class="form-control" cols="auto" rows="2" placeholder="Forced Air, Electric, Gas, Fireplace, Wood Stove, etc" ><?php if(isset($_POST['listingHeating'])){echo $_POST['listingHeating'];}?></textarea>  
                    <label>Cooling</label>  
                        <textarea name="listingCooling" id="listingCooling" class="form-control" cols="auto" rows="2" placeholder="Evaporative Cooler, HVAC, etc"><?php if(isset($_POST['listingCooling'])){echo $_POST['listingCooling'];}?></textarea>                          
                    <label>Included Appliances</label>
                        <textarea name="listingAppliances" id="listingAppliances" class="form-control" cols="auto" rows="3" placeholder="Washer/Dryer, Dishwasher, etc"><?php if(isset($_POST['listingAppliances'])){echo $_POST['listingAppliances'];}?></textarea>                  
                    <label>Yard Details</label>                   
                        <textarea name="listingYard" id="listingYard" class="form-control" cols="auto" rows="2" placeholder="Fenced, Size, Grass, Dirt, etc"><?php if(isset($_POST['listingYard'])){echo $_POST['listingYard'];}?></textarea>
                    <label>Garage and Shed Details</label>
                        <textarea name="listingGarageShed" id="listingGarageShed" class="form-control" cols="auto" rows="2" placeholder="Garage and Shed details"><?php if(isset($_POST['listingGarageShed'])){echo $_POST['listingGarageShed'];}?></textarea>                
                    <label>Address</label>
                        <textarea name="listingAddress" id="listingAddress" class="form-control" rows="3" cols="auto" placeholder="State, City, Zip Code, Street, Number, etc"><?php if(isset($_POST['listingAddress'])){echo $_POST['listingAddress'];}?></textarea>
                    <label>Price/Rent </label>
                        <textarea name="listingPrice" id="listingPrice" class="form-control" rows="3" cols="auto" placeholder="Price of home or monthly rent"><?php if(isset($_POST['listingPrice'])){echo $_POST['listingPrice'];}?></textarea>
                    <label>Finance Details</label>
                        <textarea name="listingFinanceDetails" id="listingFinanceDetails" class="form-control" cols="auto" rows="2" placeholder="Financing info important to this home"><?php if(isset($_POST['listingFinanceDetails'])){echo $_POST['listingFinanceDetails'];}?></textarea>
                    <label>Ready Date</label>       
                        <input type="text" name="listingReadyDate" id="listingReadyDate" class="form-control" placeholder="Date new tenant can move in" value="<?php if(isset($_POST['listingReadyDate'])){echo $_POST['listingReadyDate'];}?>"/>              
                    <label>Date Built</label>
                        <input type="text" name="listingDateBuilt" id="listingDateBuilt" class="form-control" placeholder="Date the home was built" value="<?php if(isset($_POST['listingDateBuilt'])){echo $_POST['listingDateBuilt'];}?>"/>           
                    <label>Extra Description</label>			
                        <textarea name="listingExtraDescription" id="listingExtraDescription" class="form-control" rows="4" cols="auto" placeholder="Any other important details/ description of home" data-toggle="tooltip" title="Use this for any extra information you feel is necessary."><?php if(isset($_POST['listingExtraDescription'])){echo $_POST['listingExtraDescription'];}?></textarea>
                    <label for="This is just for a border"></label>
                <input type="submit" name="listingSubmit" id="listingSubmit" data-toggle="tooltip" title="Click to upload new listing."/>
        </form>
    </div>


<div id="listingDisplayAPP" ng-model="Listings" ng-controller="displayListing">
    <div ng-repeat="x in Listings track by $index">
    <!-- Checks if image is null before displaying to avoid the first 2 empty foolders showing as null -->
        <div ng-if="x.image != null">
            <img src="../Listings/Images/{{x.image}}" style="width: 100px; height: 100px;"/>
                {{x.name}}
                <!-- {{x.type}} -->
        </div>
    </div>
</div>

<script src="JS.controller.js"></script>
</body>


</html>