<?php

$week = [];
$weekDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

$currentDayOffset = date('N', mktime(0, 0, 0, $_SESSION['month'] + 1, $_SESSION['day'], $_SESSION['year']));

// Get days before current day of the week.
if ($currentDayOffset > 1) {
    for ($i = $currentDayOffset - 1; $i >= 1; $i--) {
        $newDay = $_SESSION['day'] - $i;
        if ($newDay >= 1) {
            $week[] = $newDay;
        } else {
            $newDay = $calendar[$_SESSION['month'] - 1]['monthLength'] - $i;
            $week[] = $newDay;
        }
    }
    sort($week);
}

echo '<pre/>';
print_r($_SESSION['day']);

echo '<pre/>';
print_r($_SESSION['month']);

echo '<pre/>';
print_r($_SESSION['year']);

echo '<pre/>';
print_r($week);

?>
<div class="week-grid">

</div>