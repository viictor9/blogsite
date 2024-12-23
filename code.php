<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Test SweetAlert</title>
</head>

<?php
ob_start();


$connection = new mysqli("localhost", "root", "", "blog");

if($connection->connect_error){
    die("Connection failed: ". $connection->connect_error);
}



if(isset($_POST['post']))
{
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    $query = "INSERT INTO posts(title, author, content) VALUES('$title', '$author', '$content')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        // Success: Alert user and redirect after alert
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Post Added!',
                text: 'Your blog post was added successfully.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php'; // Redirect after success
            });
        </script>";
    } else {
        // Failure: Show error alert
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to add your post. Please try again.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'add_post.php'; // Redirect back to form
            });
        </script>";
    }
    exit; // Ensure no further output
}



ob_end_flush();
?>