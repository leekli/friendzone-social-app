<?php
        include("connection.php");

        $email_address = $_POST['email'];
        $password = $_POST['password'];

        // Checks if email address is a valid one in the database
        $select_statement = "SELECT * FROM users WHERE email = ?";
        $userStatement = mysqli_prepare($conn, $select_statement);
        mysqli_stmt_bind_param($userStatement, 's',$email_address);
        mysqli_stmt_execute($userStatement);
        $result = mysqli_stmt_get_result($userStatement);
        $getData = mysqli_fetch_assoc($result);

        // If the email address exists, it then checks the password against the DB
        if (!empty($getData)) {
            $user_to_lookup = $getData['username'];
            $select_statement = "SELECT * FROM passwords WHERE username = ?";
            $userStatement = mysqli_prepare($conn, $select_statement);
            mysqli_stmt_bind_param($userStatement, 's',$user_to_lookup);
            mysqli_stmt_execute($userStatement);
            $pass_result = mysqli_stmt_get_result($userStatement);
            $pass_Data = mysqli_fetch_assoc($pass_result);
            $stored_password = $pass_Data['password'];

            if (password_verify($password, $stored_password)) {
                session_start();
                $_SESSION['id'] = session_id();
                $_SESSION['username'] = $user_to_lookup;
                $_SESSION['loggedin'] = true;
                header("Location: ../posts.php");
                exit();
            } else {
                header("Location: ../error.php?error=wronglogin");
                exit();
            }
        } else {
            header("Location: ../error.php?error=wronglogin");
            exit();
        }
?>