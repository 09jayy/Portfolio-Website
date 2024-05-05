<?php

session_start();

include ("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $_SESSION['date'] = $_GET['date'];
} else {
    $_SESSION['date'] = date('y') . "-" . date('m');
}
header("Location: ../viewBlog.php");
