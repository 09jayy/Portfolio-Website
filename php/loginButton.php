<?php
// If the user is logged in, the button will display "LOGOUT" and link to the logout page
if (isset($_SESSION['id']) || isset($_SESSION['admin'])) {
    $status = "LOGOUT";
    $link = "php/logout.php";
} else {
    $status = "LOGIN";
    $link = "login-page.php";
}
$login = compact('status', 'link');