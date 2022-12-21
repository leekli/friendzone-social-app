<?php
    include("connection.php");

    // Adds the username to the users table
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    // Check the email address does not exist first
    $select_statement = "SELECT * FROM users WHERE email = ?";
    $userStatement = mysqli_prepare($conn, $select_statement);
    mysqli_stmt_bind_param($userStatement, 's',$new_email);
    mysqli_stmt_execute($userStatement);
    $result = mysqli_stmt_get_result($userStatement);
    $getData = mysqli_fetch_assoc($result);

    if (empty($getData)) {
        // If email address is not taken, then add the new user to the users database
        $insert_query = "INSERT INTO users(username,email) VALUES(?, ?);";
        $insertStatement = mysqli_prepare($conn,$insert_query);
        mysqli_stmt_bind_param($insertStatement, 'ss',$new_username,$new_email);
        $result = mysqli_stmt_execute($insertStatement);

        if ($result) {
            // Adds the password to the passwords table
            $input_pass_value = $_POST['password'];
            $new_pass = password_hash($input_pass_value, PASSWORD_DEFAULT);
            $user_to_set_pass = $_POST['username'];
            $insert_query = "INSERT INTO passwords(username,password) VALUES(?, ?);";
            $insertStatement = mysqli_prepare($conn,$insert_query);
            mysqli_stmt_bind_param($insertStatement, 'ss',$user_to_set_pass,$new_pass);
            $pass_result = mysqli_stmt_execute($insertStatement);
    
            if ($pass_result) {
                header("Location: ../index.php");
                exit();
            } else {
                header("Location: ../error.php");
                exit();
            }
    
        } else {
            header("Location: ../error.php");
            exit();
        }
    } else {
        header("Location: ../error.php?error=userexists");
        exit();
    }
?>
