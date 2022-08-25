<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "prova";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 

$sql = "SELECT * FROM persone WHERE id = 7 OR id = 3";
//$sql = "SELECT * FROM persone LIMIT 3 ORDER BY id ASC";
//$sql = "SELECT * FROM persone ORDER BY id DESC LIMIT 1"; prendo l'ultimo
//$sql = "SELECT * FROM persone ORDER BY nome,cognome ASC";
//$sql = "SELECT * FROM persone WHERE di IN(1,2,5)";
//$sql = "SELECT * FROM persone WHERE email LIKE 'Luca%";
//$sql = "SELECT * FROM persone WHERE email LIKE '%gmaol.com";
//$sql = "SELECT * FROM persone WHERE email NOT LIKE '%i@%"; cognome non finisce per i

if($result = $connessione->query($sql)){
    if($result->num_rows > 0){
        echo ' <table>
        <tr>
        <th>id</th>
        <th>nome</th>
        <th>cognome</th>
        <th>email</th>
        </tr>
        ';
        while($row = $result->fetch_array()){
            echo '
            <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['nome'] . '</td>
            <td>' . $row['cognome'] . '</td>
            <td>' . $row['email'] . '</td>
            </tr>
            ';
        }
        echo '</table>';
    } else {
        echo "non ci sono righe per questa query";
    }
} else {
    echo "errore: $sql" . $connessione->error;
}

$connessione->close();
?>