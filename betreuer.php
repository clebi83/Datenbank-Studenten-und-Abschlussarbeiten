<?php
include "header.php";
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 26.11.2017
 * Time: 11:49
 */
?>
<head>
    <title>Formular für Betreuer</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
<p>Bitte neuen Betreuer eintragen:</p>
<form method="post" action="newBetreuer.php" enctype="multipart/form-data">
    <p>
        <label for="Titel">Titel</label>

        <select name="Titel" id="Titel" required>
            <option value="Herr">Herr</option>
            <option value="Frau">Frau</option>
        </select>
    </p>
    <p>
        <label for="Vorname">Vorname</label>
        <input type="text" name="Vorname" id="Vorname" required>
    </p>
    <p>
        <label for="Nachname">Nachname</label>
        <input type="text" name="Nachname" id="Nachname" required>
    </p>
    <p>
        <label for="Email">E-Mail</label>
        <input type="Email" name="Email" id="Email"required>
    </p>
    <p>
        <label for="Telefonnummer">Telefonnummer</label>
        <input type="tel" name="Telefonnummer" id="Telefonnummer" required>
    </p>
    <input type="submit">
</form>
</body>