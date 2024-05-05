<?php

session_start();

include ("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $stmt1 = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt1->bind_param("s", $id);

    $id = $_POST['id'];

    $stmt1->execute();

    header("Location: ../viewBlog.php");
}