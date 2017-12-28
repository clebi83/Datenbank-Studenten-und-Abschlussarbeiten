<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 03.12.2017
 * Time: 16:06
 */
include "header.php";
require "dbConnect.php";
/*
$sql = "SELECT * FROM `tblartderarbeit`";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "idtblArtderArbeit: " . $row["idtblArtderArbeit"]. " - ArtderArbeit: " . $row["ArtderArbeit"]. "<br>";
    }
} else {
    echo "0 results";
}
*/
?>

<head>
    <title>Formular Abschlussarbeiten</title>
    <style>
label {
    display: block;
}
    </style>
</head>
<body>
<p>Bitte neue Abschlussarbeit eintragen:</p>
<form method="post" action="newAbschlussarbeit.php" enctype="multipart/form-data">
    <p>
        <label for="Student">Student der de Arbeit schreibt</label>
        <select name="Student" id="Student">
            <?php
            $sql = "SELECT * FROM `tblstudierende`";
            $result = $mysqli->query($sql);
            while($row = $result->fetch_assoc()){
                echo '<option value="'. $row["MatrikelNummer"] .'">' . $row["Name"] . ', ' . $row["Vorname"] . '</option>';
            }
            ?>

        </select>
    </p>
    <p>
        <label for="Titel">Titel der Abschlussarbeit</label>
        <input type="text" name="Titel" id="Titel">
    </p>
    <p>
        <label for="Studienrichtung">Studienrichtung</label>
        <input type="text" name="Studienrichtung" id="Studienrichtung">
    </p>

    <p>
        <label for="ArtderArbeit"> Art der Arbeit</label>

        <select name="ArtderArbeit" id="ArtderArbeit">

<?php
    $sql = "SELECT * FROM `tblartderarbeit`";
    $result = $mysqli->query($sql);
            while($row = $result->fetch_assoc()){
                echo '<option value="'. $row["idtblArtderArbeit"] .'">' . $row["ArtderArbeit"] . '</option>';
            }
?>
        </select>

    </p>
    <p>
        <label for="Hochschule">Hochschule</label>
        <input type="text" name="Hochschule" id="Hochschule">
    </p>
    <p>
        <label for="DatumBewilligung">Datum Bewilligung</label>
        <input type="date" name="DatumBewilligung" id="DatumBewilligung">
    </p>
    <p>
        <label for="Abgabetermin">Abgabetermin</label>
        <input type="date" name="Abgabetermin" id="Abgabetermin">
    </p>
    <p>
        <label for="Note">Note</label>
        <input type="number" step=0.1 min=1 max=5 name="Note" id="Note"/>
    </p>
    <p>
        <label for=" =Betreuer">Betreuer (mehrfach Auswahl mit "strg")</label>
        <select multiple name="Betreuer[]" id="Betreuer">
            <?php
            $sql = "SELECT * FROM `tblbetreuergutachter`";
            $result = $mysqli->query($sql);
            while($row = $result->fetch_assoc()){
                echo '<option value="'. $row["idtblBetreuerGutachter"] .'">' . $row["Name"] . '</option>';
            }
            ?>

        </select>
    </p>
    <p>
        <label for=" =Gutachter">Gutachter auswählen (mehrfach Auswahl mit "strg")</label>
        <select multiple name="Gutachter[]" id="Gutachter">
            <?php
            $sql = "SELECT * FROM `tblbetreuergutachter`";
            $result = $mysqli->query($sql);
            while($row = $result->fetch_assoc()){
                echo '<option value="'. $row["idtblBetreuerGutachter"] .'">' . $row["Name"] . '</option>';
            }
            ?>

        </select>
    </p>
    <input type="submit">
</form>
</body>