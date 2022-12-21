<?php
    include("connection.php");

    $post_id = $_GET['post_id'];

    $delete_query = "DELETE FROM posts WHERE post_id = ?;";
    $deleteStatement = mysqli_prepare($conn,$delete_query);
    mysqli_stmt_bind_param($deleteStatement, 'i',$post_id);
    
    if(mysqli_stmt_execute($deleteStatement)) {
        usleep(10000);
        header("Location: ../posts.php");
        exit();
    } else {
        header("Location: ../error.php");
        exit();
    }
?>