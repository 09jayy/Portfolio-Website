<?php

session_start();

include ("connection.php");
include ("idFunctions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $id = generate_valid_id($conn, "posts");

    $stmt = $conn->prepare("INSERT INTO posts (id,title,content,date,time) VALUES (?, ?,?,NOW(),NOW())");
    $stmt->bind_param("sss", $id, $title, $content);
    $stmt->execute();

    header("Location: ../viewBlog.php");
}