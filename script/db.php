<?php
 // DB connection

define('HOST', 'us-cdbr-iron-east-05.cleardb.net'); // Database Host URL
define('USER', 'b3efc8441c244c'); // Database Username
define('PASSWORD', '70c6d2ac'); // Database User Password
define('DATABASE', 'heroku_ca03b14418567c1'); // Database Name

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