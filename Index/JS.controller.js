
// var submit = document.getEleme


$('#loginShowBTN').click( function(){
  $('#loginPanel').toggle();
});

    
//Custom choose file button event
$('#preview').click(function() {
    $('#listingImage').click();
});

// $('.collapse').collapse();


var listingDisplay = angular.module('listingDisplayAPP', ['ngSanitize']);
listingDisplay.controller('displayListing', ['$scope', '$http', function($scope, $http){
    $http({
            method: 'post',
            url: '../BackEnd/Listings.Controller.php?getListings="TRUE"',
            // data: FD,
            headers: {'Content-Type': undefined},
        }).then(function(response, data){
                    console.log(response.data);
                    for(i in response.data){
                        $scope.Listings = response.data;
        };
                    // $('#uploadMessage').text(response.data);
            });
}]);
//Manually Bootstraping REGISTER SYSTEM app^^^^^^^^^^^^^^^^
$('listingDisplayAPP').ready( function() {
    angular.bootstrap($('#listingDisplayAPP'), ['listingDisplayAPP']);
});







//Preview image after selection
function filePreview(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            // $('#gallery_upload_container + img').remove();
            $('#preview').append('<img src="'+e.target.result+'" width="230px"; position="relative"; height="220px"; z-index="20"/>');
        };
            reader.readAsDataURL(input.files[0]);
    }
}
    $('#listingImage').change(function(){
        filePreview(this);
    });


