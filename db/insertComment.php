<?php
    include("connection.php");

    $post_id = $_GET['post_id'];
    $username_to_comment_as = "testuser1";
    $comment_body = $_POST['commentbody'];

    $insert_query = "INSERT INTO comments(post_id,username,body) VALUES(?, ?, ?);";
    $insertStatement = mysqli_prepare($conn,$insert_query);
    mysqli_stmt_bind_param($insertStatement, 'iss',$post_id,$username_to_comment_as,$comment_body);
    
    if(mysqli_stmt_execute($insertStatement)) {
        usleep(10000);
        header("Location: ../posts.php");
        exit();
    } else {
        header("Location: ../error.php");
        exit();
    }
?>