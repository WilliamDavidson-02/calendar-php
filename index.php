<?php
require_once __DIR__ . '/header.php';

$dateType = (isset($_POST['dateType'])) ? $_POST['dateType'] : 'month';
$calendar = [
    'days' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],
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
        <h1><?= ucwords($calendar['month']); ?><span class="year-title"><?= ucwords($calendar['year']); ?></span></h1>
    </section>
</main>
<?php require_once __DIR__ . '/footer.php'; ?>