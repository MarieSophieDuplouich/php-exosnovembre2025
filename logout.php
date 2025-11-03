<?php session_start();


function connect_database(): PDO
{
    $database = new PDO("mysql:host=127.0.0.1;dbname=novembre", "root", "root");
    return $database;
}


session_destroy();

 header("Location: index.php");
?>

