<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/createDates.php';

date_default_timezone_set("Europe/Stockholm");

$dateType = (isset($_POST['dateType'])) ? $_POST['dateType'] : 'month';

$currentDate = [
    'day' => date('d'),
    'month' => date('F'),
    'year' => date('Y')
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
                <button type="submit" name='dateSelection' value="prevDate"><i class="fa-solid fa-chevron-left"></i></button>
                <button type="submit" name='dateSelection' value="currentDate">Today</button>
                <button type="submit" name='dateSelection' value="nextDate"><i class="fa-solid fa-chevron-right"></i></button>
            </form>
            <h1><?= ucwords($currentDate['month']); ?><span class="year-title"><?= ucwords($currentDate['year']); ?></span></h1>
        </nav>
        <div>
            <?php require __DIR__ . '/calendar' . ucwords($dateType) . '.php'; ?>
        </div>
    </section>
</main>
<?php require_once __DIR__ . '/footer.php'; ?>