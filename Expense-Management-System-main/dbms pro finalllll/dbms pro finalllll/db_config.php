<?php      
    $host = "localhost";  
    $user = "root";  
    $password = 'MeGaB@772';  
    $db_name = "exptrdb";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?> 
