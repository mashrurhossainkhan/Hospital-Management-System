<!DOCTYPE html>
<html>

<head>

  <title>Billing</title>
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
    if(isset($_POST["submit"])){
        

      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $dbname = 'hospitalmanagement';

      $conn = mysqli_connect($host, $user, $pass, $dbname);

      if(!$conn){
        echo mysqli_connct_error();
      }


      $Name = $_POST["Name"];
      $ID = $_POST["ID"];
      $number = $_POST["PhoneNumber"];
      $email=$_POST["email1"];
      $DoctorPayment=$_POST["DoctorPayment"];
       $MedicineCost=$_POST["MedicineCost"];
      $CabinCost=$_POST["CabinCost"];
       $OTCost=$_POST["OTCost"];
      $IcuCost=$_POST["IcuCost"];
       $TestCost=$_POST["TestCost"];
      $OtherCost=$_POST["OtherCost"];
      $CarCost=$_POST["AmbulanceCost"];
      $AdminName=$_SESSION["emailIsLoggedIn"];
      $HospitalName=$_SESSION["HospitalName1"];
     
      

      
         $sql = "INSERT INTO `bill`(`PatientName`, `ID`, `PhoneNumber`, `Email`, `DoctorPayment`, `MedicineCost`, `CabinCost`, `OTCost`, `IcuCost`, `TestCost`, `Others`, `CarCost`, `AdminName`, `HospitalName`) VALUES('$Name','$ID','$number','$email','$DoctorPayment','$MedicineCost','$CabinCost','$OTCost','$IcuCost','$TestCost','$OtherCost','$CarCost','$AdminName','$HospitalName')";

          if(mysqli_query($conn, $sql)){
            echo "<script>
                  alert('Registered Successful');
                </script>";

                                //echo "<img src={$image} style='width:1000px;height:1000px'>";
              
          }
          else{
             echo "<script>
                  alert('Registered failed');
                </script>";
          }
        

    
      

      }

    //}
  ?>
<form action="" method="post" style="border:1px solid #ccc; margin-top:30px">
  <div class="container">
    <?php
      include 'headerAdminSignUp.php';
    ?>
    <h1 style="margin-top:100px">BILLING</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="Patient Name"><b>Patient Name</b></label>
    <input type="text" placeholder="Enter  Name" name="Name" required>

    <label for="ID"><b>ID</b></label>
    <input type="number" placeholder="ID" name="ID" required>

     <label for="Phone Number"><b> Phone Number</b></label>
    <input type="number" placeholder="Enter Phone Number" name="PhoneNumber" required>


    <label for="email1"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email1">

    <label for="Doctor payment"><b>Doctor's Payment</b></label>
    <input type="text" placeholder="Doctor's payment" name="DoctorPayment">

    <label for="MedicineCost"><b>Medicine Cost</b></label>
    <input type="text" placeholder="Medicine Cost" name="MedicineCost">

    <label for="CabinCost"><b>Cabin Cost</b></label>
    <input type="text" placeholder="Cabin Cost" name="CabinCost">


    <label for="OTCost"><b>OT Cost</b></label>
    <input type="text" placeholder="OT Cost" name="OTCost">


    <label for="ICU"><b>ICU/CCU Cost</b></label>
    <input type="text" placeholder="ICU/CCU Cost" name="IcuCost">

    <label for="TestCost"><b>Test Cost</b></label>
    <input type="text" placeholder="Test Cost" name="TestCost">


    <label for="Others"><b>Other Cost</b></label>
    <input type="text" placeholder="Other Cost" name="OtherCost">

    <label for="CarCost"><b>Ambulance Cost</b></label>
    <input type="text" placeholder="Ambulance Cost" name="AmbulanceCost">

 

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" class="signupbtn">Create Bill</button>
    </div>
  </div>
</form>
<?php
  include 'footer.php';
?>

</body>
</html>