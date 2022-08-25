<?php

require_once('config.php');

$id = $_POST['id'];

$sql = "DELETE FROM persone WHERE id = $id";

if($connessione->query($sql) === true){
    $data = ["messaggio" => "eliminazione eseguita", "response" => 1];
    echo json_encode($data);
} else {
    $data = ["messaggio" => "impossibile eliminare", "response" => 0];
    echo json_encode($data);
}

?>