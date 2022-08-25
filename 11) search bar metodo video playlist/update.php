<?php

require_once('config.php');

$id = $_POST['id'];
$email = $_POST['email'];

$sql = "UPDATE persone SET email='$email' WHERE id = '$id'";

if($connessione->query($sql) === true){
    $data = ["messaggio" => "modifica eseguita", "response" => 1];
    echo json_encode($data);
} else {
    $data = ["messaggio" => "impossibile modificare", "response" => 0];
    echo json_encode($data);
}

?>