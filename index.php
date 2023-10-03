<?php

session_start();

date_default_timezone_set("Europe/Stockholm");

require_once __DIR__ . '/header.php';

$dateType = (isset($_SESSION['dateType'])) ? $_SESSION['dateType'] : 'month';
$_SESSION['year'] = (isset($_SESSION['year'])) ? $_SESSION['year'] : date('Y');
$_SESSION['month'] = (isset($_SESSION['month'])) ? $_SESSION['month'] : date('m') - 1;
$_SESSION['day'] = (isset($_SESSION['day'])) ? $_SESSION['day'] : date('d');

require_once __DIR__ . '/dateNavigationControls.php';
require_once __DIR__ . '/createDates.php';

$currentDate = [
    'day' => $_SESSION['day'],
    'month' => $calendar[$_SESSION['month']]['month'],
    'year' => $_SESSION['year']
];

?>
<main>
    <form method="post" class="date-type-container">
        <button type="submit" name="dateType" value="day" class="date-select <?= ($dateType === 'day') ? 'selected-date' : '' ?>">Day</button>
        <button type="submit" name="dateType" value="week" class="date-select <?= ($dateType === 'week') ? 'selected-date' : '' ?>">Week</button>
        <button type="submit" name="dateType" value="month" class="date-select <?= ($dateType === 'month') ? 'selected-date' : '' ?>">Month</button>
        <button type="submit" name="dateType" value="year" class="date-select <?= ($dateType === 'year') ? 'selected-date' : '' ?>">Year</button>
    </form>
    <section>
        <nav class="date-nav">
            <form class="date-selection-container" method="post">
                <button type="submit" name='dateSelection' value="prevYear"><i class="fa-solid fa-chevron-left"></i></button>
                <button type="submit" name='dateSelection' value="currentYear">Today</button>
                <button type="submit" name='dateSelection' value="nextYear"><i class="fa-solid fa-chevron-right"></i></button>
            </form>
            <h1 class="date-title-container">
                <?php if ($dateType === 'day') : ?>
                    <span class="date-title"><?= $currentDate['day']; ?></span>
                <?php endif; ?>
                <span><?= $currentDate['month']; ?></span>
                <span class="date-title"><?= $currentDate['year']; ?></span>
            </h1>
        </nav>
        <div>
            <?php require __DIR__ . '/calendar' . ucwords($dateType) . '.php'; ?>
        </div>
    </section>
</main>
<?php require_once __DIR__ . '/footer.php'; ?>