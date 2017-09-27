<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

//Create
if (isset($data['ride'])) {

    $idDriver = (isset($data['ride']['driver']) ? $data['ride']['driver'] : NULL);
    $idPassenger = (isset($data['ride']['passenger']) ? $data['ride']['passenger'] : NULL);
    $rideCostCents = (isset($data['ride']['cost']) ? $data['ride']['cost'] : NULL);

    // Validation
    if ($idDriver == NULL || $idPassenger == NULL || $rideCostCents == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Por favor, preencher todos os campos!"]]);

    } else {

        // Add the passenger
        $passenger = new passenger();

        echo $passenger->Create($idDriver, $idPassenger, $rideCostCents);
    }
}