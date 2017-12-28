<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 26.11.2017
 * Time: 11:33
 */
$navigation = ["index.php" => "Startseite", "student.php" => "Studenten", "abschlussarbeit.php" => "Abschlussarbeiten", "betreuer.php" => "Betreuer", "StudierendeAbschlussarbeit.php" => "Arbeiten vor Abgabe", "bewerteteArbeiten.php" => "Bewertete Arbeiten"];

foreach ($navigation as $nav => $titel){
    echo "<a href=$nav>$titel</a><br>";
}