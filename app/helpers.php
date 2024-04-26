<?php

// helpers.php

function customMonthName($monthNumber) {
    $customNames = [
        1 => 'Janvier',
        2 => 'Février',
        3 => 'Mars',
        4 => 'Avril',
        5 => 'Mai',
        6 => 'Juin',
        7 => 'Juillet',
        8 => 'Août',
        9 => 'Septembre',
        10 => 'Octobre',
        11 => 'Novembre',
        12 => 'Décembre'
    ];

    return $customNames[$monthNumber] ?? '';
}

function formatFrenchDate($date) {
    $dateObj = new DateTime($date);

    $day = $dateObj->format("d");
    $month = customMonthName(intval($dateObj->format("m")));
    $year = $dateObj->format("Y");

    return $day . " " . $month . " " . $year;
}


?>
