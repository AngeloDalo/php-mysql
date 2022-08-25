<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "prova";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 

$sql = "DELETE FROM persone WHERE id = 2";

if($connessione->query($sql) === true){
    echo "riga eliminata con successo";
} else {
    echo "errore: " . $connessione->error;
}

$connessione->close();
?>