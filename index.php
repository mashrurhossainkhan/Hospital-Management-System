<?php
    session_start();
    
    /*if(isset($_SESSION["emailIsLoggedIn"])){
        include 'indexWithLoggedIn.php';
    }*/
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <title>Hospital Management System</title>
  
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body >
  <?php
        if(isset($_SESSION["emailIsLoggedIn"])){
            include 'headerLoggedIn.php';
        }
        else{
            include 'header.php';
        }
        
        
        if(isset($_SESSION["emailIsLoggedIn"])){
            include 'home.php';
        }
        else{
            include 'home.php';
        }
        include 'footer.php';
  ?>

</body>
</html>

