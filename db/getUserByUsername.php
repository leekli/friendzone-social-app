<?php
    include("connection.php");

    $current_user = $_SESSION['username'];
    $profile_username = $_GET['username'];
    $avatar_number = rand(1,5);

    echo '<br />';
    echo '<center>';
    echo "<img src='images/avatar{$avatar_number}.png' width='70px' height='70px' alt='User profile image' />";
    echo '<br />';
    echo '<br />';
    echo "<h2>{$profile_username}'s Profile</h2>";
    echo '<br />';
    echo "<h6>📝 Here is a list of Posts which has {$profile_username} made:</h6>";

    $statement = "SELECT * FROM posts WHERE username = '{$profile_username}' ORDER BY date_posted DESC;";
    $result = mysqli_query($conn, $statement);
    $num_rows = mysqli_num_rows($result);

    if(!$result){
        echo mysqli_error($conn);
    }else{
        if($num_rows == 0) {
            echo "<br />";
            echo "<h6>There are no posts by this user yet.</h6>";
        } else {
            echo "<center>";
            echo "<small><em>(Ordered by date posted)</em></small><br /><br />";
            while($row = mysqli_fetch_assoc($result)) {
                $avatar_num = rand(1,5);
                echo '<div class="card" style="width: 80%;">';
                echo '<div class="card-body" style="background-color:#e3f2fd;">';
                echo "<h5 class='card-title'><img src='images/avatar{$avatar_num}.png' width='30px' height='30px' alt='User image'> {$row['username']}</h5>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>Posted: {$row['date_posted']}</h6>";
                echo "<p class='card-text'>{$row['body']}</p>";
                echo '<h6><strong>💭 Comments: </strong><small><em>(Ordered by date commented)</em></small></h6>';
                $comment_statement = "SELECT * FROM comments WHERE post_id = '{$row['post_id']}' ORDER BY date_posted DESC;";
                $comment_result = mysqli_query($conn, $comment_statement);
                if($comment_result){
                    echo '<ul class="list-group">';
                    while($comment_row = mysqli_fetch_assoc($comment_result)) {
                        echo '<li class="list-group-item">';
                        echo "<strong><p>By: {$comment_row['username']}</p></strong>";
                        echo "<small><em><p>Posted: {$comment_row['date_posted']}</p></em></small>";
                        echo "<p>{$comment_row['body']}</p>";

                        session_start();
                        if ($_SESSION['id'] == session_id() && $current_user == $comment_row['username']) {   
                            echo '<form action="db/deleteComment.php?comment_id=' . $comment_row['comment_id'] . '" method="POST">';
                            echo '<center><button type="submit" class="btn btn-danger btn-sm" id="deletePostButton">Delete Comment</button></center>';
                            echo '</form>';   
                            echo '<br />';
                        }             
                            
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                echo '<br>';
                echo '<section style="background-color:#e3f2fd; border-style: solid; width: 100%; margin: auto;">';
                echo '<form action="db/insertComment.php?post_id=' . $row['post_id'] . 'username=' . $current_user . '" method="POST" id="commentForm">';
                echo '<div class="mb-3">';
                echo '<label for="userscomment" class="form-label"><strong>Leave a comment... 💬</strong></label>';
                echo '<textarea class="form-control" id="userscomment" rows="3" style="width: 95%; margin: auto;" name="commentbody" required></textarea>';
                echo '<div id="commentHelp" class="form-text">Your comment can be a maximum of 280 characters.</div>';
                echo '<p id="commentFormError"></p>';
                echo '<br />';
                echo '<center><button type="submit" class="btn btn-secondary btn-sm" id="commentButton">Post</button></center>';
                echo '</div>';
                echo '</form>';
                echo '</section>';
                echo '</div>';
                echo '</div>';
                echo "<br />";
            }
            echo "</center>";
            echo '<script type="text/javascript" src="scripts/comments.js" defer></script>';
        }

            echo '</center>'; 
        }
?>