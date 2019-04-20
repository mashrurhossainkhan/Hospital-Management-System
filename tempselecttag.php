<?php

        
		$db_name = "HospitalManagement";
  		$mysql_username = "root";
 		$mysql_password = "";
 		$server_name = "localhost";

  
  $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
  
  
  
$sql = 'SELECT * FROM `HospitalRegister`';
  



           echo "<label for="Hospital Name"><b>Hospital Name</b></label>";
            if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result)){
                echo "<select>";
                    echo "<option value='$row['HospitalName']'>".$row['HospitalName']."</option><br>"  
                echo "</select>";
           
        }
        
       
    
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
 echo "<br>";

   
 
// Close connection
mysqli_close($conn);
 	
?>