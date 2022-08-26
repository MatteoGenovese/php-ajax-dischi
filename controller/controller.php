<?php

    //recupero i dati dal db
    include __DIR__ . '/../db/db.php';

    $answer = [
        "result" => false,
        "data" => [],
    ];

    if (count($discs) > 0) {
        $answer['result'] = true;
        $answer['data'] = $discs;
    };

    //informare il chiamante che stiamo per trasmettere il dato in formato json
    header('Content-Type: application/json');

    //tradurre in JSON i nostri dati e inserirli nella pagina in maniera esclusiva
    echo json_encode($discs);
