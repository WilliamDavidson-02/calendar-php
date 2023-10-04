<?php

$month = [];
$weekDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

$currentDayOffset = date('N', mktime(0, 0, 0, $_SESSION['month'] + 1, 1, $_SESSION['year']));
$lastDayOfMonthOffset = date('N', mktime(0, 0, 0, $_SESSION['month'] + 1, $calendar[$_SESSION['month']]['monthLength'], $_SESSION['year']));

// If the first day of the month is not a monday it will get the remaining days for the previous month.
if ($currentDayOffset > 1) {
    $prevMonth = $_SESSION['month'] - 1 < 0 ? 11 : $_SESSION['month'] - 1;
    $prevMonthLength = $calendar[$prevMonth]['monthLength'];
    // subtracting 2 so on the last iteration of the loop $i = 0 and $prevMonthLength - 0 = the last day of the previous month.
    for ($i = $currentDayOffset - 2; $i >= 0; $i--) {
        $month[] = $prevMonthLength - $i;
    }
}

// Add current months dates
for ($i = 1; $i <= $calendar[$_SESSION['month']]['monthLength']; $i++) {
    $month[] = $i;
}

// Gets the remaining days of the last week of the month from the next month
if ($lastDayOfMonthOffset < 7) {
    for ($i = 1; $i <= 7 - $lastDayOfMonthOffset; $i++) {
        $month[] = $i;
    }
}

// We want to display 6 rows of weeks, some time depending on the month we might only get 5 row there for lets make on last row.
if (count($month) / 7 < 6) {
    $lastSunday = end($month) !== $calendar[$_SESSION['month']]['monthLength'] ? end($month) + 1 : 1;
    for ($i = 0; $i < 7; $i++) {
        $month[] = $lastSunday + $i;
    }
}

?>

<div class="month-grid">
    <?php foreach ($weekDays as $day) : ?>
        <div class="week-days-title"><?= $day; ?></div>
    <?php endforeach;
    foreach ($month as $day) : ?>
        <div class="week-days-title"><?= $day; ?></div>
    <?php endforeach; ?>
</div>