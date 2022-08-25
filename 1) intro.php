<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "prova";

//procedurale
//$connessione = mysqli_connect("localhost", "root", "root", "prova");

//oop
$connessione = new mysqli($host, $user, $password, $database);

//pdo
//$connession = new PDO("mysql:host=localhost; dbname=prova", "root", "root");

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 
echo "connessione avvenuta con successo: " . $connessione->host_info;

//CREAZIONE DATABASE DA CODICE
//togliamo $database in $connessione = new mysqli($host, $user, $password, $database);
// $sql = "CREATE DATABASE db_prova";
// if($connessione->query($sql)==true){
//     echo "Database creato con successo";
// } else {
//     echo "Errore creazione database" . $connessione->error;
// }

$connessione->close();

?>