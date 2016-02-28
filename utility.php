<?php
// database information. please change according to database. will differ
$db_hostname = "localhost";
$db_database = "SpartaHack16S";
$db_username = "root";
$db_password = "";

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database); // connection to database
if ($connection->connect_error) die($connection->connect_error);

// function for querying the database
function queryMysql($query) {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
}

// function for destroying a session
function destroySession() {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

?>