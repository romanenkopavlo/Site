<?php

$average_grade = 0;
$subjects = 0;

foreach ($_POST as $key => $value) {
    if (!is_numeric($value)) {
        $_POST[$key] = 0;
    }
}

foreach ($_POST as $key => $value) {
    $average_grade += $value;
    if ($key != "choix_specialite_abandonnee" && $key != "choix_specialite_1" && $key != "choix_specialite_2") {
        $subjects++;
    }
}

if ($subjects > 0) {
    $average_grade = $average_grade / $subjects;
    $average_grade = round($average_grade);
}