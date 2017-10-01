<?php
    require __DIR__ . '/Classes.php';

    $data = json_decode(file_get_contents('php://input'), true);

    switch ($data['action'])
    {
        case 'list':
            switch ($data['who'])
            {
                case 'driver':
                    $driverRead = new Driver();
                    echo $driverRead->Read();
                    break;
                case 'passenger':
                    break;
                case 'ride':
                    break;
                default:

            }
            break;
        case 'update':
            switch ($data['who'])
            {
                case 'driver':
                    $driverUpdate = new Driver();
                    echo $driverUpdate->Update($data['driver']['nameD'], $data['driver']['birthD'], $data['driver']['cpfD'], $data['driver']['carD'], $data['driver']['statusD'], $data['driver']['genderD']);
                    break;

                case 'driver':

                    break;

                case 'ride':

                    break;

            }
            break;
        case 'add':
            switch ($data['who'])
            {
                case 'driver':
					$driverAdd = new Driver();
                    echo $driverAdd->Create($data['driver']['name'], $data['driver']['birth'], $data['driver']['cpf'], $data['driver']['car'], $data['driver']['status'], $data['driver']['gender']);
                    break;

                case 'passenger':

                    break;

                case 'ride':

                    break;

            }
            break;
        case 'delete':
            switch ($data['who'])
            {
                case 'driver':
                    $driverDelete = new Driver();
                    echo $driverDelete->Delete($data['cpf']);
                    break;

                case 'passenger':

                    break;

                case 'ride':

                    break;

            }
            break;
        default:
    }
?>
