<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    
    <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 1000px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
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



.img{
    margin-left:20px;
    margin-top:50px;
    width: 30%;
    height:50%;
    padding: 5px;

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
		

</style>
</head>

<body style="margin-top: 0px ; margin-right: 0px ; margin-left: 0px; width: 100%;">
    

 <?php
        global $var;
        if(isset($_SESSION["emailIsLoggedIn"])){
            include 'DoctorHeader.php';
        }
        
    if(isset($_SESSION["emailIsLoggedIn"])){
            if(isset($_GET["ID_Set"])){
                    $var = $_GET["ID_Set"];
       
 	              

        
		 	$host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'hospitalmanagement';

  
    $conn = mysqli_connect($host, $user, $pass, $dbname);
  
  
  
$sql = "SELECT * FROM `reports` WHERE `PatientID`=$var" ;
  



 if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
        	
    		       echo "<div class='card'>";
    		        if(($row['Pic'])!=""){
				echo '<img class="img"; src="data:image/jpeg;base64,' . base64_encode( $row['Pic'] ) . '" />';
    		        }else{
    		             echo '<img class="img" src="message.png"/>';
    		            
    		        }
    		 
    		 echo "<p style='text-align:center;font-family: Comic Sans MS;'>Patient Name".$row['PatientName']."</p>";
    		     
    		        echo "<p style='text-align:center;font-family: Comic Sans MS;'>Report:".$row['Report']."</p>"; 
    		  
 					echo "<p style='text-align:center;font-family: Comic Sans MS;'>Doctor Name: ".$row['DoctorName']."</p>";
 					echo "<p style='text-align:center;font-family: Comic Sans MS;'>Patient ID: ". $row['PatientID'] ."</p>";
 				
        
       
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
    }
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 // Close connection
        mysqli_close($conn);
 	}
               
        }
        else{
          
        }
        
       
  ?>


 <button class="button" onclick="location.href = 'DoctorSignUpNext.php';">Write Report</button>
</body>
</html>