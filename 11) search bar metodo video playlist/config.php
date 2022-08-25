<?php

$connessione = mysqli_connect("localhost", "root", "root", "prova");

if(!$connessione){
    echo "connection failed" . mysqli_connect_error();
}

?>