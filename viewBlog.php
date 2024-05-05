<?php
function sortPostsByDateTime(&$posts)
{
    $length = count($posts);

    for ($i = 1; $i < $length; $i++) {
        $current = $posts[$i];
        $j = $i - 1;

        // Convert date and time strings to timestamps for comparison
        $currentTimestamp = strtotime($current['date'] . ' ' . $current['time']);

        // Compare current post with previous posts and insert it in the correct position
        while ($j >= 0 && strtotime($posts[$j]['date'] . ' ' . $posts[$j]['time']) < $currentTimestamp) {
            $posts[$j + 1] = $posts[$j];
            $j--;
        }
        $posts[$j + 1] = $current;
    }

    return $posts;
}
function formatDate($date)
{
    $format = explode("-", $date);
    return $format[2] . " / " . $format[1];
}

function formatTime($time)
{
    return explode(":", $time)[0] . ":" . explode(":", $time)[1];
}

session_start();
include ("php/connection.php");
include ("php/idFunctions.php");
include ("php/loginButton.php");

$stmt = $conn->prepare("SELECT * FROM posts WHERE MONTH(date) = ? AND YEAR(date) = ?");
$stmt->bind_param("ss", $month, $year);

// Set date 
if (!isset($_SESSION['date'])) {
    // Default to current month and year
    $month = date('m');
    $year = date('Y');
} else {
    // Get month and year from session
    list($year, $month) = explode("-", $_SESSION['date']);
}

$stmt->execute();
$posts = mysqli_fetch_all($stmt->get_result(), MYSQLI_ASSOC);

$sorted_posts = sortPostsByDateTime($posts);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JIBRIL - Blog</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/mobile/mobile-blog.css">

    <script src="js/viewBlog.js" defer></script>

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
            <?php echo $login['status']; ?>
        </a>
    </header>

    <div id="container">
        <div id="page-header">
            <figure>
                <img src="images/coding-background-use.jpg">
                <figcaption>BLOG</figcaption>
            </figure>
        </div>

        <section>
            <div id="blog-controls">
                <!-- Search for blogs by month -->
                <form method="GET" action="php/changeDate.php" id="select-month">
                    <input type="month" id="month-input" name="date" required
                        value="<?php echo $year . "-" . $month; ?>">
                    <input type="submit" value="Search">
                </form>

                <!-- Add new post -->
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
                    <a href="addEntry.php" id="add-post">+ New Post</a>
                <?php } ?>
            </div>

            <!-- Display all posts -->
            <?php foreach ($sorted_posts as $post) { ?>
                <article>
                    <div class='blog-head'>
                        <h1>
                            <?php echo $post['title'] ?>
                        </h1>
                        <h2>
                            <?php echo formatDate($post['date']) . " @ " . formatTime($post["time"]) ?>
                        </h2>
                    </div>
                    <div class='content'>
                        <p>
                            <?php echo $post['content'] ?>
                        </p>
                    </div>
                    <!-- Reply and delete post -->
                    <div class="reply-delete-post">
                        <?php if (isset($_SESSION['id'])) { ?>
                            <button class='open-comment'>Reply</button>
                        <?php } else { ?>
                            <a href='login-page.php' class='open-comment'>Reply</a>
                        <?php } ?>
                        <!-- Delete Post -->
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
                            <form method='POST' action='php/deletePost.php' class="delete-form">
                                <input type='hidden' name='id' value='<?php echo $post['id'] ?>'>
                                <input type='submit' value='DELETE' class='delete-btn'>
                            </form>
                        <?php } ?>
                    </div>

                    <!-- Add comment form -->
                    <form method='POST' action='php/addComment.php' class='comment-form'>
                        <textarea name='comment-content' placeholder='Comment...' class='comment-area' rows='1'
                            maxlength="300"></textarea>
                        <input type='hidden' name='post-id' value='<?php echo $post['id'] ?>'>
                        <input type='hidden' name='user-id' value='<?php echo $_SESSION['id'] ?>'>

                        <div class="write-comment-footer">
                            <p class="chr-count">0 / 300</p>
                            <input type='submit' value='POST' class="post-comment-btn">
                        </div>
                    </form>

                    <!-- Display Comments -->
                    <?php
                    // Fetch comments
                    $stmt = $conn->prepare("SELECT * FROM comments WHERE id IN (SELECT comment_id FROM post_comments WHERE post_id = ?)");

                    $stmt->bind_param("s", $post_id_get_comments);
                    $post_id_get_comments = $post['id'];

                    $stmt->execute();
                    $comments = $stmt->get_result();

                    // Output comments
                    foreach ($comments as $comment) { ?>
                        <article class='comment-box'>
                            <div class="blog-head comment-head">
                                <h1>
                                    <?php echo "user" . $comment['user_id'] ?>
                                </h1>
                                <h2>
                                    <?php echo formatDate($comment['date']) . " @ " . formatTime($comment['time']) ?>
                                </h2>
                            </div>
                            <p class="content">
                                <?php echo $comment['content'] ?>
                            </p>
                            <!-- Delete Comment -->
                            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
                                <form method='POST' action='php/deleteComment.php' class="delete-form">
                                    <input type='hidden' name='id' value='<?php echo $comment['id'] ?>'>
                                    <input type='submit' value='DELETE' class='delete-btn'>
                                </form>
                            <?php } ?>
                        </article>
                    <?php } ?>
                </article>
            <?php } ?>
        </section>

        <footer>
            <div id="footer-links">
                <article id="socials">
                    <h1>Socials</h1>
                    <ul>
                        <li><img src="images/github.png"><a href="https://github.com/jibril0912" target="_blank">
                                <p>Github</p>
                            </a></li>
                        <li><img src="images/linkedin.png"><a
                                href="https://www.linkedin.com/in/jibril-hairulzihan-89b91a294/" target="_blank">
                                <p>Linkedin</p>
                            </a></li>
                    </ul>
                </article>
                <article id="contact">
                    <h1>Contact</h1>
                    <ul>
                        <li><img src="images/email.png">
                            <p>jibril.hairulzihan@outlook.com</p>
                        </li>
                        <li><img src="images/phone.png">
                            <p>+44 7456 029915</p>
                        </li>
                    </ul>
                </article>
            </div>
            <article id="license">
                &copy Jibril Hairulzihan 2024
            </article>
        </footer>

    </div>
</body>

</html>