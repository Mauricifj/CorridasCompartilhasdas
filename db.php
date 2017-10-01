<?php
// DB connection

define('HOST', 'us-cdbr-iron-east-05.cleardb.net'); // Database Host URL
define('USER', 'b4a85b66a8e5a7'); // Database Username
define('PASSWORD', '93b0132a'); // Database User Password
define('DATABASE', 'heroku_cd1c157b6d9c9f2'); // Database Name

function DB()
{
    static $instance;
    if ($instance === null) {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE;
        $instance = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $instance;
}

?>