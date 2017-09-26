<?php
    $server = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b3efc8441c244c";
    $password = "70c6d2ac";
    $db = "heroku_ca03b14418567c1";

    // Create connection
    $conn = new mysqli($server, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Falha ao conectar com o banco de dados: " . $conn->connect_error);
    }
    $date = '1985-12-02';
    $time = strtotime($date);
    $mysqldate = date('Y-m-d');
    $sql = "INSERT INTO Drivers (nameDriver, birthDriver, cpfDriver, carDriver, statusDriver, genderDriver)
    VALUES ('John Doe', $mysqldate, '42756522825', 'Sandero', 'ativo', 'M')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>