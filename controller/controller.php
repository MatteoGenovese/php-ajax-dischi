<?php

// ! recupero i dati dal db
include_once __DIR__ . '/../db/db.php';

//nel caso che il database non contenga dati mando questa risposta all'utente
$answer = [
    "result" => false,
    "data" => [],
];


if (!empty($_GET) && !empty($_GET['genre']) && $_GET['genre']!='all') {
    // ? quando chiedo un genere
    // memorizzo il genere richiesto tramite chiamata get
    $genre = $_GET['genre'];
    // per ogni disco che ho a disposizione
    foreach ($discs as $key => $disc) {
        // memorizzo il genere richiesto tramite chiamata get
        $currentDiscGenre= strtolower($disc["genre"]);
        // se il disco appartiene al genere musicale richiesto
        if ($genre == $currentDiscGenre){
            // allora lo inserisco nei data di $answer
            $answer['data'][] = $disc;
            $answer['result'] = true;
        }
    }
}else {
    // ? quando non chiedo un genere
    //nel caso il database contenga dati, li prendo 
    if (count($discs) > 0) {
        $answer = [
            "result" => true,
            "data" => $discs,
        ];
    };
}

// ! informare il chiamante che stiamo per trasmettere il dato in formato json
header('Content-Type: application/json');

// ! tradurre in JSON i nostri dati e inserirli nella pagina in maniera esclusiva
echo json_encode($answer);
