<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

// Create Driver
if (isset($data['driverInfo'])) {

    $nameDriver = (isset($data['driverInfo']['name']) ? $data['driverInfo']['name'] : NULL);
    $birthDriver = (isset($data['driverInfo']['birth']) ? $data['driverInfo']['birth'] : NULL);
    $cpfDriver = (isset($data['driverInfo']['cpf']) ? $data['driverInfo']['cpf'] : NULL);
    $carDriver = (isset($data['driverInfo']['car']) ? $data['driverInfo']['car'] : NULL);
    $statusDriver = (isset($data['driverInfo']['status']) ? $data['driverInfo']['status'] : NULL);
    $genderDriver = (isset($data['driverInfo']['gender']) ? $data['driverInfo']['gender'] : NULL);

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
