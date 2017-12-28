<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 09.12.2017
 * Time: 18:02
 */

include "header.php";
include "dbConnect.php";

//print_r($_POST);

$Martikelnummer=htmlspecialchars($_POST["Student"]);
$Titel=htmlspecialchars($_POST["Titel"]);
$Studienrichtung =htmlspecialchars($_POST["Studienrichtung"]);
$ArtderArbeit =htmlspecialchars($_POST["ArtderArbeit"]);
$DatumBewilligung = htmlspecialchars($_POST["DatumBewilligung"]);
$Abgabetermin = htmlspecialchars($_POST["Abgabetermin"]);
$Hochschule = htmlspecialchars($_POST["Hochschule"]);
$Note = htmlspecialchars($_POST["Note"]);

$sql = "INSERT INTO `tblabschlussarbeit`(`Titel`, `Studienrichtung`, `Hochschule`, `DatumBewilligung`, `tblArtderArbeit_idtblArtderArbeit`, `Abgabetermin`, `Note`, `fk_ArtderArbeit`, `tblStudierende_MatrikelNummer`) VALUES ('$Titel','$Studienrichtung','$Hochschule','$DatumBewilligung','$ArtderArbeit','$Abgabetermin','$Note','$ArtderArbeit','$Martikelnummer')";
//echo $sql;
if ($mysqli->query($sql) === TRUE) {
    printf("Abschlussarbeit wurde angelgt.\n");
    $last_id = $mysqli->insert_id;
    echo "Die letzte ID war: " . $last_id . "<br>";
}
else{
   echo $mysqli->error;
}

$Betreuer = $_POST["Betreuer"];
$Gutachter = $_POST["Gutachter"];

//print_r($Betreuer);
//var_dump($Betreuer);

foreach ($Betreuer as $Betr){
    $sql ="INSERT INTO `tblbetreuer`(`fk_idtblAbschlussarbeit`, `fk_idtblBetreuerGutachter`) VALUES ('$last_id','$Betr')";
    if ($mysqli->query($sql) === TRUE) {
        printf("Betreuer " . $Betr . "wurde angelgt.<br>");
    }
    else{
        echo $mysqli->error;
    }
}

foreach ($Gutachter as $Guta){
    $sql ="INSERT INTO `tblgutachter`(`fk_idtblAbschlussarbeit`, `fk_idtblBetreuerGutachter`) VALUES ('$last_id','$Guta')";
    if ($mysqli->query($sql) === TRUE) {
        printf("Gutachter " . $Betr . "wurde angelgt.<br>");
    }
    else{
        echo $mysqli->error;
    }
}
