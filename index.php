<?php

$connection = mysqli_connect("localhost", "root", "", "blog");

$query = "SELECT * FROM posts ORDER BY date DESC";
$query_run = mysqli_query($connection, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Site</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>My Blog</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="post.html">Add your post</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <?php
    
    if(mysqli_num_rows($query_run) > 0){
        while($row = mysqli_fetch_assoc($query_run)){

            ?>
       
  

    <main>
        <div class="container">
            <section class="blog-post">
            <h2><?php echo $row['title']; ?></h2>
            <p class="meta">Published on <strong><?php echo $row['date']; ?></strong> by <strong><?php echo $row['author']; ?></strong></p>
                <p><?php echo $row['content']; ?></p>
                <a href="#" class="read-more">Read More →</a>
            </section>

        </div>
    </main>

    <?php
}
    }
    ?>
    

    <footer>
        <div class="container">
            <p>&copy; 2024 My Blog. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
