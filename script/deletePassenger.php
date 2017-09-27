<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

//Delete Passenger
if (isset($data['passenger'])) {
    $passenger_id = (isset($data['passenger']['id']) ? $data['passenger']['id'] : NULL);

    // Delete the Passenger
    $passenger = new Passenger();
    $passenger->Delete($passenger_id);
}

?>