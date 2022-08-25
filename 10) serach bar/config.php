<?php

$con = mysqli_connect("localhost", "root", "root", "prova");

if(!$con){
    echo "connection failed" . mysqli_connect_error();
}

?>