<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "foodelDB";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Errore nella connessione al db: ". mysqli_connect_error());  
    }
    return $con;
