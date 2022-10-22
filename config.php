<?php
/* Coded by Zubayer Tahmid
ID: 200042136
This file contains database configuration assuming you are running MySQL using user "root" and password""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'logincredentials');


// Connecting to database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    die("Error: Connection Failed");
}


?>