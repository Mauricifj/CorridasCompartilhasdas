<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

// Create Driver
if (isset($data['driver'])) {
    
    $birthDriver = strtotime($birthDriver);
    $birthDriver = date('Y-m-d', $birthDriver);

    $nameDriver = (isset($data['driver']['nameDriver ']) ? $data['driver']['nameDriver '] : NULL);
    $birthDriver = (isset($data['driver']['birthDriver']) ? $data['driver']['birthDriver'] : NULL);
    $cpfDriver = (isset($data['driver']['cpfDriver']) ? $data['driver']['cpfDriver'] : NULL);
    $carDriver = (isset($data['driver']['carDriver']) ? $data['driver']['carDriver'] : NULL);
    $statusDriver = (isset($data['driver']['statusDriver']) ? $data['driver']['statusDriver'] : NULL);
    $genderDriver = (isset($data['driver']['genderDriver']) ? $data['driver']['genderDriver'] : NULL);

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
