<?php
session_start();
include ("php/connection.php");
include ("php/loginButton.php");

// Prevents regular user from accessing this page
if (!isset($_SESSION['admin']) || $_SESSION['admin'] < 1) {
    header("Location: login-page.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIBRIL HAIRULZIHAN</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/addEntry.css">
    <script src="js/addEntry.js" defer></script>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Kode+Mono:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <h1 id="logo">J I B R I L</h1>
        <nav>
            <ul>
                <li><a href="index.php">About</a></li>
                <li><a href="skills.php">Skills</a></li>
                <li><a href="experience.php">Experience</a></li>
                <li><a href="education.php">Education</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="viewBlog.php">Blog</a></li>
            </ul>
        </nav>
        <a href="<?php echo $login['link'] ?>" id="login">
            <?php echo $login['status'] ?>
        </a>
    </header>

    <div id="container">
        <form method="POST" action="php/addPost.php">
            <legend>Add Blog</legend>
            <fieldset>
                <div id="fieldset-grid">
                    <input type="text" id="title" placeholder="Title" name="title" class="input-box">
                    <textarea placeholder="Enter text here" name="content" id="post-content"
                        class="input-box"></textarea>
                    <div id="buttons">
                        <input type="submit" value="POST">
                        <input type="reset" value="CLEAR">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>