<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'Ausgang');
define('DB_PASSWORD', 'Ingram2023!');
define('DB_NAME', 'OHL');

define('EINGANG_SERVER', '10.103.99.129');
define('EINGANG_USERNAME', 'Eingang');
define('EINGANG_PASSWORD', 'Ingram2023!');
define('EINGANG_NAME', 'OHL');

/* Attempt to connect to MySQL database */
$link_eingang = mysqli_connect(EINGANG_SERVER, EINGANG_USERNAME, EINGANG_PASSWORD, EINGANG_NAME);
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Check connection
if ($link === false)
{
    die("ERROR: Could not connect to Ausgang. " . mysqli_connect_error());
}

if ($link_eingang === false)
{
    die("ERROR: could not connect to Eingang. " . mysqli_connect_error());
}
?>