<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

// Create Driver
if (isset($data['addDriver'])) {
    
    $name = (isset($data['addDriver']['name']) ? $data['addDriver']['name'] : NULL);
    $birth = (isset($data['addDriver']['birth']) ? $data['addDriver']['birth'] : NULL);

    $birth = strtotime($birth);
    $birth = date('Y-m-d', $birth);
    
    $cpf = (isset($data['addDriver']['cpf']) ? $data['addDriver']['cpf'] : NULL);
    $car = (isset($data['addDriver']['car']) ? $data['addDriver']['car'] : NULL);
    $status = (isset($data['addDriver']['status']) ? $data['addDriver']['status'] : NULL);
    $gender = (isset($data['addDriver']['gender']) ? $data['addDriver']['gender'] : NULL);

    // Validation
    if ($name == NULL || $birth == NULL || $cpf == NULL || $car == NULL || $status == NULL || $gender == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Por favor, preencher todos os campos!"]]);

    } else {
        // Add the driver
        $driver = new Driver();
        echo $driver->Create($name, $birth, $cpf, $car, $status, $gender);
    }
}
