<?php
    include("connection.php");

    $username_to_post_as = $_GET['username'];
    $post_body = $_POST['postbody'];

    $insert_query = "INSERT INTO posts(username, body) VALUES(?, ?);";
    $insertStatement = mysqli_prepare($conn,$insert_query);
    mysqli_stmt_bind_param($insertStatement, 'ss',$username_to_post_as,$post_body);
    
    if(mysqli_stmt_execute($insertStatement)) {
        usleep(10000);
        header("Location: ../posts.php");
        exit();
    } else {
        header("Location: ../error.php");
        exit();
    }
?>