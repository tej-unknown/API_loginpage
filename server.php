<?php
$mysqli = new mysqli("localhost", "root", "root", "internshala");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else
{
 echo"connected succesfully.";
}
echo $mysqli->host_info . "\n";


?>