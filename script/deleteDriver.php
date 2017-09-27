<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['driver'])) {
    $driver_id = (isset($data['driver']['idDriver']) ? $data['driver']['idDriver'] : NULL);

    // Delete the Driver
    $driver = new Driver();
    $driver->Delete($driver_id);
}

?>