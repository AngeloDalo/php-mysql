<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "prova";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 

$sql = "UPDATE persone SET email = 'rossi2.luca@gmaol.com' WHERE id = 2";

if($connessione->query($sql) === true){
    echo "riga aggiornata con successo";
} else {
    echo "errore: " . $connessione->error;
}

$connessione->close();
?>