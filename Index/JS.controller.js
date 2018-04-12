
// var submit = document.getEleme


$('#loginShowBTN').click( function(){
  $('#loginPanel').toggle();
});





// var ListingsAPP = angular.module('ListingsAPP', ['ngSanitize']);
// ListingsAPP.controller('ListingInsert', ['$scope', '$http', function($scope, $http){
//     $scope.insertNewListing = function(){
//         var FD = new FormData();
//         // var listingImage = $('#listingImage').val();
//         var listingImage = $scope.Uploader;
//         var listingName = $('#listingName').val();
//         var listingType = $('#listingType').val();
//         var listingBedrooms = $('#listingBedrooms').val();
//         var listingBathrooms = $('#listingBathrooms').val();
//         var listingSize = $('#listingSize').val();
//         var listingLotSize = $('#listingLotSize').val();
//         var listingHeating = $('#listingHeating').val();
//         var listingCooling = $('#listingCooling').val();
//         var listingAppliances = $('#listingAppliances').val();
//         var listingYard = $('#listingYard').val();
//         var listingGarageShed = $('#listingGarageShed').val();
//         var listingAddress = $('#listingAddress').val();
//         var listingPrice = $('#listingPrice').val();
//         var listingReadyDate = $('#listingReadyDate').val();
//         var listingDateBuilt = $('#listingDateBuilt').val();
//         var listingDescription = $('#listingDescription').val();
//         FD.append('listingImage', listingImage);        
//         FD.append('listingName', listingName);
//         FD.append('listingType', listingType);
//         FD.append('listingBedrooms', listingBedrooms);
//         FD.append('listingBathrooms', listingBathrooms);
//         FD.append('listingSize', listingSize);
//         FD.append('listingLotSize', listingLotSize);
//         FD.append('listingHeating', listingHeating);
//         FD.append('listingCooling', listingCooling);
//         FD.append('listingAppliances', listingAppliances);
//         FD.append('listingYard', listingYard);
//         FD.append('listingGarageShed', listingGarageShed);
//         FD.append('listingAddress', listingAddress);
//         FD.append('listingPrice', listingPrice);
//         FD.append('listingReadyDate', listingReadyDate);
//         FD.append('listingDateBuilt', listingDateBuilt);
//         FD.append('listingDescription', listingDescription);


//             $http({
//                 method: 'post',
//                 url: '../BackEnd/functions.php?InsertListing="true"',
//                 data: FD,
//                 headers: {'Content-Type': undefined},
//             }).then(function(response, data){
//                     console.log(response.data);
//                     $('#uploadMessage').text(response.data);
//                 });
//                 alert(listingName);
//     };
// }]);
// //Manually Bootstraping REGISTER SYSTEM app^^^^^^^^^^^^^^^^
// $('ListingsAPP').ready( function() {
//     angular.bootstrap($('#ListingsAPP'), ['ListingsAPP']);
// });







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

        //Custom choose file button event
        $('#preview').click(function() {
            $('#listingImage').click();
        });
