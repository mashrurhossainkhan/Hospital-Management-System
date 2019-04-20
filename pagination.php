<?php
       $db_name = "hospitalmanagement";
         $mysql_username = "root";
        $mysql_password = "";
        $server_name = "localhost";

  
  $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
$sql ="SELECT * FROM `hospitalregistration` WHERE `AdminorDoctor`='Admin'";
 
 $data =$conn->query($sql);
 $records= $data->num_rows;
 $records_pages = $records/12;

        
        $records_pages= ceil($records_pages);
        $prev= $page-1;
        $next = $page+1;
        
        echo '<ul class="pagination">';
            if($records_pages>=2){
                for($r=1 ; $r<= $records_pages; $r++){
                    echo '<li><a href="?page='.$r.'">'.$r.'</a></li>';
                }
            }
        echo '</ul>';
?>