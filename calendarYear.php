<div class="year-container">
    <?php foreach ($calendar as $month) : ?>
        <div class="year-card">
            <h3><?= $month['month'] ?></h3>
            <div class="month-grid">
                <?php for ($day = 1; $day <= $month['monthLength']; $day++) : ?>
                    <div class="month-date-card">
                        <?= $day; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>