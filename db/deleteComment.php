<?php
    include("connection.php");

    $comment_id = $_GET['comment_id'];

    $delete_query = "DELETE FROM comments WHERE comment_id = ?;";
    $deleteStatement = mysqli_prepare($conn,$delete_query);
    mysqli_stmt_bind_param($deleteStatement, 'i',$comment_id);
    
    if(mysqli_stmt_execute($deleteStatement)) {
        usleep(10000);
        header("Location: ../posts.php");
        exit();
    } else {
        header("Location: ../error.php");
        exit();
    }
?>