<?php
//CREIAMO STATEMENT E LO ESEGUIAMO IN UN SECONDO MOMENTO
//il controllo lo faccio solamente una volta
//invio solamente i dati e non tutto $sql = "INSERT INTO persone(nome, cognome, email) VALUES ('$nome', '$cognome', '$email')";
$host = "localhost";
$user = "root";
$password = "root";
$database = "prova";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 

$sql = "INSERT INTO persone(nome, cognome, email) VALUES (?, ?, ?)";

if($statement = $connessione->prepare($sql)){
    ///sss sta per string string string
    $statement->bind_param("sss", $nome, $cognome, $email);

    $nome = "Leopoldo";
    $cognome = "Rossi";
    $email = "leopoldo.rossi@gmaol.com";
    $statement->execute();

    $nome = "Franco";
    $cognome = "Rossi";
    $email = "franco.rossi@gmaol.com";
    $statement->execute();

    //$nome = $_REQUEST["nome"];
    //NO $nome = $connessione->real_escape_string($_REQUEST['nome']); poiché controllo già fatto

    echo "record inserit con successo!"; 
} else {
    "errore: $sql " . $connessione->error;
}

$statement->close();

$connessione->close();
?>