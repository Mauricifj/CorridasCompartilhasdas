<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

//Update

if (isset($data['ride'])) {

    $idRide = (isset($data['ride']['id']) ? $data['ride']['id'] : NULL);
    $idDriver = (isset($data['ride']['driver']) ? $data['ride']['driver'] : NULL);
    $idPassenger = (isset($data['ride']['passenger']) ? $data['ride']['passenger'] : NULL);
    $rideCostCents = (isset($data['ride']['cost']) ? $data['ride']['cost'] : NULL);

    // Validation
    if ($idRide == NULL || $idDriver == NULL || $idPassenger == NULL || $rideCostCents == NULL){

        echo json_encode(['errors' => ["Por favor, preencher todos os campos!"]]);

    } else {

        // Add the passenger
        $ride = new Ride();

        echo $ride->Update($idRide, $idDriver, $idPassenger, $rideCostCents);
    }
}
?>