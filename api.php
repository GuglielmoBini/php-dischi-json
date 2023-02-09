<?php
// recupero il file da leggere
$source_url = __DIR__ . '/data.json';

// leggiamo il contenuto del file
$json_data = file_get_contents($source_url);

// dico al server che voglio scrivere in JSON
header('Content-Type: application/json');

// converto in JSON e restituisco i dischi
echo $json_data;
