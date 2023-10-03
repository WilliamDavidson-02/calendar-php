<?php

$calendar = [];
$months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
$year = $_SESSION['year'];
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
        [
            'month' => $month,
            'monthLength' => getMonthLength($month)
        ]
    ];
}

/* 
selected year is 2023
    in year we need to se all months and the dates
selected months is october
    we need to se all the date of october for the selected year
selected week is 41
    we need to see all the dates in week 41 of the selected year
selected day is october 3
    show october 3 of the selected year
*/