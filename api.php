<?php
// recupero il file da leggere
//$source_url = __DIR__ . '/data.json';

// leggiamo il contenuto del file
//$json_data = file_get_contents($source_url);

// dico al server che voglio scrivere in JSON
//header('Content-Type: application/json');

// converto in JSON e restituisco i dischi
//echo $json_data;

// preparo le informazioni di connessionw
const DB_SERVERNAME = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_NAME = 'dischi_db';

// tento la connessione
try {
    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

$discs = [];

// tento una query
try {
    $sql = 'SELECT * FROM  `discs`';
    $result = $conn->query($sql);
    if ($result->num_rows) {
        while ($row = $result->fetch_assoc()) {
            $discs[] = $row;
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

// dico al server che voglio scrivere in JSON
header('Content-Type: application/json');


// converto in JSON e restituisco i dischi
echo json_encode($discs);
