<?php
    require __DIR__ . '/library.php';

    $data = json_decode(file_get_contents('php://input'), TRUE);

    //List
    $driver = new Driver();

    echo $driver->Read();
?>