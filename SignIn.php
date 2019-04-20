<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<style type="text/css">
		span{
			color: red;
		}
		p{
			margin: 4px;
		}
		div{
			padding: 10px;
		}
		

		span.require{
			color: red;
			font-size: 75%;
		}
		span.horizontal{
			margin-top: 0px;
		}
		form.sign input{
			display: block;
			border-radius: 5px;
			border-width:1px;
			padding:5px;
			text-decoration: none;font-weight: normal;
		}
		
		
		.bt{
        	color:#FFFFFF;
        	font-weight: normal;
        	font-family: Comic Sans MS;
        	padding: 6 6 6 6;
        	border-radius: 5px;
        	border: 1px solid #0e6787;
        	background-color: #0e6787;
        	width:215px;
        	font-weight:bold;
         }

        .bt:hover{
        	color:#ffffff;
        	background-color: #001a66;
        	transition: all .5s ease-out;
        	background-position: left bottom;
        }
        .forgot{
            text-decoration: none;font-weight: normal;font-family: Comic Sans MS;color:#0e6787;
        }
        .forgot:hover{
            color:#001a66;
        	transition: all .5s ease-out;
        	background-position: left bottom;
        }
        .noAccount{
            text-decoration: none;font-weight: normal;font-family: Comic Sans MS;color:#0e6787;
        }
        .noAccount:hover{
            color:#001a66;
        	transition: all .5s ease-out;
        	background-position: left bottom;
        }
		

</style>
</head>
<body style="margin-top: 0px ; margin-right: 0px ; margin-left: 0px;">
    <?php
        include 'header.php';
    ?>
    
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'HospitalManagement';

			$conn = mysqli_connect($host, $user, $pass, $dbname);

			if(!$conn){
				echo mysqli_connct_error();
			}



			$email = $_POST["email"];		
			$pass = $_POST["pass"];
			$Designation= $_POST["designation"];
			
			
			$checkEmail = 1;
			$checkPass = 1;
		

			if(empty($email)){
				$emailErr = "*Required"; 
				$checkEmail = 0;
			}


			if (empty($pass)) {
				$passErr = "*Required";
				$checkPass = 0;	

			}


			//if(isset($checkEmail) && isset($checkPass)){
				if($checkEmail == 1 && $checkPass == 1){
					$sql = "SELECT * FROM `HospitalRegistration` WHERE `Email` = '$email' AND `Password`='$pass' AND `AdminorDoctor`='$Designation'";

					$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result) > 0){
							while($row = $result->fetch_assoc()) {
								$_SESSION["HospitalName1"] =$row['HospitalName'];
						}
							if($Designation=='Admin'){
								echo "<script>
									window.location.assign('AdminSignUpNext.php');
								</script>";
								

							
							$_SESSION["emailIsLoggedIn"] = $email;
							


							
						}else if($Designation=='Doctor'){
							echo "<script>
									window.location.assign('DoctorSignUpNext.php');
								</script>";
								

							
							$_SESSION["emailIsLoggedIn"] = $email;
						}
					
					}else{
						echo "<script>
									alert('wrong email / password/ Designation');
								</script>";
					}
				}
			//}
		}
	?>

	<div style="display: block;text-align: center; background-color:#E7EDEE; margin-top: 50px">
		<fieldset style="width: 150px; margin: auto; padding: 20px; border-radius: 6px;border-color: #F69483; border-width: .5px;  background-color:#FFFFFF">
			<img src="user.png" style="text-align: center; height: 50px; width: 50px;margin-bottom: 30px"><br>
			<form action="" method="post" style="display: inline-block;margin-left: auto;margin-right: auto;text-align: center;" class="sign">
				<input type="text" name="email" placeholder="Email">
				<span class="horizontal"></span>
					<span class="require"><?php if(isset($emailErr)) echo $emailErr."<br>";?></span><br>
				<input type="password" name="pass" placeholder="Password">
				<span class="horizontal"></span>
				 <select name="designation">
  					<option value="Doctor" name="Doctor">Doctor</option>
 					<option value="Admin" name="Admin">Admin</option>
  					<option value="Staffs" name="Staffs">Staffs</option>
  				</select> 
					<span class="require"><?php if(isset($passErr)) echo $passErr."<br>";?></span><br>
				<input type="submit" value="Log In" class="bt"><br>
				<a href="#forgot" class="forgot">Forgot Password?</a><br><br>
				
				<span style="text-decoration: none;font-weight: normal;font-family: Comic Sans MS;color:black">No Account? </span><a href="registration.php" class="noAccount"><b>SIGN UP</b></a>
			</form>
		</fieldset>
		
	</div>
	
	

</body>
</html>