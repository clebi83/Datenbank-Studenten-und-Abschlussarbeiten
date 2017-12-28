<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 02.12.2017
 * Time: 13:34
 */
//Datenbankverbindung aufbauen


//$mysqli = new mysqli('localhost', 'root','8uw3MfYbxtsGdrxz','d028dc1b');
$mysqli = new mysqli('localhost', 'root','your_password','abschlussarbeiten');
if($mysqli->connect_error){
    echo 'Fehler bei der Verbindung: ' . mysqli_connect_error();
    exit();
}

