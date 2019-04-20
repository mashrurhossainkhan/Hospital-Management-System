<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
</head>
<body>
<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}

* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
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
</body>
	
<?php
    session_start();
  ?>
  <?php
    if(isset($_POST["submit"])){
        

      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $dbname = 'hospitalmanagement';

      $conn = mysqli_connect($host, $user, $pass, $dbname);

      if(!$conn){
        echo mysqli_connct_error();
      }

    $folder_path = 'Uploading/';

    $filename = basename($_FILES['uploaded_file']['name']);
    $newname = $folder_path . $filename;

    $FileType = pathinfo($newname,PATHINFO_EXTENSION);



      $PatientNameName = $_POST["PatientName"];
      $PatientID = $_POST["PatientID"];
      $Report = $_POST["report"];
      $emailDoctor=$_SESSION["emailIsLoggedIn"];
      $refer = $_POST["select"];
      $medicines=$_POST["selectmed"];
    
       
      
         $sql = "INSERT INTO `reports`(`PatientName`, `PatientID`, `Report`, `DoctorName`, `ReferredDoctor`, `medicines`) VALUES  ('$PatientNameName','$PatientID','$Report','$emailDoctor','$refer','$medicines')";

          if(mysqli_query($conn, $sql)){
            echo "<script>
                  alert('Successful');
                </script>";
          }
          else{
            
          }
        
      }
  ?>
<form action="" method="post" style="border:1px solid #ccc; margin-top:30px">
  <div class="container">
    <?php
      include 'DoctorHeader.php';
    ?>
    <h1>Patient's Report</h1>
    <hr>
    <label for="Patient Name Name"><b>Patient Name</b></label>
    <input type="text" placeholder="Enter Patient's Name" name="PatientName" required>

     <label for="ID"><b>ID</b></label>
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


$sql1 = "SELECT `ID` FROM `patientappointment`";
 if($result1 = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result1) > 0){
      echo "<select name=".'PatientID'.">";
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

<label for="Mediciner"><b>medicine</b></label><br>
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


$sql1 = "SELECT * FROM `medicine`";
 if($result1 = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result1) > 0){
      echo "<select name=".'selectmed'.">";
       echo "<option value=''></option>";
        while($row1 = mysqli_fetch_array($result1)){
            echo "<option value=".$row1['Name'].">".$row1['Name']."</option>";
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
	<label for="report"><b>Report</b></label><br>
    <textarea type="text" rows="10" cols="100" name="report"></textarea><br>

    <label for="Referred Doctor"><b>Any Referred Doctor?</b></label><br>
   
   
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


$emailDoctor=$_SESSION["emailIsLoggedIn"];
$sql1 = "SELECT `HospitalName` FROM `hospitalregistration` WHERE `Email`='$emailDoctor'";
 if($result1 = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result1) > 0){
        while($row = mysqli_fetch_array($result1)){

            $HospitalName=$row['HospitalName'];
        }
      }
    }

$sql = "SELECT * FROM `hospitalregistration` WHERE `AdminorDoctor`='Doctor' AND `HospitalName`='$HospitalName'";
 if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<select name=".'select'.">";
       echo "<option value=''></option>";
        while($row = mysqli_fetch_array($result)){
            echo "<option value=".$row['Name'].">".$row['Name']."</option>";
        }
        echo "</select>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
 echo "<br><br><br>";

mysqli_close($conn);
    
?>

 



<span style="margin-left:5px; color:#0e6787; font-family: Comic Sans MS;">Upload files(optional)</span> <input type="file" name="uploaded_file" style="width:230px">
<div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" class="signupbtn">Submit</button>
    </div>
  </div>
</form>
<?php
  include 'footer.php';
?>
</html>