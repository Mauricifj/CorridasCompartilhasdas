<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

//Update

if (isset($data['passenger'])) {

    $idPassenger = (isset($data['passenger']['id']) ? $data['passenger']['id'] : NULL);
    $namePassenger = (isset($data['passenger']['name']) ? $data['passenger']['name'] : NULL);
    $birthPassenger = (isset($data['passenger']['birth']) ? $data['passenger']['birth'] : NULL);
    $cpfPassenger = (isset($data['passenger']['cpf']) ? $data['passenger']['cpf'] : NULL);
    $genderPassenger = (isset($data['passenger']['gender']) ? $data['passenger']['gender'] : NULL);

    // Validation
    if ($idPassenger == NULL || $namePassenger == NULL || $birthPassenger == NULL || $cpfPassenger == NULL || $genderPassenger == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Por favor, preencher todos os campos!"]]);

    } else {

        // Add the passenger
        $passenger = new Passenger();

        echo $passenger->Update($idPassenger, $namePassenger, $birthPassenger, $cpfPassenger, $genderPassenger);
    }
}
?>