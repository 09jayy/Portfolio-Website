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

    <title>JIBRIL - Skills</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/skills.css">
    <link rel="stylesheet" href="css/mobile/mobile-skills.css">


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
                <figcaption>SKILLS</figcaption>
            </figure>
        </div>

        <!-- FRONT END CARD -->
        <section id="front-end" class="skill-card">
            <h1>FRONT<br>END</h1>

            <article class="desc">
                <p>
                    Experienced in front-end development and design. Created user-friendly and attractive websites as
                    well as Minimalistic software GUIs.
                </p>
            </article>

            <article class="languages">
                <h2>Languages</h2>
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li>Python</li>
                </ul>
            </article>

            <article class="tech">
                <h2>Technologies</h2>
                <ul>
                    <li>React</li>
                    <li>Bootstrap</li>
                    <li>Tailwind</li>
                    <li>Tkinter</li>
                    <li>CustomTkinter</li>
                </ul>
            </article>
        </section>

        <!-- BACK END CARD -->
        <section id="back-end" class="skill-card">
            <h1>BACK<br>END</h1>

            <article class="desc">
                <p>
                    Developed a multitude of software with a focus on back-end processing. This includes a range between
                    exhaustive backtracking algorithms and mathmatical calculations.
                </p>
            </article>

            <article class="languages">
                <h2>Languages</h2>
                <ul>
                    <li>Python</li>
                    <li>Java</li>
                    <li>SQL</li>
                    <li>C++</li>
                    <li>Node.js</li>
                </ul>
            </article>

            <article class="tech">
                <h2>Technologies</h2>
                <ul>
                    <li>Laravel</li>
                    <li>SFML</li>
                    <li>Pygame</li>
                    <li>OpenAI</li>
                    <li>MongoDB</li>
                </ul>
            </article>
        </section>

        <!-- OTHER SKILLS CARD -->
        <section id="other-skills" class="skill-card">
            <h1>OTHER<br>SKILLS</h1>

            <article class="desc">
                <p>
                    Through my experiences in team and personal projects, I have develop both a range of hard and soft
                    skills applicable to any type of software engineering work.
                </p>
            </article>

            <article class="languages">
                <h2>Hard-Skills</h2>
                <ul>
                    <li>Requests when using APIs</li>
                    <li>Language proficiency in a various programming paradigms</li>
                    <li>Web & Mobile development</li>
                    <li>Algorithms and Data Structures</li>
                    <li>Testing and Debugging</li>
                </ul>
            </article>

            <article class="tech">
                <h2>Soft-Skills</h2>
                <ul>
                    <li>Communication</li>
                    <li>Teamwork</li>
                    <li>Adaptibility</li>
                    <li>Creativity</li>
                </ul>
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