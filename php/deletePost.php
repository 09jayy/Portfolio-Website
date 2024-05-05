<?php

session_start();

include ("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $stmt1 = $conn->prepare("DELETE FROM comments WHERE id IN (SELECT comment_id FROM post_comments WHERE post_id = ?)");
    $stmt1->bind_param("s", $id);

    $stmt2 = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt2->bind_param("s", $id);

    $id = $_POST['id'];

    $stmt1->execute();
    $stmt2->execute();

    header("Location: ../viewBlog.php");
}