<?php

if (isset($_POST['dateType'])) {
    $_SESSION['dateType'] = $_POST['dateType'];
    $dateType = $_POST['dateType'];
}

if (isset($_POST['dateSelection'])) {
    $operation = $_POST['dateSelection'];

    if ($dateType === 'year') {
        if (in_array($operation, ['prevYear', 'nextYear'])) {
            $_SESSION['year'] += $operation === 'prevYear' ? -1 : 1;
        } else {
            $_SESSION['year'] = date('Y');
        }
    } else if ($dateType === 'month') {
        if (in_array($operation, ['prevYear', 'nextYear'])) {
            $_SESSION['month'] += $operation === 'prevYear' ? -1 : 1;

            if ($_SESSION['month'] < 0) {
                $_SESSION['month'] = 11;
                $_SESSION['year']--;
            } else if ($_SESSION['month'] > 11) {
                $_SESSION['month'] = 0;
                $_SESSION['year']++;
            }
        } else {
            $_SESSION['month'] = date('m') - 1;
            $_SESSION['year'] = date('Y');
        }
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
