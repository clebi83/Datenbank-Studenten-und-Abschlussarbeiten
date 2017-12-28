<?php
/*
 * Created by PhpStorm.
 * User: cleme
 * Date: 26.11.2017
 * Time: 11:49
 */

include "header.php";
include "dbConnect.php";
print_r($_POST);
/*
echo htmlspecialchars($_GET["Vorname"]);
echo "<br>";
echo htmlspecialchars($_GET["Nachname"]);
echo "<br>";
echo htmlspecialchars($_GET["Titel"]);
echo "<br>";
echo htmlspecialchars($_GET["Wohnort"]);
echo "<br>";
echo htmlspecialchars($_GET["Email"]);
echo "<br>";
echo htmlspecialchars($_GET["Telefonnummer"]);
*/

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Prüfen ob es sich um ein Bild handelt
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Es handelt sich um eine Bilddatei - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Datei ist kein Bild";
        $uploadOk = 0;
    }
}
// Prüfung ob Bild schon existiert
if (file_exists($target_file)) {
    echo "Diesen Dateinamen gibt es schon";
    $uploadOk = 0;
}
// Dateigröße prüfen
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Das Bild ist leider zu groß";
    $uploadOk = 0;
}
// Dateiendung prüfen
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Nur JPG, JPEG, PNG & GIF Dateien sind erlaubt";
    $uploadOk = 0;
}
// Prüfen ob ein Fehler aufgetreten ist beim Bildupload
if ($uploadOk == 0) {
    echo "Das Bild wird leider nicht hochgeladen";
// Wenn Bild in Ordnung, dieses Hochladen
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Die Datei ". basename( $_FILES["fileToUpload"]["name"]). " wurde hochgeladen.";

        //Wenn Bild erfolgreich hochgeladen wurde Daten Varablen füllen
        $Vorname = htmlspecialchars($_POST["Vorname"]);
        $Nachname = htmlspecialchars($_POST["Nachname"]);
        $Titel = htmlspecialchars($_POST["Titel"]);
        $Wohnort = htmlspecialchars($_POST["Wohnort"]);
        $Email = htmlspecialchars($_POST["Email"]);
        $Telefonnummer = htmlspecialchars($_POST["Telefonnummer"]);
        $Bild = basename( $_FILES["fileToUpload"]["name"]);

        //Daten in Datenbank schreiben
        $sql = "INSERT INTO `tblstudierende`(`Name`, `Vorname`, `Titel`, `Wohnort`, `Email`, `Telefonnummer`, `Foto`) VALUES ('$Nachname','$Vorname','$Titel','$Wohnort','$Email','$Telefonnummer','$Bild')";
        if ($mysqli->query($sql) === TRUE) {
            printf("Student wurde angelgt.\n");
        }
        echo $Bild;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



//Datenbank Verbingung schliessen
$mysqli->close();


