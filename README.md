# Portfolio Website

The purpose of this repository was showcase my programming projects within a website. This website uses both client and server side processing. It is organised into different pages of my skills, experience, education, projects and a blog.

## Contents

1. [Noteable Features](#noteable-features)
2. [Database Structure](#database-structure)
3. [Demonstration](#demonstration)
   - [index.php](#index-page)
   - [viewBlog.php](#blog-page)

## Noteable Features

- Server Side driven Account System
- Third Normal Form Database storage
- Adding and deleting blog posts
- Adding and deleting comments linked to a blog post

## Database Structure

![Database Designer View from localhost/phpmyadmin](https://github.com/09jayy/09jayy/blob/main/assets/Portfolio-Website/database-designer-view.png?raw=true)

Users can either be of an _admin_ or _user_ status indicated by the Boolean admin field. All users can add comments which are linked to the respective posts via the `post_comments` table. Admins will be able to add and delete blog posts as well as deletion of comments.

## Demonstration

### Index Page

![Screenshot of index.php page which acts as the about page](https://github.com/09jayy/09jayy/blob/main/assets/Portfolio-Website/index-page.png?raw=true)

### Blog Page

<img src="https://github.com/09jayy/09jayy/blob/main/assets/Portfolio-Website/blog-user-view.png?raw=true" alt="viewBlog.php page when regular user is logged in" style="width: 40vw">
<img src="https://github.com/09jayy/09jayy/blob/main/assets/Portfolio-Website/blog-admin-view.png?raw=true" alt="viewBlog.php page when admin user is logged in" style="width: 40vw"><br>
First image shows the page when logged in as a regular user, second image shows the page when logged in as an admin.

### Experience Page

![Screenshot of experience.php](https://github.com/09jayy/09jayy/blob/main/assets/Portfolio-Website/experience-page.png?raw=true)
