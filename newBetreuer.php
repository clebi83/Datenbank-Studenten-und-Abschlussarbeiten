<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 10.12.2017
 * Time: 18:49
 */

include "header.php";
require "dbConnect.php";


//Daten in Varablen füllen
print_r($_POST);

$Vorname = htmlspecialchars($_POST["Vorname"]);
$Nachname = htmlspecialchars($_POST["Nachname"]);
$Titel = htmlspecialchars($_POST["Titel"]);
$Email = htmlspecialchars($_POST["Email"]);
$Telefonnummer = htmlspecialchars($_POST["Telefonnummer"]);

//Daten in Datenbank schreiben
$sql = "INSERT INTO `tblbetreuergutachter`(`Name`, `Vorname`, `Titel`, `Email`, `Telefonnummer`) VALUES ('$Nachname','$Vorname','$Titel','$Email','$Telefonnummer')";
if ($mysqli->query($sql) === TRUE) {
    printf("Betreuer wurde angelgt.\n");
}
else {
printf("Fehler bei beim schreiben in die Datenbank.\n");

}