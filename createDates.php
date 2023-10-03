<?php

$calendar = [];
$months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
$year = date('Y');
/*  If $year is not divisible by 4 then it is not a leap year
    If $year is divisible by 4 but not by 100 it is a leap year
    If $year is divisible by 4 and 100 it bust be divisible by 400 to be a leap year */
$isLeapYear = (($year % 4 !== 0) ? false : ($year % 100 !== 0)) ? true : ($year % 400 === 0);

function getMonthLength($month)
{
    global $isLeapYear;

    switch ($month) {
        case 'February':
            return ($isLeapYear) ? 29 : 28;
        case 'April':
        case 'June':
        case 'September':
        case 'November':
            return 30;
        default:
            return 31;
    }
}

foreach ($months as $month) {
    $calendar = [
        ...$calendar,
        $month => getMonthLength($month)
    ];
}
