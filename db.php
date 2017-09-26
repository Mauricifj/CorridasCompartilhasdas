<?php
    $server = "us-cdbr-iron-east-05.cleardb.net";
    $user = "b3efc8441c244c";
    $pass = "70c6d2ac";
    $db = "heroku_ca03b14418567c1";

    /* Create connection
    $conn = new mysqli($server, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Falha ao conectar com o banco de dados: " . $conn->connect_error);
    }*/

//    $date = '1985-12-02';
//    $time = strtotime($date);
//    $mysqldate = date('Y-m-d');
//    $sql = "INSERT INTO Drivers (nameDriver, birthDriver, cpfDriver, carDriver, statusDriver, genderDriver)
//    VALUES ('John Doe', $mysqldate, '42756522825', 'Sandero', 'ativo', 'M')";

    try {
        $conn = new PDO("mysql:host=$server;db=myDB", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage(); 
    }


/*   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/

    $conn->close();
?>
