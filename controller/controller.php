<?php

    //recupero i dati dal db
    include_once __DIR__ . '/../db/db.php';

    //nel caso che il database non contenga dati mando questa risposta all'utente
    $answer = [
        "result" => false,
        "data" => [],
    ];

    //nel caso il database contenga dati, 
    if (count($discs) > 0) {
        $answer = [
            "result" => true,
            "data" => $discs,
        ];
    };

    //informare il chiamante che stiamo per trasmettere il dato in formato json
    header('Content-Type: application/json');

    //tradurre in JSON i nostri dati e inserirli nella pagina in maniera esclusiva
    echo json_encode($discs);
