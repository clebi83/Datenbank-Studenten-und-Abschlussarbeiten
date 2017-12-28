<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 25.12.2017
 * Time: 13:20
 */
include "header.php";
require "dbConnect.php";


echo "<p>Übersicht zu allen abgeschlossenen und bewerteten Arbeiten.</p>\n";

// Tabellenüberschriften von View abfragen und als Tabellenheader ausgeben
try {
    $sql = "SHOW COLUMNS FROM `view_bewertete_arbeiten`";
    $result = $mysqli->query($sql);

    echo "<table border='1'>\n";
    echo "<tr>\n";

    while ($row = mysqli_fetch_array($result)) {
        echo "<th>" . htmlspecialchars($row['Field']) . "</th>";
    }
    echo "</tr>\n";

} catch (Exception $ex) {
    echo "Fehler: " . $ex->getMessage();
}

// Tabelleninhalt ausgeben
try {
    $sql = "SELECT * FROM `view_bewertete_arbeiten`";

    $result = $mysqli->query($sql);


    while ($zeile = mysqli_fetch_row($result)) {
        //print_r($zeile);
        echo "<tr>\n";
        foreach ($zeile as $Feld) {
            echo "<td>" . htmlspecialchars($Feld) . "</td>";
        }
        echo "\n</tr>";
    }
    echo "\n</table>";
} catch (Exception $ex) {
    echo "Fehler: " . $ex->getMessage();
}