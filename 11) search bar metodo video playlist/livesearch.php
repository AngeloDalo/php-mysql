<?php

include("config.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $sql = "SELECT * FROM persone WHERE nome LIKE '{$input}%' OR cognome LIKE '{$input}%' OR email LIKE '{$input}%'";

    if ($result = $connessione->query($sql)) {
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
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
}
