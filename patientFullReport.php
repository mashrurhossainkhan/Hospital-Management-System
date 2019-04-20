  <!DOCTYPE html>
<html>

<head>

    <title></title>
    <style>
         input[type=text], input[type=password],input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus,input[type=number]:focus{
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
  margin-top: 50px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
    </style>
</head>
<body>
      <?php
            include 'headerAdminSignUp.php';    
        ?>
    <form action="" method="post" style="border:1px solid #ccc">

  <?php
  echo "<br><br><br>";
  echo "<br><br><br>";
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

echo "ID: ";
$sql1 = "SELECT `ID` FROM `patientappointment`";
 if($result1 = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result1) > 0){
      echo "<select name=".'ID'.">";
       echo "<option value=''></option>";
        while($row1 = mysqli_fetch_array($result1)){
            echo "<option value=".$row1['ID'].">".$row1['ID']."</option>";
        }
        echo "</select>";
        mysqli_free_result($result1);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
 echo "<br><br><br>";

mysqli_close($conn);
    
?>
 <button type="submit" name="submit" class="signupbtn">Check</button>
   <br><br><br> 
</form>
<?php
if(isset($_POST["submit"])){
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'hospitalmanagement';

  
    $conn = mysqli_connect($host, $user, $pass, $dbname);
  
   
        $ID=$_POST["ID"];
$sql = "SELECT * FROM `reports` WHERE `PatientID`=$ID";
 if($result1 = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result1) > 0){
     
        while($row1 = mysqli_fetch_array($result1)){
         echo "<p style='text-align:center;font-family: Comic Sans MS;'>Name:".$row1['PatientName']."</p>";
         echo "<p style='text-align:center;font-family: Comic Sans MS;'>ID:".$row1['PatientID']."</p>";
         echo "<p style='text-align:center;font-family: Comic Sans MS;'>Report:".$row1['Report']."</p>";
             echo "<p style='text-align:center;font-family: Comic Sans MS;'>Doctor Name:".$row1['DoctorName']."</p>";
              echo "<p style='text-align:center;font-family: Comic Sans MS;'>Referred Doctor:".$row1['ReferredDoctor']."</p>";
              echo "<p style='text-align:center;font-family: Comic Sans MS;'>medicines:".$row1['medicines']."</p>";

              echo "<br><br><br>";
            }
        mysqli_free_result($result1);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
 echo "<br><br><br>";
}

    
?>

 <?php
      include 'footer.php';  
    ?>
</body>
</html>