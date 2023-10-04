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
        $month[] = ['day' => $prevMonthLength - $i, 'month' => $prevMonth];
    }
}

// Add current months dates
for ($i = 1; $i <= $calendar[$_SESSION['month']]['monthLength']; $i++) {
    if ($i === 1) {
        $month[] = ['day' => $i, 'month' => $_SESSION['month']];
    } else {
        $month[] = ['day' => $i];
    }
}

// Gets the remaining days of the last week of the month from the next month
if ($lastDayOfMonthOffset < 7) {
    for ($i = 1; $i <= 7 - $lastDayOfMonthOffset; $i++) {
        $month[] = ['day' => $i, 'month' => $_SESSION['month'] + 1];
    }
}

// We want to display 6 rows of weeks, some time depending on the month we might only get 5 row there for lets make on last row.
if (count($month) / 7 < 6) {
    $lastSunday = end($month)['day'] !== $calendar[$_SESSION['month']]['monthLength'] ? end($month)['day'] + 1 : 1;
    for ($i = 0; $i < 7; $i++) {
        $month[] = ['day' => $lastSunday + $i, 'month' => $_SESSION['month'] + 1];
    }
}

$splitMonth = [];

for ($i = 0; $i < 6; $i++) {
    $splitMonth[] = array_splice($month, 0, 7);
}

?>
<table class="calender">
    <thead>
        <?php foreach ($weekDays as $day) : ?>
            <th class="week-days-title"><?= $day; ?></th>
        <?php endforeach; ?>
    </thead>
    <?php foreach ($splitMonth as $week) : ?>
        <tr>
            <?php foreach ($week as $key => $day) : ?>
                <td class="<?= ($key === 5 || $key === 6) ? 'red-day-bg' : ''; ?>">
                    <div class="calender-day <?= isset($day['month']) ? ($day['month'] !== $_SESSION['month'] ? 'month-dark-text' : '') : ''; ?>">
                        <div>
                            <span><?= $day['day']; ?> </span>
                            <?php if (isset($day['month']) && $day['day'] === 1) : ?>
                                <span><?= date('M', mktime(0, 0, 0, $day['month'] + 1, 1, $_SESSION['year'])) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>