<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

// Create Driver
if (isset($data['driver'])) {

    $nameDriver = (isset($data['driver']['name']) ? $data['driver']['name'] : NULL);
    $birthDriver = (isset($data['driver']['birth']) ? $data['driver']['birth'] : NULL);
    $cpfDriver = (isset($data['driver']['cpf']) ? $data['driver']['cpf'] : NULL);
    $carDriver = (isset($data['driver']['car']) ? $data['driver']['car'] : NULL);
    $statusDriver = (isset($data['driver']['status']) ? $data['driver']['status'] : NULL);
    $genderDriver = (isset($data['driver']['gender']) ? $data['driver']['gender'] : NULL);

    // Validation
    if ($nameDriver == NULL || $birthDriver == NULL || $cpfDriver == NULL || $carDriver == NULL || $statusDriver == NULL || $genderDriver == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Por favor, preencher todos os campos!"]]);

    } else {
        // Add the driver
        $driver = new Driver();

        echo $driver->Create($nameDriver, $birthDriver, $cpfDriver, $carDriver, $statusDriver, $genderDriver);
    }
}
