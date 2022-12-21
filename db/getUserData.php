<?php
    include("connection.php");

    $select_statement = "SELECT * FROM users WHERE username = ?";
    $userStatement = mysqli_prepare($conn, $select_statement);
    mysqli_stmt_bind_param($userStatement, 's',$_SESSION['username']);
    mysqli_stmt_execute($userStatement);
    $result = mysqli_stmt_get_result($userStatement);
    $getData = mysqli_fetch_assoc($result);

    if (!empty($getData)) {
        echo '<form id="inputForm" action="db/updateUser.php?username=' . $getData['username'] . '" method="POST" style="background-color:#e3f2fd;">';
        echo "<fieldset disabled>";
        echo "<legend>Update your Profile:</legend>";
        echo '<div class="mb-3">';
        echo '<label for="username" class="form-label">Username <em>(Disabled)</em>:</label>';
        echo '<input type="text" id="usernameInput" class="form-control" name="usernameInput" placeholder="' . $getData['username'] . '">';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="email" class="form-label">Email Address <em>(Disabled)</em>:</label>';
        echo '<input type="text" id="emailInput" class="form-control" placeholder="' . $getData['email'] . '">';
        echo '</div>';
        echo "</fieldset>";
        echo '<div class="input-group">';
        echo '<span class="input-group-text">Bio:</span>';
        echo '<textarea class="form-control" id="biotext" name="biotext" aria-label="Add Bio here" placeholder="' . $getData['bio_body'] . '" required></textarea>';
        echo '</div>';
        echo '<br />';
        echo '<div class="input-group mb-3">';
        echo '<span class="input-group-text">Mobile #:</span>';
        echo '<input type="text" class="form-control" id="mobileNumInput" name="mobileNumInput" placeholder="' . $getData['mobile_num'] . '" required>';
        echo '</div>';
        echo '<center><p id="mobNumError"></p></center>';
        echo '<center><button type="submit" class="btn btn-secondary">Update Profile</button></center>';
        echo '<br />';
        echo "</form>";
        echo '<script type="text/javascript" src="scripts/myaccount.js" defer></script>';
    } else {
        header("Location: ../error.php");
        exit();
    }
?>