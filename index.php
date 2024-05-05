<?php

session_start();

include ("php/connection.php");
include ("php/loginButton.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIBRIL HAIRULZIHAN</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mobile/mobile-index.css">

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
                <li><a href="#about-me">About</a></li>
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
        <section id="hero">
            <div id="hero-text">
                <h1><span id="hero-prefix">I am </span><span id="hero-name">J I B R I L</span></h1>
                <p id="subtitle">an Aspiring Software Engineer</p>
                <a href="#about-me" id="read-more">READ MORE</a>
            </div>
            <img src="images/hero-header1.png" alt="hero-image">
        </section>

        <section id="about-me">
            <h1>ABOUT ME</h1>
            <article>
                <aside>
                    <figure>
                        <img src="images/photo.png" alt="Photograph portrait of Jibril Hairulzihan">
                        <figcaption>Jibril Hairulzihan</figcaption>
                    </figure>
                </aside>
                <div id="about-me-text">
                    <p class="bold-italic">BSc Computer Science Student @ Queen Mary University of London</p>
                    <p>My goal is to become a qualified software engineer working in the Big Tech companies such as
                        Google, Meta, Amazon etc. This journey starts by graduating with a Bachelors in Computer Science
                        with a portfolio of projects and a plethora of experience. My interests lie in both front and
                        back-end development, therefore I explore both to inevitably choose one or become a full-stack
                        developer. I am open to a completing a Masters Degree so that I can specialise in certain fields
                        such as Artifical Intelligence or Data Science.</p>
                    <p>Continue exploring my portfolio website to further learn about my current skillset and
                        experiences as well as my future goals</p>
                </div>
            </article>
        </section>

        <section id="explore">
            <h1>EXPLORE</h1>
            <article id="explore-container">
                <a href="skills.php" class="explore-link">
                    <div class="explore-card" id="skills-card">
                        <p>SKILLS</p>
                    </div>
                </a>
                <a href="experience.php" class="explore-link">
                    <div class="explore-card" id="experience-card">
                        <p>EXPERIENCE</p>
                    </div>
                </a>
                <a href="education.php" class="explore-link">
                    <div class="explore-card" id="education-card">
                        <p>EDUCATION</p>
                    </div>
                </a>
                <a href="projects.php" class="explore-link">
                    <div class="explore-card" id="projects-card">
                        <p>PROJECTS</p>
                    </div>
                </a>
                <a href="viewBlog.php" class="explore-link">
                    <div class="explore-card" id="blog-card">
                        <p>BLOG</p>
                    </div>
                </a>
            </article>
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