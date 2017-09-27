<?php
require __DIR__ . '/library.php';

$data = json_decode(file_get_contents('php://input'), TRUE);

//Delete Ride
if (isset($data['ride'])) {
    $ride_id = (isset($data['ride']['id']) ? $data['ride']['id'] : NULL);

    // Delete the Ride
    $ride = new Ride();
    $ride->Delete($ride_id);
}

?>