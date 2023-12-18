<?php 

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'crud';

    $con = mysqli_connect($server, $username, $password, $database);

    if(mysqli_connect_error()){
        echo "Connection Error".mysqli_connect_error();
    }

?>