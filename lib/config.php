<?php

// Database Settings
/*
$Host = "192.168.0.2";
$User = "terrie";
$Pass = "EaZLfArF";
$Name = "gopagoda";
$dbport = 3306;

//connects to our database
$DBcon = new MySQLi($Host,$User,$Pass,$Name,$dbport);

if ($DBcon->connect_error) {
        die("Connection failed: " . $DBcon->connect_error);
    } 
        echo "Connected successfully (".$DBcon->host_info.")";

*/
$servername = '192.168.0.4';
    $username = 'desire';
    $password = "vRGdMlwc";
    $database = "gopagoda";
    $dbport = 3306;

    // Create connection
    $DBcon = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($DBcon->connect_error) {
        die("Connection failed: " . $DBcon->connect_error);
    } 
    //echo "Connected successfully (".$DBcon->host_info.")";
?>

