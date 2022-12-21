<?php
    include("connection.php");

    $new_bio_body = $_POST['biotext'];
    $new_mobile_num = $_POST['mobileNumInput'];
    $user_to_change = $_GET['username'];
    $update_query = "UPDATE users SET bio_body = ?, mobile_num = ? WHERE username =  ?;";
    $updateStatement = mysqli_prepare($conn,$update_query);
    mysqli_stmt_bind_param($updateStatement, 'sss',$new_bio_body,$new_mobile_num,$user_to_change);

    if (mysqli_stmt_execute($updateStatement)) {
        header("Location: ../success.php");
        exit();
    } else {
        header("Location: ../error.php");
        exit();
    }
?>