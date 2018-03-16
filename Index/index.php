<?php 
include('../BackEnd/Login.Controller.php');
include('../BackEnd/DB.init.php');
?>
<!Doctype html>
<html lang="en">
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    
  <!-- Bootstrap JS -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> -->
  <!-- Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
  <!-- Anguular/maybe ajax??? CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <!-- Angular animate -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.js"></script>

  <!-- Linking css files -->
  <link href="main.css" rel="stylesheet">
</head>



<body>
<form action="index.php" method="POST">
  <input type="button" id="loginShowBTN" value="Admin Login"/>
      <div id="loginPanel">
        <ul><label>Username :</label>
          <input type="text" id="loginUsername" name="LoginUsername"/></ul>
        <ul><label>Password :</label>
          <input type="text" id="loginPassword" name="LoginPassword"/></ul>

		  <input type="submit" id="loginUser" name="LoginAdmin"/>
		  <input type="checkbox" id="rememberMe" name="RememberMe" value="true"/>
      </div>
</form>

<script>

$('#loginShowBTN').click( function(){
  // $('#loginPanel').css("display", "none");
  $('#loginPanel').toggle();
});


</script>



</body>


</html>