<?php 
 
    ob_start();
    $timezone = date_default_timezone_set("Asia/Dhaka");
    $con = mysqli_connect("localhost","root","123456","spotify");
    
    if(mysqli_connect_errno()){
    	echo "Connection Failed ". mysqli_connect_errno();
    }


?>