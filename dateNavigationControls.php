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
            $_SESSION['month'] = date('m') - 1;
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
    } else if ($dateType === 'week') {
        if (in_array($operation, ['prevYear', 'nextYear'])) {
            $_SESSION['day'] += $operation === 'prevYear' ? -7 : 7;

            // Checks if day is less then 1 or greater then the month length.
            if ($_SESSION['day'] < 1) {
                $_SESSION['day'] = date('t', strtotime($_SESSION['year'] . "-" . $_SESSION['month'] . "-01")) + $_SESSION['day'];
                $_SESSION['month']--;
                if ($_SESSION['month'] < 0) {
                    $_SESSION['month'] = 11;
                    $_SESSION['year']--;
                }
            } else if ($_SESSION['day'] > date('t', strtotime($_SESSION['year'] . "-" . $_SESSION['month'] + 2 . "-01"))) {
                // $_SESSION['month'] + 2, session month is index for the calender array and start a 0 but date start at 1.
                $_SESSION['day'] = $_SESSION['day'] - date('t', strtotime($_SESSION['year'] . "-" . $_SESSION['month'] + 1 . "-01"));
                $_SESSION['month']++;
                if ($_SESSION['month'] > 11) {
                    $_SESSION['month'] = 0;
                    $_SESSION['year']++;
                }
            }
        } else {
            $_SESSION['day'] = date('d');
            $_SESSION['month'] = date('m') - 1;
            $_SESSION['year'] = date('Y');
        }
    }
}
