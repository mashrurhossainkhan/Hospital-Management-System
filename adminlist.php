
<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    
  <style>
* {
    box-sizing: border-box;
}
.pagination{margin-top:30px;text-align:center}
    .pagination li{display: inline-block; margin:0 5px;}
    .pagination li a{display: inline-block; padding: 8px 12px; border:1px solid black;}
    .pagination li a.active{font-weight:bold; background: red;}
/* Create two equal columns that floats next to each other */
.column {
    float: left;
    margin-top: 30px;
    margin-left: 50px;
    border: 4px solid;
    border-color: #0e6787;
}


/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.seemore{
    background-color: green;
    color: white;
    padding: 5px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}

a{
    text-decoration: none;
}
</style>
    <meta charset="UTF-8">
    <title>Hospital Management System</title>
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: center;
    width: 21%;
    padding: 3px;
}

.img{
    width: 100%;
  height: 300px;
    background-color:#0e6787;
    object-fit: cover;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.seemore{
    background-color: green;
    color: white;
    padding: 5px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}
.grid-container {
          display: grid;
          grid-template-columns: auto auto auto;
          padding: 10px;
          
        }
        .mySlides {display:none;}
        .grid-item {
          font-family: Comic Sans MS;
          border: 1px solid #c3c9cc;
          border-radius: 15px;
          padding: 20px;
          color:#0e6787;
          font-size: 20px;
          margin: 50px;
          text-align: center;
          background-color: #FFFFFF;
        }
            img.logImg{
            height:30px;
            width:30px;
        }
            .sign{
            border: 1px solid #0e6787;
            border-radius: 5px;
            border-width:1px;
            padding:3px;
            text-decoration: none;font-weight: normal;
            width:300px;
        }
        
        
        .bt{
            color:#FFFFFF;
            font-weight: normal;
            font-family: Comic Sans MS;
            border-radius: 5px;
            border: 1px solid #0e6787;
            background-color: #0e6787;
            font-weight:bold;
         }

        .bt:hover{
            color:#ffffff;
            background-color: #001a66;
            transition: all .5s ease-out;
            background-position: left bottom;
        }
</style>
</head>


<body  style="margin-top: 0px ; margin-right: 0px ; margin-left: 0px">
     <?php
        if(isset($_SESSION["emailIsLoggedIn"])){
            include 'headerLoggedIn.php';
        }
        else{
            include 'header.php';
        }
    ?>
    
    <?php
     if(isset($_SESSION["emailIsLoggedIn"])){
         echo "<p style='text-align:right; margin-left:20px'><span class='button'><a href='logout.php'><button style='margin-right: 30px;color:#ffffff;background-color:#000000'>Logout</button></a></span><br></p>";
     }else{
        echo "<p style='text-align: right; margin-left: 20px'><span class='button'><a href='signin.php'><button style='margin-right: 30px;color:#ffffff;background-color:#000000'><img src='user.png' class='logImg'>Log In</button></a></span><br></p>";
     }
    ?>
        <form action="searchresult.php" method="post">
            <center><input class="sign" type="text" name="search" placeholder="Search Here">
            <input type="submit" class="bt" value="search"></center>
        </form>
        <br>

<br><br>

    <div class="row">
    
<?php

            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'hospitalmanagement';

  
    $conn = mysqli_connect($host, $user, $pass, $dbname);
  
  if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        
        if($page==''||$page==1){
            $page1=0;
        }else{
            $page1=($page*12)-12;    
        }
  
$sql = "SELECT * FROM `hospitalregistration` WHERE `AdminorDoctor`='Admin'";
  



 if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $PassIDToClickDiv=$row['ID'];
            echo "<a href='clickdiv.php?ID_Set=$PassIDToClickDiv'>";
            echo "<div class='row'>";
                    echo "<div class='column'>";
                     if(($row['Pic'])!=""){
                echo '<img class="img"; src="data:image/jpeg;base64,' . base64_encode( $row['Pic'] ) . '" />';
                    }else{
                         echo '<img class="img" src="profilepic.png"/>';
                        
                    }
                   
                    echo "<p style='text-align:center;font-family: Comic Sans MS;'>Name:".$row['Name']."</p>";
                    echo "<p style='text-align:center;font-family: Comic Sans MS;'>Number:".$row['Number']."</p>";
                    echo "<p style='text-align:center;font-family: Comic Sans MS;'>Email:".$row['Email']."</p>";
                    echo "<p style='text-align:center;font-family: Comic Sans MS;'>Hospital Name:".$row['HospitalName']."</p>";
                    echo "<p style='text-align:center;font-family: Comic Sans MS;'>Location:".$row['Location']."</p>";
            echo "</a>";
            echo "</div>";
           
        }
        
       
    
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
 echo "<br><br><br>";

   
 
// Close connection
mysqli_close($conn);
    
?>
  </div>
 
    <?php
        include 'pagination.php';
    ?>
<div class="headerfooter" style="margin-top: 30px; margin-bottom: 0px"></div>

<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;


// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "25%";
  }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
<?php
    include 'footer.php';
?>
</body>
</html>

