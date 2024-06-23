<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="forum";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if($conn){

    }
    else{
        echo "Not connected due to ".mysqli_connect_error();
    }


?>