<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

//Create
if (isset($data['passenger'])) {

    $namePassenger = (isset($data['passenger']['name']) ? $data['passenger']['name'] : NULL);
    $birthPassenger = (isset($data['passenger']['birth']) ? $data['passenger']['birth'] : NULL);
    $cpfPassenger = (isset($data['passenger']['cpf']) ? $data['passenger']['cpf'] : NULL);
    $genderPassenger = (isset($data['passenger']['gender']) ? $data['passenger']['gender'] : NULL);


    // Validation
    if ($namePassenger == NULL || $birthPassenger == NULL || $cpfPassenger == NULL || $genderPassenger == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Por favor, preencher todos os campos!"]]);

    } else {

        // Add the passenger
        $passenger = new passenger();

        echo $passenger->Create($namePassenger, $birthPassenger, $cpfPassenger, $genderPassenger);
    }
}