<?php

require_once('config.php');

$email = $connessione->real_escape_string($_POST['email']);
$username = $connessione->real_escape_string($_POST['username']);
$password = $connessione->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO login (email, username, password) VALUES ('$email', '$username', '$hashed_password')";

if($connessione->query($sql) === true){
    echo "registrazione evvenuta con successo";
} else {
    echo "errore: " . $connessione->error;
}

?>