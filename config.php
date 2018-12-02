<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'rackite_webadmin');
define('DB_PASSWORD', 'Asdf1234$!q');
define('DB_NAME', 'rackite_theatre');
 
/* Attempt to connect to MySQL database */
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
?>
