<?php

session_start();

include ("connection.php");
include ("idFunctions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);
    $gen_comment_id = generate_valid_id($conn, "comments");

    $stmt = $conn->prepare("INSERT INTO comments (id, user_id, content, date, time) VALUES (?, ?, ?, NOW(), NOW())");
    $stmt_link = $conn->prepare("INSERT INTO post_comments (post_id, comment_id) VALUES (?, ?)");

    $stmt->bind_param("sss", $comment_id, $user_id, $comment);
    $stmt_link->bind_param("ss", $post_id, $comment_id);

    $user_id = $_SESSION['id'];
    $comment_id = $gen_comment_id;
    $comment = $_POST['comment-content'];
    $post_id = $_POST['post-id'];

    $stmt->execute();
    $stmt_link->execute();

    header("Location: ../viewBlog.php");
}