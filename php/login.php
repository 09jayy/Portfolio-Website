<?php

session_start();

include ("connection.php");

$_SESSION["login_error"] = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $name, $pass);

    $name = $_POST['email'];
    $pass = $_POST['password'];
    $stmt->execute();
    $results = $stmt->get_result();

    if ($results->num_rows == 1) {
        $row = $results->fetch_assoc();
        // Set session variables
        $_SESSION['admin'] = $row['admin'];
        $_SESSION['id'] = $row['id'];

        if ($_SESSION['admin'] >= 1) {
            header("Location: ../addEntry.php");
        } else {
            header("Location: ../viewBlog.php");
        }
    } else {
        $_SESSION["login_error"] = "Invalid email or password";
        header("Location: ../login-page.php");
    }
}