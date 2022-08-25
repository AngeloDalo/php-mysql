<?php

require_once('config.php');

$nome = $connessione->real_escape_string($_POST['nome']);
$cognome = $connessione->real_escape_string($_POST['cognome']);
$email = $connessione->real_escape_string($_POST['email']);

$sql = "INSERT INTO persone (nome, cognome, email) VALUES ('$nome', '$cognome', '$email')";

if($connessione->query($sql) === true){
    $data = ["messaggio" => "riga inserita con successo", "respone" => 1];
    echo "riga inserita con successo";
    echo json_encode($data);
} else {
    $data = ["messaggio" => $connessione->error, "response" => 0];
    echo json_encode($data);
}

?>