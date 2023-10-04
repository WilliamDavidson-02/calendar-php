<?php $dayToDisplay = $_SESSION['day'] <= 9 ? str_split($_SESSION['day'])[1] : $_SESSION['day']; ?>

<h4><?= date('l', mktime(0, 0, 0, $_SESSION['month'] + 1, $dayToDisplay, $_SESSION['year'])) ?></h4>
<div>
    <?php for ($i = 0; $i <= 23; $i++) :
        $time = ($i <= 9) ? "0$i" : "$i"; ?>
        <div class="hour-container">
            <div class="hour">
                <span class="time <?= (date('H') === $time) ? 'current-date-red-text' : ''; ?>"><?= $time . ':00'; ?></span>
                <div class="hour-line-break <?= (date('H') === $time) ? 'current-date-red-bg' : ''; ?>"></div>
            </div>
        </div>
    <?php endfor; ?>
</div>