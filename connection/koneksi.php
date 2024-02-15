<?php
function getConnection()
{
    $host = "localhost";
    $port = 3306;
    $db = "latihan";
    $user = "root";
    $pwd = '';

    return new PDO("mysql:host=$host:$port;dbname=$db",$user,$pwd);

}

function getConnectionComments()
{
    $host = "localhost";
    $port = 3306;
    $db = "latihan";
    $user = "root";
    $pwd = '';

    // return new PDO("mysql:host=$host:$port;dbname=$db",$user,$pwd);
    return  new mysqli($host, $user, $pwd, $db);

}
?>
