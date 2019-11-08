<?php

include("db.php");

if (isset($_POST['save_task'])){
     $title = $_POST['title'];
     $description = $_POST['description'];
     //echo $title;
     //echo $description;

     $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
     $result = mysqli_query($conn, $query);
     if (!$result)
     {
         die("Query Failed!");
     }
     $_SESSION['message'] = 'Task Saved';
     $_SESSION['message_type'] = 'danger';

    // echo 'saved';
     header("Location: index.php");
}

?>