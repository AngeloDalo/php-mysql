<?php

require_once('config.php');

$sql = 'SELECT * FROM persone';

if($result = $connessione->query($sql)){
    $data = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $tmp;
            $tmp['id'] = $row['id'];
            $tmp['nome'] = $row['nome'];
            $tmp['cognome'] = $row['cognome'];
            $tmp['email'] = $row['email'];
            array_push($data, $tmp);
        }
        echo json_encode($data);
    } else {
        echo json_encode($data);
    }
} else {
    echo "errore $sql. " . $connessione->error;
}

?>