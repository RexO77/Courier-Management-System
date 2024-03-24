<?php

    $dbcon = mysqli_connect('localhost','root','','courier_management');

    if($dbcon==false)
    {
        echo "Database is not Connected!";
    }
   
?>