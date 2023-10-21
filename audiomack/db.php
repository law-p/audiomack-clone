<?php
// servername, username, password, database name
$host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";


// Check connection
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, $database);
if (mysqli_errno($connection)) {
    echo(mysqli_error($connection));
    die();
}
?>