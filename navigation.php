<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 26.11.2017
 * Time: 11:33
 */
$navigation = ["index.php" => "Startseite", "student.php" => "Anlegen: Studenten", "abschlussarbeit.php" => "Anlegen: Abschlussarbeit", "betreuer.php" => "Anlegen: Betreuer", "StudierendeAbschlussarbeit.php" => "Ansicht: Arbeiten vor Abgabe", "bewerteteArbeiten.php" => "Ansicht: Bewertete Arbeiten"];

foreach ($navigation as $nav => $titel){
    echo "<a href=$nav>$titel</a><br>";
}