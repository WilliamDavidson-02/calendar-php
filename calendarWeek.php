<?php

$week = [];
$weekDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

$currentDayOffset = date('N', mktime(0, 0, 0, $_SESSION['month'] + 1, $_SESSION['day'], $_SESSION['year']));

// Get days before current day of the week.
$nextMonthCount = 0;

if ($currentDayOffset > 1) {
    $prevMonthDays = [];
    for ($i = $currentDayOffset - 1; $i >= 1; $i--) {
        $newDay = $_SESSION['day'] - $i;
        if ($newDay >= 1) {
            $week[] = $newDay;
        } else {
            $prevMonthDays[] = $calendar[$_SESSION['month'] - 1]['monthLength'] - $nextMonthCount;
            $nextMonthCount++;
        }
    }
    $week = array_merge(array_reverse($prevMonthDays), $week);
}

// The rest of the week.
$weekCount = count($week);
$nextMonthCount = 1;

for ($i = 0; $i < 7 - $weekCount; $i++) {
    if ($_SESSION['day'] + $i > $calendar[$_SESSION['month']]['monthLength']) {
        $week[] = $nextMonthCount;
        $nextMonthCount++;
    } else {
        $week[] = $_SESSION['day'] + $i;
    }
}

echo '<pre/>';
print_r($week);

?>
<div class="week-grid">

</div>