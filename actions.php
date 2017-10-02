<?php
require __DIR__ . '/Classes.php';

$data = json_decode(file_get_contents('php://input'), true);

switch ($data['action']) {
    case 'list':
        switch ($data['who']) {
            case 'driver':
                $driverRead = new Driver();
                echo $driverRead->Read();
                break;
            case 'passenger':
                $passengerRead = new Passenger();
                echo $passengerRead->Read();
                break;
            case 'ride':
                $rideRead = new Ride();
                echo $rideRead->Read();
                break;
        }
        break;
    case 'update':
        switch ($data['who']) {
            case 'driver':
                $driverUpdate = new Driver();
                echo $driverUpdate->Update($data['driver']['nameD'], $data['driver']['birthD'], $data['driver']['cpfD'], $data['driver']['carD'], $data['driver']['statusD'], $data['driver']['genderD']);
                break;
            case 'passenger':
                $passengerUpdate = new Passenger();
                echo $passengerUpdate->Update($data['passenger']['nameP'], $data['passenger']['birthP'], $data['passenger']['cpfP'], $data['passenger']['genderP']);
                break;
        }
        break;
    case 'add':
        switch ($data['who']) {
            case 'driver':
                $driverAdd = new Driver();
                echo $driverAdd->Create($data['driver']['name'], $data['driver']['birth'], $data['driver']['cpf'], $data['driver']['car'], $data['driver']['status'], $data['driver']['gender']);
                break;
            case 'passenger':
                $passengerAdd = new Passenger();
                echo $passengerAdd->Create($data['passenger']['name'], $data['passenger']['birth'], $data['passenger']['cpf'], $data['passenger']['gender']);
                break;
            case 'ride':
                $rideAdd = new Ride();
                echo $rideAdd->Create($data['ride']['cpfDriver'], $data['ride']['nameDriver'], $data['ride']['cpfPassenger'], $data['ride']['namePassenger'], $data['ride']['cost']);
                break;
        }
        break;
    case 'delete':
        switch ($data['who']) {
            case 'driver':
                $driverDelete = new Driver();
                echo $driverDelete->Delete($data['cpf']);
                break;
            case 'passenger':
                $passengerDelete = new Passenger();
                echo $passengerDelete->Delete($data['cpf']);
                break;
            case 'ride':
                $rideDelete = new Ride();
                echo $rideDelete->Delete($data['id']);
                break;
        }
        error_log("Oh no! We are out of FOOs!", 3, "debug.txt");
        break;
}


?>
