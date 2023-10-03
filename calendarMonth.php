<div class="month-grid">
    <?php for ($day = 1; $day <= $calendar[$_SESSION['month']]['monthLength']; $day++) : ?>
        <div class="month-date-card">
            <?= $day; ?>
        </div>
    <?php endfor; ?>
</div>