<?php
session_start();

if (isset($_SESSION['id']) || isset($_SESSION['admin']) || isset($_SESSION['date'])) {
    session_unset();
    header("Location: ../index.php");
} else {
    header("Location: ../login-page.php");
}