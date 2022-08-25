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

//INSERIMENTO DATI FORM
//real_escape_string = metodo di sicurezza per evitare hacking
$nome = $connessione->real_escape_string($_REQUEST['nome']);
$cognome = $connessione->real_escape_string($_REQUEST['cognome']);
$email = $connessione->real_escape_string($_REQUEST['email']);

$sql = "INSERT INTO persone(nome, cognome, email) VALUES ('$nome', '$cognome', '$email')";

//INSERIMENTO DATI MANUALMENTE
// $sql = "INSERT INTO persone(nome, cognome, email) VALUES
// ('Luca', 'Rossi', 'lr.@gmaol.com'),
// ('Luca2', 'Rossi2', 'lr1.@gmaol.com'),
// ('Luca3', 'Rossi3', 'lr2.@gmaol.com'),
// ('Luca4', 'Rossi4', 'lr3.@gmaol.com'),
// ('Luca5', 'Rossi5', 'lr4.@gmaol.com')";

// $sql = "INSERT INTO persone(nome, cognome, email) VALUES
// ('Marco', 'Neri', 'marco.@gmaol.com')";

if($connessione->query($sql) === true){
    $ultimo_elemento = $connessione->insert_id;
    echo "persona inserita con successo, il suo id e' " . $ultimo_elemento; 
} else {
    echo "errore: " . $connessione->error;
}

$connessione->close();

?>