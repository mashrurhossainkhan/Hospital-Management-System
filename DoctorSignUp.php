<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		* {box-sizing: border-box}
/* Full-width input fields */
  input[type=text], input[type=password], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
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

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
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
	<title>Sign Up</title>
</head>
<body>
  <?php
    session_start();
  ?>
    <?php
      include 'headerAdminSignUp.php';  
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


      $name = $_POST["name1"];
      $number = $_POST["PhoneNumber1"];
      $email = $_POST["email1"];
      $designation = $_POST["designation1"];
      $time1=$_POST["time1"];
      $time2=$_POST["time2"];
      $password= $_POST["psw1"];
      $cpassword=$_POST["pswrepeat1"];
      $HospitalName=$_SESSION["HospitalName1"];
      //image
      
      if($password==$cpassword){
        $sql = "INSERT INTO `HospitalRegistration`(`Name`, `Password`, `Number`, `Email`, `HospitalName`, `time1`, `time2`, `designation`, `AdminorDoctor`) VALUES ('$name','$password','$number','$email','$HospitalName', '$time1' ,'$time2','$designation', 'Doctor')";
      }else{
        echo "password does not match";
      }
          if(mysqli_query($conn, $sql)){

            echo "<script>
                  alert(' submitted Successfully');
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
    <label for="Name"><b>Doctor Name</b></label>
    <input type="text" placeholder="Enter Doctor Name" name="name1" required>

     <label for="Phone Number"><b>Phone Number</b></label>
    <input type="number" placeholder="Enter Phone Number" name="PhoneNumber1" required><br>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email1" required>

    <label for="Designamtion"><b>Doctor's Designation</b></label>
    <input type="text" placeholder="Doctor's designation" name="designation1" required>
 <label for="time"><b>Time</b></label>From
    <input type="number" placeholder="from" name="time1" required>to
    <input type="number" placeholder="to" name="time2" required>
<label for="Password"><b>Password</b></label>
    
    <input type="password" placeholder="Password" name="psw1">
<label>
  <label for="Passwordrep"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="pswrepeat1">
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