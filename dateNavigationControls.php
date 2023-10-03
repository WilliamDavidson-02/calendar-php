<?php

if (isset($_POST['dateType'])) {
    $_SESSION['dateType'] = $_POST['dateType'];
    $dateType = $_POST['dateType'];
}

if (isset($_POST['dateSelection']) && $dateType === 'year') {
    switch ($_POST['dateSelection']) {
        case 'prevYear':
            $_SESSION['year']--;
            break;
        case 'nextYear':
            $_SESSION['year']++;
            break;
        default:
            $_SESSION['year'] = date('Y');
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
} else if (isset($_POST['dateSelection']) && $dateType === 'month') {
    switch ($_POST['dateSelection']) {
        case 'prevYear':
            if ($_SESSION['month'] === 0) {
                $_SESSION['month'] = 11;
                $_SESSION['year']--;
            } else {
                $_SESSION['month']--;
            }
            break;
        case 'nextYear':
            if ($_SESSION['month'] === 11) {
                $_SESSION['month'] = 0;
                $_SESSION['year']++;
            } else {
                $_SESSION['month']++;
            }
            break;
        default:
            $_SESSION['month'] = date('m') - 1;
            $_SESSION['year'] = date('Y');
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
