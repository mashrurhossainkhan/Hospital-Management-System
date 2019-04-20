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
  session_start();
?>
   <?php
   if(isset($_SESSION['emailIsLoggedIn'])){
      include 'headerAdminSignUp.php';  
      }else{
        include 'header.php';  
      }
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


			$name = $_POST["name"];
			$number = $_POST["number"];
			$email = $_POST["email"];
			$assigndoctor = $_POST["AssignDoctor"];
			$HospitalName=$_POST["HospitalName"];
			$DepartmentNamne=$_POST["DepartmentName"];
			//image
			
			

			
				
					$sql = "INSERT INTO `PatientAppointment`(`Name`, `Number`, `Email`, `AssignDoctor`, `HospitalName`, `DepartmentName`) VALUES  ('$name','$number','$email','$assigndoctor','$HospitalName', '$DepartmentNamne')";

					if(mysqli_query($conn, $sql)){
						echo "<script>
									alert('Appointment submitted Successfully');
								</script>";

                                //echo "<img src={$image} style='width:1000px;height:1000px'>";
							
					}
					else{
						
					}
				

		
			

			}

		//}
	?>

<form action="" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="Patient Name"><b>Patient Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

     <label for="Phone Number"><b>Patient Phone Number</b></label>
    <input type="number" placeholder="Enter Phone Number" name="PhoneNumber" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="Assign Doctor"><b>Appointment for a Doctor</b></label>
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


$sql1 = "SELECT DISTINCT `Name` FROM `hospitalregistration` WHERE `AdminorDoctor`='Doctor' ";
 if($result1 = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result1) > 0){
      echo "<select name=".'AssignDoctor'.">";
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
 <label for="Hospital Name"><b>Hospital Name</b></label>
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


$sql1 = "SELECT DISTINCT `HospitalName` FROM `hospitalregistration` ";
 if($result1 = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result1) > 0){
      echo "<select name=".'HospitalName'.">";
       echo "<option value=''></option>";
        while($row1 = mysqli_fetch_array($result1)){
            echo "<option value=".$row1['HospitalName'].">".$row1['HospitalName']."</option>";
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
<label for="Department Name"><b>Department Name</b></label>
    <input type="text" placeholder="Department Name " name="DepartmentName">
<label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

 <?php
      include 'footer.php';  
    ?>
</body>
</html>