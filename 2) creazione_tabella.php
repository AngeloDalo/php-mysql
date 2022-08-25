<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "prova";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 
echo "connessione avvenuta con successo: " . $connessione->host_info;

//CREAZIONE TABELLA
$sql = "CREATE TABLE persone(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE
)";

if($connessione->query($sql) === true){
    echo "tabella creata con successo";
} else {
    echo "errore: " . $connessione->error;
}

$connessione->close();

?>