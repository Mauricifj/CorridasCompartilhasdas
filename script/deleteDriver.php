<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['driver'])) {
    $cpfDriver = (isset($data['driver']['cpf']) ? $data['driver']['cpf'] : NULL);
    // Delete the Driver
    $driver = new Driver();
    $driver->Delete($cpfDriver);
}

?>