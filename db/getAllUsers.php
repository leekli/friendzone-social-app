<?php
    include("connection.php");

    $logged_in_user = $_SESSION['username'];

    $statement = "SELECT username FROM users;";
    $result = mysqli_query($conn, $statement);

    if(!$result){
        echo mysqli_error($conn);
    }else{
        echo '<br />';
        echo '<header id="homepageHeader">';
        echo '<h3>👦 User List 👩</h3>';
        echo '<small>Here is a list of all the FriendZone users:</small>';
        echo '<br /><br />';
        echo '</header>';
        while($row = mysqli_fetch_assoc($result)) {
            $avatar_num = rand(1,5);
            echo '<center>';
            echo '<div class="card" style="width: 10rem;">';
            echo '<img src="images/avatar' . $avatar_num . '.png" class="card-img-top" alt="User image">';
            echo '<div class="card-body" style="background-color:#e3f2fd;">';
            echo "<h5 class='card-title'>{$row['username']}</h5>";
            echo '<a href="users.php?username=' . $row['username'] . '" class="btn btn-primary">Go to profile</a>';
            echo '</div>';
            echo '</div>';
            echo '</center>';
            echo "<br />";
        }
    }
?>