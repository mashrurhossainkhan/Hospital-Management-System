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
    if(isset($_POST["submit"])){
        

      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $dbname = 'hospitalmanagement';

      $conn = mysqli_connect($host, $user, $pass, $dbname);

      if(!$conn){
        echo mysqli_connct_error();
      }


      $MedicineName = $_POST["Medicine"];
      
      

      
        
          $sql = "INSERT INTO `medicine`(`name`) VALUES('$MedicineName')";

          if(mysqli_query($conn, $sql)){
            echo "<script>
                  alert('Registered Successfully');
                </script>";

                                //echo "<img src={$image} style='width:1000px;height:1000px'>";
              
          }
          else{
            
          }
        

    
      

      }

    //}
  ?>
<form action="" method="post" style="border:1px solid #ccc; margin-top:30px">
  <div class="container">
    <?php
      include 'DoctorHeader.php';
    ?>
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="Medicine Name"><b>Medicine Name</b></label>
    <input type="text" placeholder="Medicine Name" name="Medicine" required>

   

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